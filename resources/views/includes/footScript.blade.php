<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script> 
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script> 
<script src="{{asset('js/select2.full.min.js')}}"></script>

<script>
 $(function () {
   // alert message
   function editFunction() {
     alert("Sorry!...   You can't update any data.");
   }
   function deleteFunction() {
     alert("Sorry!...   You can't remove any data.");
   }
   
   //Initialize Select2 Elements
   $('.select2').select2()

   //Date picker
   $('#datepicker').datepicker({
      autoclose: true
    })

   // Datatable
   $(document).ready(function() {
   $('#dataTable').DataTable();
   } );
   
   // Time & Date
   var date = new Date();
   var day = date.getDate();
   var month = date.getMonth() + 1;
   var year = date.getFullYear();
        
   document.getElementById('txt1').innerHTML = (day + "/" + month + "/" + year);
  })
</script>