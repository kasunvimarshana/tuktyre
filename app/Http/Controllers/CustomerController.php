<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
//use Illuminate\Http\Response;
use DB;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use \StdClass;
use \Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session as Session;
//use Illuminate\Support\Facades\Cookie as Cookie;
//use Illuminate\Http\Request;
//use GuzzleHttp\Psr7\Request as GuzzleRequest;
//use GuzzleHttp\Psr7\MultipartStream as GuzzleMultipartStream;
//use GuzzleHttp\Client as Client;
//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

//use App\Http\Resources\CommonResponseResource as CommonResponseResource;
//use App\Enums\HTTPStatusCodeEnum as HTTPStatusCodeEnum;
use App\User as User;
use App\Vehicle as Vehicle;
use App\UserVehicle as UserVehicle;
use App\Enums\StatusEnum as StatusEnum;

class CustomerController extends Controller
{
    //
    protected $app_file_storage_uri;
    
    function __construct(){
        $this->app_file_storage_uri = config('app.app_file_storage_uri');
        //create directory
        /*
        if(!Storage::exists( $this->app_file_storage_uri )) {
            Storage::makeDirectory($this->app_file_storage_uri, 0775, true);
        }
        */
    }
    
    public function index(Request $request){ /*return response()->json( $request );*/ }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        //
        $dataArray = array();
        $rules = array();
        $date_today = Carbon::now();//->format('Y-m-d');
        $current_user = null;
        $data = array();
        
        try {
            // Start transaction!
            DB::beginTransaction();
            
            $userObject = new User();
            $userObject = $userObject->where("is_visible", "=", true);
            $userObject = $userObject->where("is_active", "=", true);
            $userObject = $userObject->whereHas('customer', function($query){
                //$query->where('key', '=', 'value');
            });
            $userObject = $userObject->orderBy('id', 'desc');
            $userObjectArray = $userObject->get();
            $data['userObjectArray'] = $userObjectArray;
            
            //unset($dataArray);
            // Commit transaction!
            DB::commit();
        }catch(Exception $e){
            // Rollback transaction!
            DB::rollback();
        }
        
        if(view()->exists('pages.customer_reg')){
            return View::make('pages.customer_reg', $data);
        }else{
            return redirect()->back()->withInput();
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $dataArray = array();
        $rules = array();
        $date_today = Carbon::now();//->format('Y-m-d');
        $current_user = null;
        $data = array();
        
        // validate the info, create rules for the inputs
        $rules = array(
            //'code' => 'required|unique:users,code'
        );
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            //return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // do process
            try {
                // Start transaction!
                DB::beginTransaction();
                
                /*
                if( (($request->has('code')) && ($request->filled('code'))) ){
                    $code = $request->input('code');
                }
                */
                
                $configuration_company_id = $request->session()->get('configuration_company_id', null);
                $configuration_strategic_business_unit_id = $request->session()->get('configuration_strategic_business_unit_id', null);
                $configuration_user_id = $request->session()->get('configuration_user_id', null);
                
                $dataArray = array(
                    //'id' => $request->input('id'),
                    'is_visible' => true,
                    'is_active' => true,
                    //'status_id' => $request->input('status_id'),
                    'status_id' => StatusEnum::ENUM_DEFAULT,
                    'code' => $request->input('code'),
                    'nic_number' => $request->input('nic_number'),
                    'driving_licence_number' => $request->input('driving_licence_number'),
                    'name_full' => $request->input('name_full'),
                    'name_display' => $request->input('name_display'),
                    'phone_number' => $request->input('phone_number'),
                    'email' => $request->input('email'),
                    'username' => $request->input('username'),
                    'password' => Hash::make( $request->input('password') ),
                    //'remember_token' => $request->input('remember_token'),
                    //'image_uri' => $request->input('image_uri'),
                    'company_id' => $configuration_company_id,
                    'strategic_business_unit_id' => $configuration_strategic_business_unit_id,
                    //'code_active' => $request->input('code_active'),
                    'user_type_id' => $request->input('user_type_id'),
                    'vehicle_park_id' => $request->input('vehicle_park_id'),
                    'registration_number' => $request->input('registration_number'),
                    'address' => $request->input('address'),
                    'latitude' => $request->input('latitude'),
                    'longitude' => $request->input('longitude'),
                    'description' => $request->input('description'),
                    'user_id_create' => $configuration_user_id,
                    //'date_time_create' => $request->input('date_time_create'),
                );
                
                if ( ($request->hasFile('image_uri')) ) {
                    //
                    //$file->isValid();
                    $app_file_storage_uri = $this->app_file_storage_uri;
                    if( (!Storage::exists($app_file_storage_uri)) ) {
                        Storage::makeDirectory($app_file_storage_uri, 0775, true); //creates directory
                    }
                    
                    $image_uri = $request->file('image_uri');
                    
                    //chmod(Storage::path($app_file_storage_uri), 0755);
                    
                    if( ($image_uri->isValid()) ){
                        $file_original_name = $image_uri->getClientOriginalName();
                        $file_type = $image_uri->getClientOriginalExtension();
                        //$filename = $image_uri->store( $app_file_storage_uri );
                        $filename = $image_uri->storeAs( 
                            $app_file_storage_uri,
                            uniqid( time() ) . '_' . $file_original_name
                        );
                        //chmod(Storage::path($filename), 0755);
                        
                        $dataArray['image_uri'] = $filename;
                    }
                }

                $userObject = User::create( $dataArray );
                unset($dataArray);
                
                if( $userObject ){
                    //
                    $customerObjectArray = array(
                        $userObject->customer()->firstOrCreate([
                            //'id' => $request->input('id'),
                            'is_visible' => true,
                            'is_active' => true,
                            'user_id' => $userObject->user_id,
                            //'status_id' => $userObject->status_id,
                            //'company_id' => $configuration_company_id,
                            //'strategic_business_unit_id' => $configuration_strategic_business_unit_id,
                            //'date_time_create' => $userObject->date_time_create,
                        ])
                    );
                    $userObject->customer()->saveMany( $customerObjectArray );
                }
                
                if( (($request->has('vehicle_licence_number')) && ($request->filled('vehicle_licence_number'))) ){
                    if( $userObject ){
                        $vehicle_licence_number = $request->input('vehicle_licence_number');
                        
                        $vehicleObject = new Vehicle();
                        
                        $userVehicleObjectArray = array(
                            $userObject->userVehicles()->firstOrCreate([
                                //'id' => $request->input('id'),
                                //'is_visible' => true,
                                //'is_active' => true,
                                //'user_id' => $userObject->user_id,
                                //'vehicle_id' => $request->input('vehicle_id'),
                                //'status_id' => $request->input('status_id'),
                                'vehicle_licence_number' => $vehicle_licence_number,
                                //'date_time_create' => $request->input('date_time_create'),
                            ])
                        );
                        
                        $userObject->userVehicles()->saveMany( $userVehicleObjectArray );
                    }
                }
                
                $data['user_object'] = $userObject;

                unset($dataArray);
                // Commit transaction!
                DB::commit();
            }catch(Exception $e){
                // Rollback transaction!
                DB::rollback(); 
                //return redirect()->back()->withInput();
            }
        }
        
        //unset data
        unset( $dataArray );
        unset( $rules );
        unset( $date_today );
        unset( $current_user );
        //unset( $data );
        
        return redirect()->back();
    }
    
}
