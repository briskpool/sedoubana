 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar  ftco-navbar-light" id="ftco-navbar">
 	<div class="container">

 		<a class="navbar-brand col-md-2 col-8 mr-0" href="<?php echo base_url(); ?>"><img class="w-100" src="<?php echo base_url(); ?>assets/images/logo.png" alt=""></a>
 		<button class="col-4 navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
 			<span class="oi oi-menu"></span> Menu
 		</button>

 		<div class="collapse col-md-10 navbar-collapse" id="ftco-nav">
 			<ul class="navbar-nav ml-auto">
 				<li class="nav-item <?php if ($this->uri->segment(1) == 'passenger-profile') {
											echo 'active';
										} ?>"><a href="<?php echo base_url(); ?>passenger-profile" class="nav-link">My Account</a></li>
 				<li class="nav-item <?php if ($this->uri->segment(1) == 'passenger-trips' || $this->uri->segment(1) == 'bookings') {
											echo 'active';
										} ?>"><a href="<?php echo base_url(); ?>passenger-trips" class="nav-link">My Trips</a></li>

 				<li class="nav-item <?php if ($this->uri->segment(1) == 'AlertsModel') {
											echo 'active';
										} ?>"><a href="<?php echo base_url(); ?>alerts" class="nav-link">Alerts</a></li>
 				<li class="nav-item <?php if ($this->uri->segment(1) == 'support') {
											echo 'active';
										} ?>"><a href="<?php echo base_url(); ?>support" class="nav-link">Contact Support</a></li>


 				<li class="nav-item "><a href="<?php echo base_url(); ?>" class="nav-link btn btn-primary ">Find A Ride</a></li>
 				<li class="nav-item"><a href="<?php echo base_url(); ?>passenger-profile/logout" class="nav-link">Logout</a></li>


 			</ul>
 		</div>

 	</div>
 </nav>


 <!-- subscription model -->
 <?php
	include('subscription-modal.php')
	?>