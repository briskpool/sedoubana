<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
?>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <div class="page-description">
            	Password Changes successfully
            </div>
            <div class="page-search">
              <div class="mt-3">
                <a href="<?php echo base_url(); ?>auth/login" class="btn btn-success btn-lg">Login </a>
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer">
            Copyright &copy; Sedoubana <?=date("Y")?>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('includes/js'); ?>