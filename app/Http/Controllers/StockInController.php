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
use App\StockIn as StockIn;
use App\StockInItem as StockInItem;
use App\Item as Item;
use App\Enums\StatusEnum as StatusEnum;

class StockInController extends Controller
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
            //'code' => 'required'
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
                    //'stockable_type' => $request->input('stockable_type'),
                    //'stockable_id' => $request->input('stockable_id'),
                    //'referenceable_type' => $request->input('referenceable_type'),
                    //'referenceable_id' => $request->input('referenceable_id'),
                    //'activity_id' => $request->input('activity_id'),
                    //'transaction_type_id' => $request->input('transaction_type_id'),
                    'company_id' => $configuration_company_id,
                    'strategic_business_unit_id' => $configuration_strategic_business_unit_id,
                    'user_id_create' => $configuration_user_id,
                    //'date_time_create' => $request->input('date_time_create'),
                );

                $stockInObject = StockIn::create( $dataArray );
                unset($dataArray);
                
                if( $stockInObject ){
                    //
                    $stockInItemObjectArray = array(
                        $stockInObject->stockInItems()->firstOrCreate([
                            //'id' => $request->input('id'),
                            'is_visible' => true,
                            'is_active' => true,
                            //'status_id' => $request->input('status_id'),
                            'item_id' => $request->input('item_id'),
                            //'unit_price' => floatval( $request->input('unit_price') ),
                            'quantity' => floatval( $request->input('quantity') ),
                            //'stockable_type' => $request->input('stockable_type'),
                            //'stockable_id' => $request->input('stockable_id'),
                            //'referenceable_type' => $request->input('referenceable_type'),
                            //'referenceable_id' => $request->input('referenceable_id'),
                            'stock_in_id' => $stockInObject->id,
                            //'date_time_create' => $request->input('date_time_create'),
                        ])
                    );
                    $stockInObject->stockInItems()->saveMany( $stockInItemObjectArray );
                }
                
                $data['stock_in_object'] = $stockInObject;

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
