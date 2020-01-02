<div class="container-fluid header-full">
   <div class="row">
      <div class="col-md-2 head-button">
         <a href="/">
            <div class="btn-section @isset($dashboard){{$dashboard}}@endisset">
               <p>
                  <img src="{{asset('images/dash.png')}}" class="img-responsive ">
                  Dashboard
               </p>
            </div>
         </a>
      </div>
      <div class="col-md-2 head-button">
         <a href="customer">
            <div class="btn-section @isset($customer){{$customer}}@endisset">
               <p>
                  <img src="{{asset('images/register.png')}}" class="img-responsive " alt="register">
                  Customer Reg
               </p>
            </div>
         </a>
      </div>
      <div class="col-md-2 head-button">
         <a href="sales">
            <div class="btn-section @isset($sales){{$sales}}@endisset">
               <p>
                  <img src="{{asset('images/issues.png')}}" class="img-responsive">
                  Sales
               </p>
            </div>
         </a>
      </div>
      <div class="col-md-2 head-button">
         <a href="payments">
            <div class="btn-section @isset($payments){{$payments}}@endisset">
               <p>
                  <img src="{{asset('images/payments.png')}}" class="img-responsive ">
                  Payments
               </p>
            </div>
         </a>
      </div>
      <div class="col-md-2 head-button">
         <a href="stock">
            <div class="btn-section @isset($stock){{$stock}}@endisset">
               <p>
                  <img src="{{asset('images/stock-ico.svg')}}" class="img-responsive">
                  Stock
               </p>
            </div>
         </a>
      </div>
      <div class="col-md-2 head-button">
         <a href="employee">
            <div class="btn-section @isset($employee){{$employee}}@endisset">
               <p>
                  <img src="{{asset('images/register.png')}}" class="img-responsive " alt="register">
                  Employee Reg
               </p>
            </div>
         </a>
      </div>
      <div class="col-md-2 head-button">
         <a href="accounts">
            <div class="btn-section @isset($accounts){{$accounts}}@endisset">
               <p>
                  <img src="{{asset('images/dash.png')}}" class="img-responsive ">
                  Accounts
               </p>
            </div>
         </a>
      </div>
      <div class="col-md-2 head-button">
         <a href="reports">
            <div class="btn-section @isset($reports){{$reports}}@endisset">
               <p>
                  <img src="{{asset('images/report.png')}}" class="img-responsive ">
                  Reports
               </p>
            </div>
         </a>
      </div>
   </div>
</div>