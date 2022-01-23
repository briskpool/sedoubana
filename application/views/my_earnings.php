<!DOCTYPE html>
<html lang="en">
  <head>
     <?php
    include 'includes/head.php';
  ?>
  </head>
  <body>
   
       <?php
    include 'includes/profile-nav.php';
  ?>
   
   

    <section class="ftco-section ftco-animate pb-4">
      <div class="container">
        <div class="row px-2">
         
            <div class="col-md-8">
              <h5>My Earnings</h5>
            </div>
            
            
         
          <div class="col-md-12 pt-2 pb-2 request-form ftco-animate fadeInUp ftco-animated">
              
                <!-- <div class="ribbon-running"><span>In-Progress</span></div> -->
              <!-- <a href="#" class="badge badge-primary">Primary</a> -->
                <div class="row ">
                    <div class="col-md-3 text-center col-12">
                     <span class="font-extra-small">Net Income</span> 
                    <h4  class=" text-dark">$100</h4 > 
                    </div>
                    <div class="col-md-3 text-center col-12">
                      <span  class="font-extra-small">Withdrawn</span> 
                    <h4  class=" text-dark">$40</h4 >
                    </div>
                    <div class="col-md-3 text-center col-12">
                      <span  class="font-extra-small">Pending Clearance</span> 
                    <h4  class=" text-dark">$50</h4 >
                    </div>
                    <div class="col-md-3 text-center col-12">
                      <span class=" font-extra-small">Available for Withdrawal</span> 
                     <button type="submit" class="w-75 py-1 btn btn-dark rounded">Withdraw $60</button>
                    </div>
                    
                </div>
               </div>
               <div class="col-md-12 mt-2 py-2 d-none d-lg-block d-md-block request-form ftco-animate fadeInUp ftco-animated">
              
                <!-- <div class="ribbon-running"><span>In-Progress</span></div> -->
              <!-- <a href="#" class="badge badge-primary">Primary</a> -->
               
                <div class="row border-bottom">
                    <div class="col-md-2  col-4">
                     <span class="font-extra-small">DATE</span> 
                    
                    </div>
                    <div class="col-md-8  col-4">
                      <span class="font-extra-small">FOR</span> 
                    
                    </div>
                    <div class="col-md-2 col-4">
                      <span class="font-extra-small float-right">AMOUNT</span> 
                    
                    </div>
                    
                    
                </div>
                <div class="row pt-2 pb-2 row-hover">
                    <div class="col-md-2   col-4">
                    <p  class=" text-dark mb-0 font-extra-small">09-09-2019</p > 
                    </div>
                    <div class="col-md-8 col-4">
                     <p  class=" text-dark mb-0  font-extra-small">  Gig Purchased from Revenues <a href="# " class="font-extra-small">(view order)</a></p > 
                    </div>
                    <div class="col-md-2 col-4">
                     <p  class=" text-dark  mb-0 font-extra-small float-right">$100</p > 
                    </div>
                    
                    
                </div>
                 <div class="row pt-2 pb-2 row-hover">
                    <div class="col-md-2   col-4">
                    <p  class=" text-dark mb-0 font-extra-small">09-09-2019</p > 
                    </div>
                    <div class="col-md-8 col-4">
                     <p  class=" text-dark mb-0  font-extra-small">  Gig Purchased from Revenues <a href="#" class="font-extra-small">(view order)</a></p > 
                    </div>
                    <div class="col-md-2 col-4">
                     <p  class=" text-dark  mb-0 font-extra-small float-right">$100</p > 
                    </div>
                    
                    
                </div>
                 <div class="row pt-2 pb-2 row-hover">
                    <div class="col-md-2   col-4">
                    <p  class=" text-dark mb-0 font-extra-small">09-09-2019</p > 
                    </div>
                    <div class="col-md-8 col-4">
                     <p  class=" text-dark mb-0  font-extra-small">  Gig Purchased from Revenues <a href="#" class="font-extra-small">(view order)</a></p > 
                    </div>
                    <div class="col-md-2 col-4">
                     <p  class=" text-dark  mb-0 font-extra-small float-right">$100</p > 
                    </div>
                    
                    
                </div>
                 <div class="row pt-2 pb-2 row-hover">
                    <div class="col-md-2   col-4">
                    <p  class=" text-dark mb-0 font-extra-small">09-09-2019</p > 
                    </div>
                    <div class="col-md-8 col-4">
                     <p  class=" text-dark mb-0  font-extra-small">  Gig Purchased from Revenues <a href="#" class="font-extra-small">(view order)</a></p > 
                    </div>
                    <div class="col-md-2 col-4">
                     <p  class=" text-dark  mb-0 font-extra-small float-right">$100</p > 
                    </div>
                    
                    
                </div>


               </div>
               <!--for mobile screen-->
               <div class="col-md-12 mt-2 py-2 d-block d-lg-none d-md-none request-form ftco-animate fadeInUp ftco-animated">
              
                <!-- <div class="ribbon-running"><span>In-Progress</span></div> -->
              <!-- <a href="#" class="badge badge-primary">Primary</a> -->
               
                <div class="row border-bottom">
                    <div class="col-5">
                     <span class="font-extra-small">DATE</span> 
                    
                    </div>
                    <div class="col-4">
                      <span class="font-extra-small">FOR</span> 
                    
                    </div>
                    <div class="col-3">
                      <span class="font-extra-small float-right">AMOUNT</span> 
                    
                    </div>
                    
                    
                </div>
        <?php $i='abc1'; 
              while ($i<'abc5'){ ?>
                <div class="row pt-2 pb-2">
                    <div class="col-5 ">
                    <p  class=" text-dark mb-0 font-extra-small">09-09-2019</p > 
                    </div>
                    <div class="col-4  ">
                     <p class=" text-primary mb-0  font-extra-small " data-toggle="collapse" href="#<?php echo $i;?>" role="button" aria-expanded="false" aria-controls="<?php echo $i;?>">Details</p > 

                    </div>
                    <div class="col-3  ">
                     <p  class=" text-dark  mb-0 font-extra-small float-right">$100</p > 
                    </div>
                    <div class=" col-12 collapse-color font-extra-small  collapse" id="<?php echo $i;?>">

                       <p class="mb-0 py-1">Funds Cleared <a href="#" class="font-extra-small">(view More)</a></p> 
                      </div>
                    
                </div>

        <?php
          $i++;
        }?>
              
                


               </div>
               
            </div>
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