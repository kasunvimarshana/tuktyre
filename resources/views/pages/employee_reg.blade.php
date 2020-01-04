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
                        <div class="form-group col-md-4">
                            <select class="form-control" id="user_type" name="user_type">
                                <option>Admin</option>
                                <option>Dealer</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select class="form-control" id="branch" name="branch">
                                <option>Yakkala</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                          <input type="text" class="form-control" id="reg_number" name="reg_number" placeholder="Reg No">
                       </div>
                        <div class="form-group col-md-6">
                             <p class="req-message">Required message</p>
                           <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC Number">
                        </div>
                        <div class="form-group col-md-6">
                             <p class="req-message">Required message</p>
                           <input type="text" class="form-control" id="name_initials" name="name_initials" placeholder="Name with initials">
                        </div>
                        <div class="form-group col-md-12">
                            <p class="req-message">Required message</p>
                          <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full name">
                       </div>
                       <div class="row">
                        <div class="form-group col-md-6">
                              <p class="non-req-message">Attach Emp Image</p>
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01">
                                 <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                              </div>
                           <p class="req-message">Required message</p>
                           <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number">
                        </div>
                           <div class="form-group col-md-6 user">
                           <img src="{{asset('images/user.png')}}">
                           </div>
                       </div>
                        <div class="form-group col-md-12">
                             <p class="req-message">Required message</p>
                           <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                        </div>
                        <div class="form-group col-md-12">
                             <p class="req-message">Required message</p>
                           <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="form-group col-md-6">
                             <p class="req-message">Required message</p>
                           <input type="password" class="form-control" id="password" name="password" placeholder="password">
                        </div>
                        <div class="form-group col-md-6">
                             <p class="req-message">Required message</p>
                           <input type="password" class="form-control" id="con_password" name="con_password" placeholder="Confirm Password">
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