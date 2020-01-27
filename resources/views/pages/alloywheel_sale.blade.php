@extends('layouts.default')
@section('content')
<?php $sales = 'active'; ?>
<!-- header | open  -->
    <div class="container-fluid  container-a">
    <div class="row">
        @include('includes.logo')
        <div class="col-md-8  section-a-left">
            <p class="nav-head">Sales > Alloy Wheels</p>
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
                        <h3>Details of alloy wheels issue</h3>
                     </legend>
                     <table id="dataTable" class="table table-striped table-bordered" >
                        <thead>
                           <tr>
                              <th>Invoice no</th>
                              <th>Vehicle no</th>
                              <th>Item</th>
                              <th>Qty</th>
                              <th>Total</th>
                              <th>Down Payment</th>
                              <th>Edit</th>
                              <th>Delete</th>
                           </tr>
                        </thead>
                        <tbody>
                            <!-- @isset($sellObjectArray) -->
                            <!-- @foreach($sellObjectArray as $key_sellObject => $value_sellObject) -->
                                <!-- @if($value_sellObject->sellItems) -->
                                <!-- @foreach($value_sellObject->sellItems as $key_sellItemObject => $value_sellItemObject) -->
                                <tr>
                                    <td># {{ $value_sellObject->id }}</td>
                                    <td>
                                        @if($value_sellObject->userVehicleCustomer)
                                            {{ $value_sellObject->userVehicleCustomer->vehicle_licence_number }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($value_sellItemObject->item)
                                            {{ $value_sellItemObject->item->name }}
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
                        <h3>Alloy wheels issue</h3>
                     </legend>
                     <form role="form" action="{!! route('sellAlloyWheel.store', []) !!}" method="POST" class="" autocomplete="off" id="form1" enctype="multipart/form-data">
                         <!-- --- -->
                          @csrf
                         <!-- --- -->
                        <div class="card-body">
                        <div class="row">
                               <!-- Date -->
                               <div class="form-group col-md-6">
                              <label>Emp No:</label>
                                    <select class="form-control select2" id="user_id_employee" name="user_id_employee">
                                    <!-- @isset($userObjectEmployeeArray) -->
                                    <!-- @foreach($userObjectEmployeeArray as $key_userObjectEmployee => $value_userObjectEmployee) -->
                                        <option value="{!! $value_userObjectEmployee->id !!}">{{ $value_userObjectEmployee->name_display }}</option>
                                    <!-- @endforeach -->
                                    <!-- @endisset -->
                                    </select>
                              </div>
                              <div class="form-group col-md-6">
                                    <label>Invoice No:</label> <lable class="req-message">Required Message</lable>
                                    <input type="text" class="form-control" id="code" name="code" placeholder="Invoice number">
                              </div>
                                <div class="form-group col-md-6">
                                    <label>Sold date:</label>
                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="date_time_create" name="date_time_create">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                
                              <div class="form-group col-md-6">
                              <label>Select vehicle No:</label>
                                    <select class="form-control select2" id="user_vehicle_id_customer" name="user_vehicle_id_customer">
                                        <!-- @isset($userVehicleObjectArray) -->
                                        <!-- @foreach($userVehicleObjectArray as $key_userVehicleObject => $value_userVehicleObject) -->
                                            <option value="{!! $value_userVehicleObject->id !!}">{{ $value_userVehicleObject->vehicle_licence_number }}</option>
                                        <!-- @endforeach -->
                                        <!-- @endisset -->
                                    </select>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                                 <div class="form-group col-md-8">
                                    <label for="exampleInputFile">Item</label>
                                    <select class="form-control select2" id="item_id" name="item_id">
                                        <!-- @isset($itemObjectArray) -->
                                        <!-- @foreach($itemObjectArray as $key_itemObject => $value_itemObject) -->
                                            <option value="{!! $value_itemObject->id !!}">{{ $value_itemObject->name_display }}</option>
                                        <!-- @endforeach -->
                                        <!-- @endisset -->
                                    </select>
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label for="exampleInputFile">Count</label>
                                    <div class="form-group">
                                       <input type="number" class="form-control" placeholder="Count" id="quantity" name="quantity">
                                    </div>
                                    </div>
                                <div class="form-group col-md-6">
                                    
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Qty price</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control price-align" placeholder="00.00" id="unit_price" name="unit_price">
                                    </div>
                                 </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="form-group col-md-6 rem-padding">
                              <label for="exampleInputFile">Sub Total</label>
                              </div>
                              <div class="form-group col-md-6 rem-padding">
                              <input type="text" class="form-control price-align" id="amount" name="amount" placeholder="00.00" readonly>
                              </div>
                              <div class="form-group col-md-6 rem-padding">
                              <label for="exampleInputFile">Down Payment</label>
                              </div>
                              <div class="form-group col-md-6 rem-padding">
                              <input type="text" class="form-control" id="amount_down_payment" name="amount_down_payment" placeholder="Down Payment">
                              </div>
                              <div class="form-group col-md-4 rem-padding">
                              <label for="exampleInputFile">No of Instalments</label>
                              </div>
                              <div class="form-group col-md-2 rem-padding">
                              <input type="text" class="form-control" id="installment_count" name="installment_count" placeholder="0">
                              </div>
                              <div class="form-group col-md-6 rem-padding">
                                 <input type="text" class="form-control" id="installment_amount" name="installment_amount" placeholder="Instalment value" readonly>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer col-md-6">
                         New Sale : 
                         <a href="/tyre">Tyre</a> |  <a href="/batteries">Battery</a>
                         </div>
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