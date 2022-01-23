<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'includes/head.php';
    ?>
</head>

<body>

    <?php
    if ($this->session->userdata('validated_driver')) {
        include 'includes/profile-nav.php';
    } else if ($this->session->userData('validated')) {
        include 'includes/passenger-nav.php';
    }

    ?>


    <section class="ftco-section ftco-section-full ftco-animate  pb-4">
        <div class="container">
            <div class="row px-2 justify-content-center">

                <div class="col-md-8  pl-0">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a href="<?php echo base_url(); ?>support">Contact Support <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2">Requests</span></p>
                </div>
                <div class="col-md-8 py-2 d-none d-lg-block d-md-block  request-form ftco-animate fadeInUp ftco-animated">
                    <div class="row ">
                        <div class="col-md-1  col-4">
                            <span class="font-extra-small">ID</span>

                        </div>
                        <div class="col-md-5 col-4">
                            <span class="font-extra-small">Subject</span>

                        </div>
                        <div class="col-md-2  col-4">
                            <span class="font-extra-small">Created</span>

                        </div>
                        <div class="col-md-2  col-4">
                            <span class="font-extra-small">Last Activity</span>

                        </div>
                        <div class="col-md-2  col-4 ">
                            <span class="font-extra-small">Status</span>

                        </div>
                    </div>
                    <?php
                    if ($data->num_rows() > 0) {
                        foreach ($data->result() as $row) {
                    ?>
                            <div class="row pt-2 pb-2 border-top row-hover">
                                <div class="col-md-1   col-4">
                                    <p class=" mb-0 font-extra-small"><?= $row->ticket ?></p>
                                </div>
                                <div class="col-md-5 col-4">
                                    <a href="<?php echo base_url(); ?>requests/thread?id=<?= $row->id ?>&ticket=<?= $row->ticket ?>" class=" mb-0 text-info  font-extra-small">
                                        <?= $row->subject ?>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <p class="mb-0   font-extra-small">
                                        <?= time_elapsed_string($row->created_at) ?>
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <p class="mb-0  font-extra-small">
                                        <?= time_elapsed_string($row->last_activity) ?>
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <?php
                                    if ($row->status == 'completed') { ?>
                                        <span class="badge badge-success">Completed</span>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="badge badge-info">in-progress</span>
                                    <?php
                                    }
                                    ?>


                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="row pt-2 pb-2 border-top row-hover">No contact Yet!</div>
                    <?php
                    }
                    ?>


                </div>
                <!--for mobile screen-->
                <div class="col-md-12 mt-2 py-2 d-block d-lg-none d-md-none request-form ftco-animate fadeInUp ftco-animated">

                    <div class="row pb-2">
                        <div class="col-6 ">
                            <p class="  mb-0 font-extra-small">12345</p>
                        </div>

                        <div class="col-12 pr-0">
                            <a href="<?php echo base_url(); ?>requests/thread" class="mb-0 text-info font-extra-small ">Withdraw
                                payment option are disabled.</a>
                        </div>
                        <div class="col-4">
                            <span class="badge badge-success">Solved</span>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-6 ">
                            <p class="  mb-0 font-extra-small">12345</p>
                        </div>
                        <div class="col-12 pr-0">
                            <a href="<?php echo base_url(); ?>requests/thread" class="mb-0 text-info font-extra-small ">Withdraw
                                payment option are disabled.</a>
                        </div>
                        <div class="col-4">
                            <span class="badge badge-secondary">Not Solved</span>
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