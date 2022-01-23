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

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('https://www.doornextfarms.com/wp-content/uploads/2018/03/FAQ-background.jpg'); background-position: 50% 30%; ">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2">FAQ</span> </p>
                    <h1 class="mb-3 bread">FAQ</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 order-md-last ftco-animate">
                    <!-- <h2 class="mb-3">How does it work?</h2> -->
                    <div class="about-author d-flex p-4 bg-light">

                        <div class="desc">
                            <h3>Q : What is Sedoubana?</h3>
                            <p>A : Sedoubana is a ridesharing platform that puts drivers and passengers in contact to share the road and the travel costs for medium- and long-distance car trips. Kangaride can be used for travel all over Canada and the USA as a fun, inexpensive and sustainable way to travel!</p>
                        </div>

                    </div>
                    <div class="about-author d-flex p-4 bg-light">

                        <div class="desc">
                            <h3>Q : How can i use Sedoubana?
                            </h3>
                            <p>
                                A: As a driver
                            <ul>
                                <li>
                                    <a href="<?= base_url() ?>login">Post your ride</a>: choose a time, meeting place, and a price based on the length of the trip. (By posting a ride a few days in advance, you increase your chances of having passengers.)
                                </li>
                                <li>
                                    Before leaving, check to see who your passengers are.
                                </li>
                                <li>
                                    Meet up with your passengers at the chosen time. They'll give you the amount you chose to cover the shared costs. And you're off!
                                </li>
                            </ul>
                            </p>
                            <p>
                                As a passenger
                            <ul>
                                <li>Enter your search criteria to find the ride that works for you.</li>
                                <li>Book the number of seats you need.</li>
                                <li>
                                    Head to the meeting point at the chosen time with the cash for the driver in hand. And you're off!
                                </li>
                            </ul>
                            </p>
                        </div>

                    </div>
                    <div class="about-author d-flex p-4 bg-light">

                        <div class="desc">
                            <h3>
                                Q : Who Chooses the Price?
                            </h3>
                            <p>A : Each driver chooses the price for his or her ride. Since factors like the driver’s vehicle, the price of gas, the number of passengers in the vehicle and the route chosen can vary, we feel it’s important to give drivers this flexibility.
                                For more info, see our <a href="<?= base_url() ?>terms-condition">Terms of Service</a>.</p>
                        </div>

                    </div>
                    <div class="about-author d-flex p-4 bg-light">

                        <div class="desc">
                            <h3>Q : Is Sedoubana Safe?</h3>
                            <p>
                                A : We take three key steps to make ridesharing with Kangaride safer.
                            <ul>
                                <li>Driver’s license validation </li>
                                After drivers sign up, we validate their driver’s license with the applicable transportation authority (for Quebec, Ontario, and British Columbia).
                                <li>Ratings by Kangaride members</li>
                                As a driver or passenger member, you can rate each and every ride you give or take with Kangaride. Passengers are evaluated on their courtesy and punctuality, while drivers are rated on the comfort and safety of the ride, their courtesy, and their punctuality. Drivers’ overall ratings are visible to passengers before booking.
                                <li>Quality control</li>
                                We take our members’ feedback very seriously! Our agents collect and process the ratings that members fill out online or by phone and proactively contact a new driver's first passengers to hear their comments. This allows us to do an immediate follow-up if necessary.
                            </ul>
                            </p>
                        </div>

                    </div>
                    <div class="about-author d-flex p-4 bg-light">

                        <div class="desc">
                            <h3>Q : How do I cancel a ride?</h3>
                            <p>
                                A : We understand that unforeseen circumstances sometimes come up and that you may need to cancel a ride. We ask that you let us know at least 24 hours in advance, whenever possible, so we can do our best to find the passengers another ride.
                                Please note that all cancellations must be made by phone at 647 809 5073. We will let your passengers know about the cancellation for you. We’re here for you from 9 AM to 9 PM, seven days a week. If you have to cancel outside of our opening hours, we would ask that you please call us anyway and leave a voicemail on our answering machine. Our agents will take into account the time you called when we begin checking the messages starting at 8am the following day.

                            </p>
                        </div>

                    </div>
                    <div class="about-author d-flex p-4 bg-light">

                        <div class="desc">
                            <h3>Q : How can I increase my chance of getting passengers?</h3>
                            <p>
                                A : There are a few ways to do so. First, make sure that your meeting point and drop-off points are practical and easily accessible to passengers.
                                If your trip is long, consider adding meeting and drop-off points in intermediate destinations. For example, make Kingston a stop on a ride between Toronto and Montreal. Then passengers can book for the whole trip or only the segment that they need.
                                One of the most important criteria is the price you're asking. Lowering your price by a few dollars will increase the likelihood that more passengers book with you.
                                As a new driver, don’t hesitate to remind your passengers to rate the ride after it’s over! The ratings passengers leave for you are combined into your overall rating, which is visible to passengers before booking.


                            </p>
                        </div>

                    </div>



                </div> <!-- .col-md-12 -->


            </div>
        </div>
    </section> <!-- .section -->

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <?php
        include 'includes/footer.php';
        ?>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#cc2766" />
        </svg></div>


    <?php

    include 'includes/js.php';
    ?>

</body>

</html>