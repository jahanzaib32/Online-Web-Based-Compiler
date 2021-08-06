<?php
    header('Access-Control-Allow-Origin: *');
    include_once("proc_open_test.php");
    class compiler{
        public $cppCode, $output, $inputs;
        function __construct($cppCode, $inputs){
            $this -> cppCode = $cppCode;
            $this -> inputs = $inputs;
            $this -> compile();
        }
        private function compile(){
            //first save code in a file
            $fileOpened = fopen("code.c", 'w');
            fwrite($fileOpened, $this -> cppCode);
            fclose($fileOpened);

            //compile
             $syntaxError = "";
            exec ("g++ code.c -o code.exe 2>&1", $errorArray);
            foreach ($errorArray as $line){
                $syntaxError .= $line . "\n";
            }
            if ($syntaxError == ""){
                //get output .. If there is no syntax error
                $output = "";

                //interactive proc_open execution
                //inputs separated with commas... "input1, input2" etc
                execProcess($this -> inputs);

                /*exec ("code", $output);
                foreach ($output as $line){
                    $this -> output .= $line . "\n";
                } */   
            }else{
                // There was a syntax error or some other compilation error
                $this -> output = $syntaxError;
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $code = new compiler ($_POST['code'], $_POST['input']);
        //echo $_POST['input'];
        echo $code -> output;
    }else{
        echo "Do a post request";
    }
?>