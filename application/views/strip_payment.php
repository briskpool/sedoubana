
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
$setting = getSettings();
?>


<section class="py-md-5 py-4 ftco-section ftco-animate">
    <div class="container">
        <div class="row px-2">
            <div class="col-md-12 pills m-5">
                <div class="bd-example bd-example-tabs">
                    <div class="col-md-12 px-2 ">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h5 class="card-title text-primary text-uppercase text-center"><?=$setting->sub_plan?></h5>
                                <h6 class="card-price text-center">$<?=$setting->sub_price?><span class="period">/Per <?= ucfirst($setting->sub_interval)?></span></h6>
                                <hr>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Un limited Rides</li>
                                    <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Tickets Support</li>
                                    <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Rewards</li>
                                    <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Deal with all the issues</li>
                                </ul>
                                <form action="<?php print site_url();?>stripe-checkout" method="post" class="frmStripePayment">
                                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="pk_test_wvwEOhfkVFE6ujFnFB8C9pno00xmoaVWMc"
                                            data-name="<?=$setting->sub_plan?>"
                                            data-description="$<?=$setting->sub_price?>/per year"
                                            data-panel-label="Pay Now"
                                            data-label="Subscribe"
                                            data-locale="auto",
                                            data-currency="<?=$setting->sub_currency?>">
                                    </script>
                                </form>
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