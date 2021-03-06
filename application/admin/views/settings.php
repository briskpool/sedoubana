<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('includes/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>General Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo site_url() ?>dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo site_url() ?>settings">General Settings</a></div>
            </div>
        </div>
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success">
                <strong><span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->flashdata('success');
                                                                        unset($_SESSION['success']);
                                                                        ?>
                </strong>
            </div>
        <?php } else if ($this->session->flashdata('error')) {
        ?>
            <div class="alert alert-danger">
                <strong><span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->flashdata('error');
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
                                <li class="nav-item">
                                    <a class="nav-link <?= ($selected == 'ticket_setting') ? 'active' : '' ?>" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">Ticket Setting</a>
                                </li>
                                <!-- <li class="nav-item">
                                        <a class="nav-link <?= ($selected == 'email_setting') ? 'active' : '' ?>" id="profile-tab4" data-toggle="tab" href="#email-setting"
                                           role="tab" aria-controls="profile" aria-selected="false">Email
                                            Setting</a>
                                    </li> -->
                                <li class="nav-item">
                                    <a class="nav-link <?= ($selected == 'sub_setting') ? 'active' : '' ?>" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false">Subscription
                                        Setting</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-9">
                            <div class="tab-content no-padding" id="myTab2Content">
                                <div class="tab-pane fade  <?= ($selected == 'ticket_setting') ? 'show active' : '' ?>" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                                    <form action="<?= base_url() ?>settings" method="post" enctype="multipart/form-data" id="setting-form">
                                        <input type="hidden" name="type" value="ticket_setting">
                                        <div class="" id="settings">
                                            <p class="text-muted">
                                                Set up charges per ticket
                                            </p>
                                            <div class="form-group row align-items-center">
                                                <label for="ticket-title" class="form-control-label col-sm-3 text-md-right">Ticket
                                                    Title</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" name="ticket_title" value="<?= $setting->ticket_title ?>" class="form-control" id="ticket-title" required>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label for="ticket-price" class="form-control-label col-sm-3 text-md-right">Ticket
                                                    Price</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" name="ticket_price" value="<?= $setting->ticket_price ?>" class="form-control" id="ticket-price" required>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label for="ticket-currency" class="form-control-label col-sm-3 text-md-right">Ticket
                                                    Currency</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" name="ticket_currency" value="<?= $setting->ticket_currency ?>" class="form-control" id="ticket-currency" required>
                                                </div>
                                            </div>


                                            <div class=" card-footer bg-whitesmoke text-md-right">
                                                <button class="btn btn-primary" name="sub" id="save-btn">Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                                <!-- <div class="tab-pane fade <?= ($selected == 'email_setting') ? ' show active' : '' ?>" id="email-setting" role="tabpanel" aria-labelledby="profile-tab4">
                                    <form action="<?= base_url() ?>settings" method="post" enctype="multipart/form-data" id="setting-form">
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

                                </div> -->
                                <div class="tab-pane fade <?= ($selected == 'sub_setting') ? 'show active' : '' ?>" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                    <form action="<?= base_url() ?>settings" method="post" enctype="multipart/form-data" id="setting-form">
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
                                                    <select name="sub_interval" class="form-control" id="protocol" required>
                                                        <option value="day" <?= ($setting->sub_interval == 'day') ? 'selected' : '' ?>>day</option>
                                                        <option value="month" <?= ($setting->sub_interval == 'month') ? 'selected' : '' ?>>month</option>
                                                        <option value="week" <?= ($setting->sub_interval == 'week') ? 'selected' : '' ?>>week</option>
                                                        <option value="year" <?= ($setting->sub_interval == 'year') ? 'selected' : '' ?>>year</option>
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