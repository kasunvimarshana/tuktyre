@extends('layouts.default')
@section('content')
<?php $stock = 'active'; ?>
<!-- header | open  -->
<div class="container-fluid  container-a">
   <div class="row">
      @include('includes.logo')
      <div class="col-md-8  section-a-left">
         <p class="nav-head">Stock > Tyres</p>
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
               <h3>Details of tyres stock</h3>
            </legend>
            <table id="dataTable" class="table table-striped table-bordered" >
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Item</th>
                     <th>Count</th>
                     <th>Edit</th>
                     <th>Delete</th>
                  </tr>
               </thead>
               <tbody>
                    <!-- @isset($stockInItemObjectArray) -->
                    <!-- @foreach($stockInItemObjectArray as $key_stockInItemObject => $value_stockInItemObject) -->
                        <tr>
                            <td>#</td>
                            <td>
                                @isset($value_stockInItemObject->item)
                                    {{ $value_stockInItemObject->item->name_display }}
                                @endisset
                            </td>
                            <td>{{ $value_stockInItemObject->quantity_sum }}</td>
                            <td> <a href=""><i class="fas fa-edit"></i></a></td>
                            <td> <a href=""><i class="fas fa-window-close"></i></a></td>
                        </tr>
                    <!-- @endforeach -->
                    <!-- @endisset -->
            </table>
         </fieldset>
      </div>
      <div class="col-md-4  section-b-left">
                  <fieldset class="scheduler-border">
                     <legend class="scheduler-border">
                        <h3>Tyres stock</h3>
                     </legend>
                     <form role="form" action="{!! route('stockIn.store', []) !!}" method="POST" class="" autocomplete="off" id="form1" enctype="multipart/form-data">
                         <!-- --- -->
                          @csrf
                         <!-- --- -->
                        <div class="card-body">
                           <div class="row">
                               <!-- Date -->
                                <div class="form-group col-md-6">
                                    <label>Date of stock:</label>
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
                              <label for="exampleInputFile">Qty price</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control price-align" placeholder="00.00" id="quantity" name="quantity">
                                    </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Item</label>
                                    <select class="form-control select2" id="item_id" name="item_id">
                                        <!-- @isset($itemObjectArray) -->
                                        <!-- @foreach($itemObjectArray as $key_itemObject => $value_itemObject) -->
                                            <option value="{!! $value_itemObject->id !!}">{{ $value_itemObject->name_display }}</option>
                                        <!-- @endforeach -->
                                        <!-- @endisset -->
                                    </select>
                                 </div>
                                 <!-- div class="form-group col-md-6">
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" name="radio2" >
                                       <label class="form-check-label">Other</label>
                                       <input type="text" class="form-control" placeholder="xxx/xx">
                                    </div>
                                    
                                 </div -->
                                <div class="form-group col-md-6">
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Tyre count</label>
                                    <div class="form-group">
                                       <input type="number" class="form-control" placeholder="Count" id="quantity" name="quantity">
                                    </div>
                                 </div>
                            </div>
                            <hr>
                        </div>
                        <div class="card-footer col-md-6">
                         New Stock : 
                         <a href="/batteriesstock">Battery</a> | <a href="/alloywheelsstock">Alloywheel</a>
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