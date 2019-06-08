<?php
require_once('services/db_connect.php');

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
?>


<nav aria-label='Page navigation example'>
    <ul class='pagination justify-content-end'>
        <?php
        $prev = $page-1;
        if ($page==1) {
            echo "<li class='page-item disabled'><a class='page-link' href='#'>Previous</a></li>";
        }else{
            echo "<li class='page-item'><a class='page-link' href='?page=$prev'>Previous</a></li>";
        }
        ?>

<?php

$sql = "SELECT COUNT(*) 
        FROM perangkat
        WHERE PERANGKAT_ID NOT IN (
            SELECT PERANGKAT_ID
            FROM peminjaman
            WHERE STATUS='dipinjam' AND STATUS='konfirmasi'
        )";

$row_total = 0;

if ($result = $link->query($sql)) {
    $row = $result->fetch_assoc();
    foreach ($row as $key => $value) {
        // echo($value);
        $row_total=$value;
    }
    // echo('<br>');
}

$total_page = ceil($row_total/$num_show);

// echo($total_page);

for ($i=1; $i <= $total_page; $i++) {
    if ($page == $i) {
        echo "<li class='page-item active'><a class='page-link' href='?page=$i'>$i</a></li>";
    }else{
        echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";

    }
}

        
?>
        

        <?php
        $next = $page+1;
        if ($page==$total_page) {
            echo "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
        }else{
            echo "<li class='page-item'><a class='page-link' href='?page=$next'>Next</a></li>";
            
        }
        ?>
    </ul>
</nav>
