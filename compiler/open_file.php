<?php
    header('Access-Control-Allow-Origin: *');

    include ('functions.php');
    $conn = makeConn();
    $responceArray = array(
        "data" => "",
        "id" => 0
    );

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $userID = $_POST['userID'];
        $fileName = $_POST['fileName'];

        //$fileNmae = (explode(".", $fileName))[0];
        //var_dump ((explode(".", $fileName))[0]);

        //verify if this user has that file
        $query = "SELECT saved_files.ID as ID FROM users, saved_files WHERE saved_files.userID = users.ID AND users.ID = '$userID' AND saved_files.name='".(explode(".", $fileName))[0]."' LIMIT 1";
        //echo $query;
        if (($queryResult = $conn -> query($query)) -> num_rows > 0){
            // user owns this file
            $row = $queryResult -> fetch_assoc();
            $responceArray["data"] = file_get_contents("saved_files/" . $row['ID'] . ".c");
            $responceArray["id"] = $row['ID'];
            echo json_encode($responceArray);
        }
    }

?>