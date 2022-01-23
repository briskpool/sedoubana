<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'application/views/includes/head.php';
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
            $fname = $row->fname;
            $lname = $row->lname;
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

                        </div>
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

                                            <form action="<?php echo base_url(); ?>passenger-profile/update" enctype="multipart/form-data" method="post" class="ftco-animate request-form" name="reg_form">

                                                <div class="row ">
                                                    <div class="form-group col-md-6 col-12">
                                                        <label class="label">First Name</label>
                                                        <input type="text" name="fname" value="<?= ($fname) ? $fname : '' ?>" id="p_fname" class="form-control" placeholder="First name">
                                                    </div>

                                                    <div class="form-group col-md-6 col-12">
                                                        <label for="" class="label">Last Name</label>
                                                        <input type="text" name="lname" value="<?= ($lname) ? $lname : '' ?>" id="p_lname" class="form-control" placeholder="Last name">
                                                    </div>

                                                    <div class="form-group col-md-6 col-12 form-group">
                                                        <label for="" class="label">Email:</label>
                                                        <input type="email" name="email" id="p_email" value="<?php echo ($email) ? $email : '' ?>" class="form-control" placeholder="Email" readonly>
                                                    </div>

                                                    <div class=" form-group col-md-6 col-12 form-group">
                                                        <label for="" class="label">Phone:</label>
                                                        <input type="text" class="form-control" value="<?php echo ($phone) ? $phone : '' ?>" name="phone" placeholder="name">
                                                    </div>
                                                </div>

                                                <div class="row ">
                                                    <div class="form-group col-md-6 col-12">
                                                        <label class="label">Gender</label>
                                                        <select name="gender" class="form-control">
                                                            <option value="">Choose Gender...</option>
                                                            <option value="male" <?= ($gender == 'male') ? 'selected' : '' ?>>Male</option>
                                                            <option value="female" <?= ($gender == 'female') ? 'selected' : '' ?>>Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6 col-12">
                                                        <label for="" class="label">Date of birth</label>
                                                        <input type="text" name="dob" value="<?= $dob ?>" class="form-control flatpickr" placeholder="Date">
                                                    </div>
                                                </div>

                                                <div class="row py-2">
                                                    <div class="form-group col-md-4 col-12">
                                                        <label for="" class="label">Country</label>
                                                        <select name="country" class="form-control countries order-alpha" id="countryId">
                                                            <option value="">Select Country</option>
                                                            <option value="<?= $country ?>" <?= ($country) ? 'selected' : '' ?>><?= $country ?></option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4 col-12">
                                                        <label for="" class="label">Province / State</label>
                                                        <select name="state" class=" form-control states order-alpha" id="stateId">
                                                            <option value="">Select State</option>
                                                            <option value="<?= $province ?>" <?= ($province) ? 'selected' : '' ?>><?= $province ?></option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4 col-12">
                                                        <label for="" class="label">City</label>
                                                        <select name="city" class=" form-control cities order-alpha" id="cityId">
                                                            <option value="">Select City</option>
                                                            <option value="<?= $city ?>" <?= ($city) ? 'selected' : '' ?>><?= $city ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row py-2">
                                                    <div class="form-group col-md-4 col-12 mt-3">
                                                        <input class="nav-link btn btn-primary" value="Update" name="send" type="submit">
                                                    </div>

                                                </div>
                                        </div>

                                    </div>
                                    </form>

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
        include 'application/views/includes/footer.php';
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
    include 'application/views/includes/js.php';
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