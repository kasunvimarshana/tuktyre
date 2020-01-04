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
                        <th>Invoice No</th>
                        <th>NID</th>
                        <th>Vehical Number</th>
                        <th>License Number</th>
                        <th>Name</th>
                        <th>Contact no</th>
                        <th style="text-align: center;">View</th>
                        <th style="text-align: center;">Edit</th>
                        <th style="text-align: center;">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>NWM-001</td>
                        <td>922251568V</td>
                        <th>License Number</th>
                        <td>BAR-5689</td>
                        <td>W.A.S.Kumara</td>
                        <td>0714067638</td>
                        <td style="text-align: center;"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></tdstyle="text-align: center;">
                        <td style="text-align: center;"><a onclick="editFunction()" href="#"><i class="fas fa-edit" aria-hidden="true"></i></a></td>
                        <td style="text-align: center;"><a onclick="deleteFunction()" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <tr>
                        <td>NWM-002</td>
                        <td>922251568V</td>
                        <th>License Number</th>
                        <td>BAR-5689</td>
                        <td>W.A.S.Kumara</td>
                        <td>0714067638</td>
                        <td style="text-align: center;"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></tdstyle="text-align: center;">
                        <td style="text-align: center;"><a onclick="editFunction()" href="#"><i class="fas fa-edit" aria-hidden="true"></i></a></td>
                        <td style="text-align: center;"><a onclick="deleteFunction()" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <tr>
                        <td>NWM-003</td>
                        <td>922251568V</td>
                        <th>License Number</th>
                        <td>BAR-5689</td>
                        <td>W.A.S.Kumara</td>
                        <td>0714067638</td>
                        <td style="text-align: center;"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></tdstyle="text-align: center;">
                        <td style="text-align: center;"><a onclick="editFunction()" href="#"><i class="fas fa-edit" aria-hidden="true"></i></a></td>
                        <td style="text-align: center;"><a onclick="deleteFunction()" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <tr>
                        <td>NWM-003</td>
                        <td>922251568V</td>
                        <th>License Number</th>
                        <td>BAR-5689</td>
                        <td>W.A.S.Kumara</td>
                        <td>0714067638</td>
                        <td style="text-align: center;"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></tdstyle="text-align: center;">
                        <td style="text-align: center;"><a onclick="editFunction()" href="#"><i class="fas fa-edit" aria-hidden="true"></i></a></td>
                        <td style="text-align: center;"><a onclick="deleteFunction()" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <tr>
                        <td>NWM-003</td>
                        <td>922251568V</td>
                        <th>License Number</th>
                        <td>BAR-5689</td>
                        <td>W.A.S.Kumara</td>
                        <td>0714067638</td>
                        <td style="text-align: center;"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></tdstyle="text-align: center;">
                        <td style="text-align: center;"><a onclick="editFunction()" href="#"><i class="fas fa-edit" aria-hidden="true"></i></a></td>
                        <td style="text-align: center;"><a onclick="deleteFunction()" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <tr>
                        <td>NWM-003</td>
                        <td>922251568V</td>
                        <th>License Number</th>
                        <td>BAR-5689</td>
                        <td>W.A.S.Kumara</td>
                        <td>0714067638</td>
                        <td style="text-align: center;"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></tdstyle="text-align: center;">
                        <td style="text-align: center;"><a onclick="editFunction()" href="#"><i class="fas fa-edit" aria-hidden="true"></i></a></td>
                        <td style="text-align: center;"><a onclick="deleteFunction()" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <tr>
                        <td>NWM-003</td>
                        <td>922251568V</td>
                        <th>License Number</th>
                        <td>BAR-5689</td>
                        <td>W.A.S.Kumara</td>
                        <td>0714067638</td>
                        <td style="text-align: center;"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></tdstyle="text-align: center;">
                        <td style="text-align: center;"><a onclick="editFunction()" href="#"><i class="fas fa-edit" aria-hidden="true"></i></a></td>
                        <td style="text-align: center;"><a onclick="deleteFunction()" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <tr>
                        <td>NWM-003</td>
                        <td>922251568V</td>
                        <th>License Number</th>
                        <td>BAR-5689</td>
                        <td>W.A.S.Kumara</td>
                        <td>0714067638</td>
                        <td style="text-align: center;"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></tdstyle="text-align: center;">
                        <td style="text-align: center;"><a onclick="editFunction()" href="#"><i class="fas fa-edit" aria-hidden="true"></i></a></td>
                        <td style="text-align: center;"><a onclick="deleteFunction()" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <tr>
                        <td>NWM-003</td>
                        <td>922251568V</td>
                        <th>License Number</th>
                        <td>BAR-5689</td>
                        <td>W.A.S.Kumara</td>
                        <td>0714067638</td>
                        <td style="text-align: center;"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></tdstyle="text-align: center;">
                        <td style="text-align: center;"><a onclick="editFunction()" href="#"><i class="fas fa-edit" aria-hidden="true"></i></a></td>
                        <td style="text-align: center;"><a onclick="deleteFunction()" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <tr>
                        <td>NWM-003</td>
                        <td>922251568V</td>
                        <th>License Number</th>
                        <td>BAR-5689</td>
                        <td>W.A.S.Kumara</td>
                        <td>0714067638</td>
                        <td style="text-align: center;"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></tdstyle="text-align: center;">
                        <td style="text-align: center;"><a onclick="editFunction()" href="#"><i class="fas fa-edit" aria-hidden="true"></i></a></td>
                        <td style="text-align: center;"><a onclick="deleteFunction()" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    
                </table>
            </fieldset>
        </div>
        <div class="  col-md-4 section-b-right">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">
                    <h3>Registration of a new customer</h3>
                </legend>
                <form role="form">
                    <div class="card-body">
                    
                    <div class="form-group col-md-6">
                        <p class="req-message">Required message</p>
                        <input type="text" class="form-control" id="id_no" placeholder="NID number">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <p class="non-req-message">Optional</p>
                        <input type="text" class="form-control" id="vehical_no" placeholder="License number">
                    </div>
                    <div class="form-group col-md-6">
                        <p class="req-message">Required message</p>
                        <input type="text" class="form-control" id="vehical_no" placeholder="Vehical number">
                    </div>
                    <div class="form-group col-md-12">
                        <p class="req-message">Required message</p>
                        <input type="text" class="form-control" id="full_name" placeholder="Full name">
                    </div>
                    <div class="form-group col-md-12">
                        <p class="req-message">Required message</p>
                        <input type="text" class="form-control" id="ini_name" placeholder="Name with initials">
                    </div>
                    <div class="form-group col-md-12">
                        <p class="req-message">Required message</p>
                        <input type="text" class="form-control" id="address" placeholder="Home address">
                    </div>
                    <div class="form-group col-md-6">
                        <p class="req-message">Required message</p>
                        <input type="text" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control" id="phname" placeholder="Telephone">
                    </div>
                    <div class="form-group col-md-6">
                        <p class="req-message">Required message</p>
                        <input type="text"class="form-control" id="park_name" placeholder="Park name">
                    </div>
                    <div class="form-group  col-md-12">
                        <p class="req-message">Required message</p>
                        <input type="text"class="form-control" id="location" placeholder="Location code">
                    </div>
                    <div class="form-group  col-md-12">
                        <p class="non-req-message">Optional</p>
                        <textarea type="text"class="form-control" id="note" placeholder="Note"></textarea>
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