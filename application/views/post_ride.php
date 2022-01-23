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
   
   

    <section class="py-md-5 py-4 ftco-section ftco-animate">
      <div class="container">
        <div class="row justify-content-center">
         
          <div class="col-md-8 px-2 ftco-animate fadeInUp ftco-animated">
              <form class="request-form p-1 container mt-5" method="post" id="ride-form" action="<?php echo base_url();?>postride/upload-ride">
               <h3 class=" px-3 py-2 py-md-3">Post Ride</h3>
                <div class="row px-3">
                <div class="form-group col-md-6 col-12">
                  <div class="form-group">
                    <label for="" class="label">Departure Date</label>
                    <input type="text" class="form-control flatpickr" placeholder="Date" name="dep_date">
                  </div>
                </div>
                <div class="form-group col-md-6 col-12">
                  <div class="form-group">
                    <label for="" class="label">Departure Time</label>
                    <input type="text" class="form-control time-pickr" placeholder="Time" name="dep_time">
                  </div>
                </div>
              </div>
               
                <div class="row px-3">
                <div class="form-group col-md-6 col-12">
                  <div class="form-group">
                    <label for="pickup" class="label">Departure City</label>
<!--                   <input  name="dep_city" type="text" id="pickup" class="form-control" placeholder="Departure City" />-->
                      <select id="pickup" class="form-control" name="dep_city" required>
                          <option value="">Select Departure City</option>
                          <?php
                          if ($cites->num_rows() > 0) {
                              foreach ($cites->result() as $row) {
                                  ?>
                                  <option value="<?=$row->id?>"><?=$row->name?></option>
                                  <?php
                              }
                          }
                          ?>
                      </select>
                  </div>
                </div>
                
                  
                <div class="form-group col-md-6 col-12">
                  <label for="" class="label">Destination City</label>
<!--                  <input type="text" name="dest_city" id="dropoff" class="form-control" placeholder="Destination City">-->
                    <select id="dropoff" class=" form-control" name="dest_city" required>
                        <option value="">Select Destination City</option>
                        <?php
                        if ($cites->num_rows() > 0) {
                            foreach ($cites->result() as $row) {
                                ?>
                                <option value="<?=$row->id?>"><?=$row->name?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                </div>
                 
                <div class="row px-3 mb-2">
                <div class="form-group col-md-6 col-12">
                  <div class="form-group">
                    <label for="" class="label">Pickup Point</label>
                  <input type="text" name="pickup" class="form-control" id="autocomplete_search" onfocus="initialize('autocomplete_search','lat','long')" placeholder="Pickup Location">
                   <input type="hidden" name="lat">
                    <input type="hidden" name="long">
                  </div>
                </div>
                
                  
                <div class="form-group col-md-6 col-12">
                  <label for="" class="label">Drop-off Point</label>
                  <input type="text" name="dropoff" onfocus="initialize('autocomplete_search1','lat1','long1')" class="form-control" id="autocomplete_search1" placeholder="Drop-off Location">
                  <input type="hidden" name="lat1">
                    <input type="hidden" name="long1">
                </div>
                </div>
                <div class="row px-3">
                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label for="" class="label">Number of Seats</label>
                  <select name="seats" class="form-control">
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                   <option value="6">6</option>
                 </select>
                  </div>
                </div>
                
                  
                <div class="col-md-6 ">
                

                  <label for="" class="label ">Price Per Pessenger <i tabindex="0" class="fas fa-question-circle text-small ml-1 " role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="This will calculate the average trip fuel cost. Driver can set any price per passenger."></i></label>
                  <div class="input-group mb-4">
                    <input type="text" class="form-control" name="price" placeholder="$80" >
                   <!--  <div class="input-group col-md-4 ml-0 px-0">
                      <button class="btn btn-outline-primary rounded col-12" type="button" >Generate Price</button>
                    </div> -->
                  </div>
                  
                </div>
                </div>
                <div class="row px-3">
                    <div class="form-group col">
                      <label for="comment" class="label">Additional Information</label>
                      <textarea class="form-control" rows="5" name="details" id="comment"></textarea>
                    </div>
                </div>
                <div class="row px-3">
                    <div class="form-group col-md-4">
                     <button type="submit" class="btn btn-primary rounded">Submit</button>
                    </div>
                </div>
                
              
              </form>
            
        
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