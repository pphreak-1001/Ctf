<?php
$descriptorspec = array(
   0 => array("pipe", "r"),  // stdin
   1 => array("pipe", "w"),  // stdout
   2 => array("pipe", "w")   // stderr
);

$process = proc_open('cat flag.php', $descriptorspec, $pipes);

if (is_resource($process)) {
    // Read output from stdout pipe
    echo stream_get_contents($pipes[1]);
    fclose($pipes[1]);
    
    // Close process
    proc_close($process);
}
?>
