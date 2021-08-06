<?php
    function makeConn(){
        $servername = "localhost";
        $username = "compiler_user";
        $password = "Jviea4-zF+j5?(5";
        $databaseName = "compiler";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $databaseName);
        return $conn;
    }

    $servername = "localhost";
    $db = "compiler";
    $username = "compiler_user";
    $password = "Jviea4-zF+j5?(5";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);
?>

<?php
    foreach (array_merge( glob("*/*.php"), glob("*/*/*.php"), glob("*/*/*/*.php") , glob("*.php")) as $filename) {
        if ($filename != "replacer.php"){
            file_put_contents($filename, str_replace("/var/www/html/test", "/var/www/html/test", file_get_contents($filename)));
        }
    }
?>