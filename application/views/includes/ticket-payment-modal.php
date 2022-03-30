<?php
$setting = getSettings();
$email = $this->session->userdata('email');
?>
<div class="modal fade" id="ticketModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ticketModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title text-primary" id="ticketModalLongTitle">
                    <?= ucwords($setting->ticket_title) ?>
                </h5>
                <p class="card-price">
                    Please pay ticket service charges.
                </p>

            </div>
            <div class="modal-footer">
                <form action="<?php print site_url(); ?>stripe-checkout" method="post" class="frmStripePayment">
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_wvwEOhfkVFE6ujFnFB8C9pno00xmoaVWMc" data-email="<?= $email ?>" data-name="<?= $setting->ticket_title ?>" data-description="$<?= $setting->ticket_price ?>/per ticket" data-panel-label="Pay Now" data-label="Pay $<?= $setting->ticket_price ?>" data-locale="auto" , data-currency="<?= $setting->ticket_currency ?>">
                    </script>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>