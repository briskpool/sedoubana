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
$dep_city =  (getCity($rideInfo->dep_city))?getCity($rideInfo->dep_city)->name:'';
$dest_city =  (getCity($rideInfo->dest_city))?getCity($rideInfo->dest_city)->name:'';
?>


<section class="ftco-section ftco-animate">
    <div class="container">
        <div class="row px-3">
            <div class="col-md-12 ftco-animate ">
                <p class="breadcrumbs mb-0 ">
                    <span class="mr-2">
                        <a href="<?php echo base_url(); ?>rides">My Rides <i class="ion-ios-arrow-forward"></i></a>
                    </span>
                    <span class="mr-2">Bookings</span>
                </p>
                <div class="row mb-2 font-small">
                    <div class="col-md-2 pr-0 col-12"><?=dateTimeToLocal($rideInfo->dep_date.' '.$rideInfo->dep_time)?></div>
                    <div class="col-md-10 pl-md-0  col-12"> <?=$dep_city?> <i class="fa fa-arrow-right"></i>
                        <?=$dest_city?>
                    </div>
                </div>
            </div>
            <?php
            if ($rides->num_rows() > 0) {
                foreach ($rides->result() as $row) {
                    ?>

                    <div class=" col-md-3 mb-3 col-12 pb-1 ftco-animate fadeInUp ftco-animated">
                        <div class="card ">
                            <div class="card-header text-center">
                                <img class="w-100 col-md-10 col-8  rounded-circle   "
                                     src="<?php echo ($row->photo)?base_url().$row->photo:base_url().'assets/images/profile-placeholder.png'?>" alt="Image placeholder">
                            </div>
                            <div class="card-body pb-0">
                                <p class="text-primary font-small mb-0">Full Name</p>
                                <p><?=$row->fname." ".$row->lname?></p>
                                <p class="text-primary font-small mb-0">Phone</p>
                                <p><?=$row->phone?></p>
                                <p class="text-primary font-small mb-0">Booked Seats</p>
                                <p><?=$row->no_seats?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }else{
                ?>
                <div class="col-md-12 text-center request-form ftco-animate fadeInUp ftco-animated align-item-center">
                    <img class="w-25" src="<?php base_url()?>assets/images/racing.svg" alt="">
                    <h5 class="mt-0 ">No Trip yet!</h5>
                </div>
                <?php
            }
            ?>

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


</body>
</html>