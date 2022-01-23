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
	                <p class="breadcrumbs mb-0 "><span><a href="<?php echo base_url(); ?>rides">Home<i class="ion-ios-arrow-forward ml-2 mr-2"></i></a></span> <span class="mr-2">Confirm Seat</span> </p>
	                <!--For Desktop-->
	                <?php
                    if ($data->num_rows() > 0) {
                        foreach ($data->result() as $row) {
                            $carImage = ($row->car_front) ? base_url() . $row->car_front : base_url() . 'assets/images/car_front.jpg';
                            $booked = getSeatsBooked($this->input->get('id'));
                            $totalSeats = $row->seats - $booked->no_seats;
                            if ($totalSeats > 0) {
                    ?>
	                                <div class="col-12 py-2 px-3 search-bg mb-3 d-none d-md-block d-lg-block request-form ftco-animate fadeInUp ftco-animated">
                                        <form action="<?php echo base_url(); ?>search-results/confirm-detail" method="POST" class=" ftco-animate">
                                            <?php echo form_hidden('TS', time()); ?>
                                            <input type="hidden" name="ride_id" value="<?= $this->input->get('id') ?>">
	                                    <div class="row ">
	                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pr-0 text-center ">
	                                            <img src="<?= $carImage ?>" class="rounded  w-50 float-left" alt="">
	                                        </div>
	                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
	                                            <p class="mb-0 text-dark font-weight-bold"><?= $row->make . " " . $row->model ?></p>
	                                            <span class="mb-0 text-dark font-small"><?= $row->year ?></span>
	                                            <span class="mb-0 text-dark font-small"><?= $row->color ?></span>
	                                        </div>
	                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
	                                            <label class="font-small">Seats</label>
	                                            <select class="form-control" name="seats" style="height: 30px !important;">
	                                                <?php
                                                    for ($i = 1; $i <= $totalSeats; $i++) {
                                                    ?>
	                                                    <option value="<?= $i ?>"><?= $i ?></option>
	                                                <?php
                                                    }
                                                    ?>
	                                            </select>
	                                        </div>
	                                        <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4">
	                                            <p class="font-small mb-0">Confirm Your Luggage</p>
	                                            <div class="form-check pl-0 pt-2">
	                                                <input class="form-check-input " type="checkbox" name="backpack" id="defaultCheck2">
	                                                <label class="form-check-label mr-2 lable-cursor" for="defaultCheck2">
	                                                    <span id="label-defaultCheck2">
	                                                        <!-- This span is needed to create the "checkbox" element -->
	                                                    </span>Backpack
	                                                </label>

	                                                <input class="" type="checkbox" name="duffel" id="check">
	                                                <label class="form-check-label mr-2 lable-cursor" for="check">
	                                                    <span id="label-check">
	                                                        <!-- This span is needed to create the "checkbox" element -->
	                                                    </span>Duffel
	                                                </label>
	                                                <input class="" type="checkbox" name="suitcase" id="defaultCheck1">
	                                                <label class="form-check-label lable-cursor" for="defaultCheck1">
	                                                    <span id="label-defaultCheck1">
	                                                        <!-- This span is needed to create the "checkbox" element -->
	                                                    </span>Suitcase
	                                                </label>
	                                            </div>
	                                        </div>
	                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2  text-center">
	                                            <div class="form-group">
	                                                <input type="submit" value="Continue" class="w-100 mt-3 btn btn-primary">
	                                            </div>
	                                        </div>
	                                    </div>

                                    </form>
	                                </div>

	                            <form action="<?php echo base_url(); ?>search-results/confirm-detail" method="POST" class=" ftco-animate">
	                                <input type="hidden" name="ride_id" value="<?= $this->input->get('id') ?>">
	                                <!--For mobile-->
	                                <div class="col-md-12 py-2 px-2 d-block d-sm-none search-bg mb-3 request-form ftco-animate fadeInUp ftco-animated">
	                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 pr-0 text-center ">
	                                        <img src="<?= base_url() . $row->car_front ?>" class="rounded image-preview w-100 float-left" alt="">
	                                    </div>
	                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">
	                                        <p class="mb-0 text-dark font-weight-bold"><?= $row->make . " " . $row->model ?></p>
	                                        <span class="mb-0 text-dark font-small"><?= $row->year ?></span>
	                                        <span class="mb-0 text-dark font-small"><?= $row->color ?></span>
	                                    </div>
	                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
	                                        <label class="font-small">Seats</label>
	                                        <select class="form-control" style="height: 30px !important;">
	                                            <?php
                                                for ($i = 1; $i <= $row->seats; $i++) {
                                                ?>
	                                                <option value="<?= $i ?>"><?= $i ?></option>
	                                            <?php
                                                }
                                                ?>
	                                        </select>
	                                    </div>
	                                    <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4">
	                                        <p class="font-small mb-0">Confirm Your Luggage</p>
	                                        <div class="form-check pl-0 pt-2">
	                                            <input class="form-check-input " type="checkbox" value="" id="defaultCheck2">
	                                            <label class="form-check-label mr-2 lable-cursor disabled" for="defaultCheck2">
	                                                <span>
	                                                    <!-- This span is needed to create the "checkbox" element -->
	                                                </span>Backpack
	                                            </label>

	                                            <input class="" type="checkbox" value="" id="check">
	                                            <label class="form-check-label mr-2 lable-cursor" for="check">
	                                                <span>
	                                                    <!-- This span is needed to create the "checkbox" element -->
	                                                </span>Duffel
	                                            </label>
	                                            <input class="" type="checkbox" value="" id="defaultCheck1">
	                                            <label class="form-check-label lable-cursor" for="defaultCheck1">
	                                                <span>
	                                                    <!-- This span is needed to create the "checkbox" element -->
	                                                </span>Suitcase
	                                            </label>
	                                        </div>
	                                    </div>
	                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2  text-center">
	                                        <div class="form-group">
	                                            <input type="submit" value="Continue" class="w-100 mt-3 btn btn-primary">
	                                        </div>
	                                    </div>
	                                </div>
	                            </form>
	                        <?php
                            } else {
                            ?>
	                            <div class="col-md-12 text-center request-form ftco-animate fadeInUp ftco-animated align-item-center">
	                                <img class="w-25" src="<?php base_url() ?>assets/images/racing.svg" alt="">
	                                <h5 class="mt-0 ">No Seat available!</h5>
	                            </div>
	                    <?php
                            }
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
	    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
	            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
	            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
	        </svg></div>


	    <?php
        $this->load->view('includes/js.php');
        ?>


	</body>

	</html>