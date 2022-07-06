<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Dashboard Online Doctor Appointment App</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
                        <div class="user_info">
                           <h6>Dr John David</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     
                     <li><a href="patient_dashboard.html"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
                     
                     <li><a href="my_appointment.html"><i class="fa fa-calendar-o blue1_color"></i> <span>My Appointment</span></a></li>
                     
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->

            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /><span class="name_user">Dr John David</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="index.html"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->

               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Patient Dashboard <i class="fa fa-bed blue_color text-blue"></i></h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        
                        
                        <!-- table section -->
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                               <div class="full graph_head">
                                  <div class="heading1 margin_0">
                                     <h2><i class="fa fa-list blue_color text-blue"></i> My Appointment</a></h2>
                                  </div>
                                  
                               </div>
                               
                               <div class="table_section padding_infor_info">
                                  <div class="table-responsive-sm"><b>Doctor List</b>
                                     <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                           <tr>
                                              <th>#</th>
                                              <th>Appointment No.</th>
                                              <th>Doctor Name</th>
                                              <th>Appointment Date</th>
                                              <th>Appointment Day</th>
                                              <th>Appointment Time</th>
                                              <th>Appointment Status</th>
                                              <th>Download</th>
                                              <th>Cancel</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                           <tr>
                                              <td>1</td>
                                              <td>1001</td>
                                              <td>Dr Luke</td>
                                              <td>8-04-2022</td>
                                              <td>Monday</td>
                                              <td>12:00pm</td>
                                              <td><a style="color:white;"  class="small-box-footer badge bg-warning">Booked</a></td>
                                              <td><a href="#book" data-target="#book" data-toggle="modal"   style="color:white;"  class="small-box-footer badge bg-success"><i class="fa fa-book"></i>PDF</a>
                                            </td>
                                            <td><a href="#book" data-target="#book" data-toggle="modal"   style="color:white;"  class="small-box-footer badge bg-danger"><i class="fa fa-times"></i></a>
                                            </td>
                                           </tr>
                                           <tr>
                                            <td>2</td>
                                            <td>1201</td>
                                            <td>Dr Cythian</td>
                                            <td>10-04-2022</td>
                                            <td>Wednesday</td>
                                            <td>2:00pm</td>
                                            <td><a style="color:white;"  class="small-box-footer badge bg-warning">Booked</a></td>
                                            <td><a href="#book" data-target="#book" data-toggle="modal"   style="color:white;"  class="small-box-footer badge bg-success"><i class="fa fa-book"></i>PDF</a>
                                          </td>
                                          <td><a href="#book" data-target="#book" data-toggle="modal"   style="color:white;"  class="small-box-footer badge bg-danger"><i class="fa fa-times"></i></a>
                                          </td>
                                         </tr>
                                        </tbody>
                                     </table>
                                  </div>
                               </div>
                            </div>
                         </div>
                     </div>
                     
                     
 <div id="book" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog">
     <div class="modal-content" style="height:auto">
               <div class="modal-body"><h5 style="font-family: 'Courier New', Courier, monospace; color: darkgreen;">Make Appointment</h5>
         <form class="form-horizontal" method="post" action="" enctype='multipart/form-data'>
            <div class="login_form">
               <h4>Patient Details</h4>
               <hr>
                  <fieldset>
                     <div class="field">
                        <label class="label_field">Patient Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <label class="label_field">Mrs Aluko Taiwo</label>
                     </div><hr>
                     <div class="field">
                        <label class="label_field">Contact Number :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <label class="label_field">08123456578</label>
                     </div><hr>
                     <div class="field">
                        <label class="label_field">Address :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <label class="label_field">Texas USA 12ws Cairo</label>
                     </div><hr>
                  </fieldset>

                  <h4>Appointment Details</h4>
               <hr>
                  <fieldset>
                     <div class="field">
                        <label class="label_field">Doctor Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <label class="label_field">Dr Luke</label>
                     </div><hr>
                     <div class="field">
                        <label class="label_field">Appointment Date :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <label class="label_field">06-07-2022</label>
                     </div><hr>
                     <div class="field">
                        <label class="label_field">Appointment Day :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <label class="label_field">Friday</label>
                     </div><hr>
                     <div class="field">
                        <label class="label_field">Available Time :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <label class="label_field">12:00pm</label>
                     </div><hr>
                  </fieldset>
                  <div class="mb-3">
                     <label for="exampleFormControlTextarea1" class="form-label">Reasone For Appointment</label>
                     <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                   </div>
               
            </div>
 
               <div class="modal-footer">
     <button type="submit" name="del" class="btn btn-success"><i class="fa fa-plus white_color text-blue"></i> Book</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
         </form>
             </div>
       
         </div><!--end of modal-dialog-->
  </div>
  <!--end of modal--> 


                     
                  </div>
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
       <!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script type="text/javascript" language="javascript">
   /*   <script> */
   $(function() {
       $("#sample_d").DataTable();
       $('#example2').DataTable({
           "paging": true,
           "lengthChange": false,
           "searching": true,
           "ordering": true,
           "info": true,
           "autoWidth": false
       });
   });
   </script>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
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

      <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        </script>
   </body>
</html>
