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

  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?php echo base_url(); ?>assets/images/banner.jpg'); background-position: 50% 12%;">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2">Driver</span> </p>
          <h1 class="mb-3 bread">Driver</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12 order-md-last ftco-animate">
          <h2 class="mb-3">How does it work?</h2>
          <div class="about-author d-flex p-4 bg-light">

            <div class="desc">
              <h3>Login or Register</h3>
              <p>Login to your Sedoubana account or register to have an account if you don’t have one</p>
              <p>Please read Terms of Service, Charter of Responsibilities and Privacy Policy of Sedoubana for required documents to become our driver. You may also read additional information that we ask our drivers during their registration.</p>
            </div>

          </div>
          <div class="about-author d-flex p-4 bg-light">

            <div class="desc">
              <h3>Post Ride</h3>
              <p>When he wants to post a ride, the driver must provide the departure city, the city of destination, meeting place, drop-off point in the city of destination, date and time of departure, number of seats available, his fee or price per seat or per passenger, acceptance of smokers or non-smokers, number of outings, acceptance of animals, his profile picture and the picture of his vehicle.</p>
            </div>

          </div>

          <div class="about-author d-flex p-4 bg-light">

            <div class="desc">
              <h3>Notifications</h3>
              <p>When you login to your account, you will see all the notifications and messages from Sedoubana</p>
            </div>

          </div>

          <div class="about-author d-flex p-4 bg-light">

            <div class="desc">
              <h3>Support</h3>
              <p>If you have any questions or if you need any assistance, please contact our customer service at: 647 809 5073 or Email us at <a href="mailto: info@sedoubana.com">info@sedoubana.com</a></p>
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