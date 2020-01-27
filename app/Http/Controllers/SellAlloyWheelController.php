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
use App\Item as Item;
use App\UserVehicle as UserVehicle;
use App\StockIn;
use App\User;
use App\Sell;

class SellAlloyWheelController extends Controller
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
            
            /* select sell data */
            $sellObject = new Sell();
            $sellObject = $sellObject->where("is_visible", "=", true);
            $sellObject = $sellObject->where("is_active", "=", true);
            
            $sellObject = $sellObject->whereHas('sellItems', function($query){
                //$query->where('key', '=', 'value');
                $query = $query->whereHas('item', function($query){
                    $query = $query->where('item_id_parent', '=', '4');
                });
            });
            
            $sellObject = $sellObject->orderBy('id');
            $sellObject = $sellObject->with(['sellItems', 'userVehicleCustomer']);
            $sellObjectArray = $sellObject->get();
            
            $data['sellObjectArray'] = $sellObjectArray;
            
            /* select item data */
            $itemObject = new Item();
            $itemObject = $itemObject->where("is_visible", "=", true);
            $itemObject = $itemObject->where("is_active", "=", true);
            $itemObject = $itemObject->where('item_id_parent', '=', '4');
            $itemObject = $itemObject->where('is_stockable', '=', true);
            $itemObjectArray = $itemObject->get();
            
            $data['itemObjectArray'] = $itemObjectArray;
            
            /* select user data */
            $userObjectEmployee = new User();
            $userObjectEmployee = $userObjectEmployee->where("is_visible", "=", true);
            $userObjectEmployee = $userObjectEmployee->where("is_active", "=", true);
            $userObjectEmployee = $userObjectEmployee->whereHas('employee', function($query){
                //$query->where('key', '=', 'value');
                //$query = $query->where('is_visible', '=', true);
                //$query = $query->where('is_active', '=', true);
            });
            $userObjectEmployeeArray = $userObjectEmployee->get();
            
            $data['userObjectEmployeeArray'] = $userObjectEmployeeArray;
            
            /* select user data */
            $userObjectCustomer = new User();
            $userObjectCustomer = $userObjectCustomer->where("is_visible", "=", true);
            $userObjectCustomer = $userObjectCustomer->where("is_active", "=", true);
            $userObjectCustomer = $userObjectCustomer->whereHas('customer', function($query){
                //$query->where('key', '=', 'value');
                //$query = $query->where('is_visible', '=', true);
                //$query = $query->where('is_active', '=', true);
            });
            $userObjectCustomerArray = $userObjectCustomer->get();
            
            $data['userObjectCustomerArray'] = $userObjectCustomerArray;
            
            /* select user data */
            $userVehicleObject = new UserVehicle();
            //$userVehicleObject = $userVehicleObject->where("is_visible", "=", true);
            //$userVehicleObject = $userVehicleObject->where("is_active", "=", true);
            $userVehicleObject = $userVehicleObject->whereHas('user', function($query){
                //$query->where('key', '=', 'value');
            });
            $userVehicleObjectArray = $userVehicleObject->get();
            
            $data['userVehicleObjectArray'] = $userVehicleObjectArray;
            
            //unset($dataArray);
            // Commit transaction!
            DB::commit();
        }catch(Exception $e){
            // Rollback transaction!
            DB::rollback();
        }
        
        if(view()->exists('pages.alloywheel_sale')){
            return View::make('pages.alloywheel_sale', $data);
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
                
                $dataArray = array(
                    //'id' => $request->input('id'),
                    'is_visible' => true,
                    'is_active' => true,
                    //'code' => $request->input('code'),
                    //'status_id' => $request->input('status_id'),
                    'amount' => $request->input('amount'),
                    'amount_discount' => $request->input('amount_discount'),
                    'amount_down_payment' => $request->input('amount_down_payment'),
                    'amount_credit' => $request->input('amount_credit'),
                    //'user_id_create' => $request->input('user_id_create'),
                    //'user_id_customer' => $request->input('user_id_customer'),
                    'user_id_employee' => $request->input('user_id_employee'),
                    'user_vehicle_id_customer' => $request->input('user_vehicle_id_customer'),
                    //'description' => $request->input('description'),
                    //'company_id' => $request->input('company_id'),
                    //'strategic_business_unit_id' => $request->input('strategic_business_unit_id'),
                    //'date_time_create' => $request->input('date_time_create'),
                );
                
                $sellObject = new Sell();
                $sellObject = $sellObject->create( $dataArray );

                unset($dataArray);
                
                //$data['modelObject'] = $mdelObject;
                
                if( $sellObject ){
                    //
                    $sellObjectArray = array(
                        $sellObject->sellItems()->firstOrCreate([
                            //'id' => $request->input('id'),
                            'is_visible' => true,
                            'is_active' => true,
                            //'status_id' => $request->input('status_id'),
                            'sell_id' => $sellObject->id,
                            'item_id' => $request->input('item_id'),
                            'unit_price' => $request->input('unit_price'),
                            'quantity' => $request->input('quantity'),
                            //'referenceable_type' => $request->input('referenceable_type'),
                            //'referenceable_id' => $request->input('referenceable_id'),
                            //'date_time_create' => $request->input('date_time_create'),
                        ])
                    );
                    $sellObject->sellItems()->saveMany( $sellObjectArray );
                }
                
                if( (($request->has('item_id')) && ($request->filled('item_id'))) ){
                    $temp_item_id = $request->input('item_id');
                    $temp_quantity = $request->input('quantity');
                    $stockInObject = new StockIn();
                    $stockInObject = $stockInObject->where('item_id', '=', $temp_item_id)->first();
                    if( $stockInObject ){
                        $stockInObject->quantity = ($stockInObject->quantity - $temp_quantity);
                        $stockInObject->save();
                    }
                }

                unset($dataArray);
                // Commit transaction!
                DB::commit();
            }catch(Exception $e){dd($e);
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
