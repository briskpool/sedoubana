<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h3> Alerts </h3>
                <div class="section-header-button">
                    <a href="<?php echo site_url()?>create-alerts" class="btn btn-primary">Create Alerts</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo site_url() ?>dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?php echo site_url() ?>tickets">tickets</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php if($this->session->flashdata('success')){ ?>
                                        <div class="alert alert-success">
                                            <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
                                        </div>
                                    <?php }else if($this->session->flashdata('error')){ ?>
                                        <div class="alert alert-danger">
                                            <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('error'); ?></strong>
                                        </div>
                                    <?php } ?>
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th>Alert ID</th>
                                            <th>Message</th>
                                            <th>date Time</th>
                                            <th>Sent to users</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        if ($alerts->num_rows() > 0) {
                                            foreach ($alerts->result() as $row) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=$row->alert_id?>
                                                    </td>
                                                    <td>
                                                        <?=truncate($row->message, 80 , $type='start', $dots = "....")?>
                                                    </td>
                                                    <td>
                                                        <?=dateTimeToLocal($row->date_time)?>
                                                    </td>
                                                    <td>
                                                        <?=$row->total_users?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url()?>view-alerts/<?php echo $row->id?>" ><i class="fa fa-eye"></i> </a>
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