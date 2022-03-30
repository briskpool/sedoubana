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
<!-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> -->
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-select.js"></script>
<script src="<?php echo base_url(); ?>assets/js/star-rating.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<!-- <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script> -->
<!-- <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" /> -->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVELSX6ErxUO5vgrxO_z9SHZyf_RvdP3w&libraries=places"></script>
<?php
if ($this->uri->segment(1) == 'register' || ($this->uri->segment(1) == 'profile' && $this->uri->segment(2) == 'edit') || ($this->uri->segment(1) == 'passenger-profile' && $this->uri->segment(2) == 'edit')) { ?>
    <script src="//geodata.solutions/includes/countrystatecity.js"></script>
<?php } ?>
<script>
    flatpickr('.flatpickr', {
        enableTime: false,
        dateFormat: "Y-m-d"
    });
    flatpickr('.flatpickr-range', {
        enableTime: false,
        mode: "range",
        minDate: "today",
        dateFormat: "Y-m-d"
    });

    flatpickr('.time-pickr', {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i K"
    });
    $(function() {
        $('[data-toggle="popover"]').popover({
            html: true
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

    function chooseFileClick(image) {
        $("#" + image).click();
    }

    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        document.getElementById("file").innerHTML = fileName;
    });


    // Wait for the DOM to be ready
    $(function() {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form[name='reg_form']").validate({

            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                fname: "required",
                lname: "required",
                gender: "required",
                dob: "required",
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
                cpass: {

                    equalTo: "#password"
                }
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
                cpass: "Password does not match"
            },
            focusCleanup: true
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            // submitHandler: function(form) {
            //   form.submit();
            // }
        });
    });

    $(function() {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form[name='login_driver']").validate({

            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side

                email: {
                    required: true,
                    // Specify that email should be validated
                    // by the built-in "email" rule
                    email: true
                },

                password: "required",

            },
            // Specify validation error messages
            messages: {
                email: "required",
                password: "required"
            },

            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

    $(function() {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form[name='login_passenger']").validate({

            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side

                email: {
                    required: true,
                    // Specify that email should be validated
                    // by the built-in "email" rule
                    email: true
                },

                password: "required",

            },
            // Specify validation error messages
            messages: {
                email: "required",
                password: "required"
            },

            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
<?php if ($this->uri->segment(1) == 'register') { ?>
    <script src="https://apis.google.com/js/platform.js?onload=onLoadGoogleCallback" async defer></script>

    <script>
        function onLoadGoogleCallback() {
            gapi.load('auth2', function() {
                auth2 = gapi.auth2.init({
                    client_id: '797954574958-s1fhh9j1bg9hv0p68a9jht6r8frhobgi.apps.googleusercontent.com',
                    cookiepolicy: 'single_host_origin',
                    scope: 'profile email'
                });

                auth2.attachClickHandler(element, {},
                    function(googleUser) {
                        var user = googleUser.getBasicProfile();
                        console.log(googleUser);
                        $('#p_fname').val(user.getGivenName());
                        $('#p_lname').val(user.getFamilyName());
                        $('#p_email').val(user.getEmail());
                        $('#profile_picture').val(user.getImageUrl());
                        $('#p_fname').prop("readonly", true);
                        $('#p_lname').prop("readonly", true);
                        $('#p_email').prop("readonly", true);
                        //$('#p_fname').addClass('bg-dark');
                        $('#googleSignIn').hide();
                        $('#reg_p').hide();
                        $('#reg_text').text('Complete Registration');

                    },
                    function(error) {
                        console.log('Sign-in error', error);
                    }
                );

            });
            element = document.getElementById('googleSignIn');

        }
    </script>
    <script>
        function getData() {
            FB.api('/me', 'GET', {
                fields: 'first_name,last_name,name,email,id,picture.width(500).height(500)'
            }, (response) => {
                // document.getElementById('response').innerHTML = 'Hello ' + response.name;
                var name = response.name;
                var fname = response.first_name;
                var lname = response.last_name;
                var email = response.email;
                var picture = response.picture.data.url;
                $('#p_fname').val(fname);
                $('#p_lname').val(lname);
                $('#p_email').val(email);
                $('#profile_picture').val(picture);
                $('#p_fname').prop("readonly", true);
                $('#p_lname').prop("readonly", true);
                $('#p_email').prop("readonly", true);
                $('#reg_p').hide();
                $('#googleSignIn').hide();
                $('#reg_text').text('Complete Registration');
                console.log('Hello ' + fname[0] + ' ' + email);
            });
        }

        window.fbAsyncInit = () => {
            //SDK loaded, initialize it
            FB.init({
                appId: '468495884374002',
                xfbml: true,
                version: 'v9.0'
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
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.com/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        //add event listener to login button
        document.getElementById('reg_p').addEventListener('click', function() {
            //do the login
            FB.login((response) => {
                if (response.authResponse) {
                    //user just authorized your app
                    // document.getElementById('reg_p').style.display = 'none';
                    getData();
                }
            }, {
                scope: 'email,public_profile',
                return_scopes: true
            });
        }, false);
    </script>
<?php } ?>


<!--Social Login-->
<?php if ($this->uri->segment(1) == 'Auth') { ?>
    <script src="https://apis.google.com/js/platform.js?onload=onLoadGoogleCallback" async defer></script>

    <script>
        function onLoadGoogleCallback() {
            gapi.load('auth2', function() {
                auth2 = gapi.auth2.init({
                    client_id: '797954574958-s1fhh9j1bg9hv0p68a9jht6r8frhobgi.apps.googleusercontent.com',
                    cookiepolicy: 'single_host_origin',
                    scope: 'profile email'
                });

                auth2.attachClickHandler(element, {},
                    function(googleUser) {
                        var user = googleUser.getBasicProfile();
                        console.log(googleUser);
                        var email = user.getEmail();
                        var user = "passenger";
                        $('#googleSignIn_p').hide();
                        $('#log_p').hide();

                        $.post('<?php echo base_url() ?>login/socialLogin', {
                            email: email,
                            user: user
                        }, function(data, status) {


                            if (data == 'logged in') {
                                window.location.assign('<?php echo base_url(); ?>passenger-profile');

                            } else if (data == 'false') {
                                $('#p_text').html('Please <a href="<?php echo base_url(); ?>register">Register</a> first');
                            }
                        });

                    },
                    function(error) {
                        console.log('Sign-in error', error);
                    }
                );
                auth2.attachClickHandler(element2, {},
                    function(googleUser) {
                        var user = googleUser.getBasicProfile();
                        console.log(googleUser);
                        var email = user.getEmail();
                        var user = "driver";
                        $('#googleSignIn_d').hide();
                        $('#log_d').hide();

                        $.post('<?php echo base_url() ?>login/socialLogin', {
                            email: email,
                            user: user
                        }, function(data, status) {


                            if (data == 'logged in') {
                                window.location.assign('<?php echo base_url(); ?>profile');

                            } else if (data == 'false') {
                                $('#d_text').html('Please <a href="<?php echo base_url(); ?>register">Register</a> first');
                            }
                        });

                    },
                    function(error) {
                        console.log('Sign-in error', error);
                    }
                );

            });
            element = document.getElementById('googleSignIn_p');
            element2 = document.getElementById('googleSignIn_d');

        }
    </script>
    <script>
        function getData() {
            FB.api('/me', 'GET', {
                fields: 'email'
            }, (response) => {
                var email = response.email;
                var user = "passenger";
                $('#log_p').hide();
                $('#googleSignIn_p').hide();
                $.post('<?php echo base_url() ?>login/socialLogin', {
                    email: email,
                    user: user
                }, function(data) {


                    if (data == 'logged in') {
                        window.location.assign('<?php echo base_url(); ?>passenger-profile');

                    } else if (data == 'false') {
                        $('#p_text').html('Please <a href="<?php echo base_url(); ?>register">Register</a> first');
                    }
                });

            });
        }

        function getData_d() {
            FB.api('/me', 'GET', {
                fields: 'email'
            }, (response) => {
                var email = response.email;
                var user = "driver";
                $('#log_d').hide();
                $('#googleSignIn_d').hide();
                $.post('<?php echo base_url() ?>login/socialLogin', {
                    email: email,
                    user: user
                }, function(data) {


                    if (data == 'logged in') {
                        window.location.assign('<?php echo base_url(); ?>profile');

                    } else if (data == 'false') {
                        $('#d_text').html('Please <a href="<?php echo base_url(); ?>register">Register</a> first');
                    }
                });

            });
        }

        window.fbAsyncInit = () => {
            //SDK loaded, initialize it
            FB.init({
                appId: '468495884374002',
                xfbml: true,
                version: 'v9.0'
            });

            //check user session and refresh it
            // FB.getLoginStatus((response) => {
            //   if (response.status === 'connected') {
            //     //user is authorized
            //     getData();
            //   } else {
            //     //user is not authorized
            //   }
            // });
        };

        //load the JavaScript SDK
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.com/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        //add event listener to login button
        document.getElementById('log_p').addEventListener('click', function() {
            //do the login
            FB.login((response) => {
                if (response.authResponse) {
                    //user just authorized your app
                    // document.getElementById('reg_p').style.display = 'none';
                    getData();
                }
            }, {
                scope: 'email,public_profile',
                return_scopes: true
            });
        }, false);


        //add event listener to login button
        document.getElementById('log_d').addEventListener('click', function() {
            //do the login
            FB.login((response) => {
                if (response.authResponse) {
                    //user just authorized your app
                    // document.getElementById('reg_p').style.display = 'none';
                    getData_d();
                }
            }, {
                scope: 'email,public_profile',
                return_scopes: true
            });
        }, false);
    </script>
<?php } ?>
<script>
    $("#check").change(function() {
        console.log($(this).val());
        if (this.checked) {
            $("#defaultCheck1").attr("disabled", true);
            $('#label-defaultCheck1').addClass('disabled')
        } else {
            $("#defaultCheck1").attr("disabled", false);
            $('#label-defaultCheck1').removeClass('disabled')
        }
    });
    $("#defaultCheck1").change(function() {
        console.log($(this).val());
        if (this.checked) {
            $("#check").attr("disabled", true);
            $('#label-check').addClass('disabled')
        } else {
            $("#check").attr("disabled", false);
            $('#label-check').removeClass('disabled')
        }
    });
    // $("#defaultCheck2").change(function() {
    //     console.log($(this).val());
    //     if (this.checked) {
    //         $("#check").attr("disabled", true);
    //         $('#label-check').addClass('disabled')
    //     } else {
    //         $("#check").attr("disabled", false);
    //         $('#label-check').removeClass('disabled')
    //     }
    // });
    // $(document).ready(function() {
    //     $("#check").change(function() {
    //         if (this.checked) {
    //             $("#defaultCheck1").attr("disabled", true);
    //             $('#label-defaultCheck1').addClass('disabled')
    //         } else {
    //             $("#defaultCheck1").attr("disabled", false);
    //             $('#label-defaultCheck1').removeClass('disabled')
    //         }
    //     });
    //     $("#defaultCheck1").change(function() {
    //         if (this.checked) {
    //             $("#check").attr("disabled", true);
    //             $('#label-check').addClass('disabled')
    //         } else {
    //             $("#check").attr("disabled", false);
    //             $('#label-check').removeClass('disabled')
    //         }
    //     });
    //     // $("#defaultCheck2").change(function () {
    //     //     if(this.checked){
    //     //         $("#check").attr("disabled", true);
    //     //         $('#label-check').addClass('disabled')
    //     //     }else{
    //     //         $("#check").attr("disabled", false);
    //     //         $('#label-check').removeClass('disabled')
    //     //     }
    //     // });
    // });

    function readURL(input, id, imgId, imgName, icon) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#' + id).css('background-image', 'url(' + e.target.result + ')');

            };
            reader.readAsDataURL(input.files[0]);

            var data = new FormData();
            $.each($('#' + imgId)[0].files, function(i, file) {
                data.append(imgName, file);
            });

            $('#' + icon).attr('src', '<?php echo base_url(); ?>assets/images/loading.gif');
            var url = '<?php echo base_url(); ?>' + 'profile/uploadImage/' + imgName;
            $.ajax({
                url: url,
                type: 'POST',
                processData: false,
                data: data,
                contentType: false,
                success: function(response) {
                    if (response == 'ok') {
                        console.log(response);

                        $('#' + icon).attr('src', '<?php echo base_url(); ?>assets/images/check-mark.svg');
                    } else {
                        console.log(response);
                        $('#' + icon).attr('src', '<?php echo base_url(); ?>assets/images/error.svg');

                        swal("Failed", $(response).text(), "error");
                    }
                }
            })
        }

    }

    $('#not-approved').click(function() {
        swal("Account Not Approved", "Chalo Yar tang na kar", "error");
    });

    $('#from-btn').click(function() {
        $('#info-form').submit();
    });

    $(function() {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("#info-form").validate({

            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                make: 'required',
                model: 'required',
                year: 'required',
                color: 'required',
                plate_number: 'required'

            },
            // Specify validation error messages
            messages: {
                make: 'required',
                model: 'required',
                year: 'required',
                color: 'required',
                plate_number: 'required'
            },

            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
    $(function() {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("#ride-form").validate({

            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                dep_date: 'required',
                dep_time: 'required',
                dep_time: 'required',
                dep_city: 'required',
                dest_city: 'required',
                pickup: 'required',
                dropoff: 'required',
                seats: 'required',
                price: 'required'

            },
            // Specify validation error messages
            messages: {
                make: 'required',
                model: 'required',
                year: 'required',
                color: 'required',
                plate_number: 'required'
            },

            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });
    });


    $(function() {
        $("#ajacx-form").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                message: 'required',

            },
            // Specify validation error messages
            messages: {
                make: 'message is required',

            },
        });
        $('form#ajacx-form').submit(function(e) {
            var form = $(this);
            var url = $(this)[0].action;


            e.preventDefault();
            if ($('#exampleFormControlTextarea1').val() != '') {
                var formData = new FormData(this);
                $.ajax({
                    url: url,
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    dataType: 'json',
                    success: function(data, textStatus, xhr) {
                        if (data.status == '1') {
                            $('#file').html('');
                            $('#custom-file').val('');
                            $('#exampleFormControlTextarea1').val('');
                            $('#chatItems').append(data.html);

                        } else {
                            swal("error", data.html);
                        }
                    },
                    error: function() {
                        alert("Error posting feed.");
                    }
                });
            }
        });
    });

    // google.maps.event.addDomListener(window, 'load', initialize);
    function initialize(auto, lat, long) {
        var input = document.getElementById(auto);
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            // place variable will have all the information you are looking for.
            $(lat).val(place.geometry['location'].lat());
            $(long).val(place.geometry['location'].lng());
        });
    }

    $(document).ready(function() {
        $("#pickup").autocomplete({
            source: "<?php echo site_url('autocomplete'); ?>"
        });

        $("#dropoff").autocomplete({
            source: "<?php echo site_url('autocomplete'); ?>"
        });
    });
</script>

<?php
if ($this->session->userdata('validated')) {
    $uid = $this->session->userdata('uid');
    $subscription_status = subscriptionStatus($uid);
    if (!$subscription_status && $this->uri->segment(1) == 'passenger-profile') {
?>


        <script>
            setTimeout(() => {
                $('#subscriptionModal').modal('toggle');
            }, 1000);
        </script>
<?php
    }
}
?>