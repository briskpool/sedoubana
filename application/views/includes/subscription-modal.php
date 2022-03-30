<?php
$setting = getSettings();
$email = $this->session->userdata('email');
?>
<div class="modal fade" id="subscriptionModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="subscriptionModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title text-primary text-center" id="exampleModalLongTitle">
                    <?= ucwords($setting->sub_plan) ?>
                </h5>
                <h6 class="card-price text-center">$<?= $setting->sub_price ?><span class="period">/Per <?= ucfirst($setting->sub_interval) ?></span></h6>
                <hr>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Un limited Rides</li>
                    <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Tickets Support</li>
                    <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Rewards</li>
                    <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Deal with all the issues</li>
                </ul>
                <form action="<?php print site_url(); ?>stripe-checkout" method="post" class="frmStripePayment">
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_wvwEOhfkVFE6ujFnFB8C9pno00xmoaVWMc" data-email="<?= $email ?>" data-name="<?= $setting->sub_plan ?>" data-description="$<?= $setting->sub_price ?>/per year" data-panel-label="Pay Now" data-label="Subscribe" data-locale="auto" , data-currency="<?= $setting->sub_currency ?>">
                    </script>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>