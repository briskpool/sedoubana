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
            <img src="<?= $site_logo ?>" alt="logo" style="width:60%;">
            </div>

            <div class="card card-primary">
                <div style="color: red;">
                    <?=($this->session->flashdata('flash_message'))?$this->session->flashdata('flash_message'):''?>
                </div>
              <div class="card-header"><h4>Reset Password</h4></div>

              <div class="card-body">
                <p class="text-muted">We will send a link to reset your password</p>
                <form action="<?=base_url()?>change-password" method="POST">
                <input type="hidden" name="token" value="<?=$token?>">
                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" tabindex="2" required>
                      <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="confirm-password" tabindex="2" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Reset Password
                    </button>
                  </div>
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