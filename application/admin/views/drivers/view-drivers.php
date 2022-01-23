<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');

?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h4>Edit Drivers</h4>
                <a class="btn btn-success" href="<?php echo site_url() ?>edit-drivers/<?php echo $drivers->id ?>"
                   style="margin-left: 20px;">Edit Driver </a>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo site_url() ?>dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?php echo site_url() ?>drivers">Drivers</a></div>
                    <div class="breadcrumb-item">View</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card mt-2">
                            <div class="card-header">
                                <h4>User Details</h4>

                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-title text-muted ">First Name</div>
                                            <div class="media-title"><?= ucfirst($drivers->fname) ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Last Name</div>
                                            <div class="media-title"><?= ucfirst($drivers->lname) ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Email</div>
                                            <div class="media-title"><?= $drivers->email ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Phone</div>
                                            <div class="media-title"><?= $drivers->phone ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Gender</div>
                                            <div class="media-title"><?= ucfirst($drivers->gender) ?></div>
                                        </div>
                                    </li>
                                    <li class="media">

                                        <div class="media-body">
                                            <div class="media-title text-muted ">Dob</div>
                                            <div class="media-title"><?= $drivers->dob ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Country</div>
                                            <div class="media-title"><?= ucfirst($drivers->country) ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Province</div>
                                            <div class="media-title"><?= ucfirst($drivers->province) ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">City</div>
                                            <div class="media-title"><?= ucfirst($drivers->city) ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Status</div>
                                            <div class="media-title"><?php echo ($drivers->status == '1') ? 'Active' : 'Inactive' ?></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card mt-2">
                            <div class="card-header">
                                <h4>Driver Details</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Make</div>
                                            <div class="media-title"><?= ($driverInfo) ? ($driverInfo->make) ? ucfirst($driverInfo->make) : '' : '' ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Model</div>
                                            <div class="media-title"><?= ($driverInfo) ? ($driverInfo->model) ? ucfirst($driverInfo->model) : '' : '' ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Year</div>
                                            <div class="media-title"><?= ($driverInfo) ? ($driverInfo->year) ? $driverInfo->year : '' : '' ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Color</div>
                                            <div class="media-title"><?= ($driverInfo) ? ($driverInfo->color) ? ucfirst($driverInfo->color) : '' : '' ?></div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title text-muted ">Plate Number</div>
                                            <div class="media-title"><?= ($driverInfo) ? ($driverInfo->plate_number) ? $driverInfo->plate_number : '' : '' ?></div>
                                        </div>
                                    </li>
                                </ul>
                                <hr>
                                <div class="row">
                                    <?php
                                    if (!empty($driverInfo)) {
                                        foreach ($driverInfo as $key => $value) {
                                            if (!empty($key)) {
                                                if ($key != 'id' && $key != 'uid' && $key != 'make' && $key != 'model' && $key != 'year' && $key != 'color' && $key != 'plate_number') {
                                                    $photo = front_url() . $value;
                                                    ?>
                                                    <div class="col-md-3">
                                                        <article class="article article-style-b">
                                                            <div class="article-header">
                                                                <a href="<?= $photo ?>" target="_blank">
                                                                    <div class="article-image"
                                                                         data-background="<?= $photo ?>"
                                                                         style="background-image: url(<?= $photo ?>);">
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="article-details">
                                                                <div class="article-title">
                                                                    <h2><a href="<?= $photo ?>"
                                                                           target="_blank"><?= ucfirst(str_replace('_', ' ', $key)) ?></a>
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                    } else {
                                        ?>
                                    <div class="col-12 col-sm-12 col-lg-12 text-center">
                                        <div class="badge-warning p-2">No Car info added</div>
                                    </div>
                                        <?php
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card mt-2">
                            <div class="card-header">
                                <h4>Driver Subscription Details</h4>
                            </div>
                            <div class="card-body">

                                <div class="row" style="overflow-x: overlay;">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>email</th>
                                            <th>Subscription Start</th>
                                            <th>Subscription End</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Currency</th>
                                            <th>Paid Amount</th>
                                            <th>Paid Amount Currency</th>
                                            <th>Txn Id</th>
                                            <th>Payment Status</th>
                                            <th>Source Id</th>
                                            <th>Source Obj</th>
                                            <th>Card Brand</th>
                                            <th>Card Country</th>
                                            <th>Customer</th>
                                            <th>Card Exp Month</th>
                                            <th>Card Exp Year</th>
                                            <th>Card Last 4</th>
                                            <th>Created At</th>
                                            <th>Update At</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        if ($driver_sub->num_rows() > 0) {
                                            foreach ($driver_sub->result() as $row) {
                                                $now = date(strtotime("NOW"));
                                                if(strtotime($row->subscription_start) <= $now && strtotime($row->subscription_end) >= $now){
                                                    $sub_status = '<div class="badge badge-success">Active</div>';
                                                }else{
                                                    $sub_status = "<div class='badge badge-danger'>Inactive</div>";
                                                }
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=$row->id?>
                                                    </td>
                                                    <td>
                                                        <?=$row->email?>
                                                    </td>
                                                    <td>
                                                        <?=$row->subscription_start?>
                                                    </td>
                                                    <td>
                                                        <?=$row->subscription_end?>
                                                    </td>
                                                    <td>
                                                        <?=$row->item_name?>
                                                    </td>
                                                    <td>
                                                        <?=$row->description?>
                                                    </td>
                                                    <td>
                                                        <?=$row->item_price?>
                                                    </td>
                                                    <td>
                                                        <?=$row->item_price_currency?>
                                                    </td>
                                                    <td>
                                                        <?=$row->paid_amount?>
                                                    </td>
                                                    <td>
                                                        <?=$row->paid_amount_currency?>
                                                    </td>
                                                    <td>
                                                        <?=$row->txn_id?>
                                                    </td>
                                                    <td>
                                                        <?=$row->payment_status?>
                                                    </td>
                                                    <td>
                                                        <?=$row->source_id?>
                                                    </td>
                                                    <td>
                                                        <?=$row->source_obj?>
                                                    </td>
                                                    <td>
                                                        <?=$row->source_brand?>
                                                    </td>
                                                    <td>
                                                        <?=$row->source_country?>
                                                    </td>
                                                    <td>
                                                        <?=$row->source_customer?>
                                                    </td>
                                                    <td>
                                                        <?=$row->source_expMonth?>
                                                    </td>
                                                    <td>
                                                        <?=$row->source_rxp_year?>
                                                    </td>
                                                    <td>
                                                        <?=$row->source_last4?>
                                                    </td>
                                                    <td>
                                                        <?=$row->created_at?>
                                                    </td>
                                                    <td>
                                                        <?=$row->update_at?>
                                                    </td>
                                                    <td>
                                                        <?=$sub_status?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>










<?php $this->load->view('includes/footer'); ?>