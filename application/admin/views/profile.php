<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h3> Profile </h3>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo site_url() ?>dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?php echo site_url() ?>rides">Profile</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
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
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">

                                <form action="<?=base_url()?>profile/update" method="post" class="needs-validation" novalidate="">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="fname" value="<?=($user->fname)?$user->fname:''?>" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the first name
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="lname" value="<?=($user->lname)?$user->lname:''?>" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the last name
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="<?=($user->email)?$user->email:''?>" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the email
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Phone</label>
                                                <input type="tel" name="phone" class="form-control" value="<?=($user->phone)?$user->phone:''?>">
                                                <div class="invalid-feedback">
                                                    Please fill this filed
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Password (keep Password empty if you do not want to update password)</label>
                                                <input type="password" name="password" class="form-control">
                                                <?= form_error('password'); ?>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Confirm Password</label>
                                                <input type="password" name="confirm_password is-invalid" class="form-control">
                                                <div class="error" style="color: red;">
                                                <?= form_error('confirm_password'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Gender</label>
                                               <select name="gender" class="form-control">
                                                   <option value="" >Select</option>
                                                   <option value="male" <?=($user->gender =='male')?'selected':''?>>Male</option>
                                                   <option value="male" <?=($user->gender =='female')?'selected':''?>>Pemale</option>
                                               </select>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Country</label>
                                                <input type="text" name="country" class="form-control" value="<?=($user->country)?$user->country:''?>">
                                                <div class="invalid-feedback">
                                                    Please fill this filed
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control" value="<?=($user->city)?$user->city:''?>">
                                                <div class="invalid-feedback">
                                                    Please fill this filed
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Province</label>
                                                <input type="text" name="province" class="form-control" value="<?=($user->province)?$user->province:''?>">
                                                <div class="invalid-feedback">
                                                    Please fill this filed
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $this->load->view('includes/footer'); ?>