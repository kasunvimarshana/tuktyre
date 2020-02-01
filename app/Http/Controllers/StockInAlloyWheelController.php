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

class StockInAlloyWheelController extends Controller
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
            /* select stock data */
            $stockInItemObject = new StockInItem();
            $stockInItemObject = $stockInItemObject->where("is_visible", "=", true);
            $stockInItemObject = $stockInItemObject->where("is_active", "=", true);
            $stockInItemObject = $stockInItemObject->whereHas('item', function($query){
                //$query->where('key', '=', 'value');
                $query = $query->where('item_id_parent', '=', '4');
                $query = $query->where('is_stockable', '=', true);
            });
            $stockInItemObject = $stockInItemObject->select('*', DB::raw('SUM(quantity) as quantity_sum'));
            $stockInItemObject = $stockInItemObject->groupBy('item_id');
            $stockInItemObject = $stockInItemObject->with(['item']);
            $stockInItemObjectArray = $stockInItemObject->get();
            
            $data['stockInItemObjectArray'] = $stockInItemObjectArray;
            
            /* select item data */
            $itemObject = new Item();
            $itemObject = $itemObject->where("is_visible", "=", true);
            $itemObject = $itemObject->where("is_active", "=", true);
            $itemObject = $itemObject->where('item_id_parent', '=', '4');
            $itemObject = $itemObject->where('is_stockable', '=', true);
            $itemObjectArray = $itemObject->get();
            
            $data['itemObjectArray'] = $itemObjectArray;
            //unset($dataArray);
            // Commit transaction!
            DB::commit();
        }catch(Exception $e){
            // Rollback transaction!
            DB::rollback();
        }
        
        if(view()->exists('pages.alloywheel_stock')){
            return View::make('pages.alloywheel_stock', $data);
        }else{
            return redirect()->back()->withInput();
        }
    } 
}
