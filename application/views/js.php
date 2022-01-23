 <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/aos.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.timepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/scrollax.min.js"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo base_url(); ?>assets/js/google-map.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap-select.js"></script>
 <!-- <script src="//geodata.solutions/includes/countrystatecity.js"></script> -->

  <script>
    flatpickr('.flatpickr',{
      enableTime: false,
      dateFormat: "Y-m-d"
});
    flatpickr('.flatpickr-range',{
      enableTime: false,
      mode: "range",
      minDate: "today",
      dateFormat: "Y-m-d"
});

  flatpickr('.time-pickr',{
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i K"
});
  $(function () {
  $('[data-toggle="popover"]').popover({
    html:true
  })
})
  $('.popover').popover({
  trigger: 'focus'
})
        //    $('input[type="file"]').change(function(e){
        //     var fileName = e.target.files[0].name;
        //     document.getElementById("driver").innerHTML=fileName;
        //     document.getElementById("file").innerHTML=fileName;
        //     document.getElementById("file2").innerHTML=fileName;

        // });


   function chooseFile() {
      $(".custom-file-input").click();
   }

// function validate(){

// var country = $('.fstselected');
// // var city = $('city');
// // var province = $('province');




//   if (country.text()=='Choose Country...') {

//     document.getElementById('err_country').innerHTML='required';
//     return false;
//   }
//   else if (city.empty()) {
//     document.getElementById('err_city').innerHTML='required';
//     return false;
//   }
//   else if (province.empty()) {
//     document.getElementById('err_province').innerHTML='required';
//     return false;
//   }


// }
// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='p_form']").validate({

    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      fname:  "required",
      lname:  "required",
      gender: "required",
      dob:    "required",
      country: "required",
      city: "required",
      state: "required",

      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      phone: "required",
      password: "required",
      cpass: "required",
    },
    // Specify validation error messages
    messages: {
      fname: "required",
      lname: "required",
      gender: "required",
      dob: "required",
      country: "required",
      city: "required",
      state: "required",
      email: "required",
      phone: "required",
      password: "required",
      cpass: "required"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='d_form']").validate({

    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      fname:  "required",
      lname:  "required",
      gender: "required",
      dob:    "required",
      country: "required",
      city: "required",
      state: "required",

      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      phone: "required",
      password: "required",
      cpass: "required",
    },
    // Specify validation error messages
    messages: {
      fname: "required",
      lname: "required",
      gender: "required",
      dob: "required",
      country: "required",
      city: "required",
      state: "required",
      email: "required",
      phone: "required",
      password: "required",
      cpass: "required"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>


 <script>
function createOptions(number) {
  var options = [], _options;

  for (var i = 0; i < number; i++) {
    var option = '<option value="' + i + '">Option ' + i + '</option>';
    options.push(option);
  }

  _options = options.join('');

  // $('#number')[0].innerHTML = _options;
  // $('#number-multiple')[0].innerHTML = _options;

  // $('#number2')[0].innerHTML = _options;
  // $('#number2-multiple')[0].innerHTML = _options;
}

var mySelect = $('#first-disabled2');

createOptions(4000);

$('#special').on('click', function () {
  mySelect.find('option:selected').prop('disabled', true);
  mySelect.selectpicker('refresh');
});

$('#special2').on('click', function () {
  mySelect.find('option:disabled').prop('disabled', false);
  mySelect.selectpicker('refresh');
});

$('#basic2').selectpicker({
  liveSearch: true,
  maxOptions: 1
});
</script>