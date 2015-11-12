<?php
    $txt = $_GET['text'];
    if(strncmp($txt,5,"start")==0){
        $myfile = fopen("places.txt", "w") or die("Unable to open file!");    
    } else {
        $myfile = fopen("places.txt", "a") or die("Unable to open file!");
    }
    fwrite($myfile, $txt);
    fclose($myfile);
?>
