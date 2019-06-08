<?php
include 'header.php';
?>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="services/register_process.php" method="post">
                            <div class="form-group">
                                <!-- <label for="reg_nama">Nama Lengkap</label> -->
                                <input type="text" class="form-control form-control-user" id="reg_nama" name="reg_nama" placeholder="Masukan Nama Lengkap">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                <!-- <label for="reg_nip">NIP</label> -->
                                <input type="text" class="form-control form-control-user" id="reg_nip" name="reg_nip" placeholder="Masukan NIP">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                <!-- <label for="reg_email">Email address</label> -->
                                <input type="email" class="form-control form-control-user" id="reg_email" name="reg_email" aria-describedby="emailHelp"
                                    placeholder="Masukan email">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                <!-- <label for="reg_password">Password</label> -->
                                <input type="password" class="form-control form-control-user" id="reg_password" name="reg_password" placeholder="Password">
                                <small id="passwordHelpInline" class="text-muted">Must be 8-20 characters long.</small>
                            </div>
                            <div class="form-group">
                                <!-- <label for="reg_con_password">Confirm Password</label> -->
                                <input type="password" class="form-control form-control-user" id="reg_con_password" name="reg_con_password"
                                    placeholder="Confirm Password">
                                <!-- <small id="passwordHelpInline" class="text-muted">Must be 8-20 characters long.</small> -->
                            </div>
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Submit">
                        </form>


                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="index.php">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include 'footer.php';
?>