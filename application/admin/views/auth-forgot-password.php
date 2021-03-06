<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
$settings = getSettings();
$site_logo = front_url().$settings->site_logo;
?>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <a href="<?=base_url()?>"><img src="<?= $site_logo ?>" alt="logo" style="width:60%;"></a>
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Forgot Password</h4></div>

              <div class="card-body">
                <p class="text-muted">We will send a link to reset your password</p>
                <form action="<?=base_url()?>reset-password" method="POST" >
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Forgot Password
                    </button>
                  </div>
                  <?php 
                    if($this->session->userdata('Success')) {
                  ?>
                      <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('Success');?>
                      </div>
                  <?php 
                    }
                  ?>

                  <?php 
                    if($this->session->userdata('error')) {
                  ?>
                      <div class="alert alert-warning" role="alert">
                        <?= $this->session->flashdata('error');?>
                      </div>
                  <?php 
                    }
                  ?>
                  
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Sedoubana <?=date("Y")?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('includes/js'); ?>