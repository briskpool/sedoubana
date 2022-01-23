<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h4>Passenger</h4>
                <div class="section-header-button">
                    <a href="<?php echo site_url()?>add-passenger" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo site_url()?>dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item">Passengers</div>
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
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Name</th>
                                            <th>email</th>
                                            <th>phone</th>
                                            <th>gender</th>
                                            <th>address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        if ($data->num_rows() > 0) {
                                            foreach ($data->result() as $row) {
                                            ?>
                                                <tr>
                                                    <td>
                                                    <?=$row->id?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $photo = base_url().'assets/img/avatar/avatar-5.png';
                                                        if($row->photo){
                                                            $photo = front_url().$row->photo;
                                                        }
                                                        ?>
                                                        <img alt="image"
                                                             src="<?php echo $photo; ?>"
                                                             class="rounded-pill" width="35" data-toggle="tooltip"
                                                             title="Wildan Ahdian">
                                                       <?=$row->fname.' '.$row->lname?>
                                                    </td>
                                                    <td>
                                                        <?=$row->email?>
                                                    </td>
                                                    <td>
                                                        <?=$row->phone?>
                                                    </td>
                                                    <td>
                                                        <?=$row->gender?>
                                                    </td>
                                                    <td>
                                                        Country:<?=$row->country?>
                                                        Province:<?=$row->province?>
                                                        City:<?=$row->city?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if($row->status == '1'){
                                                            ?>
                                                            <div class="badge badge-success">Active</div>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <div class="badge badge-danger">Inactive</div>
                                                            <?php
                                                        }
                                                        ?>

                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url()?>view-passenger/<?php echo $row->id?>" ><i class="fa fa-eye"></i> </a>
                                                        <a href="<?php echo site_url()?>edit-passenger/<?php echo $row->id?>" ><i class="fa fa-edit"></i></a>
                                                        <a href="<?php echo site_url()?>delete-passenger/<?php echo $row->id?>" onclick="return confirm('are you sure to delete')"><i class="fa fa-trash"></i></a>
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