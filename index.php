<?php
require_once('services/db_connect.php');
// require_once('functions.php');
session_start();

if ( isset( $_SESSION['user_nip'] ) ) {
    $user_nip = $_SESSION['user_nip'];
    if ($user = in_db($user_nip,$link)) {
        echo($user[0]);
    }else {
        echo("false");
    }
}
?>

<?php
    include 'header.php';
?>

<?php
if ( empty( $user ) ) {
    session_destroy();
    include('login.php');

} else {
    echo($user[0]);
    header('Location:home.php'); exit;

    // include('home.php');
}
?>


<?php
    include 'script.php';
    include 'footer.php';
?>