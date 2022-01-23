<!DOCTYPE html>
<html lang="en">

<head>
  <?php

  use Illuminate\Contracts\Session\Session;

  include 'includes/head.php';
  ?>
</head>

<body>


  <?php
  include 'includes/nav.php';
  ?>
  <!-- END nav -->

  <section class="hero-wrap hero-wrap-2 js-fullheight" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact </span></p>
          <h1 class="mb-3 bread">Contact us</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section contact-section">
    <div class="container">
      <div class="row d-flex mb-5 contact-info justify-content-center">
        <div class="col-md-8">
          <div class="row mb-5">
            <div class="col-md-4 text-center py-4">
              <div class="icon">
                <span class="fas fa-map"></span>
              </div>
              <p><span>Address:</span> <a href="https://goo.gl/maps/TYHjTWRjqjMdJTXJ7" target="_blank">718 Wilson Avenue # 301H, North York, ONTARIO M3K 2E1</a></p>
            </div>
            <div class="col-md-4 text-center border-height py-4">
              <div class="icon">
                <span class="fas fa-phone"></span>
              </div>
              <p><span>Phone:</span> <a href="tel://647 809 5073">647 809 5073</a></p>
            </div>
            <div class="col-md-4 text-center py-4">
              <div class="icon">
                <span class="fas fa-envelope"></span>
              </div>
              <p><span>Email:</span> <a href="mailto:info@sedoubana.com">info@sedoubana.com</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row block-9 justify-content-center mb-5">
        <div class="col-md-8 mb-md-5">
          <h2 class="text-center">If you got any questions <br>please do not hesitate to send us a message</h2>

          <?php
          if ($this->session->flashdata('message')) {
            $status = $this->session->flashdata('status');
            $message = $this->session->flashdata('message');
          ?>
            <div class="alert <?= $status ?> alert-dismissible" role="alert">
              <?= $message ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
          }
          ?>

          <form action="<?= base_url() ?>contact/send" method="post" class="bg-light p-5 contact-form">
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="email" placeholder="Your Email" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea cols="30" rows="7" name="message" class="form-control" required placeholder="Message"></textarea>
            </div>

            <div class="form-group">
              <!-- Google reCAPTCHA block -->
              <div class="g-recaptcha" data-sitekey="6Len37waAAAAADYyFO6bWSVrb-OCs2B4ojZWRtdb"></div>
            </div>
            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
          </form>

        </div>
      </div>
      <!-- <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div id="map" class="bg-white"></div>
        	</div>
        </div> -->
    </div>
  </section>

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <?php
    include 'includes/footer.php';
    ?>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


  <?php
  include 'includes/js.php';
  ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>

</html>