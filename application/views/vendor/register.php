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
    <!-- END nav -->
    

    <section class="ftco-section ftco-animate pb-md-0 pb-4">
      <div class="container">
        <div class="row block-9 justify-content-center">
          <div class="col-md-8 mb-md-5 px-2">
            <form action="<?php echo base_url();?>register/sendData" enctype="multipart/form-data" method="post" class="ftco-animate request-form" name="reg_form" onsubmit="return validate()" >
              <h2 class="mb-3">Passenger Registration</h2>
              <div class="row px-1 mb-3">
                <div class="col-md-6 col-12">
                  <span class="text-dark font-small" id="reg_text">REGISTER WITH</span>
                  <img src="<?php echo base_url();?>assets/images/gm-logo.svg" id="googleSignIn" width="50px"> 
                  <img src="<?php echo base_url();?>assets/images/fb-logo.svg" id="reg_p" width="50px">                  
  
                </div>
                
              </div>
              <div class="row px-1">
                <div class="form-group col-md-6 col-12">
                    <label class="label">First Name</label>
                    <input type="text" name="fname" id="p_fname" class="form-control"  placeholder="First name">
                    <span id="err_fname"></span>
                  </div>
                
                  <div class="form-group col-md-6 col-12">
                  
                    <label for="" class="label">Last Name</label>
                    <input type="text" name="lname" id="p_lname" class="form-control"  placeholder="Last name">
                    <span id="err_lname"></span>
              </div>
            </div>
              <div class="row px-1">
                <div class="form-group col-md-6 col-12">
                 
                    <label class="label">Gender</label>
                   <select name="gender"  class="form-control">
                        <option value="">Choose Gender...</option>
                       <option value="male">Male</option>
                       <option value="female">Female</option>
                     </select>
                    <span id="err_gender"></span>
                  </div>
               
                 
              <div class="form-group col-md-6 col-12">
                <label for="" class="label">Date of birth</label>
               <input type="text" name="dob" class="form-control flatpickr" placeholder="Date">
              <span id="err_dob"></span>
              </div>
              </div>
               
              <div class="row px-1">
               
                 <div class="form-group col-md-4 col-12">
                  <label for="" class="label">Country</label>
                  <select name="country" class="form-control countries order-alpha"  id="countryId" >
                     <option value="">Select Country</option>
                  
                 </select>
                <p id="err_country" class="error"></p>
                </div>
                
               
                <div class="form-group col-md-4 col-12">
                   <label for="" class="label">Province / State</label>
                   <select name="state" class=" form-control states order-alpha"  id="stateId">
                       <option value="">Select State</option>
                  
                 </select>
                  <span id="err_province" class="error"></span>
                </div>

                 <div class="form-group col-md-4 col-12">
                  <label for="" class="label">City</label>
                  <select name="city" class=" form-control cities order-alpha"  id="cityId">
                     <option value="">Select City</option>
                  
                 </select>
                 <span id="err_city" class="error"></span>
                </div>
              </div>
             
              <div class="row px-1">
              <div class="form-group col-md-6 col-12">
                <label for="" class="label">Email</label>
                <input type="email" name="email" id="p_email" class="form-control" placeholder="Email">
                <span id="err_email"></span>
              </div>
              <div class="form-group col-md-6 col-12">
                <label for="" class="label">Phone Number</label>
                <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                <span id="err_phone"></span>
              </div>
              </div>
              <div class="row px-1">
              <div class="form-group col-md-6 col-12">
                <label for="" class="label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                <span id="err_pass"></span>
              </div>
              <div class="form-group col-md-6 col-12">
                <label for="" class="label">Confirm Password</label>
                <input type="password" name="cpass" class="form-control" placeholder="Confirm Password">
                <span id="err_cpass"></span>
              </div>
              <input type="hidden" name="photo" id="profile_picture">
              </div>
              <div class="row px-1">
              <div class="form-group col-md-3 col-12 mt-3">
                <input type="submit" value="Register" name="register" class="nav-link btn btn-primary ">
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
<script>

  function getData() {
  FB.api('/me','GET', {fields: 'name,email,id,picture.width(500).height(500)'}, (response) => {
    // document.getElementById('response').innerHTML = 'Hello ' + response.name;
    var name=response.name;
    var fname=name.split(" ");
    var email=response.email;
    var picture=response.picture.data.url;
    $('#p_fname').val(fname[0]);
    $('#p_lname').val(fname[1]+' '+fname[2]);
    $('#p_email').val(email);
    $('#profile_picture').val(picture);
    $('#p_fname').prop("disabled", true);
    $('#p_lname').prop("disabled", true);
    $('#p_email').prop("disabled", true);
    $('#reg_p').hide();
    $('#googleSignIn').hide();
    $('#reg_text').text('Complete Registration');
    console.log('Hello ' +fname[0]+' '+email);
  });
}

window.fbAsyncInit = () => {
  //SDK loaded, initialize it
  FB.init({
    appId      : '2461715094059592',
    xfbml      : true,
    version    : 'v4.0'
  });

  //check user session and refresh it
  // FB.getLoginStatus((response) => {
  //   if (response.status === 'connected') {
  //     //user is authorized
  //      document.getElementById('reg_p').style.display = 'none';
  //     getUserData();
  //   } else {
  //     //user is not authorized
  //   }
  // });
};

//load the JavaScript SDK
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.com/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

//add event listener to login button
document.getElementById('reg_p').addEventListener('click', function(){
  //do the login
  FB.login((response) => {
    if (response.authResponse) {
      //user just authorized your app
      // document.getElementById('reg_p').style.display = 'none';
      getData();
    }
  }, {scope: 'email,public_profile', return_scopes: true});
}, false);

</script> 

    
  </body>
</html>