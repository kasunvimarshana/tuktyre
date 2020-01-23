@extends('layouts.default')
@section('content')
<?php $sales = 'active'; ?>
<!-- header | open  -->
<div class="container-fluid  container-a">
   <div class="row">
      @include('includes.logo')
      <div class="col-md-8  section-a-left">
         <p class="nav-head">Stock > Alloy Wheels</p>
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
               <h3>Details of alloy wheels stock</h3>
            </legend>
            <table id="dataTable" class="table table-striped table-bordered" >
               <thead>
                  <tr>
                     <th>Date</th>
                     <th>Type</th>
                     <th>Count</th>
                     <th>Cost of (1)qty</th>
                     <th>Edit</th>
                     <th>Delete</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>12/20/2019</td>
                     <td> MD01</td>
                     <td> 12</td>
                     <td> 4500.00</td>
                     <td> <a href=""><i class="fas fa-edit"></i></a></td>
                     <td> <a href=""><i class="fas fa-window-close"></i></a></td>
                  </tr>
                  <tr>
                     <td>12/20/2019</td>
                     <td> MD02</td>
                     <td> 2</td>
                     <td> 3000.00</td>
                     <td> <a href=""><i class="fas fa-edit"></i></a></td>
                     <td> <a href=""><i class="fas fa-window-close"></i></a></td>
                  </tr>
            </table>
         </fieldset>
      </div>
      <div class="col-md-4  section-b-left">
                  <fieldset class="scheduler-border">
                     <legend class="scheduler-border">
                        <h3>Alloy wheels stock</h3>
                     </legend>
                     <form role="form">
                        <div class="card-body">
                           <div class="row">
                               <!-- Date -->
                                <div class="form-group col-md-6">
                                    <label>Date of stock:</label>
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
                              <label for="exampleInputFile">Qty price</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control price-align" placeholder="00.00">
                                    </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Item</label>
                                    <select class="form-control select2" >
                                       <option selected="selected">WP BFT-0894 | 922251568V</option>
                                       <option>WP JD-1485 | 882251568V</option>
                                       <option>WP GT-5698 | 722251568V</option>
                                       <option>CP YT-1498 | 622251568V</option>
                                    </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" name="radio2" >
                                       <label class="form-check-label">Other</label>
                                       <input type="text" class="form-control" placeholder="xxx/xx">
                                    </div>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Tyre count</label>
                                    <div class="form-group">
                                       <input type="number" class="form-control" placeholder="Count">
                                    </div>
                                 </div>
                            </div>
                            <hr>
                        </div>
                        <div class="card-footer col-md-6">
                         New Stock : 
                         <a href="/tyrestock">Tyre</a> | <a href="/batteriesstock">Battery</a></div>
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