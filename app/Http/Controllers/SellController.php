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
use App\StockOut as StockOut;
use App\StockOutItem as StockOutItem;
use App\Item as Item;
use App\Enums\StatusEnum as StatusEnum;
use App\Vehicle as Vehicle;
use App\UserVehicle as UserVehicle;
use App\User;
use App\Sell;
use App\CreditSell;
use App\CreditCustomerIn;
use App\EmployeeCommissionIn;
use App\SellItem;

class SellController extends Controller
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
                    //'code' => $request->input('code'),
                    //'status_id' => $request->input('status_id'),
                    'status_id' => StatusEnum::ENUM_DEFAULT,
                    'amount' => floatval( $request->input('amount') ),
                    'amount_discount' => floatval( $request->input('amount_discount') ),
                    'amount_down_payment' => floatval( $request->input('amount_down_payment') ),
                    'amount_credit' => floatval( $request->input('amount_credit') ),
                    'user_id_create' => $configuration_user_id,
                    'user_id_customer' => $request->input('user_id_customer'),
                    'user_id_employee' => $request->input('user_id_employee'),
                    'vehicle_id_customer' => $request->input('vehicle_id_customer'),
                    'description' => $request->input('description'),
                    'company_id' => $configuration_company_id,
                    'strategic_business_unit_id' => $configuration_strategic_business_unit_id,
                    //'date_time_create' => $request->input('date_time_create'),
                );

                $sellObject = Sell::create( $dataArray );
                unset($dataArray);
                
                if( $sellObject ){
                    //
                    $sellItemObjectArray = array(
                        $sellObject->sellItems()->firstOrCreate([
                            //'id' => $request->input('id'),
                            'is_visible' => true,
                            'is_active' => true,
                            'status_id' => $request->input('status_id'),
                            'sell_id' => $sellObject->id,
                            'item_id' => $request->input('item_id'),
                            'unit_price' => floatval( $request->input('unit_price') ),
                            'quantity' => floatval( $request->input('quantity') ),
                            //'referenceable_type' => $request->input('referenceable_type'),
                            //'referenceable_id' => $request->input('referenceable_id'),
                            //'date_time_create' => $request->input('date_time_create'),
                        ])
                    );
                    $sellObject->sellItems()->saveMany( $sellItemObjectArray );
                }
                
                if( $sellObject ){
                    //
                    $stockOutObject = StockOut::create([
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
                        'user_id_create ' => $configuration_user_id,
                        //'date_time_create' => $request->input('date_time_create'),
                    ]);
                    
                    if( $stockOutObject ){
                        //
                        $stockOutItemObjectArray = array(
                            $stockOutObject->stockOutItems()->firstOrCreate([
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
                                'stock_out_id' => $stockOutObject->id,
                                //'date_time_create' => $request->input('date_time_create'),
                            ])
                        );
                        $stockOutObject->stockOutItems()->saveMany( $stockOutItemObjectArray );
                    }
                }
                
                if( $sellObject && (floatval( $sellObject->amount_credit ) > 0)){
                    //
                    $creditSellObject = $sellObject->creditSell()->firstOrCreate([
                        //'id' => $request->input('id'),
                        'is_visible' => true,
                        'is_active' => true,
                        'sell_id' => $sellObject->id,
                        'amount' => floatval( $request->input('amount_credit') ),
                        //'status_id' => $request->input('status_id'),
                        //'is_close' => is_true( $request->input('is_close') ),
                        //'date_time_create' => $request->input('date_time_create'),
                    ]);
                    $sellObject->creditSell()->save( $creditSellObject );
                    
                    if( $creditSellObject ){
                        //
                        $creditCustomerInObject = $creditSellObject->creditCustomerIn()->firstOrCreate([
                            //'id' => $request->input('id'),
                            'is_visible' => true,
                            'is_active' => true,
                            //'status_id' => $request->input('status_id'),
                            'status_id' => StatusEnum::ENUM_DEFAULT,
                            'user_id' => $request->input('user_id'),
                            //'referenceable_type' => $request->input('referenceable_type'),
                            //'referenceable_id' => $request->input('referenceable_id'),
                            'amount' => floatval( $request->input('amount_credit') ),
                            'company_id' => $configuration_company_id,
                            'strategic_business_unit_id' => $configuration_strategic_business_unit_id,
                            //'activity_id' => $request->input('activity_id'),
                            //'transaction_type_id' => $request->input('transaction_type_id'),
                            //'is_close' => is_true( $request->input('is_close') ),
                            'installment_count' => floatval( $request->input('installment_count') ),
                            //'installment_amount' => floatval( $request->input('installment_amount') ),
                            'user_id_create' => $configuration_user_id,
                            //'date_time_create' => $request->input('date_time_create'),
                        ]);
                        $creditSellObject->creditCustomerIn()->save( $creditCustomerInObject );
                    }
                }
                
                if( $sellObject ){
                    //
                    $employeeCommissionInObject = $sellObject->employeeCommissionIn()->firstOrCreate([
                        //'id' => $request->input('id'),
                        'is_visible' => true,
                        'is_active' => true,
                        //'status_id' => $request->input('status_id'),
                        'user_id' => StatusEnum::ENUM_DEFAULT,
                        //'referenceable_id' => $request->input('referenceable_id'),
                        //'referenceable_type' => $request->input('referenceable_type'),
                        'amount' => (floatval( $request->input('amount') ) * (10/100)),
                        'company_id' => $configuration_company_id,
                        'strategic_business_unit_id' => $configuration_strategic_business_unit_id,
                        'activity_id' => $configuration_strategic_business_unit_id,
                        //'transaction_type_id' => $request->input('transaction_type_id'),
                        //'is_close' => is_true( $request->input('is_close') ),
                        'user_id_create' => $configuration_user_id,
                        'description' => floatval( $request->input('description') ),
                        'date_time_create' => floatval( $request->input('date_time_create') ),
                    ]);
                    $sellObject->employeeCommissionIn()->save( $employeeCommissionInObject );
                }
                
                $data['sell_object'] = $sellObject;

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
