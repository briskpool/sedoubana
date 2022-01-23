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

<!-- END nav -->

<div class="hero-wrap" style="background-image: url('<?php echo base_url(); ?>assets/images/home-bg.jpg');"
     data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center">
            <div class=" col-md-6 col-12 ftco-animate d-flex align-items-end">
                <div class="text">
                    <h1 class="col-12 ml-0">NEED A RIDE?</h1>
                    <p style="font-size: 18px;" class="col-12">YOU'VE COME TO THE RIGHT PLACE.
                        <br>
                        <a href="<?= base_url()?>login" class="btn btn-primary link mt-3">
                            POST A RIDE
                        </a>
                    </p>

                </div>
            </div>
            <div class="col-lg-2 col"></div>
            <div class="col-lg-4 col-md-6 mt-0 mt-md-5">
                <form action="<?php echo base_url(); ?>search-results" method="get" class="request-form ftco-animate">
                    <h2>Find A Ride</h2>
                    <div class="form-group">
                        <label class="label">Departure City</label>
                        <select class=" fstdropdown-select form-control" name="pickup">
                            <option value="">Select pickup location</option>
                            <?php
                            if ($cites->num_rows() > 0) {
                                foreach ($cites->result() as $row) {
                                    ?>
                                    <option value="<?=$row->id?>"><?=$row->name?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label">Destination City</label>
                        <select class=" fstdropdown-select form-control" name="drop">
                            <option value="">Select drop off location</option>
                            <?php
                            if ($cites->num_rows() > 0) {
                                foreach ($cites->result() as $row) {
                                    ?>
                                    <option value="<?=$row->id?>"><?=$row->name?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <!--                    <div class="form-group">-->
                    <!--                        <label class="label">Departure City</label>-->
                    <!--                        <input type="text" class="form-control" name="pickup" id="pickup" placeholder="Departure City" required>-->
                    <!--                    </div>-->
                    <!--                    <div class="form-group">-->
                    <!--                        <label class="label">Destination City</label>-->
                    <!--                        <input type="text" class="form-control" name="drop" id="dropoff" placeholder="Destination City" required>-->
                    <!--                    </div>-->
                    <div class="form-group">
                        <div class="form-group">
                            <label class="label">Departure Date</label>
                            <input type="text" name="date-range" class="form-control flatpickr-range "
                                   placeholder="Date" required>
                        </div>

                    </div>

                    <div class="form-group">
                        <input type="submit" value="Find" class="btn btn-primary py-3 px-4">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section services-section ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <!-- <span class="subheading">Our Services</span> -->
                <h2 class="mb-2" id="services">Our Services</h2>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon"><span class="fas fa-piggy-bank"></span></div>
                            <h3 class="heading mb-0 pl-3">FIXED RATES</h3>
                        </div>
                        <p>We have fixed booking rates for our passengers, which is $4.00 per seat. Whether you are a
                            passenger or a driver of Sedoubana, our annual registration fee is always fixed rates.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon"><span class="fas fa-lock"></span></div>
                            <h3 class="heading mb-0 pl-3">RELIABLE TRANSFERS</h3>
                        </div>
                        <p>All of our transfers or transactions are reliable and very safe, whether they are made
                            through Credit Cards (MasterCard, Visa or American Express), Debit Cards or PayPal.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon"><span class="fas fa-ticket-alt"></span></div>
                            <h3 class="heading mb-0 pl-3">NO BOOKING FEES</h3>
                        </div>
                        <p>The fee to book a seat no matter how long is the distance is only $4.00. However, Sedoubana
                            often has promotions of NO BOOKING FEES for a short period of few days only.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon"><span class="fas fa-heart"></span></div>
                            <h3 class="heading mb-0 pl-3">FREE CANCELLATION</h3>
                        </div>
                        <p>We recommend that passengers and drivers notify Sedoubana at least 12 hours in advance when
                            they decide to cancel their trips so we can connect passengers to other drivers and drivers
                            to other passengers.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon"><span class="fas fa-magic"></span></div>
                            <h3 class="heading mb-0 pl-3">BOOKING FLEXIBILITY</h3>
                        </div>
                        <p>At Sedoubana, we use the booking Flexibility (booking credit) system. If you book and pay a
                            seat for $4.00, it means you have a $4.00 booking credit with us. When you travel with a
                            driver up to your destination.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon"><span class="fas fa-tasks"></span></div>
                            <h3 class="heading mb-0 pl-3">BENEFITS FOR PARTNERS</h3>
                        </div>
                        <p>If you are new passenger and member of Sedoubana and you are also registered with our
                            partners like CAA, this will give you the benefits of having your free annual registration
                            fee for your first year.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon"><span class="fas fa-phone"></span></div>
                            <h3 class="heading mb-0 pl-3">24H CUSTOMER SERVICE</h3>
                        </div>
                        <p>Even though our office hours are from 9 AM to 6 PM Monday to Friday, our customer service is
                            available 24 hours to assist our drivers who need help.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon"><span class="fas fa-trophy"></span></div>
                            <h3 class="heading mb-0 pl-3">AWARD WINNING SERVICE</h3>
                        </div>
                        <p>The winner of our Award Winning Service will always be the driver who will distinguish
                            himself by the excellence of his services</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon"><span class="fas fa-thumbs-up"></span></div>
                            <h3 class="heading mb-0 pl-3">QUALITY VEHICLES</h3>
                        </div>
                        <p>We require that drivers who are members of Sedoubana have quality vehicles that meet the
                            standards of vehicles in circulation in their Provinces or States.</p>
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
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#cc2766"/>
    </svg>
</div>


<?php
include 'includes/js.php';
?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#pickup").autocomplete({
            source: "<?php echo site_url('autocomplete');?>"
        });
    });
    $(document).ready(function () {
        $("#dropoff").autocomplete({
            source: "<?php echo site_url('autocomplete');?>"
        });
    });
</script>
</body>
</html>