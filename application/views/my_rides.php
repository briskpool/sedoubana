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



  <section class="ftco-section ftco-animate pb-4">
    <div class="container">
      <div class="row px-2">
        <h5 class="mt-2">My Rides</h5>
        <?php
        if ($rides->num_rows() > 0) {
          foreach ($rides->result() as $row) {
            $dep_city =  (getCity($row->dep_city)) ? getCity($row->dep_city)->name : '';
            $dest_city =  (getCity($row->dest_city)) ? getCity($row->dest_city)->name : '';

            $crentDate = date('Y-m-d H:i:s');
            $curdate = strtotime($crentDate);
            $mydate = strtotime($row->dep_date . ' ' . $row->dep_time);
            if ($curdate < $mydate) {
              $label = "In-Progress";
              $ribbon = "ribbon-running";
            } else {
              $label = "Completed";
              $ribbon = "ribbon";
            }
        ?>
            <div class="col-md-12 pb-1 mb-3 request-form ftco-animate fadeInUp ftco-animated">
              <div class="<?= $ribbon ?>"><span><?= $label ?></span></div>


              <!-- <a href="#" class="badge badge-primary">Primary</a> -->
              <div class="row ">
                <div class="col-md-2 col-6">
                  <span style="color:#cc2766;" class="font-small">Departure Date</span>
                  <p class="font-small text-dark"><?= dateToLocal($row->dep_date) ?></p>
                </div>
                <div class="col-md-2 col-6">
                  <span style="color:#cc2766;" class="font-small">Departure Time</span>
                  <p class="font-small text-dark"><?= timeToLocal($row->dep_time); ?></p>
                </div>
                <div class="col-md-2 col-6">
                  <span style="color:#cc2766;" class="font-small">Departure City</span>
                  <p class="font-small text-dark"><?= $dep_city ?></p>
                </div>
                <div class="col-md-2 col-6">
                  <span style="color:#cc2766;" class=" font-small">Destination City</span>
                  <p class="font-small text-dark"><?= $dest_city; ?></p>
                </div>
                <div class="col-md-2 col-6">
                  <span style="color:#cc2766;" class="font-small">No: Of Seats</span>
                  <p class="font-small text-dark"><?= $row->seats; ?></p>
                </div>
                <div class="col-md-2 col-6">
                  <span style="color:#cc2766;" class="font-small">Price/Passenger</span>
                  <p class="font-small text-dark"><?= $row->price; ?></p>
                </div>

              </div>
              <div class="row mt-md-3">

                <div class="col-md-5 ">
                  <span style="color:#cc2766;" class="font-small">Pickup Loaction</span>
                  <p class="font-small text-dark"><?= $row->pickup; ?></p>
                </div>
                <div class="col-md-5 ">
                  <span style="color:#cc2766;" class="font-small">Drop-off Loaction</span>
                  <p class="font-small text-dark"><?= $row->dropoff; ?></p>
                </div>
                <div class="col-md-2 ">
                  <a href="<?php echo base_url(); ?>bookings?id=<?= $row->id ?>">
                    <p class="nav-link btn btn-dark text-light mt-3">See Bookings <i class=" ml-1 fas fa-chevron-right"></i></p>
                  </a>
                </div>
              </div>





            </div>

          <?php
          }
        } else {
          ?>
          <div class="col-md-12 text-center request-form ftco-animate fadeInUp ftco-animated align-item-center">



            <img class="w-25" src="<?php base_url() ?>assets/images/racing.svg" alt="">


            <h5 class="mt-0 ">You haven't posted any ride yet</h5>

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