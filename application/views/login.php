<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'includes/head.php';
    ?>
</head>

<body>

    <?php
    include 'includes/nav.php';
    ?>


    <section class="ftco-section ftco-section-full ftco-animate pb-md-0 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pills mt-2 mt-md-3">
                    <div class="bd-example bd-example-tabs">
                        <div class="d-flex justify-content-center">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link <?= ($role == 'passenger') ? 'active show' : '' ?>" id="pills-passenger-tab" data-toggle="pill" href="#pills-passenger" role="tab" aria-controls="pills-passenger" aria-expanded="true">Passenger</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link <?= ($role == 'driver') ? 'active show' : '' ?>" id="pills-driver-tab" data-toggle="pill" href="#pills-driver" role="tab" aria-controls="pills-driver" aria-expanded="true">Driver</a>
                                </li>

                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade  px-0 py-0 <?= ($role == 'passenger') ? 'active show' : '' ?>" id="pills-passenger" role="tabpanel" aria-labelledby="pills-passenger-tab">
                                <div class="row block-9 justify-content-center">
                                    <div class="col-md-8 px-2 mb-md-5">
                                        <form action="<?php echo base_url(); ?>login/process" name="login_passenger" method="post" class="ftco-animate request-form">
                                            <h2 class="mb-2">Passenger Login</h2>
                                            <!--                                        <div class="col-md-6 col-12 pl-0">-->
                                            <!--                                            <span class="text-dark font-small" id="p_text">LOGIN WITH</span>-->
                                            <!--                                            <img src="https://sedoubana.com/sedu-front/assets/images/gm-logo.svg"-->
                                            <!--                                                 id="googleSignIn_p" width="50px">-->
                                            <!--                                            <img src="https://sedoubana.com/sedu-front/assets/images/fb-logo.svg"-->
                                            <!--                                                 id="log_p" width="50px">-->
                                            <!--                                        </div>-->
                                            <p class="text-danger">
                                                <?php
                                                if (!empty($msg)) {
                                                    echo $msg;
                                                }
                                                ?>

                                            </p>
                                            <?php
                                            if (!empty($resend_email)) {
                                            ?>
                                                <a href="<?= base_url() ?>/resend-email?id=<?= $resend_email ?>" class="btn btn-sm btn-link">Click to resend Email</a>
                                            <?php
                                            }
                                            ?>
                                            <div class="form-group ">
                                                <label for="" class="label">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="label">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                            <input type="hidden" name="user" value="passenger">
                                            <p>
                                                <a href="<?php echo base_url(); ?>login/reset-password?user=passenger" style="font-size: 14px;">forget password?</a>
                                            </p>
                                            <div class="row px-1">
                                                <div class="form-group col-md-3 col-12 mt-3">
                                                    <input class="nav-link btn btn-primary" value="Login" name="send" type="submit">

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Driver Login form-->
                            <div class="tab-pane fade px-0 py-0 <?= ($role == 'driver') ? 'active show' : '' ?>" id="pills-driver" role="tabpanel" aria-labelledby="pills-driver-tab">
                                <div class="row block-9 justify-content-center">
                                    <div class="col-md-8 px-2 mb-md-5">
                                        <form action="<?php echo base_url(); ?>login/process" name="login_driver" method="post" class="ftco-animate request-form">
                                            <h2 class="mb-2">Driver Login</h2>

                                            <!--                                        <div class="col-md-6 col-12 pl-0">-->
                                            <!--                                            <span class="text-dark font-small" id="d_text">LOGIN WITH</span>-->
                                            <!--                                            <img src="https://sedoubana.com/sedu-front/assets/images/gm-logo.svg"-->
                                            <!--                                                 id="googleSignIn_d" width="50px">-->
                                            <!--                                            <img src="https://sedoubana.com/sedu-front/assets/images/fb-logo.svg"-->
                                            <!--                                                 id="log_d" width="50px">-->
                                            <!---->
                                            <!--                                        </div>-->


                                            <p class="text-danger">
                                                <?php
                                                if (!empty($msg)) {
                                                    echo $msg;
                                                }
                                                ?>

                                            </p>
                                            <?php
                                            if (!empty($resend_email)) {
                                            ?>
                                                <a href="<?= base_url() ?>/resend-email?id=<?= $resend_email ?>" class="btn btn-sm btn-link">Click to resend Email</a>
                                            <?php
                                            }
                                            ?>
                                            <div class="form-group ">
                                                <label for="" class="label">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email">
                                            </div>


                                            <div class="form-group">
                                                <label for="" class="label">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                            <input type="hidden" name="user" value="driver">
                                            <p>
                                                <a href="<?php echo base_url(); ?>login/reset-password?user=driver" style="font-size: 14px;">forget password?</a>
                                            </p>
                                            <div class="row px-1">

                                                <div class="form-group col-md-3 col-12 mt-3">
                                                    <input class="nav-link btn btn-primary" value="Login" name="send" type="submit">

                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <?php
        include 'includes/footer.php';
        ?>
    </footer>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>


    <?php
    include 'includes/js.php';
    ?>


</body>

</html>