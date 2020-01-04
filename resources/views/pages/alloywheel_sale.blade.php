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
                              <th>Model</th>
                              <th>Qty</th>
                              <th>Total</th>
                              <th>Down Payment</th>
                              <th>No of Instalment</th>
                              <th>Edit</th>
                              <th>Delete</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>748</td>
                              <td>WP BFT-0894</td>
                              <td>MD01</td>
                              <td>2</td>
                              <td>4200</td>
                              <td>1000</td>
                              <td>6</td>
                              <td> <a href=""><i class="fas fa-edit"></i></a></td>
                              <td> <a href=""><i class="fas fa-window-close"></i></a></td>
                           </tr>
                           <tr>
                              <td>749</td>
                              <td>WP VT-0794</td>
                              <td>MD03</td>
                              <td>2</td>
                              <td>4200</td>
                              <td>1000</td>
                              <td>6</td>
                              <td> <a href=""><i class="fas fa-edit"></i></a></td>
                              <td> <a href=""><i class="fas fa-window-close"></i></a></td>
                           </tr>
                     </table>
                  </fieldset>
               </div>

               <div class="col-md-4  section-b-left">
                  <fieldset class="scheduler-border">
                     <legend class="scheduler-border">
                        <h3>Alloy wheels issue</h3>
                     </legend>
                     <form role="form">
                        <div class="card-body">
                        <div class="row">
                               <!-- Date -->
                               <div class="form-group col-md-6">
                              <label>Emp No:</label>
                                    <select class="form-control select2" >
                                    <option selected="selected">Dealer</option>
                                       <option>emp-001</option>
                                       <option>emp-002</option>
                                       <option>emp-003</option>
                                       <option>emp-004</option>
                                    </select>
                              </div>
                              <div class="form-group col-md-6">
                                    <label>Invoice No:</label> <lable class="req-message">Required Message</lable>
                                    <input type="text" class="form-control" id="id_no" placeholder="Invoice number">
                              </div>
                                <div class="form-group col-md-6">
                                    <label>Sold date:</label>
                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                
                              <div class="form-group col-md-6">
                              <label>Select vehicle No:</label>
                                    <select class="form-control select2" >
                                       <option selected="selected">WP BFT-0894 | 922251568V</option>
                                       <option>WP JD-1485 | 882251568V</option>
                                       <option>WP GT-5698 | 722251568V</option>
                                       <option>CP YT-1498 | 622251568V</option>
                                    </select>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                                 <div class="form-group col-md-3">
                                    <label for="exampleInputFile">Model</label>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" name="radio2" checked="">
                                       <label class="form-check-label">MD01</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" name="radio2" checked="">
                                       <label class="form-check-label">MD02</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" name="radio2" checked="">
                                       <label class="form-check-label">MD03</label>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label for="exampleInputFile">&nbsp;</label>                               
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" name="radio2" checked="">
                                       <label class="form-check-label">MD04</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" name="radio2" checked="">
                                       <label class="form-check-label">MD05</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" name="radio2" checked="">
                                       <label class="form-check-label">MD06</label>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Tyre count</label>
                                    <div class="form-group">
                                       <input type="number" class="form-control" placeholder="Count">
                                    </div>
                                    </div>
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Qty price</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control price-align" placeholder="00.00">
                                    </div>
                                 </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="form-group col-md-6 rem-padding">
                              <label for="exampleInputFile">Sub Total</label>
                              </div>
                              <div class="form-group col-md-6 rem-padding">
                              <input type="text" class="form-control price-align" id="cus_name" placeholder="00.00" readonly>
                              </div>
                              <div class="form-group col-md-6 rem-padding">
                              <label for="exampleInputFile">Down Payment</label>
                              </div>
                              <div class="form-group col-md-6 rem-padding">
                              <input type="text" class="form-control" id="cus_name" placeholder="Down Payment">
                              </div>
                              <div class="form-group col-md-4 rem-padding">
                              <label for="exampleInputFile">No of Instalments</label>
                              </div>
                              <div class="form-group col-md-2 rem-padding">
                              <input type="text" class="form-control" id="cus_name" placeholder="0">
                              </div>
                              <div class="form-group col-md-6 rem-padding">
                                 <input type="text" class="form-control" id="cus_name" placeholder="Instalment value" readonly>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer col-md-6"></div>
                           <div class="card-footer col-md-6 btn-area">
                              <button type="submit" class="btn btn-danger">Cancel</button>
                              <button type="submit" class="btn btn-success">Submit</button>
                           </div>
                     </form>
                  </fieldset>
               </div>
            </div>
         </div>
<!-- body | close  -->
@stop