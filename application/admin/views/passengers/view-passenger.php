<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');

?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h4>View Passenger</h4>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo site_url()?>dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?php echo site_url()?>passengers">Passengers</a></div>
                    <div class="breadcrumb-item">View</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card mt-2">
                            <div class="card-header">
                                <h4>Passenger Details</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-title text-muted ">First Name</div>
                                            <div class="media-title"><?= ucfirst($passenger->fname) ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Last Name</div>
                                            <div class="media-title"><?= ucfirst($passenger->lname) ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Email</div>
                                            <div class="media-title"><?= $passenger->email ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Phone</div>
                                            <div class="media-title"><?= $passenger->phone ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Gender</div>
                                            <div class="media-title"><?= ucfirst($passenger->gender) ?></div>
                                        </div>
                                    </li>
                                    <li class="media">

                                        <div class="media-body">
                                            <div class="media-title text-muted ">Dob</div>
                                            <div class="media-title"><?= $passenger->dob ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Country</div>
                                            <div class="media-title"><?= ucfirst($passenger->country) ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Province</div>
                                            <div class="media-title"><?= ucfirst($passenger->province) ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">City</div>
                                            <div class="media-title"><?= ucfirst($passenger->city) ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Status</div>
                                            <div class="media-title"><?php echo ($passenger->status == '1') ? 'Active' : 'Inactive' ?></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
<?php $this->load->view('includes/footer'); ?>