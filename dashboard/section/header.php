<?php 
   include_once('../core/init.php');
   
   if($getFromU->loggedIn() !== true) {
      // echo '<script>window.location.href = "login";</script>';
      header('Location: '.BASE_URL.'dashboard/login');
   }

   $user_id = $_SESSION['id'];
   $user = $getFromU->userData($user_id);
?>

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
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
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
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- <script src="./js/jquery.min.js"></script>
      <script src="../assetss/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
       
   </head>
   
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="profileImage/<?=$user->profile_pic?>" alt="<?=$user->othername?>" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="profileImage/<?=$user->profile_pic?>" alt="<?=$user->othername?>" /></div>
                        <div class="user_info">
                           <h6><?=$user->firstname?>&nbsp;<?=$user->othername?></h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
               <?php
                  if($user->account_type == 'patient') {
                     ?>
                  <h4>General (Patient Dashboard)</h4>
                  <ul class="list-unstyled components">
                        <li><a href="patient_dashboard"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
                     
                        <li><a href="my_complaints"><i class="fa fa-calendar-o blue1_color"></i> <span>My Complaints</span></a></li>
                        <!-- <li><a href="patient_chat"><i class="fa fa-calendar-o blue1_color"></i> <span>Chat</span></a></li> -->
                        <li><a href="profile"><i class="fa fa-cog yellow_color"></i> <span>Profile</span></a></li>
                       <?php
                    } elseif($user->account_type == 'doctor') {
                  ?>
                  <ul class="list-unstyled components">
                     <li><a href="doctor_dashboard"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
                     
                     <!-- <li><a href="patients"><i class="fa fa-users green_color"></i> <span>Patients</span></a></li> -->
                     
                     <li><a href="patient_complaints"><i class="fa fa-table blue1_color"></i> <span>Patient Complaints</span></a></li>

                     <li><a href="profile"><i class="fa fa-cog yellow_color"></i> <span>Profile</span></a></li>
                  <?php
                    } else {
                       ?>
                       <h4>General (Admin Dashboard)</h4>
                        <ul class="list-unstyled components">
                        
                        <li><a href="admin_dashboard"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
                        
                        <li><a href="doctors"><i class="fa fa-user purple_color2"></i> <span>Doctors</span></a></li>
                        
                        <li><a href="patients"><i class="fa fa-users green_color"></i> <span>Patients</span></a></li>
                        
                        <li><a href="add_specialty"><i class="fa fa-table blue1_color"></i> <span>Specialties</span></a></li>

                        <li><a href="registration"><i class="fa fa-cog yellow_color"></i> <span>Doctor Registration</span></a></li>
                       <?php
                    }
                  ?>
                     
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
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="profileImage/<?=$user->profile_pic?>" alt="<?=$user->othername?>" /><span class="name_user"><?=$user->firstname?>&nbsp;<?=$user->othername?></span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="logout"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
