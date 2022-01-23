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


<section class="ftco-section ftco-animate pb-4">
    <div class="container">
        <div class="row px-2">
            <h5 class="mt-2">My Trips</h5>
            <?php
            if($data->num_rows()>0) {
                foreach ($data->result() as $row) {
                    $crentDate = date('Y-m-d H:i:s');
                    $curdate=strtotime($crentDate);
                    $mydate=strtotime($row->dep_date.' '.$row->dep_time);
                    if ($curdate < $mydate) {
                        $label = "In-Progress";
                        $ribbon = "ribbon-running";
                    } else {
                        $label = "Completed";
                        $ribbon = "ribbon";
                    }
                    $uid=$this->session->userdata('uid');
                    $booked = getSeatsBookedPerRide($uid, $row->ride_id);
                    $price = $booked->no_seats * $row->price;
                    $rating = getUserRating($row->ride_id,$uid);
                    $dep_city =  (getCity($row->dep_city))?getCity($row->dep_city)->name:'';
                    $dest_city =  (getCity($row->dest_city))?getCity($row->dest_city)->name:'';

                   
            ?>
            <div class="col-md-12 pb-1 mb-3 request-form ftco-animate fadeInUp ftco-animated">

                <div class="<?=$ribbon?>"><span><?=$label?></span></div>
                <!-- <a href="#" class="badge badge-primary">Primary</a> -->
                <div class="row ">
                    <div class="col-md-2 col-6">
                        <span class="font-small text-primary">Departure Date</span>
                        <p class="font-small text-dark"><?= dateToLocal($row->dep_date) ?></p>
                    </div>
                    <div class="col-md-2 col-6">
                        <span class="font-small text-primary">Departure Time</span>
                        <p class="font-small text-dark"><?= timeToLocal($row->dep_time) ?></p>
                    </div>
                    <div class="col-md-2 col-6">
                        <span class="font-small text-primary">Departure City</span>
                        <p class="font-small text-dark"><?= $dep_city ?></p>
                    </div>
                    <div class="col-md-2 col-6">
                        <span class=" font-small text-primary">Destination City</span>
                        <p class="font-small text-dark"><?= $dest_city ?></p>
                    </div>
                    <div class="col-md-2 col-6">
                        <span class="font-small text-primary">Seats Booked</span>
                        <p class="font-small text-dark"><?=$booked->no_seats?></p>
                    </div>
                    <div class="col-md-2 col-6">
                        <span class="font-small text-primary">Paid</span>
                        <p class="font-small text-dark">$<?=$price?></p>
                    </div>

                </div>
                <div class="row mt-md-3">

                    <div class="col-md-5 ">
                        <span class="font-small text-primary">Pickup Loaction</span>
                        <p class="font-small text-dark"><?= $row->pickup ?></p>
                    </div>
                    <div class="col-md-5 ">
                        <span class="font-small text-primary">Drop-off Loaction</span>
                        <p class="font-small text-dark"><?= $row->dropoff ?></p>
                    </div>
                    <div class="col-md-2 ">
                        <span class="font-small text-primary">Rate</span>
                        <br>
                        <!-- Rating Bar -->
                        <input id="ride_<?= $row->ride_id ?>" value='<?= $rating ?>' class="rating-loading ratingbar" data-min="0" data-max="5" data-step="1">

                        <p class="rating mb-0 ">

<!--                            <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5"-->
<!--                                                                                           title="Awesome - 5 stars"></label>-->
<!--                            <input type="radio" id="star4half" name="rating" value="4 and a half"/><label-->
<!--                                    class="half"-->
<!--                                    for="star4half"-->
<!--                                    title="Pretty good - 4.5 stars"></label>-->
<!--                            <input type="radio" id="star4" name="rating" value="4"/><label class="full" for="star4"-->
<!--                                                                                           title="Pretty good - 4 stars"></label>-->
<!--                            <input type="radio" id="star3half" name="rating" value="3 and a half"/><label-->
<!--                                    class="half"-->
<!--                                    for="star3half"-->
<!--                                    title="Meh - 3.5 stars"></label>-->
<!--                            <input type="radio" id="star3" name="rating" value="3"/><label class="full" for="star3"-->
<!--                                                                                           title="Meh - 3 stars"></label>-->
<!--                            <input type="radio" id="star2half" name="rating" value="2 and a half"/><label-->
<!--                                    class="half"-->
<!--                                    for="star2half"-->
<!--                                    title="Kinda bad - 2.5 stars"></label>-->
<!--                            <input type="radio" id="star2" name="rating" value="2"/><label class="full" for="star2"-->
<!--                                                                                           title="Kinda bad - 2 stars"></label>-->
<!--                            <input type="radio" id="star1half" name="rating" value="1 and a half"/><label-->
<!--                                    class="half"-->
<!--                                    for="star1half"-->
<!--                                    title="Meh - 1.5 stars"></label>-->
<!--                            <input type="radio" id="star1" name="rating" value="1"/><label class="full" for="star1"-->
<!--                                                                                           title="Sucks big time - 1 star"></label>-->
<!--                            <input type="radio" id="starhalf" name="rating" value="half"/><label class="half"-->
<!--                                                                                                 for="starhalf"-->
<!--                                                                                                 title="Sucks big time - 0.5 stars"></label>-->

                        </p>
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
<script type='text/javascript'>
    $(document).ready(function(){

        // Initialize
        $('.ratingbar').rating({
            showCaption:false,
            showClear: false,
            size: 'sm'
        });

        // Rating change
        $('.ratingbar').on('rating:change', function(event, value, caption) {
            var id = this.id;
            var splitid = id.split('_');
            var postid = splitid[1];

            $.ajax({
                url: '<?= base_url() ?>star-rating/updateRating',
                type: 'post',
                data: {ride_id: postid, rating: value},
                success: function(response){
                    $('#averagerating_'+postid).text(response);
                }
            });
        });
    });

</script>


</body>
</html>