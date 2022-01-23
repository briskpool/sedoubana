<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'includes/head.php';
    ?>
</head>

<body>

    <?php
    include 'includes/profile-nav.php';
    ?>

    <!-- END nav -->

    <?php
    $subscription = '';
    if ($driver->num_rows() > 0) {
        foreach ($driver->result() as $row) {
            $driverId = $row->id;
            $name = $row->fname . ' ' . $row->lname;
            $email = $row->email;
            $phone = $row->phone;
            $gender = $row->gender;
            $dob = $row->dob;
            $country = $row->country;
            $city = $row->city;
            $province = $row->province;
            $photo = $row->photo;
            if (empty($photo)) {
                $photo = base_url() . 'assets/images/placeholder.jpg';
            }
            $subscription = getSubscription($driverId);
        }
    } else {
        $driverId = '';
        $name = '';
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
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" href="<?php echo base_url(); ?>profile" role="tab" aria-expanded="true">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>profile/info" role="tab" aria-expanded="true">Additional Info</a>
                                </li>

                            </ul>
                        </div>


                        <div class="row block-9 justify-content-center">
                            <div class="col-md-8 px-2 mb-md-5">
                                <div class="request-form p-1 p-md-3">

                                    <div class="container px-0">
                                        <div class="col-md-12 ftco-animate fadeInUp ftco-animated">
                                            <div class="row py-2 ">
                                                <div class="col-md-3 col-7 pr-0">
                                                    <div style="background-image: url('<?= $photo; ?>'); min-height: 166px; background-size: cover; background-repeat: no-repeat;" class="rounded w-100" id="img1"></div>
                                                    <!-- <div class="col-md-12 col-12 px-0">
                                                    <div class="form-group " style="height:0px; display:none;">
                                                        <input type="file" id="profile_image" name="profile"
                                                               onchange="readURL(this,'img1', 'profile_image','profile','icon1');">

                                                    </div>
                                                    <p class="text-light mt-1 px-0 btn btn-dark w-100"
                                                       onclick="chooseFile('profile_image')" id="back">
                                                        Profile Picture</p>
                                                </div> -->
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
                                                <p style="color:#cc2766;" class="col-md-3 col-5 mb-1 font-small">Date of
                                                    birth:</p>
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

                                            <?php
                                            //                                        dd($subscription);
                                            if (!empty($subscription)) {
                                                $now = date(strtotime("NOW"));
                                                if (strtotime($subscription->subscription_start) <= $now && strtotime($subscription->subscription_end) >= $now) {
                                                    $sub_status = "Active";
                                                } else {
                                                    $sub_status = "Inactive";
                                                }
                                            ?>
                                                <hr class="mb-1 mt-1">
                                                <div class="row ">
                                                    <p style="color:#cc2766;" class="col-md-3 col-12 mb-1  font-small">
                                                        Subscription Status:</p>
                                                    <p class="col-md-9 col-12 mb-1 font-small text-dark"><?= $sub_status ?></p>
                                                </div>
                                                <div class="row ">
                                                    <p style="color:#cc2766;" class="col-md-3 col-12 mb-1  font-small">
                                                        Subscription:</p>
                                                    <p class="col-md-9 col-12 mb-1 font-small text-dark"><?= ucfirst($subscription->item_name) ?></p>
                                                </div>
                                                <div class="row ">
                                                    <p style="color:#cc2766;" class="col-md-3 col-12 mb-1  font-small">
                                                        Subscription Start:</p>
                                                    <p class="col-md-9 col-12 mb-1 font-small text-dark"><?= dateTimeToLocal($subscription->subscription_start); ?></p>
                                                </div>
                                                <div class="row ">
                                                    <p style="color:#cc2766;" class="col-md-3 col-12 mb-1  font-small">
                                                        Subscription End:</p>
                                                    <p class="col-md-9 col-12 mb-1 font-small text-dark"><?= dateTimeToLocal($subscription->subscription_end); ?></p>
                                                </div>

                                                <hr class="mb-1 mt-1">
                                                <div class="row ">
                                                    <p style="color:#cc2766;" class="col-md-3 col-12 mb-1 font-small">Country:</p>
                                                    <p class="col-md-9 col-12 mb-1 font-small text-dark"><?= $subscription->source_country ?></p>
                                                </div>

                                                <div class="row ">
                                                    <p style="color:#cc2766;" class="col-md-3 col-12 mb-1 font-small">Card Type:</p>
                                                    <p class="col-md-9 col-12 mb-1 font-small text-dark"><?= $subscription->source_brand ?></p>
                                                </div>
                                                <div class="row ">
                                                    <p style="color:#cc2766;" class="col-md-3 col-12 mb-1 font-small">Card Number:</p>
                                                    <p class="col-md-9 col-12 mb-1  font-small text-dark">************<?= $subscription->source_last4 ?></p>
                                                </div>
                                                <div class="row ">
                                                    <p style="color:#cc2766;" class="col-md-3 col-12 mb-1 font-small">Card Expiry:</p>
                                                    <p class="col-md-9 col-12 mb-1  font-small text-dark"><?= $subscription->source_expMonth . '/' . $subscription->source_rxp_year ?></p>
                                                </div>

                                            <?php
                                            }
                                            ?>

                                            <div class="row py-2">
                                                <div class="col-md-3 col-12 ">
                                                    <a href="<?= base_url() . 'profile/edit' ?>" class="nav-link btn btn-primary w-100">Edit</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--Passenger Login form-->


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
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>


    <?php
    include 'includes/js.php';
    ?>
    <!-- <script>
  $('#license_image').change(function(e){
        var fileName = e.target.files[0].name;
        document.getElementById("license").innerHTML=fileName;

    });
  $('#registration_image').change(function(e){
        var fileName = e.target.files[0].name;
        document.getElementById("registration").innerHTML=fileName;

    });
   $('#insurance_image').change(function(e){
        var fileName = e.target.files[0].name;
        document.getElementById("insurance").innerHTML=fileName;

    });
    $('#inspection_image').change(function(e){
        var fileName = e.target.files[0].name;
        document.getElementById("inspection").innerHTML=fileName;

    });
   $('#front_image').change(function(e){
        var fileName = e.target.files[0].name;
        document.getElementById("front").innerHTML=fileName;

    });
   $('#back_image').change(function(e){
        var fileName = e.target.files[0].name;
        document.getElementById("back").innerHTML=fileName;

    });
   $('#left_image').change(function(e){
        var fileName = e.target.files[0].name;
        document.getElementById("left").innerHTML=fileName;

    });
   $('#right_image').change(function(e){
        var fileName = e.target.files[0].name;
        document.getElementById("right").innerHTML=fileName;

    });

</script> -->

</body>

</html>