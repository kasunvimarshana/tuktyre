<!DOCTYPE html>
<html lang="en">
     <head>
          @include('includes.head')
     </head>
     <body onload="startTime()">
          @include('includes.header')
          @yield('content')
          @include('includes.footer')
     </body>
          @include('includes.footScript')
</html>
