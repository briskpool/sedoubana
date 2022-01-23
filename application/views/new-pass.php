<!DOCTYPE html>
<html lang="en">
  <head>
     <?php
    include 'includes/head.php';
  ?>
  </head>
  <body>
   
       <?php
    include 'includes/nav.php';
  ?>
   
    

   <section class="ftco-section ftco-animate pb-md-0 pb-4">
      <div class="container">
       
             
            
                

                
                  <div class="row block-9 justify-content-center">
            <div class="col-md-8 px-2 mb-md-5">
              <form action="<?php echo base_url();?>login/change-pass" name="reg_form" method="post" class="ftco-animate request-form">
              <h2 class="mb-2">Create New Password</h2>

              <div class="form-group ">
                <label for="" class="label">New Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="******">
              </div>
              <div class="form-group ">
                <label for="" class="label">Confirm Password</label>
                <input type="password" class="form-control" name="cpass" placeholder="******">
              </div>
              <?php
                 $data = $this->session->userdata('send_email');
                  $email = $data['email'];
              ?>
              <input type="hidden" name="email" value="<?php echo  $email;?>">
              <input type="hidden" name="user" value="<?php echo  $user;?>">
              <p class="text-danger font-small"><?php echo $msg;?></p>
              
              <div class="row px-1">
             
              <div class="form-group col-md-3 col-12 mt-3">
              <input class="nav-link btn btn-primary" value="Send" name="send" type="submit">
               
              </div>
              </div>
              
              
              
            </form>
          </div>
        </div>  
               

                
              
         
      </div>
    </section>

    
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <?php
    include 'includes/footer.php';
  ?>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


   <?php
    include 'includes/js.php';
  ?>
    
    
  </body>
</html>