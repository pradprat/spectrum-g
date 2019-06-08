<?php
    session_start();
    echo("belom masuk");

    
    session_destroy();
    echo("masuk");
    
    header('Location:/radios.v0.1/'); exit;
?>
