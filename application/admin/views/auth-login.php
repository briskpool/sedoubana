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
              <div class="card-header"><h4>Login</h4></div>
                <div class="card-body">
                <form method="POST" action="<?php echo base_url();?>auth/login" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="<?php echo base_url(); ?>forgot-password" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                    <p class="text-danger text-center">
                    <?php
                    if (!empty($error_message)) {
                        echo $error_message;
                    }
                    echo validation_errors();
                    ?>
                 </p>
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

<?php $this->load->view('includes/js');