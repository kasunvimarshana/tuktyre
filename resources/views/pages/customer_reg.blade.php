@extends('layouts.default')
@section('content')
<?php $customer = 'active'; ?>
<!-- header | open  -->
<div class="container-fluid  container-a">
   <div class="row">
      @include('includes.logo')
      <div class="col-md-8  section-a-left">
         <p class="nav-head">Customer Registration</p>
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
                    <h3>Registerd customer</h3>
                </legend>
                <table id="dataTable" class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                            <th>Reg No</th>
                            <th>Name</th>
                            <th>NIC</th>
                            <th>License Number</th>
                            <th>Address</th>
                            <th>Contact no</th>
                            <th style="text-align: center;">View</th>
                            <th style="text-align: center;">Edit</th>
                            <th style="text-align: center;">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <!-- @isset($userObjectArray) -->
                        <!-- @foreach($userObjectArray as $key_userObject => $value_userObject) -->
                            <tr>
                                <td>{{ $value_userObject->code }}</td>
                                <td>{{ $value_userObject->name_display }}</td>
                                <td>{{ $value_userObject->nic_number }}</td>
                                <td>{{ $value_userObject->driving_licence_number }}</td>
                                <td>{{ $value_userObject->address }}</td>
                                <td>{{ $value_userObject->phone_number }}</td>
                                <td style="text-align: center;"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                <td style="text-align: center;"><a onclick="editFunction()" href="#"><i class="fas fa-edit" aria-hidden="true"></i></a></td>
                                <td style="text-align: center;"><a onclick="deleteFunction()" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            </tr>
                        <!-- @endforeach -->
                        <!-- @endisset -->
                        
                    </tbody>
                </table>
            </fieldset>
        </div>
        <div class="  col-md-4 section-b-right">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">
                    <h3>Registration of a new customer</h3>
                </legend>
                <form role="form" action="{!! route('customer.store', []) !!}" method="POST" class="" autocomplete="off" id="form1" enctype="multipart/form-data">
                     <!-- --- -->
                      @csrf
                     <!-- --- -->
                    <div class="card-body">
                    
                    <div class="form-group col-md-6">
                        <p class="req-message">Required message</p>
                        <input type="text" class="form-control" id="nic_number" name="nic_number" placeholder="NID number">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <p class="non-req-message">Optional</p>
                        <input type="text" class="form-control" id="driving_licence_number" name="driving_licence_number" placeholder="License number">
                    </div>
                    <div class="form-group col-md-6">
                        <p class="req-message">Required message</p>
                        <input type="text" class="form-control" id="vehicle_licence_number" name="vehicle_licence_number" placeholder="Vehical number">
                    </div>
                    <div class="form-group col-md-12">
                        <p class="req-message">Required message</p>
                        <input type="text" class="form-control" id="name_full" name="name_full" placeholder="Full name">
                    </div>
                    <div class="form-group col-md-12">
                        <p class="req-message">Required message</p>
                        <input type="text" class="form-control" id="name_display" name="name_display" placeholder="Name with initials">
                    </div>
                    <div class="form-group col-md-12">
                        <p class="req-message">Required message</p>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Home address">
                    </div>
                    <div class="form-group col-md-6">
                        <p class="req-message">Required message</p>
                        <!-- pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" -->
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Telephone">
                    </div>
                    <div class="form-group col-md-6">
                        <p class="req-message">Required message</p>
                        <input type="text"class="form-control" id="park_id" name="park_id" placeholder="Park name">
                    </div>
                    <div class="form-group  col-md-12">
                        <p class="req-message">Required message</p>
                        <input type="text"class="form-control" id="latitude" name="latitude" placeholder="Latitude">
                    </div>
                    <div class="form-group  col-md-12">
                        <p class="req-message">Required message</p>
                        <input type="text"class="form-control" id="longitude" name="longitude" placeholder="Longitude">
                    </div>
                    <div class="form-group  col-md-12">
                        <p class="non-req-message">Optional</p>
                        <textarea type="text"class="form-control" id="description" name="description" placeholder="Note"></textarea>
                    </div>
                    </div>
                    <!-- /.card-body -->
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