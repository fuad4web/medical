<?php 
    include_once('../core/init.php');
    
    if($getFromU->loggedIn() !== true) {
        header('Location: '.BASE_URL.'dashboard/login');
    }

    $user_id = $_SESSION['id'];
    $user = $getFromU->userData($user_id);

    // $padi_id = $_GET['userId'];
    // $padi = $getFromU->myPadi($padi_id);

    // $messages = $getFromU->selectMessages($user_id, $padi_id);
    // $messages = $getFromU->selectMessagesSession($user_id, $padi_id);

    // $fromuser = $_POST['fromuser'];
    $fromuser = $user_id;
    $touser = $_POST['touser'];
    $message = $_POST['message'];

    if($getFromU->sendMessage($fromuser, $touser, $message))
    echo true;

    else echo false;
?>
