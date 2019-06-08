<?php
require_once('db_connect.php');
session_start();

if(! empty( $_POST ) ){
    extract($_POST); 
    $nip=$password='';
    $nip_err=$password_err='';

    // Validate nip
    if(empty(trim($_POST["log_nip"]))){
        $nip_err = "Mohon mengisi form nama lengkap";
    }else{
        $nip = trim($_POST["log_nip"]);
    }

    // Validate email
    if(empty(trim($_POST["log_password"]))){
        $password_err = "Mohon mengisi form nama lengkap";
    }else{
        $password = trim($_POST["log_password"]);
    }
    
    if(empty($nip_err) && empty($password_err)){
        $sql = "SELECT USER_NIP,USER_NAMA
            FROM user 
            WHERE USER_NIP = $nip AND  USER_PASSWORD = '$password'";

        if ($result = $link->query($sql)) {
            $row = $result->fetch_row();
        }
        // echo(count($row));
        
        // echo($row['USER_NIP']);
        if ( count($row)>0 ) {
            $_SESSION['user_nip'] = $row[0];
            $_SESSION['user_nama'] = $row[1];
            if($row[0]=='11111'){
                $_SESSION['user_jenis'] = 'admin';
            }else{
                $_SESSION['user_jenis'] = 'user';
            }
            // echo($_SESSION['user_nip']);
            header('Location:/radios.v0.1/'); exit;
        }else{
            //error code
        }
    };
}
mysqli_close($link);


?>