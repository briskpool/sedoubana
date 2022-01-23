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
$duration = $this->session->flashdata('duration');

?>


<section class="py-md-5 py-4 ftco-section ftco-animate">
    <div class="container">
        <div class="row">
            <div class="col-md-12 pills mt-md-5">
                <div class="bd-example bd-example-tabs">
                    <div class="col-md-12 py-2 d-none d-lg-block d-md-block  request-form ftco-animate fadeInUp ftco-animated">
                        <div class="text-center mt-md-3">
                            <h1 class="display-3">Thank You!</h1>
                            <?php if (!empty($price)) { ?>
                                <h3>Successfully charged $<?php print $price; ?>!</h3>
                                <p class="lead"><?=($duration)?$duration:''?></p>
                            <?php } ?>
                            <p class="lead"><strong>Please check your email</strong> for further instructions </p>
                            <hr>
                            <p>
                                Having trouble? <a href="mailto:info@sedouban.com">Contact us</a>
                            </p>
                            <p class="lead">
                                <a class="btn btn-primary btn-sm" href="<?php print site_url(); ?>" role="button">Continue
                                    to
                                    homepage</a>
                            </p>
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
                stroke="#F96D00"/>
    </svg>
</div>


<?php
include 'includes/js.php';
?>


</body>
</html>