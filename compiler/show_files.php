<?php
    header('Access-Control-Allow-Origin: *');
    include_once('functions.php');

    $conn = makeConn();

    $files = array(
        "size" => 0
    );
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $ID = $_POST['ID'];

        $query = "SELECT saved_files.name AS fileName, saved_files.dataTime as date FROM users, saved_files WHERE users.ID = saved_files.userID AND users.ID = $ID";

        $queryResult = $conn -> query($query);
        $files["size"] = $queryResult -> num_rows;
        if ($queryResult -> num_rows > 0){
            while ($row = $queryResult -> fetch_assoc()){
                $files[$row["fileName"]] = $row["date"];
            }
        }
        echo json_encode($files);
    }
?>