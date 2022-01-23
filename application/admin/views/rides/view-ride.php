<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
$dep_city =  (getCity($ride->dep_city))?getCity($ride->dep_city)->name:'';
$dest_city =  (getCity($ride->dest_city))?getCity($ride->dest_city)->name:'';
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>View Ride</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo site_url() ?>dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?php echo site_url() ?>rides">Ride</a></div>
                    <div class="breadcrumb-item">view</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="ride-tab" data-toggle="tab" href="#home"
                                           role="tab" aria-controls="ride" aria-selected="true">Ride info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="driver-tab" data-toggle="tab" href="#driver" role="tab"
                                           aria-controls="driver" aria-selected="false">Driver Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="bookings-tab" data-toggle="tab" href="#tab_bookings"
                                           role="tab" aria-controls="tab_bookings" aria-selected="false">Ride
                                            Bookings</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                         aria-labelledby="home-tab">
                                        <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                                            <li class="media">
                                                <div class="media-body">
                                                    <div class="media-title text-muted ">Pick Up</div>
                                                    <div class="media-title"><?= $ride->pickup ?></div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-title text-muted ">Dropoff</div>
                                                    <div class="media-title"><?= $ride->dropoff ?></div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-body">
                                                    <div class="media-title text-muted ">Dep City</div>
                                                    <div class="media-title"><?= $dep_city ?></div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-title text-muted ">Dest City</div>
                                                    <div class="media-title"><?= $dest_city ?></div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-title text-muted ">Dep Date</div>
                                                    <div class="media-title"><?= $ride->dep_date ?></div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-title text-muted ">Dep Time</div>
                                                    <div class="media-title"><?= $ride->dep_time ?></div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-title text-muted ">Seats</div>
                                                    <div class="media-title"><?= $ride->seats ?></div>
                                                </div>

                                            </li>
                                            <li class="media">
                                                <div class="media-body">
                                                    <div class="media-title text-muted ">Status</div>
                                                    <div class="media-title"><?= ($ride->status == '1') ? 'Active' : 'Inactive' ?></div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-title text-muted ">Details</div>
                                                    <div class="media-title"><?= $ride->details ?></div>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="tab-pane fade" id="driver" role="tabpanel" aria-labelledby="driver-tab">
                                        <div class="card author-box">
                                            <div class="card-body">
                                                <?php

                                                if (!empty($driver)) {
                                                    $driverPhoto = base_url() . 'assets/img/avatar/avatar-1.png';
                                                    if ($driver->photo) {
                                                        $driverPhoto = front_url() . $driver->photo;
                                                    }

                                                    ?>

                                                    <div class="author-box-left">
                                                        <img alt="image"
                                                             src="<?= $driverPhoto ?>"
                                                             class="rounded-circle author-box-picture">
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="author-box-details">
                                                        <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                                                            <li class="media">
                                                                <div class="media-body">
                                                                    <div class="media-title text-muted ">First Name
                                                                    </div>
                                                                    <div class="media-title"><?= ucfirst($driver->fname) ?></div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="media-title text-muted ">Last Name</div>
                                                                    <div class="media-title"><?= ucfirst($driver->lname) ?></div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="media-title text-muted ">Email</div>
                                                                    <div class="media-title"><?= $driver->email ?></div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="media-title text-muted ">Phone</div>
                                                                    <div class="media-title"><?= $driver->phone ?></div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="media-title text-muted ">Gender</div>
                                                                    <div class="media-title"><?= ucfirst($driver->gender) ?></div>
                                                                </div>
                                                            </li>
                                                            <li class="media">

                                                                <div class="media-body">
                                                                    <div class="media-title text-muted ">Dob</div>
                                                                    <div class="media-title"><?= $driver->dob ?></div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="media-title text-muted ">Country</div>
                                                                    <div class="media-title"><?= ucfirst($driver->country) ?></div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="media-title text-muted ">Province</div>
                                                                    <div class="media-title"><?= ucfirst($driver->province) ?></div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="media-title text-muted ">City</div>
                                                                    <div class="media-title"><?= ucfirst($driver->city) ?></div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="media-title text-muted ">Status</div>
                                                                    <div class="media-title"><?php echo ($driver->status == '1') ? 'Active' : 'Inactive' ?></div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="float-right mt-sm-0 mt-3">
                                                            <a href="<?= base_url() ?>view-drivers/<?= $driver->id ?>"
                                                               target="_blank"
                                                               class="btn">View Driver <i
                                                                        class="fas fa-chevron-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_bookings" role="tabpanel"
                                         aria-labelledby="bookings-tab">


                                        <div class="card">
                                            <div class="card-body">
                                                <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                                                    <?php
                                                    if ($booking->num_rows() > 0) {
                                                        foreach ($booking->result() as $row) {
                                                            $uphoto = base_url() . 'assets/img/avatar/avatar-1.png';
                                                            if ($row->photo) {
                                                                $uphoto = front_url() . $row->photo;
                                                            }
                                                            ?>
                                                            <li class="media">
                                                                <img alt="image" class="mr-3 rounded-circle" width="50"
                                                                     src="<?=$uphoto?>">
                                                                <div class="media-body">
                                                                    <div class="media-muted">Name</div>
                                                                    <div class="media-title"><?=$row->fname.' '.$row->lname?></div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="media-muted">Email</div>
                                                                    <div class="media-title"><?=$row->email?></div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="media-muted">Phone</div>
                                                                    <div class="media-title"><?=$row->phone?></div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="media-muted">Booked Seats</div>
                                                                    <div class="media-title"><?=$row->no_seats?></div>
                                                                </div>

                                                                <div class="media-body">
                                                                    <div class="media-muted">Price</div>
                                                                    <div class="media-title"><?=$ride->price * $row->no_seats?></div>
                                                                </div>

                                                            </li>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <div class="media-body">
                                                            <div class="media-title">No Ride booked</div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
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
    </div>
<?php $this->load->view('includes/footer'); ?>