<?php
    header('Access-Control-Allow-Origin: *');
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once('functions.php');

    $conn = makeConn();
    $output = array(
        "status" => "",
        "message" => ""
    );

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $userID = $_POST['userID'];
        $query = "DELETE FROM saved_files WHERE name = '".explode(".", $name)[0]."' AND userID = $userID";
        if ($conn -> query($query)){
            $output["status"] = "success";
            $output["message"] = "File successfully deleted";
        }else{
            $output["status"] = "failure";
            $output["message"] = "There are some unknown errors deleting files";
        }
    }
    echo json_encode($output);
?>