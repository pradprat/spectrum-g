<?php
// Include config file
require_once("db_connect.php");
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $nip = $email = "";
$username_err = $password_err = $confirm_password_err = $nip_err = $email_err = "";
 
// Processing form data when form is submitted
if(! empty( $_POST ) ){
    echo("masuk post");

    extract($_POST); 
    // Validate username
    if(empty(trim($_POST["reg_nama"]))){
        echo("nama err");

        $username_err = "Mohon mengisi form nama lengkap";
    }else{
        $username = trim($_POST["reg_nama"]);
    }

    // Validate nip
    if(empty(trim($_POST["reg_nip"]))){
        echo("nip err");

        $nip_err = "Mohon mengisi form nama lengkap";
    }else{
        $nip = trim($_POST["reg_nip"]);
    }

    // Validate email
    if(empty(trim($_POST["reg_email"]))){
        echo("email err");

        $email_err = "Mohon mengisi form nama lengkap";
    }else{
        $email = trim($_POST["reg_email"]);
    }
    
    
    
    // Validate password
    if(empty(trim($_POST["reg_password"]))){
        echo("pass err");

        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["reg_password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["reg_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["reg_con_password"]))){
        echo("pass 2 err");

        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["reg_con_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    echo("selesai semua");
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)&& empty($nip_err)&& empty($email_err)){
        echo "dah masuk cek input";
        $sql = "INSERT INTO user (USER_NAMA , USER_NIP, USER_PASSWORD, USER_EMAIL) VALUES (?, ?, ?, ?)";
        if($stmt=$link->prepare($sql)){
            echo "udah prepare";
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss",$username,$nip,$password,$email);

            if($stmt->execute()){
                // Redirect to login page
                header('Location:/radios.v0.1/'); exit;
                echo "works";

            } else{
                echo "Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }else{
        echo("ada yang eror");

    }
    
    // Close connection
    mysqli_close($link);
}
?>
