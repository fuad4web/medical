<?php 
    include_once('../core/init.php');
   
   $user_id = $_SESSION['id'];
   $user = $getFromU->userData($user_id);
   
   if($getFromU->loggedIn() !== true) {
      echo '<script>window.location.href = "login";</script>';
   }

    if($user->account_type == 'patient') {
        header('Location: '.BASE_URL.'dashboard/patient_dashboard');
    } elseif($user->account_type == 'doctor') {
        header('Location: '.BASE_URL.'dashboard/doctor_dashboard');
    } else {
        header('Location: '.BASE_URL.'dashboard/admin_dashboard');
    }

?>
