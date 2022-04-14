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
            <div class="row px-2 justify-content-center">
                <h5 class="mt-2">Thanks, you have successfully reserved your seat(s).</h5>
                <?php
                if ($data->num_rows() > 0) {
                    foreach ($data->result() as $row) {
                        $price = $row->no_seats * $row->price;
                        $carImage = ($row->car_front) ? base_url() . $row->car_front : base_url() . 'assets/images/car_front.jpg';
                        $dep_city =  (getCity($row->dep_city)) ? getCity($row->dep_city)->name : '';
                        $dest_city =  (getCity($row->dest_city)) ? getCity($row->dest_city)->name : '';
                ?>
                        <div class="col-md-12 mb-3 request-form ftco-animate fadeInUp ftco-animated">
                            <div class="row ">
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pr-0 text-center ">
                                    <img src="<?= $carImage ?>" class="rounded  w-75 float-left" alt="">
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                    <p class="mb-0 text-dark font-weight-bold"><?= $row->make . " " . $row->model ?></p>
                                    <span class="mb-0 text-dark font-small"><?= $row->year ?></span>
                                    <span class="mb-0 text-dark font-small"><?= $row->color ?></span>
                                </div>
                            </div>
                            <hr>
                            <div class="row ">
                                <div class="col-md-2 col-6">
                                    <span class="font-small text-primary">Departure Date</span>
                                    <p class="font-small text-dark"><?= dateToLocal($row->dep_date) ?></p>
                                </div>
                                <div class="col-md-2 col-6">
                                    <span class="font-small text-primary">Departure Time</span>
                                    <p class="font-small text-dark"><?= timeToLocal($row->dep_time) ?></p>
                                </div>
                                <div class="col-md-2 col-6">
                                    <span class="font-small text-primary">Departure City</span>
                                    <p class="font-small text-dark"><?= $dep_city ?></p>
                                </div>
                                <div class="col-md-2 col-6">
                                    <span class=" font-small text-primary">Destination City</span>
                                    <p class="font-small text-dark"><?= $dest_city ?></p>
                                </div>
                                <div class="col-md-2 col-6">
                                    <span class="font-small text-primary">Seats Booked</span>
                                    <p class="font-small text-dark"><?= $row->no_seats ?></p>
                                </div>
                                <div class="col-md-2 col-6">
                                    <span class="font-small text-primary">Unpaid Amount</span>
                                    <p class="font-small text-dark">$<?= $price ?></p>
                                </div>

                            </div>
                            <div class="row mt-md-3">

                                <div class="col-md-4 col-6 ">
                                    <span class="font-small text-primary">Pickup Loaction</span>
                                    <p class="font-small text-dark"><?= $row->pickup ?></p>
                                </div>
                                <div class="col-md-4 col-6 ">
                                    <span class="font-small text-primary">Drop-off Loaction</span>
                                    <p class="font-small text-dark"><?= $row->dropoff ?></p>
                                </div>
                                <div class="col-md-2 col-6">
                                    <span class="font-small text-primary">Your Luggage</span>
                                    <p class="font-small text-dark"><?php
                                                                    $luggage = '';
                                                                    if ($row->backpack == '1') {
                                                                        $luggage .= 'Backpack, ';
                                                                    }
                                                                    if ($row->suitcase == '1') {
                                                                        $luggage .= 'Suitcase, ';
                                                                    }
                                                                    if ($row->duffel == '1') {
                                                                        $luggage .= 'Duffel,';
                                                                    }
                                                                    echo (!empty($luggage)) ? rtrim($luggage, ', ') : 'No Luggage';
                                                                    ?></p>
                                </div>
                                <div class="col-md-2 col-6">
                                    <span class="font-small text-primary">Seats</span>
                                    <p class="font-small text-dark"><?= $row->no_seats ?></p>
                                </div>

                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2  float-right">
                                <a href="<?php echo base_url(); ?>passenger-trips" class=" btn btn-primary w-100">View trips</a>
                            </div>
                        </div>
                <?php
                    }
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
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <?php
    $this->load->view('includes/js.php');
    ?>


</body>

</html>