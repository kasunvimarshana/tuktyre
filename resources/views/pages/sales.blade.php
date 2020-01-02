@extends('layouts.default')
@section('content')
<?php $sales = 'active'; ?>
<!-- header | open  -->
<div class="container-fluid  container-a">
   <div class="row">
      @include('includes.logo')
      <div class="col-md-8  section-a-left">
         <p class="nav-head">Sales</p>
      </div>
      @include('includes.date_time')
   </div>
</div>
<!-- header | close  -->
<!-- body | open  -->
<div class="container-fluid  container-b">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <a href="tyre">
                    <div class="small-box bg-box-inner">
                        <div class="inner">
                            <h3>Tyres (Qty)</h3>
                            <p class="box-sale-text">400/8 DSI - 122</p>
                            <p class="box-sale-text">400/8 CEAT - 12</p>
                            <p class="box-sale-text">450/10 DSI - 23</p>
                            <p class="box-sale-text">450/10 CEAT - 06</p>
                            <p class="box-sale-text">450/12 DSI - 51</p>
                            <p class="box-sale-text">450/12 CEAT - 12</p>
                            <p class="box-sale-text low-q">Other DSI - 00</p>
                            <p class="box-sale-text">Other CEAT - 02</p>
                        </div>
                        <div class="icon">
                          <img src="{{asset('images/tyre.png')}}" class="img-responsive img-sec">
                        </div>
                        <p  class="small-box-footer">Click to Sale <i class="fas fa-arrow-circle-right"></i></p>
                    </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="batteries">
                    <div class="small-box bg-box-inner">
                        <div class="inner">
                            <h3>Batteries (Qty)</h3>
                            <p class="box-sale-text">Dagenite 12v 35ah - 22</p>
                            <p class="box-sale-text">Dagenite 9v 65ah - 12</p>
                            <p class="box-sale-text">Exide 12v 35ah - 2</p>
                            <p class="box-sale-text low-q">Exide 9v 65ah - 00</p>
                            <p class="box-sale-text">Amaron 12v 35ah - 13</p>
                            <p class="box-sale-text">Amaron 9v 65ah - 33</p>
                            <p class="box-sale-text">Lucas 12v 35ah - 16</p>
                            <p class="box-sale-text low-q">Lucas 9v 60ah - 00</p>
                        </div>
                        <div class="icon">
                          <img src="{{asset('images/battery.png')}}" class="img-responsive img-sec">
                        </div>
                        <p  class="small-box-footer">Click to Sale <i class="fas fa-arrow-circle-right"></i></p>
                    </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="alloywheels">
                    <div class="small-box bg-box-inner">
                        <div class="inner">
                            <h3>Alloy Wheels (Qty)</h3>
                            <p class="box-sale-text low-q">MD01 - 00</p>
                            <p class="box-sale-text">MD02 - 8</p>
                            <p class="box-sale-text">MD03 - 14</p>
                            <p class="box-sale-text">MD04 - 2</p>
                            <p class="box-sale-text low-q">MD05 - 00</p>
                            <p class="box-sale-text">MD06 - 6</p>
                            <p class="box-sale-text">MD07 - 5</p>
                            <p class="box-sale-text">MD08 - 1</p>
                        </div>
                        <div class="icon">
                          <img src="{{asset('images/alloywheel.png')}}" class="img-responsive img-sec">
                        </div>
                        <p  class="small-box-footer">Click to Sale <i class="fas fa-arrow-circle-right"></i></p>
                    </div>
                    </a>
                </div>
            </div>
        </div>
     </div>
<!-- body | close  -->
@stop