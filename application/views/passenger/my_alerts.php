<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <?php
    $this->load->view('includes/head.php');
    ?>
</head>
<body>

<?php
if($this->session->userdata('validated_driver')){
    include 'includes/profile-nav.php';
}else if ($this->session->userData('validated')){
    include 'includes/passenger-nav.php';
}
echo $data;
?>


<section class="ftco-section ftco-animate  pb-4">
    <div class="container">
        <div class="row px-2 justify-content-center">

            <div class="col-md-8">
                <h5>Alerts</h5>
            </div>

            <div class="col-md-8 py-2 d-none d-lg-block d-md-block  ftco-animate fadeInUp ftco-animated">
                <div class="row ">
                    <div class="col-md-2  col-4">
                        <span class="font-extra-small">DATE</span>
                    </div>
                    <div class="col-md-10  col-4">
                        <span class="font-extra-small">MESSAGE</span>
                    </div>
                </div>
                <?php
                if ($data->num_rows() > 0) {
                    foreach ($data->result() as $row) {
                        ?>
                        <div class="row pt-2 pb-2 border-top row-hover">
                            <div class="col-md-2   col-4">
                                <p class="font-weight-bold mb-0 font-extra-small"><?= dateToLocal($row->date_time) ?></p>
                            </div>
                            <div class="col-md-7 col-4">
                                <p class="font-weight-bold mb-0  font-extra-small">
                                    <?=truncate($row->message, 50)?>
                                </p>
                            </div>
                            <div class="col-md-3 col-12 py-0">
                                <a class="text-info font-extra-small py-0  float-right" data-toggle="collapse"
                                   href="#demo"
                                   role="button" aria-expanded="false" aria-controls="demo">Read More</a>
                            </div>
                            <div class="col-md-2"></div>
                            <div class=" col-8 font-extra-small  collapse" id="demo">
                                <p class="mb-0 py-1">   <?=$row->message?></a></p>
                            </div>


                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="col-md-12 text-center request-form ftco-animate fadeInUp ftco-animated align-item-center">
                        <img class="w-25" src="<?php base_url() ?>assets/images/alerts.svg" alt="">
                        <h5 class="mt-0 ">No Alerts</h5>
                    </div>
                    <?php
                }
                ?>


            </div>
            <!--for mobile screen-->
            <div class="col-md-12 mt-2 py-2 d-block d-lg-none d-md-none request-form ftco-animate fadeInUp ftco-animated">
                <?php $i = 'abc1';
                while ($i < 'abc5') { ?>
                    <div class="row pt-2 pb-2">
                        <div class="col-12 ">
                            <p class="  mb-0 font-extra-small">09-09-2019</p>
                        </div>
                        <div class="col-12 pr-0">
                            <p class="mb-0 text-dark font-extra-small ">Hi!, we have recieved your request... <span
                                        class="text-info  " data-toggle="collapse" href="#<?php echo $i; ?>"
                                        role="button" aria-expanded="false"
                                        aria-controls="<?php echo $i; ?>">Read</span></p>


                        </div>

                        <div class=" col-12 collapse-color font-extra-small  collapse" id="<?php echo $i; ?>">

                            <p class="mb-0 py-1">Funds Cleared <a href="#">(view More)</a></p>
                        </div>

                    </div>

                    <?php
                    $i++;
                } ?>


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
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>


<?php
$this->load->view('includes/js.php');
?>


</body>
</html>