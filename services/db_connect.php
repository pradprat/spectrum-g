<?php

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'testlogin');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// $sql = "SELECT * FROM user";
// $result = $link->query($sql);

// if ($result->num_rows > 0) {
//     output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "nama: " . $row["USER_NAMA"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }


function in_db($user,$link) {
    $sql = "SELECT *
            FROM user 
            WHERE USER_NIP = '$user'";

    if ($result = $link->query($sql)) {
        $row = $result->fetch_row();
        return $row;
    }else{
        false;
    }
    
}

?>