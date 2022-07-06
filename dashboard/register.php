<?php  

    include_once('../core/init.php');
    
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
   </head>
   
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <!-- <div class="center">
                        <img width="210" src="images/layout_img/login_image.jpg" alt="#" />
                     </div> -->
                     <div class="center">
                        <h3 style="color: aliceblue;">Patient Registration</h3>
                     </div>
                  </div>
                  <div class="login_form">

<?php

if(isset($_POST['register'])) {

  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['pass'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $contact = $_POST['contact'];
  $marital_status = $_POST['marital_status'];
  $address = $_POST['address'];
  $pass = md5($password);
  $status = 'patient';

  if(!empty($firstname) || !empty($lastname) || !empty($email) || !empty($password) || !empty($dob) || !empty($gender) || !empty($contact) || !empty($marital_status) || !empty($address)) {

      $firstname = $getFromU->checkInput($firstname);
      $lastname = $getFromU->checkInput($lastname);
      $email = $getFromU->checkInput($email);
      $dob = $getFromU->checkInput($dob);
      $gender = $getFromU->checkInput($gender);
      $contact = $getFromU->checkInput($contact);
      $marital_status = $getFromU->checkInput($marital_status);
      $address = $getFromU->checkInput($address);

      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $_SESSION['ErrorMessage'] = "Invalid Email Address";
      } else {

          if($getFromU->checkMail($email) === true) {
            $_SESSION['ErrorMessage'] = "Email Address Already used";
          } else {

              if($getFromU->checkNumber($contact) === true) {
                  $_SESSION['ErrorMessage'] = "Phone Number Existing";
              } else {
                  $getFromU->create('users', array('firstname'=>$firstname, 'othername'=>$lastname, 'account_type'=>$status, 'email'=>$email, 'password' => $pass, 'dob' => $dob, 'paid' => 1, 'gender'=>$gender, 'contact'=>$contact, 'marital_status' => $marital_status, 'address' => $address));
                  // echo '<div class="alert alert-success alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Registration Successful</div>';
                  $_SESSION['SuccessMessage'] = "Registration Successful";
                  header('Location: '.BASE_URL.'dashboard/login');
              }
         }
      }
  }
}

            echo ErrorMessage();

?>

               <form method="POST">
                  <fieldset>
                        <div class="mb-3">
                           <label for="exampleFormControlInput1" class="form-label">Patient First Name</label>
                           <input required type="text" name="fname" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Patient Last Name</label>
                              <input required type="text" name="lname" class="form-control" id="exampleFormControlInput1" >
                        </div>
                        <div class="row my-3">
                           <div class="col">
                              <label for="exampleFormControlInput1" class="form-label">Patient Email address</label>
                              <input required type="email" name="email" class="form-control" id="exampleFormControlInput1">
                           </div>
                           <div class="col">
                              <label for="exampleFormControlInput1" class="form-label">Patient Password</label>
                              <input required type="password" name="pass" class="form-control" id="exampleFormControlInput1">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col">
                              <label for="exampleFormControlInput1" class="form-label">Patient Date Of Birth</label>
                              <input required type="date" name="dob" class="form-control" id="exampleFormControlInput1">
                           </div>
                           <div class="col">
                              <label for="exampleFormControlInput1" class="form-label">Patient Gender</label>
                              <select type="text" name="gender" class="form-control" id="autoSizingInputGroup" required>
                                 <option selected>Choose...</option>
                                 <option value="Male">Male</option>
                                 <option value="Female">Female</option>
                              </select>
                           </div>
                        </div>
                        <div class="row my-3">
                           <div class="col">
                              <label for="exampleFormControlInput1" class="form-label">Patient Contact</label>
                              <input required type="number" name="contact" class="form-control" id="exampleFormControlInput1">
                           </div>
                           <div class="col">
                              <label for="exampleFormControlInput1" class="form-label">Patient Marital Status</label>
                              <select type="text" name="marital_status" class="form-control" id="autoSizingInputGroup" required>
                              <option selected>Choose...</option>
                              <option value="Single">Single</option>
                              <option value="Married">Married</option>
                              </select>
                           </div>
                        </div>
                        <div class="row my-3">
                           
                           <div class="col">
                              <label for="exampleFormControlTextarea1" class="form-label">Patient Complete Address</label>
                              <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                           </div>
                        </div>
                        
                        <div class="field margin_0">
                           <label class="label_field hidden">hidden label</label>
                           <button type="submit" name="register" class="main_bt">Register</button>
                        </div>
                  </fieldset>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</div>

<?php 
   include 'section/footer.php';
?>
