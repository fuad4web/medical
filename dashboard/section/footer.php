<!-- footer -->
<div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © 2022 All rights reserved.<br><br>
                           
                        </p>
                     </div>
                  </div>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>

      <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/bootstrap.bundle.js"></script>

   
      
   <script type="text/javascript">
      // if($('#targetcont') == 'Savings') {
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);
        function payWithPaystack(e) {
          e.preventDefault();
          let handler = PaystackPop.setup({
            key: 'pk_test_fef1b70e11340e32b6f5d2f18d7170a148198d35', // Replace with your public key
            email: document.getElementById("email").value,
            // amount: document.getElementById("amount").value * 100,
            amount: 10 * 100,
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function(){
              window.location = "localhost/medical/login/?transaction=call";
              alert('Transaction Cancelled!');
            },
            callback: function(response){
              let message = 'Payment complete! Reference: ' + response.reference;
              alert(message);
              window.location = "verify_transaction?reference=" + response.reference + "&email=" + email;
            }
          });
          handler.openIframe();
        }
      // }
    </script>
      

       <!-- Page level plugins -->
       <!-- <script src="./js/jquery.min.js"></script>
       <script src="../assetss/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
       <!-- <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script> -->
      <!-- <script src="../vendor/jquery-easing/jquery.easing.min.js"></script> -->
      

   
      
      
<script type="text/javascript">
   $(document).ready(function() {

      $('#myissues').change(function() {
            var valuess = $(this).val();
         //   alert(valuess);  return;
         // $issu = $('#myissues').val();
         // $('#treat_id').val($issu);

            $.ajax({
               url : "./section/fetch.php",
               method : "POST",
               data: {valuess: valuess},
               success:function(data) {
                  console.log(data);
                  $('#doc_prescription').html(data);
               },
               error: function(jqXHR, status, message) {
                  console.error(message);
               }
            });
         
      });

      $(".lodgeComplain").click(function() {
         $('.fullcomplain-form').toggle();
      });

      // $("#sample_d").DataTable();
      // $('#example2').DataTable({
      //    "paging": true,
      //    "lengthChange": false,
      //    "searching": true,
      //    "ordering": true,
      //    "info": true,
      //    "autoWidth": false
      // });

      // $("#example1").DataTable({
      //     "responsive": true,
      //     "lengthChange": false,
      //     "autoWidth": false,
      //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      // $('#example2').DataTable({
      //     "paging": true,
      //     "lengthChange": false,
      //     "searching": false,
      //     "ordering": true,
      //     "info": true,
      //     "autoWidth": false,
      //     "responsive": true,
      // });
   });
</script>        
   </body>
</html>
<!-- jQuery -->


<!-- wow animation -->
<script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>

