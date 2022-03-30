 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar  ftco-navbar-light" id="ftco-navbar">
     <div class="container">

         <a class="navbar-brand col-md-2 col-8 mr-0" href="<?php echo base_url(); ?>"><img class="w-100" src="<?php echo base_url(); ?>assets/images/logo.png" alt=""></a>
         <button class="col-4 navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="oi oi-menu"></span> Menu
         </button>

         <div class="collapse col-md-10 navbar-collapse" id="ftco-nav">
             <ul class="navbar-nav ml-auto">
                 <li class="nav-item <?php if ($this->uri->segment(1) == '') {
                                            echo 'active';
                                        } ?>"><a href="<?php echo base_url(); ?>" class="nav-link">Home</a></li>
                 <li class="nav-item <?php if ($this->uri->segment(1) == 'contact') {
                                            echo 'active';
                                        } ?>"><a href="<?php echo base_url(); ?>contact" class="nav-link">Contact</a></li>
                 <li class="nav-item <?php if ($this->uri->segment(1) == 'passenger') {
                                            echo 'active';
                                        } ?>"><a href="<?php echo base_url(); ?>passenger" class="nav-link">Passenger</a></li>
                 <li class="nav-item <?php if ($this->uri->segment(1) == 'driver') {
                                            echo 'active';
                                        } ?>"><a href="<?php echo base_url(); ?>driver" class="nav-link">Driver</a></li>

                 <?php
                    if (!$this->session->userdata('validated_driver') && !$this->session->userData('validated')) {
                    ?>
                     <li class="nav-item <?php if ($this->uri->segment(1) == 'login') {
                                                echo 'active';
                                            } ?>">
                         <a href="<?php echo base_url(); ?>login" class="nav-link">Login&nbsp;&nbsp;<i class="fa fa-user"></i></a>
                     </li>
                     <li class="nav-item "><a href="<?php echo base_url(); ?>register" class="nav-link btn btn-primary ">Register</a>
                     </li>
                     <?php
                    } else {
                        if ($this->session->userdata('validated_driver')) {
                        ?>
                         <a href="<?php echo base_url(); ?>profile" class="nav-link btn btn-primary"> My Account</a></li>
                     <?php
                        } else if ($this->session->userData('validated')) {
                        ?>
                         <a href="<?php echo base_url(); ?>passenger-profile" class="nav-link btn btn-primary"> My Account</a></li>
                     <?php
                        }
                        ?>

                 <?php

                    }
                    ?>
             </ul>
         </div>
     </div>
 </nav>

 <!-- subscription model -->
 <?php
    include('subscription-modal.php');
    ?>