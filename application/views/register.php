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


  <section class="ftco-section ftco-animate pb-md-0 pb-4">
    <div class="container">
      <div class="row block-9 justify-content-center">
        <div class="col-md-8 mb-md-5 px-2">
          <form action="<?php echo base_url(); ?>register/sendData" enctype="multipart/form-data" method="post" class="ftco-animate request-form" name="reg_form">
            <h2 class="mb-3">Registration</h2>
            <div class="row px-1 mb-3">
              <div class="col-md-6 col-12">
                <span class="text-dark font-small" id="reg_text">REGISTER WITH</span>
                <img src="<?php echo base_url(); ?>assets/images/gm-logo.svg" id="googleSignIn" width="50px">
                <img src="<?php echo base_url(); ?>assets/images/fb-logo.svg" id="reg_p" width="50px">

              </div>

            </div>
            <p class="text-danger"><?php echo $msg; ?></p>
            <div class="row px-1">
              <div class="form-group col-md-6 col-12">
                <label class="label">First Name</label>
                <input type="text" name="fname" id="p_fname" class="form-control" placeholder="First name">

              </div>

              <div class="form-group col-md-6 col-12">

                <label for="" class="label">Last Name</label>
                <input type="text" name="lname" id="p_lname" class="form-control" placeholder="Last name">

              </div>
            </div>
            <div class="row px-1">
              <div class="form-group col-md-6 col-12">
                <label class="label">Gender</label>
                <select name="gender" class="form-control">
                  <option value="">Choose Gender...</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>


              <div class="form-group col-md-6 col-12">
                <label for="" class="label">Date of birth</label>
                <input type="text" name="dob" class="form-control flatpickr" placeholder="Date">
              </div>

            </div>

            <div class="row px-1">

              <div class="form-group col-md-4 col-12">
                <label for="" class="label">Country</label>
                <select name="country" class="form-control countries order-alpha" id="countryId">
                  <option value="">Select Country</option>
                </select>
              </div>

              <div class="form-group col-md-4 col-12">
                <label for="" class="label">Province / State</label>
                <select name="state" class=" form-control states order-alpha" id="stateId">
                  <option value="">Select State</option>
                </select>
              </div>

              <div class="form-group col-md-4 col-12">
                <label for="" class="label">City</label>
                <select name="city" class=" form-control cities order-alpha" id="cityId">
                  <option value="">Select City</option>
                </select>
              </div>
            </div>

            <div class="row px-1">
              <div class="form-group col-md-6 col-12">
                <label for="" class="label">Email</label>
                <input type="email" name="email" id="p_email" class="form-control" placeholder="Email">

              </div>
              <div class="form-group col-md-6 col-12">
                <label for="" class="label">Phone Number</label>
                <input type="text" name="phone" class="form-control" placeholder="Phone Number">

              </div>
            </div>
            <div class="row px-1">
              <div class="form-group col-md-6 col-12">
                <label for="" class="label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">

              </div>
              <div class="form-group col-md-6 col-12">
                <label for="" class="label">Confirm Password</label>
                <input type="password" name="cpass" class="form-control" placeholder="Confirm Password">

              </div>
              <input type="hidden" name="photo" id="profile_picture">
            </div>
            <div class="row px-1">
              <div class="form-group col-md-4 col-12 mt-3">
                <!-- <input class="nav-link btn btn-primary" value="passenger" name="role" type="submit"> -->

                <button class="nav-link btn btn-primary" value="passenger" name="role" type="submit">Passenger</button>

              </div>
              <div class="form-group col-md-4 col-12 mt-3">
                <!-- <input class="nav-link btn btn-primary" value="driver" name="role" type="submit"> -->
                <button class="nav-link btn btn-primary" value="driver" name="role" type="submit">Driver</button>

              </div>
            </div>
          </form>
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
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


  <?php
  include 'includes/js.php';
  ?>



</body>

</html>