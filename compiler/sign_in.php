<?php 
    header('Access-Control-Allow-Origin: *');
    include_once("functions.php");
    $responceArray = array(
        "name" => "",
        "ID" => "",
        "responce" => ""
    );
    $conn = makeConn();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];

        $query = "SELECT * FROM users WHERE email = '$mail' AND pass = '$pass' LIMIT 1";
        $queryResult = $conn -> query($query);

        if ($queryResult -> num_rows > 0){
            $row = $queryResult -> fetch_assoc();

            $responceArray["name"] = $row['name'];
            $responceArray["ID"] = $row['ID'];
            $responceArray["responce"] = "success";
            
        }else{
            $responceArray["responce"] = "failure";
        }
    }
    echo json_encode($responceArray);
?>