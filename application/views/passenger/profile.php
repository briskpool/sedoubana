<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $this->load->view('includes/head.php');
  ?>
</head>

<body>

  <?php
  $this->load->view('includes/passenger-nav.php');
  ?>

  <!-- END nav -->
  <?php
  if ($passenger->num_rows() > 0) {
    foreach ($passenger->result() as $row) {
      $name = $row->fname . ' ' . $row->lname;
      $email = $row->email;
      $phone = $row->phone;
      $gender = $row->gender;
      $dob = $row->dob;
      $country = $row->country;
      $city = $row->city;
      $province = $row->province;
      $photo = ($row->photo) ? base_url() . $row->photo : base_url() . 'assets/images/placeholder.jpg';
    }
  } else {
    $name = '';
    $fname = '';
    $lname = '';
    $email = '';
    $phone = '';
    $gender = '';
    $dob = '';
    $country = '';
    $city = '';
    $province = '';
    $photo = base_url() . 'assets/images/placeholder.jpg';
  }
  ?>

  <section class="ftco-section ftco-animate pb-md-0 pb-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 pills mt-2 mt-md-3">
          <div class="bd-example bd-example-tabs">
            <div class="d-flex justify-content-center">
              <!--                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">-->
              <!---->
              <!--                  <li class="nav-item">-->
              <!--                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Profile</a>-->
              <!--                  </li>-->
              <!--                  <li class="nav-item">-->
              <!--                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Payment Details</a>-->
              <!--                  </li>-->
              <!--                -->
              <!--                </ul>-->
            </div>

            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active px-0 py-0" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                <div class="row block-9 justify-content-center">
                  <div class="col-md-8 px-2 mb-md-5">
                    <div class="request-form p-1 p-md-3">

                      <div class="container px-0">
                        <div class="col-md-12 ftco-animate fadeInUp ftco-animated">
                          <div class="row py-2 ">
                            <div class="col-md-3 col-7 pr-0">
                              <div style="background-image: url('<?php echo  $photo; ?>'); min-height: 166px; background-size: cover; background-repeat: no-repeat;" class="rounded w-100" id="img1"></div>
                              <div class="col-md-12 col-12 px-0">
                                <div class="form-group " style="height:0px; display:none;">
                                  <input type="file" id="profile_image" name="profile" onchange="readURL(this,'img1', 'profile_image','profile','icon1');">
                                </div>
                                <p class="text-light mt-1 px-0 btn btn-dark w-100" onclick="chooseFileClick('profile_image')" id="back">
                                  <img style="width: 1em;" class="mr-1" id="icon1" src="<?php echo base_url(); ?>assets/images/paper-clip.svg">Profile
                                  Picture
                                </p>
                              </div>
                            </div>


                          </div>

                          <hr class="mb-1 mt-1">

                          <div class="row ">
                            <p style="color:#cc2766;" class="col-md-3 col-3 mb-1 font-small">Name:</p>
                            <p class="col-md-9 col-9 mb-1 pl-0 pl-md-3 font-small text-dark"><?php echo $name; ?></p>
                          </div>

                          <div class="row ">
                            <p style="color:#cc2766;" class="col-md-3 col-3 mb-1 font-small">Email:</p>
                            <p class="col-md-9 col-9 mb-1 font-small pl-0 pl-md-3 text-dark"><?php echo $email; ?></p>
                          </div>

                          <div class="row ">
                            <p style="color:#cc2766;" class="col-md-3 col-3 mb-1 font-small">Phone:</p>
                            <p class="col-md-9 col-9 mb-1 pl-0 pl-md-3 font-small text-dark"><?php echo $phone; ?></p>
                          </div>
                          <hr class="mb-1 mt-1">
                          <div class="row ">
                            <p style="color:#cc2766;" class="col-md-3 col-5 mb-1 font-small">Gender:</p>
                            <p class="col-md-9 col-7 mb-1  font-small text-dark"><?php echo $gender; ?></p>
                          </div>

                          <div class="row ">
                            <p style="color:#cc2766;" class="col-md-3 col-5 mb-1 font-small">Date of birth:</p>
                            <p class="col-md-9 col-7 mb-1  font-small text-dark"><?php echo $dob; ?></p>
                          </div>


                          <hr class="mb-1 mt-1">

                          <div class="row py-2">
                            <div class="col-md-3 col-5 col-sm-6">
                              <p style="color:#cc2766;" class="mb-1 font-small">Country:</p>
                              <p style="color:#cc2766;" class="mb-1 font-small">City:</p>
                              <p style="color:#cc2766;" class="mb-1 font-small">Province/State:</p>

                            </div>
                            <div class="col-md-9 col-7 col-sm-6">
                              <p class="mb-1 font-small  text-dark"><?php echo $country; ?></p>
                              <p class="mb-1 font-small  text-dark"><?php echo $city; ?></p>
                              <p class="mb-1 font-small  text-dark"><?php echo $province; ?></p>

                            </div>
                          </div>







                          <div class="row py-2">
                            <div class="col-md-3 col-12 mt-3">
                              <a href="<?= base_url() ?>passenger-profile/edit" class="nav-link btn btn-primary w-100">Edit</a>
                            </div>

                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <!--Passenger Login form-->
              <div class="tab-pane fade px-0 py-0" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                <div class="row block-9 justify-content-center">
                  <div class="col-md-8 mb-md-5 px-2 mb-md-5">

                    <div class="request-form p-1 p-md-3">

                      <div class="container px-0">
                        <div class="col-md-12 ftco-animate fadeInUp ftco-animated">

                          <div class="row ">
                            <p style="color:#cc2766;" class="col-md-3 col-12 mb-1  font-small">Billing Address:</p>
                            <p class="col-md-9 col-12 mb-1 font-small text-dark">62 E. Blue Spring Ave.Inman, SC 29349</p>
                          </div>
                          <div class="row ">
                            <p style="color:#cc2766;" class="col-md-3 col-12 mb-1 font-small">Card Type:</p>
                            <p class="col-md-9 col-12 mb-1 font-small text-dark">VISA</p>
                          </div>
                          <div class="row ">
                            <p style="color:#cc2766;" class="col-md-3 col-12 mb-1 font-small">Card Number:</p>
                            <p class="col-md-9 col-12 mb-1  font-small text-dark">4000000000000002</p>
                          </div>
                          <div class="row ">
                            <p style="color:#cc2766;" class="col-md-3 col-12 mb-1 font-small">Card Expiry:</p>
                            <p class="col-md-9 col-12 mb-1  font-small text-dark">12/22</p>
                          </div>

                        </div>
                      </div>

                    </div>
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
    $this->load->view('includes/footer.php');
    ?>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


  <?php
  $this->load->view('includes/js.php');
  ?>


</body>

</html>