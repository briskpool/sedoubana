<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'includes/head.php';
    ?>
    <script src="https://js.stripe.com/v3/"></script>

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
                                <div class="sr-container">
                                    <section class="container basic-photo">
                                        <div>
                                            <h1>Basic subscription</h1>
                                            <h4>1 photo per week</h4>
                                            <div class="pasha-image">
                                                <img
                                                        src="https://picsum.photos/280/320?random=4"
                                                        width="140"
                                                        height="160"
                                                />
                                            </div>
                                        </div>
                                        <button id="basic-plan-btn">$5.00 per week</button>
                                    </section>
                                    <section class="container pro-photo">
                                        <div>
                                            <h1>Pro subscription</h1>
                                            <h4>3 photos per week</h4>
                                            <div class="pasha-image-stack">
                                                <img
                                                        src="https://picsum.photos/280/320?random=1"
                                                        width="105"
                                                        height="120"
                                                        alt="Sample Pasha image 1"
                                                />
                                                <img
                                                        src="https://picsum.photos/280/320?random=2"
                                                        width="105"
                                                        height="120"
                                                        alt="Sample Pasha image 2"
                                                />
                                                <img
                                                        src="https://picsum.photos/280/320?random=3"
                                                        width="105"
                                                        height="120"
                                                        alt="Sample Pasha image 3"
                                                />
                                            </div>
                                        </div>
                                        <button id="pro-plan-btn">$14.00 per week</button>
                                    </section>
                                </div>
                                <div id="error-message"></div>
                            </div>
                        </div>
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
<script>
    // Create a Checkout Session with the selected plan ID
    var createCheckoutSession = function (planId) {
        return fetch("<?=base_url()?>subscription/checkout", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                planId: planId
            })
        }).then(function (result) {
            return result.json();
        });
    };

    // Handle any errors returned from Checkout
    var handleResult = function (result) {
        if (result.error) {
            var displayError = document.getElementById("error-message");
            displayError.textContent = result.error.message;
        }
    };



    var publicKey = 'pk_test_AAZNMD6GygdByFkhRh8TNYwh';
    var basicPlanId = false;
    var proPlanId = false;
    var stripe = Stripe(publicKey);
    // Setup event handler to create a Checkout Session when button is clicked
    document
        .getElementById("basic-plan-btn")
        .addEventListener("click", function (evt) {
            createCheckoutSession(basicPlanId).then(function (data) {
                // Call Stripe.js method to redirect to the new Checkout page
                stripe
                    .redirectToCheckout({
                        sessionId: data.sessionId
                    })
                    .then(handleResult);
            });
        });

    // Setup event handler to create a Checkout Session when button is clicked
    document
        .getElementById("pro-plan-btn")
        .addEventListener("click", function (evt) {
            createCheckoutSession(proPlanId).then(function (data) {
                // Call Stripe.js method to redirect to the new Checkout page
                stripe
                    .redirectToCheckout({
                        sessionId: data.sessionId
                    })
                    .then(handleResult);
            });
        });

</script>

</body>
</html>