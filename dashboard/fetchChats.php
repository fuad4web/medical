<?php
include_once('../core/init.php');
    
if($getFromU->loggedIn() !== true) {
    header('Location: '.BASE_URL.'dashboard/login');
}

$user_id = $_SESSION['id'];
$user = $getFromU->userData($user_id);

$padi_id = $_REQUEST['padi_id'];
$padi = $getFromU->myPadi($padi_id);

$messages = $getFromU->selectMessages($user_id, $padi_id);

$output = "";

// exit(var_dump(compact('messages', 'user_id', 'padi_id')));

foreach($messages as $message){
    if($message->fromuser == $user_id) {
        $output .= "
        <div class='chat outgoing'>
            <div class='details'>
                <p>$message->message.</p>
            </div>
        </div>
        ";
    } else {
        $output .= "
        <div class='chat incoming'>
            <img src='profileImage/$padi->profile_pic' alt=''>
            <div class='details'>
                <p>$message->message.</p>
            </div>
        </div>
        ";
    }
}
exit($output);
