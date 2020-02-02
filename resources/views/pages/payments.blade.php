@extends('layouts.default')
@section('content')
<?php $sales = 'active'; ?>
<!-- header | open  -->
    <div class="container-fluid  container-a">
    <div class="row">
        @include('includes.logo')
        <div class="col-md-8  section-a-left">
            <p class="nav-head">Payments</p>
        </div>
        @include('includes.date_time')
    </div>
    </div>
<!-- header | close  -->
<!-- body | open  -->
<div class="container-fluid  container-b">
            <div class="row">
                
   
               <div class="  col-md-8 section-b-right table-div">
                  <fieldset class="scheduler-border">
                     <legend class="scheduler-border">
                        <h3>Details of Purchased items</h3>
                     </legend>
                        <div class="form-group col-md-6">
                            @isset( $sellObject )
                                @php
                                    $userCustomerObject = $sellObject->userCustomer;
                                    $vehicleCustomerObject = $sellObject->vehicleCustomer;
                                    $parkObjectCustomer = null;
                                    if( $userCustomerObject ){
                                        $parkObjectCustomer = $userCustomerObject->parks()->first();
                                    }
                                @endphp
                            <label>NIC No: 
                                <span>
                                    @isset( $userCustomerObject )
                                        {{ $userCustomerObject->nic_number }}
                                    @endisset
                                </span>
                            </label>
                            <br>
                            <label>Vehicle No: 
                                <span>
                                    @isset( $vehicleCustomerObject )
                                        {{ $vehicleCustomerObject->vehicle_licence_number }}
                                    @endisset
                                </span>
                            </label>
                            <br>
                            <label>Client name: 
                                <span>
                                    @isset( $userCustomerObject )
                                        {{ $userCustomerObject->name_full }}
                                    @endisset
                                </span>
                            </label>
                            <br>
                            <label>Contact No : 
                                <span>
                                    @isset( $userCustomerObject )
                                        {{ $userCustomerObject->phone_number }}
                                    @endisset
                                </span>
                            </label>
                            <br>
                            <label>Address : 
                                <span>
                                    @isset( $userCustomerObject )
                                        {{ $userCustomerObject->address }}
                                    @endisset
                                </span>
                            </label>
                            <br>
                            <label>Park name : 
                                <span>
                                    @isset( $parkObjectCustomer )
                                        {{ $parkObjectCustomer->name }}
                                    @endisset
                                </span>
                            </label>
                            @endisset
                        </div>                                                       
                        <div class="form-group col-md-6"> 
                            @isset( $sellObject )
                            @php
                                $latitude = 0;
                                $longitude = 0;
                                $userCustomerObject = $sellObject->userCustomer;
                                if( $userCustomerObject ){
                                    $latitude = $userCustomerObject->latitude;
                                    $longitude = $userCustomerObject->longitude;
                                }
                                $latitude = floatval( $latitude );
                                $longitude = floatval( $longitude );
                            @endphp
                            <iframe src="https://maps.google.com/maps?q={!! $latitude !!}, {!! $longitude !!}&maptype=roadmap&hl=es;z=14&iwloc=0&output=embed" width="100%" height="130" frameborder="0" style="border:0;" allowfullscreen>
                            </iframe>
                            @endisset      
                        </div>
                        <hr>
                        <br>
                        
                        <br>
                     <table id="dataTable" class="table table-striped table-bordered" >
                        <thead>
                           <tr>
                              <th>Invoice no</th>
                              <th>Purchased items</th>
                              <th>Details</th>
                              <th>Balance of payment</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           <!-- @isset($sellObjectArray) -->
                            <!-- @foreach($sellObjectArray as $key_sellObject => $value_sellObject) -->
                                <!-- @if($value_sellObject->sellItems) -->
                                <!-- @foreach($value_sellObject->sellItems as $key_sellItemObject => $value_sellItemObject) -->
                                <tr class="danger-success">
                                    <td># {{ str_pad_code_1( $value_sellObject->id ) }}</td>
                                    <td>
                                        @if($value_sellItemObject->item)
                                            {{ $value_sellItemObject->item->name }}
                                        @endif
                                    </td>
                                    <td>{{ $value_sellObject->description }}</td>
                                    
                                    
                                    <td>
                                        @if($value_sellObject->vehicle)
                                            {{ $value_sellObject->vehicle->vehicle_licence_number }}
                                        @endif
                                    </td>
                                    <td>{{ $value_sellItemObject->quantity }}</td>
                                    <td>{{ number_format(($value_sellItemObject->quantity * $value_sellItemObject->quantity)) }}</td>
                                    <td>{{ $value_sellObject->amount_down_payment }}</td>
                                    <td> <a href=""><i class="fas fa-edit"></i></a></td>
                                    <td> <a href=""><i class="fas fa-window-close"></i></a></td>
                                </tr>
                                <!-- @endforeach -->
                                <!-- @endif -->
                            <!-- @endforeach -->
                            <!-- @endisset -->
                         </tbody>
                     </table>
                  </fieldset>
               </div>

               <div class="col-md-4  section-b-left">
                  <fieldset class="scheduler-border">
                     <legend class="scheduler-border">
                        <h3>Payments</h3>
                     </legend>
                     <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Select vehicle No:</label>
                                    <select class="form-control select2" id="vehicle_id" name="vehicle_id">
                                        <option value=""> Select </option>
                                        <!-- @isset($vehicleObjectArray) -->
                                        <!-- @foreach($vehicleObjectArray as $key_vehicleObject => $value_vehicleObject) -->
                                            <option value="{!! $value_vehicleObject->id !!}">{{ $value_vehicleObject->vehicle_licence_number }}</option>
                                        <!-- @endforeach -->
                                        <!-- @endisset -->
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <br/>
                                    <button type="submit" name="filter_by_vehicle" value="filter_by_vehicle" class="btn btn-danger">Check</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Invoice No:</label>
                                    <select class="form-control select2" id="sell_id" name="sell_id">
                                        <option value=""> Select </option>
                                        <!-- @isset($sellObjectArray) -->
                                        <!-- @foreach($sellObjectArray as $key_sellObject => $value_sellObject) -->
                                            <option value="{!! $value_sellObject->id !!}">{{ str_pad_code_1( $value_sellObject->id ) }}</option>
                                        <!-- @endforeach -->
                                        <!-- @endisset -->
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <br/>
                                    <button type="submit" name="filter_by_code" value="filter_by_code" class="btn btn-danger">Check</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Emp No:</label>
                                    <select class="form-control select2" id="user_id_employee" name="user_id_employee">
                                        <option selected="selected">Dealer</option>
                                        <option>emp-001</option>
                                        <option>emp-002</option>
                                        <option>emp-003</option>
                                        <option>emp-004</option>
                                    </select>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Paid date:</label>
                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" id="date_time_create" name="date_time_create">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Amount</label>
                                    <div class="form-group">
                                       <input type="number" class="form-control" placeholder="00.00" id="amount" name="amount">
                                    </div>
                                    </div>
                                 
                            </div>
                            <hr>
                            <div class="row">
                              <div class="form-group col-md-6 rem-padding">
                              <label for="exampleInputFile">Due Balance</label>
                              </div>
                              <div class="form-group col-md-6 rem-padding">
                              <input type="text" class="form-control price-align" id="amount_due" name="amount_due" placeholder="00.00" readonly>
                              </div>
                              <div class="form-group col-md-6 rem-padding">
                              <label for="exampleInputFile">Paid</label>
                              </div>
                              <div class="form-group col-md-6 rem-padding">
                              <input type="text" class="form-control price-align" id="amount_pay" name="amount_pay" placeholder="00.00" readonly>
                              </div>
                              <div class="form-group col-md-6 rem-padding">
                              <label for="exampleInputFile">Balance</label>
                              </div>
                              <div class="form-group col-md-6 rem-padding">
                                 <input type="text" class="form-control price-align" id="amount_balance" name="amount_balance" placeholder="00.00" readonly>
                              </div>
                              <!-- -->
                              <div class="form-group col-md-6 rem-padding">
                              <label for="exampleInputFile">Close</label>
                              </div>
                              <div class="form-group col-md-6 rem-padding">
                                 <input type="checkbox" class="form-control checkbox" id="is_close" name="is_close" value="is_close">
                              </div>
                              <!-- -->
                           </div>
                        </div>
                        <div class="card-footer col-md-6"></div>
                           <div class="card-footer col-md-6 btn-area">
                              <button type="reset" class="btn btn-danger">Cancel</button>
                              <button type="submit" class="btn btn-success">Submit</button>
                           </div>
                     </form>
                  </fieldset>
               </div>
            </div>
         </div>
<!-- body | close  -->
@stop