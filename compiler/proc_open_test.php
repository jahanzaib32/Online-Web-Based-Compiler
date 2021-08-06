<?php
    function execProcess($inputs){
        
        // descriptor array
        $desc = array(
            0 => array('pipe', 'r'), // 0 is STDIN for process
            1 => array('pipe', 'w'), // 1 is STDOUT for process
            2 => array('file', 'error-output.txt', 'a') // 2 is STDERR for process
        );
        
        // command to invoke markup engine
        $cmd = "code";
        
        // spawn the process
        $p = proc_open($cmd, $desc, $pipes);
        
        $inputExplode = explode(",", $inputs);
        
        for ($i = 0; $i < sizeof($inputExplode); $i++){
            fwrite($pipes[0], $inputExplode[$i]."\n");
        }
        
        echo fread($pipes[1], 500);
        
        
        fclose($pipes[0]);
        fclose($pipes[1]);
        proc_close($p);
    }
?>