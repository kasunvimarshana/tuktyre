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
use App\Vehicle as Vehicle;
use App\UserVehicle as UserVehicle;
use App\StockIn;
use App\User;
use App\Sell;

class SellBatteryController extends Controller
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
                    $query = $query->where('item_id_parent', '=', '3');
                });
            });
            
            $sellObject = $sellObject->orderBy('id');
            $sellObject = $sellObject->with(['sellItems', 'creditSell', 'vehicle']);
            $sellObjectArray = $sellObject->get();
            
            $data['sellObjectArray'] = $sellObjectArray;
            
            /* select item data */
            $itemObject = new Item();
            $itemObject = $itemObject->where("is_visible", "=", true);
            $itemObject = $itemObject->where("is_active", "=", true);
            $itemObject = $itemObject->where('item_id_parent', '=', '3');
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
            $vehicleObject = new Vehicle();
            //$vehicleObject = $vehicleObject->where("is_visible", "=", true);
            //$vehicleObject = $vehicleObject->where("is_active", "=", true);
            $vehicleObject = $vehicleObject->whereHas('userVehicles', function($query){
                //$query->where('key', '=', 'value');
            });
            $vehicleObjectArray = $vehicleObject->get();
            
            $data['vehicleObjectArray'] = $vehicleObjectArray;
            
            //unset($dataArray);
            // Commit transaction!
            DB::commit();
        }catch(Exception $e){
            // Rollback transaction!
            DB::rollback();
        }
        
        if(view()->exists('pages.battery_sale')){
            return View::make('pages.battery_sale', $data);
        }else{
            return redirect()->back()->withInput();
        }
    }
}
