<?php
    header('Access-Control-Allow-Origin: *');
    //error_reporting(E_ALL);
    //ini_set('display_errors', 1);
    include_once('functions.php');

    $conn = makeConn();
    $result = "";
    //var_dump ($conn);
    function saveFile ($name, $data){
        $fileOpened = fopen("saved_files/$name.c", 'w');
        if (fwrite($fileOpened, $data) === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    $responceArray = array(
        'fileID' => '',
        'status' => '',
        'message' => ''
    );
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $data = $_POST['data'];
        $userID = $_POST['userID'];
        
        // check if file is already created
        if ($id > 0){
            // verify id and name from database
            $query = "SELECT * FROM saved_files WHERE id = $id AND name = '" . explode(".", $name)[0] . "'";
            $queryResult = $conn -> query($query);
            if ($queryResult -> num_rows > 0){
                // id and name got varified
                // replace file data
                if (saveFile($id, $data)){
                    $responceArray["status"] = "success";
                    $responceArray["fileID"] = $id;
                }else{
                    $responceArray["status"] = "failure";
                }
            }else{
                $result .= "No file matched your submitted data";
                $responceArray["status"] = "failure";
            }
        }elseif ($id == 0){
            //first time opened the page
            //Check if the user already have file with same name
            if (($conn -> query("SELECT * FROM saved_files WHERE name = '$name' AND userID = $userID")) -> num_rows > 0){
                // file already with same name exists
                $result .= "You have already a file with same name. Please change file name";
                $responceArray["status"] = "failure";
            }else{
                // save file with new name and enter info in database
                $query = "INSERT INTO saved_files (`name`, userID) VALUES ('$name', $userID)";
                //echo $query;
                if ($conn -> query($query) === TRUE){
                    //data got inserted into table. Get the id of newly created row
                    $queryResult = $conn -> query("SELECT * FROM saved_files WHERE name = '$name' LIMIT 1");
                    $row = $queryResult -> fetch_assoc();
                    $id = $row['ID'];
                    if (saveFile($id, $data)){
                        $responceArray["fileID"] = $id;
                        $responceArray["status"] = "success";
                    }else{
                        $responceArray["status"] = "failure";
                    }
                }else{
                    echo $conn->error;
                    $result .= "Error saving file in database";
                    $responceArray["status"] = "failure";
                }
            }
        }else{
            $responceArray["status"] = "failure";
            $result .= "Submitted data voilates the rules";
        }
        if ($result != ""){
            $responceArray["message"] = $result;
        }else{
            if ($responceArray['status'] == "success"){
                $responceArray["message"] = "File is successfully saved";
            }else{
                $responceArray["message"] = "Operation has run into unknown problems";
            }
        }
        //echo calculated result
        echo json_encode($responceArray);
    }

?>