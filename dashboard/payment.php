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
                        <h3 style="color: aliceblue;">Patient Payment</h3>
                     </div>
                  </div>
                  <div class="login_form">
                     <?php 
                        
                        echo SuccessMessage();
                        echo ErrorMessage();

                     ?>
                     <form method="POST" id="paymentForm">
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Fullnames</label>
                              <input type="text" id="fullname" name="fullname" placeholder="Fullname" />
                           </div>
                           <div class="field">
                              <label class="label_field">Email</label>
                              <input type="email" name="email" id="email" placeholder="Email" />
                           </div>
                           <div class="form-submit text-center">
                                <button type="submit" class="btn btn-primary" onclick="return payWithPaystack(event)"> Fund Account </button>
                            </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      </div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>



<script type="text/javascript">
// if($('#targetcont') == 'Savings') {
  const paymentForm = document.getElementById('paymentForm');
  paymentForm.addEventListener("submit", payWithPaystack, false);
  function payWithPaystack(event) {
    event.preventDefault();
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

     
</body>
</html>
