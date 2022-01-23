<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h3> Tickets </h3>
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
                                            <th>Ticket ID</th>
                                            <th>Customer</th>
                                            <th>Subject</th>
                                            <th>Category</th>
                                            <th>Total Messages</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        if ($tickets->num_rows() > 0) {
                                            foreach ($tickets->result() as $row) {
                                                if ($row->role == 'passenger') {
                                                    $link = base_url() . 'view-passanger/' . $row->uid;
                                                } else {
                                                    $link = base_url() . 'view-drivers/' . $row->uid;
                                                }
//                                                $bookedSeats = getSeatsBooked($row->id)->no_seats;
//                                                $depDateTime = dateTimeToLocal($row->dep_date.' '.$row->dep_time);
                                                ?>
                                                <tr>
                                                    <td>

                                                        <?= $row->ticket ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $link ?>"
                                                           target="_blank"><?= ucfirst($row->name) ?></a>
                                                    </td>
                                                    <td>
                                                        <?= $row->subject ?>
                                                    </td>
                                                    <td>
                                                        <?= $row->category ?>
                                                    </td>
                                                    <td>
                                                        <?= $row->total_chats ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row->status == 'in-progress') {
                                                            echo '<div class="badge badge-info">in-progress</div>';
                                                        } else if ($row->status == 'completed') {
                                                            echo '<div class="badge badge-success">Completed</div>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url() ?>thread/<?= $row->id ?>"
                                                           class="<?= ($row->viewed == '0') ? 'beep' : '' ?> btn btn-primary">View</a>
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