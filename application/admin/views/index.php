<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">Drivers

                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count"><?=$activeDrives?></div>
                                    <div class="card-stats-item-label">Active</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count"><?=$pandingDrives?></div>
                                    <div class="card-stats-item-label">Pending</div>
                                </div>

                                <div class="card-stats-item">
                                    <div class="card-stats-item-count"><?=$approvedDrives?></div>
                                    <div class="card-stats-item-label">Approved</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Drivers</h4>
                            </div>
                            <div class="card-body">
                               <?=$drives->num_rows()?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">Passenger

                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count"><?=$activePassenger?></div>
                                    <div class="card-stats-item-label">Active</div>
                                </div>

                                <div class="card-stats-item">
                                    <div class="card-stats-item-count"><?=$inactivePassenger?></div>
                                    <div class="card-stats-item-label">Inactive</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Passengers</h4>
                            </div>
                            <div class="card-body">
                                <?=$passengers->num_rows()?>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">Rides

                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count"><?=$activeRides?></div>
                                    <div class="card-stats-item-label">Active</div>
                                </div>

                                <div class="card-stats-item">
                                    <div class="card-stats-item-count"><?=$inactiveRides?></div>
                                    <div class="card-stats-item-label">Inactive</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-road"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Rides</h4>
                            </div>
                            <div class="card-body">
                                <?=$rides?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Unapproved Drivers</h4>
                            <div class="card-header-action">
                                <a href="<?=base_url()?>drivers" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <tr>
                                        <th>ID</th>
                                        <th>Driver Name</th>
                                        <th>Driver Email</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    if ($unApprovedDrives->num_rows() > 0) {
                                        foreach ($unApprovedDrives->result() as $driver) {
                                            ?>
                                            <tr>
                                                <td><?=$driver->id?></td>
                                                <td><?=$driver->fname.' '.$driver->lname?></td>
                                                <td><a href="<?=base_url()?>view-drivers/<?=$driver->id?>"><?=$driver->email?></a></td>

                                                <td><?=date('d-m-Y H:i', strtotime($driver->created_at))?></td>
                                                <td>
                                                    <a href="<?=base_url()?>view-drivers/<?=$driver->id?>" class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-12">
                    <div class="card card-hero">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="far fa-question-circle"></i>
                            </div>
                            <h4>14</h4>
                            <div class="card-description">Customers need help</div>
                        </div>
                        <div class="card-body p-0">
                            <div class="tickets-list">
                                <a href="#" class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>My order hasn't arrived yet</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <div>Laila Tazkiah</div>
                                        <div class="bullet"></div>
                                        <div class="text-primary">1 min ago</div>
                                    </div>
                                </a>
                                <a href="#" class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>Please cancel my order</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <div>Rizal Fakhri</div>
                                        <div class="bullet"></div>
                                        <div>2 hours ago</div>
                                    </div>
                                </a>
                                <a href="#" class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>Do you see my mother?</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <div>Syahdan Ubaidillah</div>
                                        <div class="bullet"></div>
                                        <div>6 hours ago</div>
                                    </div>
                                </a>
                                <a href="<?php echo base_url(); ?>dist/features_tickets"
                                   class="ticket-item ticket-more">
                                    View All <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </section>
    </div>
<?php $this->load->view('includes/footer'); ?>