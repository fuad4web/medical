
<!-- Hide Response -->
<?php

    include_once('../core/init.php');


    session_start();
  $id =  $_SESSION['id'];
  $user = $getFromU->userData($id);
  

    $ref = $_GET['reference'];
    $email = $_GET['email'];

    if($ref == null || $ref == '') {
        header("Location:javascript://history.go(-1)");
    }

  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_4b6561494757499a63bff041ed0dd3b169dbbb97",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    // echo $response;
    $result = json_decode($response);
  }
  if($result->data->status == 'success') {

      $status = $result->data->status;
      $reference = $result->data->reference;
      $lastname = $result->data->customer->last_name;
      $firstname = $result->data->customer->first_name;
      $fullname = $lastname . ' ' . $firstname;
      $customer_email = $result->data->customer->email;
      $date_time = date('m/d/Y h:i:s a', time());
      $amount = $result->data->amount;
      

      $create_payments = $getFromU->create('membership_payments', array('fullname'=>$fullname, 'reference'=>$reference, 'email'=>$customer_email, 'amount' => $amount, 'payment_status'=>$status, 'trans_date'=>$date_time));
      $getFromU->updateEmailTrans('users', (string)$email, array('paid' => 1));

      if($create_payments == true) {
          $_SESSION['SuccessMessage'] = "Transaction Successfully Save";
          header('Location: login');
          exit();
      } else {
          $_SESSION['ErrorMessage'] = "Transaction Unsuccessful!";
          header('Location: login');
      }

  }
?>
