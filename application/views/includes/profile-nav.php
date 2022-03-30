<?php
$uid = $this->session->userdata('uid');
$subscription_status = subscriptionStatus($uid);
$driver_status = getDriverStatus($uid, 'driver');
?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar  ftco-navbar-light" id="ftco-navbar">
    <div class="container">

        <a class="navbar-brand col-md-2 col-8 mr-0" href="<?php echo base_url(); ?>"><img class="w-100" src="<?php echo base_url(); ?>assets/images/logo.png" alt=""></a>
        <button class="col-4 navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse col-md-10 navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php if ($this->uri->segment(1) == 'profile') {
                                        echo 'active';
                                    } ?>"><a href="<?php echo base_url(); ?>profile" class="nav-link">My Account</a></li>
                <li class="nav-item <?php if ($this->uri->segment(1) == 'rides' || $this->uri->segment(1) == 'bookings') {
                                        echo 'active';
                                    } ?>"><a href="<?php echo base_url(); ?>rides" class="nav-link">My Rides</a></li>

                <li class="nav-item <?php if ($this->uri->segment(1) == 'alerts') {
                                        echo 'active';
                                    } ?>">
                    <a href="<?php echo base_url(); ?>alerts" class="nav-link">Alerts</a>
                </li>
                <li class="nav-item <?php if ($this->uri->segment(1) == 'support') {
                                        echo 'active';
                                    } ?>"><a href="<?php echo base_url(); ?>support" class="nav-link">Contact Support</a></li>
                <?php
                if ($driver_status == '1') {
                    // if ($subscription_status) {
                ?>
                    <li class="nav-item "><a href="<?php echo base_url(); ?>postride" class="nav-link btn btn-primary ">Post
                            Ride</a></li>

                <?php
                } else {
                ?>
                    <li class="nav-item ">
                        <a class="nav-link btn btn-primary " data-container="body" data-toggle="popover" data-placement="bottom" data-content="You cant post a ride at the moment, Please wait for account approval.">
                            Post Ride
                        </a>
                    </li>
                <?php
                }
                ?>

                <li class="nav-item <?php if ($this->uri->segment(1) == 'Auth') {
                                        echo 'active';
                                    } ?>"><a href="<?php echo base_url(); ?>profile/logout" class="nav-link">Logout</a></li>


            </ul>
        </div>

    </div>
</nav>