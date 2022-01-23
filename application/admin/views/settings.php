<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
<!--                <div class="section-header-back">-->
<!--                    <a href="http://localhost/sedouban/admin/dist/features_settings" class="btn btn-icon"><i-->
<!--                                class="fas fa-arrow-left"></i></a>-->
<!--                </div>-->
                <h1>General Settings</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo site_url() ?>dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?php echo site_url() ?>settings">General Settings</a></div>
                </div>
            </div>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success">
                    <strong><span
                                class="glyphicon glyphicon-ok"></span> <?php echo $this->session->flashdata('success'); 
                                    unset($_SESSION['success']);
                                ?>
                    </strong>
                </div>
            <?php } else if ($this->session->flashdata('error')) {
                ?>
                <div class="alert alert-danger">
                    <strong><span
                                class="glyphicon glyphicon-ok"></span> <?php echo $this->session->flashdata('error'); 
                                    unset($_SESSION['error']);
                                ?>
                    </strong>
                </div>
                <?php
            } ?>
            <div class="section-body">
                <!-- <h2 class="section-title">All About General Settings</h2>
                <p class="section-lead">
                    You can adjust all general settings here
                </p> -->

                <div id="output-status"></div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-3">
                                <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                    <!-- <li class="nav-item">
                                        <a class="nav-link <?=($selected == 'site_setting')?'active':''?>" id="home-tab4" data-toggle="tab" href="#home4"
                                           role="tab" aria-controls="home" aria-selected="true">Site Setting</a>
                                    </li> -->
                                    <!-- <li class="nav-item">
                                        <a class="nav-link <?=($selected == 'email_setting')?'active':''?>" id="profile-tab4" data-toggle="tab" href="#email-setting"
                                           role="tab" aria-controls="profile" aria-selected="false">Email
                                            Setting</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link <?=($selected == 'sub_setting')?'active':''?>" id="contact-tab4" data-toggle="tab" href="#contact4"
                                           role="tab" aria-controls="contact" aria-selected="false">Subscription
                                            Setting</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-9">
                                <div class="tab-content no-padding" id="myTab2Content">
                                    <div class="tab-pane fade  <?=($selected == 'site_setting')?'show active':''?>" id="home4" role="tabpanel"
                                         aria-labelledby="home-tab4">
                                        <form action="<?= base_url() ?>settings" method="post" enctype="multipart/form-data"
                                              id="setting-form">
                                            <input type="hidden" name="type" value="site_setting">
                                            <div class="" id="settings">
                                                <p class="text-muted">General settings such as, site title, site
                                                    description,
                                                    address and so on.</p>
                                                <div class="form-group row align-items-center">
                                                    <label for="site-title"
                                                           class="form-control-label col-sm-3 text-md-right">Site
                                                        Title</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <input type="text" name="site_title"
                                                               value="<?= $setting->site_title ?>" class="form-control"
                                                               id="site-title" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row align-items-center">
                                                    <label for="site-description"
                                                           class="form-control-label col-sm-3 text-md-right">Site
                                                        Description</label>
                                                    <div class="col-sm-6 col-md-9">
                                            <textarea class="form-control" name="site_description"
                                                      id="site-description"><?= $setting->site_description ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row align-items-center">
                                                    <label for="site-description"
                                                           class="form-control-label col-sm-3 text-md-right">Site
                                                        Nav Bar</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <select name="site_nav" class="form-control">
                                                            <option value="side" <?= ($setting->site_nav == 'side') ? 'selected' : '' ?>>
                                                                Side Navigation
                                                            </option>
                                                            <option value="top" <?= ($setting->site_nav == 'top') ? 'selected' : '' ?>>
                                                                Top Navigation
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row align-items-center">
                                                    <label class="form-control-label col-sm-3 text-md-right">Site
                                                        Logo</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <div class="custom-file">
                                                            <input type="file" name="site_logo"
                                                                   class="custom-file-input"
                                                                   id="site-logo">
                                                            <label class="custom-file-label">Choose File</label>
                                                        </div>
                                                        <div class="form-text text-muted">The image must have a
                                                            maximum size of
                                                            1MB
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row align-items-center">
                                                    <label class="form-control-label col-sm-3 text-md-right">Favicon</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <div class="custom-file">
                                                            <input type="file" name="site_favicon"
                                                                   class="custom-file-input"
                                                                   id="site-favicon">
                                                            <label class="custom-file-label">Choose File</label>
                                                        </div>
                                                        <div class="form-text text-muted">The image must have a
                                                            maximum size of
                                                            1MB
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="form-control-label col-sm-3 mt-3 text-md-right">Google
                                                        Analytics
                                                        Code</label>
                                                    <div class="col-sm-6 col-md-9">
                                            <textarea class="form-control codeeditor" name="analytics_code"
                                                      style="display: none;"><?=$setting->analytics_code?></textarea>
                                                    </div>
                                                </div>

                                                <div class="card-footer bg-whitesmoke text-md-right">
                                                    <button class="btn btn-primary" name="sub" id="save-btn">Save Changes
                                                    </button>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                    <div class="tab-pane fade <?=($selected == 'email_setting')?' show active':''?>" id="email-setting" role="tabpanel"
                                         aria-labelledby="profile-tab4">
                                        <form action="<?= base_url() ?>settings" method="post" enctype="multipart/form-data"
                                              id="setting-form">
                                            <input type="hidden" name="type" value="email_setting">
                                            <div class="" id="settings">
                                                <p class="text-muted">Email settings will be used to send email using these setup</p>
                                                <div class="form-group row align-items-center">
                                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Email protocol</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <input type="text" name="protocol" value="<?= $setting->protocol ?>" class="form-control" id="protocol" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row align-items-center">
                                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Email smtp_host</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <input type="text" name="smtp_host" value="<?= $setting->smtp_host ?>" class="form-control" id="smtp_host" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row align-items-center">
                                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Email smtp_port</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <input type="number" name="smtp_port" value="<?= $setting->smtp_port ?>" class="form-control" id="smtp_port" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row align-items-center">
                                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Email smtp_user</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <input type="text" name="smtp_user" value="<?= $setting->smtp_user ?>" class="form-control" id="smtp_user" required>
                                                    </div>
                                                </div>


                                                <div class="form-group row align-items-center">
                                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Email smtp Password</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <input type="text" name="smtp_pass" value="<?= $setting->smtp_pass ?>" class="form-control" id="smtp_pass" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row align-items-center">
                                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Email mailtype (default html)</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <input type="text" name="mailtype" value="<?= $setting->mailtype ?>" class="form-control" id="mailtype" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row align-items-center">
                                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Email charset (default html)</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <input type="text" name="charset" value="<?= $setting->charset ?>" class="form-control" id="charset" required>
                                                    </div>
                                                </div>


                                                <div class="card-footer bg-whitesmoke text-md-right">
                                                    <button type="submit" name="sub" value="sub" class="btn btn-primary" id="save-btn">Save Changes
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="tab-pane fade <?=($selected == 'sub_setting')?' show active':''?>" id="contact4" role="tabpanel"
                                         aria-labelledby="contact-tab4">
                                        <form action="<?= base_url() ?>settings" method="post" enctype="multipart/form-data"
                                              id="setting-form">
                                            <input type="hidden" name="type" value="sub_setting">
                                            <div class="" id="settings">
                                                <p class="text-muted">Subscription settings will be used to scribe user</p>
                                                <div class="form-group row align-items-center">
                                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Subscription Plan</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <input type="text" name="sub_plan" value="<?= $setting->sub_plan ?>" class="form-control" id="protocol" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row align-items-center">
                                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Subscription Interval</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <select name="sub_interval"  class="form-control" id="protocol" required>
                                                            <option value="day" <?=($setting->sub_interval=='day')?'selected':''?>>day</option>
                                                            <option value="month" <?=($setting->sub_interval=='month')?'selected':''?>>month</option>
                                                            <option value="week" <?=($setting->sub_interval=='week')?'selected':''?>>week</option>
                                                            <option value="year" <?=($setting->sub_interval=='year')?'selected':''?>>year</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row align-items-center">
                                                    <label for="sub_price" class="form-control-label col-sm-3 text-md-right">Subscription Price</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <input type="text" name="sub_price" value="<?= $setting->sub_price ?>" class="form-control" id="protocol" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row align-items-center">
                                                    <label for="sub_price" class="form-control-label col-sm-3 text-md-right">Subscription Currency</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <input type="text" name="sub_currency" value="<?= $setting->sub_currency ?>" class="form-control" id="protocol" required>
                                                    </div>
                                                </div>


                                                <div class="card-footer bg-whitesmoke text-md-right">
                                                    <button type="submit" name="sub" value="sub" class="btn btn-primary" id="save-btn">Save Changes
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
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