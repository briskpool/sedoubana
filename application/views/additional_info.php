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
$plaseHolderImage = base_url() . 'assets/images/placeholder.jpg';
if ($info->num_rows() > 0) {
    foreach ($info->result() as $row) {
        $make = $row->make;
        $model = $row->model;
        $year = $row->year;
        $color = $row->color;
        $plate_number = $row->plate_number;
        $license = ($row->license)? base_url().$row->license:$plaseHolderImage;
        $reg = ($row->reg)? base_url().$row->reg:$plaseHolderImage;
        $insurance = ($row->insurance)? base_url().$row->insurance:$plaseHolderImage;
        $inspection = ($row->inspection)? base_url().$row->inspection:$plaseHolderImage;
        $car_front = ($row->car_front)? base_url().$row->car_front:$plaseHolderImage;
        $car_back = ($row->car_back)? base_url().$row->car_back:$plaseHolderImage;
        $car_left = ($row->car_left)? base_url().$row->car_left:$plaseHolderImage;
        $car_right = ($row->car_right)? base_url().$row->car_right:$plaseHolderImage;
    }
} else {
    $make = '';
    $model = '';
    $year = '';
    $color = '';
    $plate_number = '';
    $license = $plaseHolderImage;
    $reg = $plaseHolderImage;
    $license = $plaseHolderImage;
    $insurance = $plaseHolderImage;
    $inspection = $plaseHolderImage;
    $car_front =  base_url() . 'assets/images/car_front.jpg';
    $car_back =  base_url() . 'assets/images/car_back.jpg';
    $car_left =  base_url() . 'assets/images/car_left.jpg';
    $car_right =  base_url() . 'assets/images/car_right.jpg';
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
                                <a class="nav-link" href="<?php echo base_url(); ?>profile" role="tab"
                                   aria-expanded="true">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo base_url(); ?>profile/info" role="tab"
                                   aria-expanded="true">Additional Info</a>
                            </li>

                        </ul>
                    </div>


                    <div class="row block-9 justify-content-center">
                        <div class="col-md-8 mb-md-5">
                            <div class="request-form p-1 p-md-3">
                                <div class="container px-0">
                                    <div class="col-md-12 ftco-animate fadeInUp ftco-animated">
                                        <div class="row pt-2">
                                            <div class="col-md-12">
                                                <h5>Register Vehicle</h5>
                                            </div>
                                        </div>
                                        <form action="<?php echo base_url(); ?>profile/upload" method="post"
                                              id="info-form">
                                            <div class="row pt-3">

                                                <div class="col-md-4 col-12 form-group">
                                                    <label for="" class="label">Make</label>
                                                    <input type="text" class="form-control"
                                                           value="<?php echo ($make) ? $make : '' ?>" name="make"
                                                           placeholder="Make">
                                                </div>
                                                <div class="col-md-4 col-12 form-group">
                                                    <label for="" class="label">Model</label>
                                                    <input type="text" class="form-control"
                                                           value="<?php echo ($model) ? $model : '' ?>" name="model"
                                                           placeholder="Model">
                                                </div>
                                                <div class="col-md-4 col-12 form-group">
                                                    <label for="" class="label">Year</label>
                                                    <input type="text" class="form-control"
                                                           value="<?php echo ($year) ? $year : '' ?>" name="year"
                                                           placeholder="Year">
                                                </div>

                                                <div class="col-md-4 col-12 form-group">
                                                    <label for="" class="label">License Plate Number</label>
                                                    <input type="text" class="form-control"
                                                           value="<?php echo ($plate_number) ? $plate_number : '' ?>"
                                                           name="plate_number" placeholder="License Plate Number">
                                                </div>
                                                <div class="col-md-4 col-12 form-group">
                                                    <label for="" class="label">Color</label>
                                                    <input type="text" class="form-control"
                                                           value="<?php echo ($color) ? $color : '' ?>"
                                                           name="color" placeholder="Color">
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row pt-2">
                                            <div class="col-md-12">
                                                <h5>Required Documents</h5>
                                            </div>
                                        </div>
                                        <div class="row pt-3">

                                            <div class="col-md-3 col-6 px-1">
                                                <div style="background-image: url('<?php echo $license; ?>'); min-height: 166px; background-size: cover; background-repeat: no-repeat;"
                                                     class="rounded w-100" id="img1"></div>
                                                <div class="col-md-12 col-12 px-0">
                                                    <div class="form-group " style="height:0px; display:none;">
                                                        <input type="file"  id="license_image" name="license"
                                                               onchange="readURL(this,'img1', 'license_image','license','icon1');">

                                                    </div>
                                                    <p class="text-light mt-1 px-0 btn btn-dark w-100"
                                                       onclick="chooseFileClick('license_image')" id="license"><img
                                                                style="width: 1em;" id="icon1" class=" mr-1"
                                                                src="<?php echo base_url(); ?>assets/images/paper-clip.svg">Dirver
                                                        License</p>

                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6 px-1">
                                                <div style="background-image: url('<?php echo $reg; ?>'); min-height: 166px; background-size: cover; background-repeat: no-repeat;"
                                                     class="rounded w-100" id="img2"></div>
                                                <div class="col-md-12 col-12 px-0">
                                                    <div class="form-group " style="height:0px; display:none;">
                                                        <input type="file" id="registration_image" name="reg" required
                                                               onchange="readURL(this,'img2', 'registration_image','reg','icon2');">
                                                    </div>
                                                    <p class="text-light mt-1 btn btn-dark w-100"
                                                       onclick="chooseFileClick('registration_image')"
                                                       id="registration"><img style="width: 1em;" class="mr-1"
                                                                              id="icon2"
                                                                              src="<?php echo base_url(); ?>assets/images/paper-clip.svg">
                                                        Registration</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6 px-1">
                                                <div style="background-image: url('<?php echo $insurance; ?>'); min-height: 166px; background-size: cover; background-repeat: no-repeat;"
                                                     class="rounded w-100" id="img3"></div>
                                                <div class="col-md-12 col-12 px-0">
                                                    <div class="form-group " style="height:0px; display:none;">
                                                        <input type="file" id="insurance_image" name="insurance"
                                                               onchange="readURL(this,'img3', 'insurance_image','insurance','icon3');">

                                                    </div>
                                                    <p class="text-light mt-1 px-0 btn btn-dark w-100"
                                                       onclick="chooseFileClick('insurance_image')" id="insurance"><img
                                                                style="width: 1em;" id="icon3" class="mr-1"
                                                                src="<?php echo base_url(); ?>assets/images/paper-clip.svg">Insurance
                                                    </p>

                                                </div>
                                            </div>

                                            <div class="col-md-3 col-6 px-1">
                                                <div style="background-image: url('<?php echo $inspection; ?>'); min-height: 166px; background-size: cover; background-repeat: no-repeat;"
                                                     class="rounded w-100" id="img4"></div>
                                                <div class="col-md-12 col-12 px-0">
                                                    <div class="form-group " style="height:0px; display:none;">
                                                        <input type="file" id="inspection_image" name="inspection"
                                                               onchange="readURL(this,'img4', 'inspection_image','inspection','icon4');">

                                                    </div>
                                                    <p class="text-light mt-1 px-0 btn btn-dark w-100"
                                                       onclick="chooseFileClick('inspection_image')" id="inspection"><img
                                                                style="width: 1em;" id="icon4" class="mr-1"
                                                                src="<?php echo base_url(); ?>assets/images/paper-clip.svg">Inspection
                                                    </p>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="row pt-2 mt-2">
                                            <div class="col-md-12">
                                                <h5>Vehicle Picture</h5>
                                            </div>
                                        </div>
                                        <div class="row pt-3">

                                            <div class="col-md-3 col-6 px-1">
                                                <div style="background-image: url('<?php echo $car_front; ?>'); min-height: 166px; background-size: cover; background-repeat: no-repeat;"
                                                     class="rounded w-100" id="img5"></div>
                                                <div class="col-md-12 col-12 px-0">
                                                    <div class="form-group " style="height:0px; display:none;">
                                                        <input type="file" id="front_image" name="car_front"
                                                               onchange="readURL(this,'img5', 'front_image','car_front','icon5');">

                                                    </div>
                                                    <p class="text-light mt-1 px-0 btn btn-dark w-100"
                                                       onclick="chooseFileClick('front_image')" id="front"><img
                                                                style="width: 1em;" class="mr-1" id="icon5"
                                                                src="<?php echo base_url(); ?>assets/images/paper-clip.svg">Front
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6 px-1">
                                                <div style="background-image: url('<?php echo $car_back; ?>'); min-height: 166px; background-size: cover; background-repeat: no-repeat;"
                                                     class="rounded w-100" id="img6"></div>
                                                <div class="col-md-12 col-12 px-0">
                                                    <div class="form-group " style="height:0px; display:none;">
                                                        <input type="file" id="back_image" name="car_back"
                                                               onchange="readURL(this,'img6', 'back_image','car_back','icon6');">

                                                    </div>
                                                    <p class="text-light mt-1 px-0 btn btn-dark w-100"
                                                       onclick="chooseFileClick('back_image')" id="back"><img
                                                                style="width: 1em;" class="mr-1" id="icon6"
                                                                src="<?php echo base_url(); ?>assets/images/paper-clip.svg">Back
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6 px-1">
                                                <div style="background-image: url('<?php echo $car_left; ?>'); min-height: 166px; background-size: cover; background-repeat: no-repeat;"
                                                     class="rounded w-100" id="img7"></div>
                                                <div class="col-md-12 col-12 px-0">
                                                    <div class="form-group " style="height:0px; display:none;">
                                                        <input type="file" id="left_image" name="car_left"
                                                               onchange="readURL(this,'img7', 'left_image','car_left','icon7');">

                                                    </div>
                                                    <p class="text-light mt-1 px-0 btn btn-dark w-100"
                                                       onclick="chooseFileClick('left_image')" id="left"><img
                                                                style="width: 1em;" class="mr-1" id="icon7"
                                                                src="<?php echo base_url(); ?>assets/images/paper-clip.svg">Left
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6 px-1">
                                                <div style="background-image: url('<?php echo $car_right; ?>'); min-height: 166px; background-size: cover; background-repeat: no-repeat;"
                                                     class="rounded w-100" id="img8"></div>
                                                <div class="col-md-12 col-12 px-0">
                                                    <div class="form-group " style="height:0px; display:none;">
                                                        <input type="file" id="right_image" name="car_right"
                                                               onchange="readURL(this,'img8', 'right_image','car_right','icon8');">

                                                    </div>
                                                    <p class="text-light mt-1 px-0 btn btn-dark w-100"
                                                       onclick="chooseFileClick('right_image')" id="right"><img
                                                                style="width: 1em;" class="mr-1" id="icon8"
                                                                src="<?php echo base_url(); ?>assets/images/paper-clip.svg">Right
                                                    </p>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="row py-2">

                                            <button id="from-btn"
                                                    class="nav-link btn btn-primary w-100 col-md-3 col-12 mt-3">Submit
                                            </button>


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
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
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