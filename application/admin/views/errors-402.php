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
            <h1>403</h1>
            <div class="page-description">
            	In valid Token
            </div>
            <div class="page-search">
              <form>              	
                <div class="form-group floating-addon floating-addon-not-append">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">                          
                        <i class="fas fa-search"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <div class="mt-3">
                <a href="<?php echo base_url(); ?>dist/index">Back to Home</a>
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer mt-5">
          Copyright &copy; Stisla 2018
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('includes/js'); ?>