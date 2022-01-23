<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $this->load->view('includes/head.php');
    ?>
</head>

<body>

    <?php
    $this->load->view('includes/nav.php');

    ?>
    <section class="ftco-section ftco-section-full ftco-animate pb-4">
        <div class="container">
            <div class="row px-2 ">
                <p class="breadcrumbs mb-0 "><span><a href="<?php echo base_url(); ?>rides">Home<i class="ion-ios-arrow-forward ml-2 mr-2"></i></a></span> <span class="mr-2">Search Results</span>
                </p>
                <?php
                if ($data->num_rows() > 0) {
                    foreach ($data->result() as $row) {
                        $booked = getSeatsBooked($row->id);
                        // if ($booked->no_seats < $row->seats) {
                        $rideData = getRideAverageRating($row->id, $row->driver_id);

                        $dep_city =  (getCity($row->dep_city)) ? getCity($row->dep_city)->name : '';
                        $dest_city =  (getCity($row->dest_city)) ? getCity($row->dest_city)->name : '';
                ?>
                        <div class="col-12 py-2 px-3 search-bg mb-3 d-none d-md-block d-lg-block request-form ftco-animate fadeInUp ftco-animated">
                            <div class="row ">
                                <div class="col-xl-1 col-lg-2 col-md-2 col-sm-2 pr-0 text-center ">
                                    <p class="text-info mb-0  "><?= timeToLocal($row->dep_time) ?></p>
                                    <p class="font-extra-small text-dark"><b><?= dateToLocal($row->dep_date) ?></b></p>
                                </div>
                                <div class="col-xl-4 col-lg-3 col-md-3 col-sm-3 text-center arrow">
                                    <p class="mb-0 text-dark font-weight-bold"><?= $dep_city ?></p>
                                    <p class="mb-0 text-dark font-small"><?= $row->pickup ?></p>
                                </div>

                                <div class="col-xl-4 col-lg-3 col-md-3 col-sm-3 text-center">
                                    <p class="mb-0 text-dark font-weight-bold"><?= $dest_city ?></p>
                                    <p class="mb-0 text-dark font-small"><?= $row->dropoff ?></p>
                                </div>
                                <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2">
                                    <h5 class="text-info text-center mb-0">$<?= $row->price ?></h5>
                                    <p class="mb-2 text-center font-small">
                                        <?php


                                        for ($i = 1; $i <= $row->seats; $i++) {
                                            if ($booked->no_seats >= $i) {
                                        ?>
                                                <i class="fas fa-user text-dark"></i>
                                            <?php
                                            } else {
                                            ?>
                                                <i class="far fa-user"></i>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </p>
                                </div>
                                <div class="col-xl-1 col-lg-2 col-md-2 col-sm-2 px-2 text-center">

                                    <p class="font-extra-small mb-0" style="font-family: arial;">
                                        <i class="fas fa-star text-warning"></i> <b><?= $rideData['rating'] ?></b>
                                        (<?= $rideData['rides'] ?>)
                                    </p>
                                    <a href="<?php echo base_url(); ?>search-results/confirm-seats?id=<?= $row->id ?>" class=" text btn btn-primary btn-sm py-0">Select</a>
                                </div>
                            </div>

                        </div>

                    <?php
                        // }
                    }
                } else {
                    ?>
                    <div class="col-md-12 text-center request-form ftco-animate fadeInUp ftco-animated align-item-center">
                        <img class="w-25" src="<?php base_url() ?>assets/images/racing.svg" alt="">
                        <h5 class="mt-0 ">No ride posted yet!</h5>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        </div>
        </div>
    </section>


    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <?php
        $this->load->view('includes/footer.php');
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
    $this->load->view('includes/js.php');
    ?>


</body>

</html>