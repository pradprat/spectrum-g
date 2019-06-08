<?php
require_once('db_connect.php');
// session_start();

$num_show = 10;
$page = 0;
$start_row = 0;

if (isset($_GET['page'])) {
    // echo $_GET['page'];
    $page = $_GET['page'];
    $start_row = ($page-1)*$num_show;
} else {
    $page = 1;
    $start_row = ($page-1)*$num_show;
    // Fallback behaviour goes here
}



$sql = "SELECT perangkat.PERANGKAT_SN,perangkat.PERANGKAT_NAMA,perangkat.PERANGKAT_MERK,perangkat.PERANGKAT_KONDISI, peminjaman.STATUS
        FROM perangkat
        LEFT JOIN peminjaman ON perangkat.PERANGKAT_ID=peminjaman.PERANGKAT_ID
        LIMIT $start_row,$num_show;";

if ($result = $link->query($sql)) {
    while($row = $result->fetch_assoc()) {
        if ( isset( $_SESSION['user_jenis'] ) ) {
            $user_jenis = $_SESSION['user_jenis'];
            if(!isset($row["STATUS"]) || $row["STATUS"]=="selesai"){
                $row["STATUS"]="tersedia";
            }

            if ($user_jenis == "admin") {// login as admin
                echo 
                "<tr>
                <th scope=\"row\">".$row["PERANGKAT_SN"]."</th>
                <td>".$row["PERANGKAT_NAMA"]."</td>
                <td>".$row["PERANGKAT_MERK"]."</td>
                <td>".$row["PERANGKAT_KONDISI"]."</td>
                <td>".$row["STATUS"]."</td>
                </tr>";
            }else { // login as user
                if($row["STATUS"]=="tersedia"){
                    echo 
                    "<tr>
                    <th scope=\"row\">".$row["PERANGKAT_SN"]."</th>
                    <td>".$row["PERANGKAT_NAMA"]."</td>
                    <td>".$row["PERANGKAT_MERK"]."</td>
                    <td>".$row["PERANGKAT_KONDISI"]."</td>
                    </tr>";
                }
            }
        }else{
            echo "no session";
        }
    }
}else{
    echo mysqli_error($link);
}

?>