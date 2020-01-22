<!DOCTYPE html>
<html lang="en">
   <head>
      @include('includes.head')
   </head>
   <body>
      <div class="container-fluid container-login ">
         <div class="row ">
            <div class=" col-md-6  col-xs-12 login-left">
               <div class="login-wrap"> 
                  <img src="{{asset('images/logo.jpg')}}" class="img-responsive " alt="logo">
               </div>
            </div>
            <div class=" col-md-6  col-xs-12 login-right">
               <div class="login-logo">
                  <a href="#">
                  <img   src="{{asset('images/logo-login.png')}}" alt="CoolAdmin">
                  </a>
               </div>
               <aside class="col-sm-2"></aside>
               <aside class="col-sm-8">
                  <div class="card">
                     <article class="card-body">
                        <form>
                           <div class="form-group">
                              <input name="" class="form-control au-input " placeholder="Username" type="email">
                           </div>
                           <!-- form-group// -->
                           <div class="form-group">
                              <input class="form-control au-input " placeholder="Password" type="password">
                           </div>
                           <!-- form-group// --> 
                           <div class="form-group fgot"> 
                              <a class="float-right text-danger"  href="#">Forgotten Password?</a>
                           </div>
                           <!-- form-group// -->  
                           <div class="form-group">
                              <button type="submit" class="btn btn-primary btn-block au-btn"> SIGN IN  </button>
                           </div>
                           <!-- form-group// -->                                                           
                        </form>
                     </article>
                  </div>
                  <!-- card.// -->
                  <div class="register-link">
                     <div class="pull-right hidden-xs">
                        <b>Version</b> 0.0.1
                     </div>
                     <strong>Copyright © <span id="getYear"></span> New Wave Marketing</strong> | All rights
                     reserved. Developed by &nbsp;&nbsp;<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC0AAAAYCAYAAABurXSEAAAACXBIWXMAAC4jAAAuIwF4pT92AAACHElEQVRYw+2WP47TQBTGf2+1DdKOSEEfc4KEE2w4AW5AomL3BOvt6DZ0UOE9QdxFYgtyA8wNwglI+hSOpkg5FH42g5NYtrwyu9I+KVLiifW+efP9GXGcTYEbmtUaSIEFzi74T3XS8v9D4APwHTErxEweA+jqBn4g5qJv0Kd63E1rDLypPJshJuuTLuKca/mGGQMJMPKeboEAZ7OHSQ9nl0CoQIt6DkT9TZqzC6ApL+OSBmKqrrPG2aAv0G0sD+Alzq4QEwC/K2s/ve9LnI10g6GeTqZ2mXYVYtsKdeIrxFTXzg9oIFGbLOoKMdc4GwO8ePb+G/AW+Kjrnw/0vNvs5u+6WF6qYIIGoh3oJotTKHQw6UuIW+BShXis8WucFf1MgEBFijrOGLjG2fBQg81u/mWzm4s39bvNbi7+lAt6LGuA3pa83J9gfFCoYrJ/OC1mrUE0003H3S0vd4PtkfWrvajOAafeBP0aKa/PdapU7HGGmKg76Lzq0ixRoD6nRy19feIB/9oVeAE6qpn2EJh6v+saVjntAw+AXyXwzqDz+K0LmL80yT32tmHkDxAzRUy816PDDfHUm8YCMZcqmGM0GWvzqXJ1WCtEGJQenYNceemZ3o/lOZsAryrJtk+T4ydTFWLkUWLk3RCT+03EQjh5eIQqokF5NRUT4OwKZ1PEfKoJiiXOZl6Ehzrp2PP6nq6mD6BOeIT1BPoJdE39AVkByN9vDJ15AAAAAElFTkSuQmCC" alt="">
                  </div>
               </aside>
               <aside class="col-sm-2"></aside>
               <aside class="col-sm-12">
               </aside>
            </div>
         </div>
      </div>
   </body>
   <script type="text/javascript">
      var getYear =  new Date().getFullYear();
      document.getElementById('getYear').innerHTML= getYear ;
   </script>
</html>