@extends('layouts.default')
@section('content')
<?php $dashboard = 'active'; ?>
<!-- header | open  -->
<div class="container-fluid  container-a">
   <div class="row">
      @include('includes.logo')
      <div class="col-md-8  section-a-left">
         <p class="nav-head">Dashboard</p>
      </div>
      @include('includes.date_time')
   </div>
</div>
<!-- header | close  -->
<!-- body | open  -->
<div class="container-fluid  container-b dashbord-full">
   <div class="container">
      <div class="row">
         <div class="col-sm-6">
            <a href="#">
               <div class="small-box bg-info">
                  <div class="inner">
                     <h3>150</h3>
                     <p>Customer</p>
                  </div>
                  <div class="icon">
                     <i class="fas fa-users ico1"></i>
                  </div>
                  <p  class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></p>
               </div>
            </a>
         </div>
         <div class="col-sm-6">
            <a href="#">
               <div class="small-box bg-success">
                  <div class="inner">
                     <h3>3</h3>
                     <p>Empolyee</p>
                  </div>
                  <div class="icon">
                     <i class="fas fa-user ico1"></i>
                  </div>
                  <p  class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></p>
               </div>
            </a>
         </div>
         <div class="col-sm-4">
            <a href="#">
               <div class="small-box bg-warning">
                  <div class="inner">
                     <h3>1000</h3>
                     <p>Tyre Stock</p>
                  </div>
                  <div class="icon">
                    <img src="{{asset('images/tyre.png')}}" class="img-responsive img-sec">
                  </div>
                  <p  class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></p>
               </div>
            </a>
         </div>
         <div class="col-sm-4">
            <a href="#">
               <div class="small-box bg-danger">
                  <div class="inner">
                     <h3>53</h3>
                     <p> Battery</p>
                  </div>
                  <div class="icon">
                     <img src="{{asset('images/battery.png')}}" class="img-responsive img-sec">
                  </div>
                  <p  class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></p>
               </div>
            </a>
         </div>
         <div class="col-sm-4">
            <a href="#">
               <div class="small-box bg-secondary">
                  <div class="inner">
                     <h3>44</h3>
                     <p>Alloy wheels</p>
                  </div>
                  <div class="icon">
                     <img src="{{asset('images/alloywheel.png')}}" class="img-responsive img-sec">
                  </div>
                  <p  class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></p>
               </div>
            </a>
         </div>
         <div class="col-sm-6">
            <a href="#">
               <div class="small-box bg-success">
                  <div class="inner">
                     <h3>3000</h3>
                     <p>Sales</p>
                  </div>
                  <div class="icon">
                     <i class="fas fa-handshake ico1"></i>
                  </div>
                  <p  class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></p>
               </div>
            </a>
         </div>
         <div class="col-sm-6">
            <a href="#">
               <div class="small-box bg-info">
                  <div class="inner">
                     <h3>100 000.00</h3>
                     <p>Payment</p>
                  </div>
                  <div class="icon">
                     <i class="fas fa-dollar-sign ico1"></i>
                  </div>
                  <p  class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></p>
               </div>
            </a>
         </div>
      </div>
   </div>
</div>
<!-- body | close  -->
@stop