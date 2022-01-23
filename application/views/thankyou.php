<section class="showcase">
    <div class="container">
        <div class="text-center">
            <h1 class="display-3">Thank You!</h1>
            <?php if(!empty($price)) { ?>
                <h3>Successfully charged $<?php print $price;?>!</h3>
            <?php } ?>
            <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
            <hr>
            <p>
                Having trouble? <a href="mailto:info@techarise.com">Contact us</a>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-sm" href="<?php print site_url();?>" role="button">Continue to homepage</a>
            </p>
        </div>
    </div>
</section>