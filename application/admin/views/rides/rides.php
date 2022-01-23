<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h4> Rides </h4>
                <div class="section-header-button">
                    <a href="<?php echo site_url()?>add-ride" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo site_url() ?>dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?php echo site_url() ?>rides">Rides</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php if ($this->session->flashdata('success')) { ?>
                                        <div class="alert alert-success">
                                            <strong><span
                                                        class="glyphicon glyphicon-ok"></span> <?php echo $this->session->flashdata('success'); ?>
                                            </strong>
                                        </div>
                                    <?php } else if ($this->session->flashdata('error')) {
                                        ?>
                                        <div class="alert alert-danger">
                                            <strong><span
                                                        class="glyphicon glyphicon-ok"></span> <?php echo $this->session->flashdata('error'); ?>
                                            </strong>
                                        </div>
                                        <?php
                                    } ?>
                                    <table class="table table-striped dataTable" id="table-1">
                                        <thead>
                                        <tr>
                                            <th>Driver Name</th>
                                            <th>Dep Date</th>
                                            <th>Dep Time</th>
                                            <th>Dep City</th>
                                            <th>Dest City</th>
                                            <th>Seats</th>
                                            <th>Seats Booked</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        if ($rides->num_rows() > 0) {
                                            foreach ($rides->result() as $row) {
                                                $bookedSeats = getSeatsBooked($row->id)->no_seats;
                                                $depDateTime = dateTimeToLocal($row->dep_date.' '.$row->dep_time);
                                                $dep_city =  (getCity($row->dep_city))?getCity($row->dep_city)->name:'';
                                                $dest_city =  (getCity($row->dest_city))?getCity($row->dest_city)->name:'';
                                                ?>
                                                <tr>
                                                    <td>
                                                        <a href="<?=base_url()?>view-drivers/<?=$row->driver_id?>" target="_blank"><?=ucfirst($row->dirver_name)?></a>
                                                    </td>
                                                    <td>
                                                        <?=$row->dep_date?>
                                                    </td>
                                                    <td>
                                                        <?=$row->dep_time?>
                                                    </td>
                                                    <td>
                                                        <?=$dep_city?>
                                                    </td>
                                                    <td>
                                                        <?=$dest_city?>
                                                    </td>
                                                    <td>
                                                        <?=$row->seats?>
                                                    </td>
                                                    <td>
                                                        <?=($bookedSeats)?$bookedSeats:'0'?>
                                                    </td>
                                                    <td>
                                                        <?=(isGreaterThenNow($depDateTime))? 'Pending':'Completed';?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url()?>view-ride/<?php echo $row->id?>" ><i class="fa fa-eye"></i> </a>
                                                        <a href="<?php echo site_url()?>edit-ride/<?php echo $row->id?>" ><i class="fa fa-edit"></i></a>
                                                        <a href="<?php echo site_url()?>delete-ride/<?php echo $row->id?>" onclick="return confirm('are you sure to delete')"><i class="fa fa-trash"></i></a>
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