<?php
    header('Access-Control-Allow-Origin: *');
    include_once("proc_open_test.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $inputs = $_POST['inputs'];
        execProcess($inputs);
    }
?>