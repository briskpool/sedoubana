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
              <form action="<?php echo base_url();?>login/reset-password" name="login_driver" method="post" class="ftco-animate request-form">
              <h2 class="mb-2">Enter Your Email</h2>

              <div class="form-group ">
                <label for="" class="label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
              </div>
              <input type="hidden" name="user" value="<?php echo $user;?>">
            <p class="text-danger font-small"><?php echo $err_msg;?></p>
              
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