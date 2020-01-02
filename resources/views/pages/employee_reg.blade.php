@extends('layouts.default')
@section('content')
<?php $stock = 'active'; ?>
<!-- header | open  -->
<div class="container-fluid  container-a">
   <div class="row">
      @include('includes.logo')
      <div class="col-md-8  section-a-left">
         <p class="nav-head">Employee Registration</p>
      </div>
      @include('includes.date_time')
   </div>
</div>
<!-- header | close  -->
<!-- body | open  -->
<div class="container-fluid  container-b">
         <div class="row">
             <!-- Data table -->
            <div class="  col-md-8 section-b-right table-div">
                <fieldset class="scheduler-border">
                 <legend class="scheduler-border">
                     <h3>Registerd employees</h3>
                  </legend>
                   <table id="dataTable" class="table table-striped table-bordered" >
                      <thead>
                         <tr>
                            <th>Reg No</th>
                            <th>User type</th>
                            <th>NID</th>
                            <th>Name</th>
                            <th>Contact no</th>
                            <th style="text-align: center;">View</th>
                            <th style="text-align: center;">Edit</th>
                            <th style="text-align: center;">Delete</th>
                         </tr>
                      </thead>
                      <tbody>
                         <tr>
                            <td>Emp001</td>
                            <td>Admin</td>
                            <td>922251568V</td>
                            <td>W.A.S.Kumara</td>
                            <td>0714067638</td>
                            <td style="text-align: center;"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                            <td style="text-align: center;"><a onclick="editFunction()" href="#"><i class="fas fa-edit" aria-hidden="true"></i></a></td>
                            <td style="text-align: center;"><a onclick="deleteFunction()" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                         </tr>
                   </table>
                </fieldset>
             </div>
            <div class="col-md-4  section-b-left">
               <fieldset class="scheduler-border">
                  <legend class="scheduler-border">
                     <h3>Registration of a new employee</h3>
                  </legend>
                  <form role="form">
                     <div class="card-body">
                        <div class="form-group col-md-6">
                            <p class="non-req-message">Required message</p>
                            <select class="form-control" id="sel1">
                                <option>Admin</option>
                                <option>Dealer</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <p class="req-message">Required message</p>
                          <input type="text" class="form-control" id="cus_name" placeholder="Emp Reg Number">
                       </div>
                        <div class="form-group col-md-6">
                             <p class="req-message">Required message</p>
                           <input type="text" class="form-control" id="cus_name" placeholder="NID Number">
                        </div>
                        <div class="form-group col-md-6">
                             <p class="req-message">Required message</p>
                           <input type="text" class="form-control" id="cus_name" placeholder="Name with initials">
                        </div>
                        <div class="form-group col-md-12">
                            <p class="req-message">Required message</p>
                          <input type="text" class="form-control" id="cus_name" placeholder="Full name">
                       </div>
                        <div class="form-group col-md-6">
                             <p class="req-message">Required message</p>
                           <input type="text" class="form-control" id="cus_name" placeholder="Contact Number">
                        </div>
                        <div class="form-group col-md-12">
                             <p class="req-message">Required message</p>
                           <input type="text" class="form-control" id="cus_name" placeholder="Address">
                        </div>
                        <div class="form-group col-md-12">
                             <p class="req-message">Required message</p>
                           <input type="text" class="form-control" id="cus_name" placeholder="Username">
                        </div>
                        <div class="form-group col-md-6">
                             <p class="req-message">Required message</p>
                           <input type="password" class="form-control" id="cus_name" placeholder="password">
                        </div>
                        <div class="form-group col-md-6">
                             <p class="req-message">Required message</p>
                           <input type="password" class="form-control" id="cus_name" placeholder="Confirm Password">
                        </div>
                    </div>
                        <!-- /.card-body -->
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