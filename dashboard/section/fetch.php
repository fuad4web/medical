<?php 
    include_once('../../core/init.php');

    if(isset($_POST['valuess'])){
        $illness = $_POST['valuess'];
        $treatment = $getFromU->selectTreatment($illness);
        // $htmlo = '';
        $htmlo = $treatment ? $treatment->treatment : 'No treatment';
        echo $htmlo;
    }
?>
