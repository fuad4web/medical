<?php 
    include 'database/connection.php';
    include 'classes/User.php';

    global $pdo;

    session_start();


    $getFromU = new User($pdo);

    define("BASE_URL", "http://localhost/medical/");

    function SuccessMessage() {
        if(isset($_SESSION['SuccessMessage'])) {
            $output = '<div class="alert alert-success" style="text-align: center; font-size: 16px;" role="alert">';
            $output.= htmlentities($_SESSION['SuccessMessage']);
            $output.= '</div>';
            $_SESSION['SuccessMessage'] = null;
            return $output;
        }
    }
    
    
    function ErrorMessage() {
        if(isset($_SESSION['ErrorMessage'])) {
            $output = '<div class="alert alert-danger" style="text-align: center; font-size: 16px;" role="alert">';
            $output.= htmlentities($_SESSION['ErrorMessage']);
            $output.= '</div>';
            $_SESSION['ErrorMessage'] = null;
            return $output;
        }
    }

?>
