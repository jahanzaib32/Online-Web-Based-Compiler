<?php
    header('Access-Control-Allow-Origin: *');
    //error_reporting(E_ALL);
    //ini_set('display_errors', 1);
    include_once('functions.php');

    $conn = makeConn();
    $output = array(
        "message" => "",
        "status" => ""
    );

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];
        if ( ($conn -> query("SELECT * FROM users WHERE email='$mail' LIMIT 1"))-> num_rows > 0 ){
            $output['status'] = 'failure';
            $output['message'] = 'A user with same email is already registered!';
        }else{
            $query = "INSERT INTO users (name, email, pass) VALUES ('$name', '$mail', '$pass')";
            if ($conn -> query($query)){
                $output['status'] = 'success';
                $output['message'] = 'You are successfully registered';
            }else{
                $output['status'] = 'failure';
                $output['message'] = 'You have run into errors';
            }
        }
    }
    echo json_encode($output);
?>