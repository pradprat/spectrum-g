<?php
include 'header.php';
session_start();
?>


<div id="wrapper">

    <?php
    include 'sidebar.php';
    ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php
            include 'topbar.php';
            ?>

            <div class="container-fluid">
                <div class="col-lg-12">

                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
                    </div>
                    <div class="card-body">
                        <!-- table -->
                        <?php
                        include('content_data_perangkat.php');
                        ?>
                        <!-- end of table -->

                        <!-- pagination -->
                        <?php
                        include('home_pagination.php');
                        ?>
                        <!-- End pagination -->

                    </div>
                </div>
                </div>
            </div>

        </div>
        <!-- End of Main Content -->
        
        <?php
        include 'footer.php';
        ?>

    </div>
    <!-- End of Content Wrapper -->

</div>


<?php
include 'script.php';
?>