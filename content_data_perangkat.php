
<div class="table-responsive">
    <table class="table">
        <thead>
        <?php
            if ( isset( $_SESSION['user_jenis'] ) ) {
                $user_jenis = $_SESSION['user_jenis'];
                if ($user_jenis == "admin") {// login as admin
                    echo "<tr>
                    <th scope='col'>Serial Number</th>
                    <th scope='col'>Nama Perangkat</th>
                    <th scope='col'>Merek</th>
                    <th scope='col'>Kondisi</th>
                    <th scope='col'>Status</th>
                    </tr>";
                }else { // login as user
                    echo "<tr>
                    <th scope='col'>Serial Number</th>
                    <th scope='col'>Nama Perangkat</th>
                    <th scope='col'>Merek</th>
                    <th scope='col'>Kondisi</th>
                    </tr>";
                }
            }else{
                // header('Location:/'); exit;
            }
        ?>
        </thead>
        <tbody>
            <?php
            include('services/get_data_perangkat.php');
            ?>
        </tbody>
    </table>
</div>