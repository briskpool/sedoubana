	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php
		$this->load->view('includes/head.php');
		?>
		<style>
			/* Absolute Center Spinner */
			.loading {
				display: none;
				position: fixed;
				z-index: 999;
				height: 2em;
				width: 2em;
				overflow: show;
				margin: auto;
				top: 0;
				left: 0;
				bottom: 0;
				right: 0;
			}

			/* Transparent Overlay */
			.loading:before {
				content: '';
				display: block;
				position: fixed;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background: radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));

				background: -webkit-radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
			}

			/* :not(:required) hides these rules from IE9 and below */
			.loading:not(:required) {
				/* hide "loading..." text */
				font: 0/0 a;
				color: transparent;
				text-shadow: none;
				background-color: transparent;
				border: 0;
			}

			.loading:not(:required):after {
				content: '';
				display: block;
				font-size: 10px;
				width: 1em;
				height: 1em;
				margin-top: -0.5em;
				-webkit-animation: spinner 150ms infinite linear;
				-moz-animation: spinner 150ms infinite linear;
				-ms-animation: spinner 150ms infinite linear;
				-o-animation: spinner 150ms infinite linear;
				animation: spinner 150ms infinite linear;
				border-radius: 0.5em;
				-webkit-box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
				box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
			}

			/* Animation */

			@-webkit-keyframes spinner {
				0% {
					-webkit-transform: rotate(0deg);
					-moz-transform: rotate(0deg);
					-ms-transform: rotate(0deg);
					-o-transform: rotate(0deg);
					transform: rotate(0deg);
				}

				100% {
					-webkit-transform: rotate(360deg);
					-moz-transform: rotate(360deg);
					-ms-transform: rotate(360deg);
					-o-transform: rotate(360deg);
					transform: rotate(360deg);
				}
			}

			@-moz-keyframes spinner {
				0% {
					-webkit-transform: rotate(0deg);
					-moz-transform: rotate(0deg);
					-ms-transform: rotate(0deg);
					-o-transform: rotate(0deg);
					transform: rotate(0deg);
				}

				100% {
					-webkit-transform: rotate(360deg);
					-moz-transform: rotate(360deg);
					-ms-transform: rotate(360deg);
					-o-transform: rotate(360deg);
					transform: rotate(360deg);
				}
			}

			@-o-keyframes spinner {
				0% {
					-webkit-transform: rotate(0deg);
					-moz-transform: rotate(0deg);
					-ms-transform: rotate(0deg);
					-o-transform: rotate(0deg);
					transform: rotate(0deg);
				}

				100% {
					-webkit-transform: rotate(360deg);
					-moz-transform: rotate(360deg);
					-ms-transform: rotate(360deg);
					-o-transform: rotate(360deg);
					transform: rotate(360deg);
				}
			}

			@keyframes spinner {
				0% {
					-webkit-transform: rotate(0deg);
					-moz-transform: rotate(0deg);
					-ms-transform: rotate(0deg);
					-o-transform: rotate(0deg);
					transform: rotate(0deg);
				}

				100% {
					-webkit-transform: rotate(360deg);
					-moz-transform: rotate(360deg);
					-ms-transform: rotate(360deg);
					-o-transform: rotate(360deg);
					transform: rotate(360deg);
				}
			}
		</style>
	</head>

	<body>

		<?php
		$this->load->view('includes/nav.php');
		$uid = $this->session->userdata('uid');
		$subscription_status = subscriptionStatus($uid);

		$setting = getSettings();
		$email = $this->session->userdata('email');

		?>


		<div class="loading">Loading&#8230;</div>

		<section class="ftco-section ftco-section-full ftco-animate pb-4">
			<div class="container">
				<div class="row px-2 ">
					<p class="breadcrumbs mb-0 "><span><a href="<?php echo base_url(); ?>rides">Home<i class="ion-ios-arrow-forward ml-2 mr-2"></i></a></span> <span class="mr-2">Confirm Seat</span> </p>
					<!--For Desktop-->
					<?php
					if ($data->num_rows() > 0) {
						foreach ($data->result() as $row) {
							$carImage = ($row->car_front) ? base_url() . $row->car_front : base_url() . 'assets/images/car_front.jpg';
							$booked = getSeatsBooked($this->input->get('id'));
							$totalSeats = $row->seats - $booked->no_seats;
							if ($totalSeats > 0) {
					?>
								<div class="col-12 py-2 px-3 search-bg mb-3 d-none d-md-block d-lg-block request-form ftco-animate fadeInUp ftco-animated">
									<form action="<?php echo base_url(); ?>search-results/confirm-detail" method="POST" class=" ftco-animate bookingForm">
										<?php echo form_hidden('TS', time()); ?>
										<input type="hidden" name="ride_id" value="<?= $this->input->get('id') ?>">
										<input type="hidden" name="txt_id">
										<div class="row ">
											<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pr-0 text-center ">
												<img src="<?= $carImage ?>" class="rounded  w-50 float-left" alt="">
											</div>
											<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
												<p class="mb-0 text-dark font-weight-bold"><?= $row->make . " " . $row->model ?></p>
												<span class="mb-0 text-dark font-small"><?= $row->year ?></span>
												<span class="mb-0 text-dark font-small"><?= $row->color ?></span>
											</div>
											<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
												<label class="font-small">Seats</label>
												<select class="form-control" name="seats" style="height: 30px !important;">
													<?php
													for ($i = 1; $i <= $totalSeats; $i++) {
													?>
														<option value="<?= $i ?>"><?= $i ?></option>
													<?php
													}
													?>
												</select>
											</div>
											<div class="col-xl-4 col-lg-4  col-md-4 col-sm-4">
												<p class="font-small mb-0">Confirm Your Luggage</p>
												<div class="form-check pl-0 pt-2">
													<input class="form-check-input " type="checkbox" name="backpack" id="defaultCheck2">
													<label class="form-check-label mr-2 lable-cursor" for="defaultCheck2">
														<span id="label-defaultCheck2">
															<!-- This span is needed to create the "checkbox" element -->
														</span>Backpack
													</label>

													<input class="" type="checkbox" name="duffel" id="check">
													<label class="form-check-label mr-2 lable-cursor" for="check">
														<span id="label-check">
															<!-- This span is needed to create the "checkbox" element -->
														</span>Duffel
													</label>
													<input class="" type="checkbox" name="suitcase" id="defaultCheck1">
													<label class="form-check-label lable-cursor" for="defaultCheck1">
														<span id="label-defaultCheck1">
															<!-- This span is needed to create the "checkbox" element -->
														</span>Suitcase
													</label>
												</div>
											</div>
											<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2  text-center">
												<div class="form-group">
													<?php
													if ($uid != '') {
														if ($subscription_status == 1) {
													?>
															<script src="https://checkout.stripe.com/checkout.js"></script>
															<input type="button" value="Continue" class="w-100 mt-3 btn btn-primary customButton">
														<?php
														} else {
														?>
															<a data-toggle="modal" data-target="#subscriptionModal" class="w-100 mt-3 btn btn-primary">
																Subscribe
															</a>
														<?php
														}
													} else {
														?>
														<a href="<?= base_url() ?>login" class="w-100 mt-3 btn btn-primary">
															Login
														</a>
													<?php
													}
													?>
												</div>
											</div>
										</div>

									</form>
								</div>

								<!--For mobile-->
								<div class="col-md-12 py-2 px-2 d-block d-sm-none search-bg mb-3 request-form ftco-animate fadeInUp ftco-animated">
									<form action="<?php echo base_url(); ?>search-results/confirm-detail" method="POST" class="bookingForm ftco-animate">
										<?php echo form_hidden('TS', time()); ?>
										<input type="hidden" name="ride_id" value="<?= $this->input->get('id') ?>">
										<input type="hidden" name="txt_id">
										<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 pr-0 text-center ">
											<img src="<?= base_url() . $row->car_front ?>" class="rounded image-preview w-100 float-left" alt="">
										</div>
										<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">
											<p class="mb-0 text-dark font-weight-bold"><?= $row->make . " " . $row->model ?></p>
											<span class="mb-0 text-dark font-small"><?= $row->year ?></span>
											<span class="mb-0 text-dark font-small"><?= $row->color ?></span>
										</div>
										<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
											<label class="font-small">Seats</label>
											<select class="form-control" name="seats" style="height: 30px !important;">
												<?php
												for ($i = 1; $i <= $row->seats; $i++) {
												?>
													<option value="<?= $i ?>"><?= $i ?></option>
												<?php
												}
												?>
											</select>
										</div>
										<div class="col-xl-4 col-lg-4  col-md-4 col-sm-4">
											<p class="font-small mb-0">Confirm Your Luggage</p>
											<div class="form-check pl-0 pt-2">
												<input class="form-check-input " type="checkbox" name="backpack" id="defaultCheck2">
												<label class="form-check-label mr-2 lable-cursor" for="defaultCheck2">
													<span id="label-defaultCheck2">
														<!-- This span is needed to create the "checkbox" element -->
													</span>Backpack
												</label>

												<input class="" type="checkbox" name="duffel" id="check">
												<label class="form-check-label mr-2 lable-cursor" for="check">
													<span id="label-check">
														<!-- This span is needed to create the "checkbox" element -->
													</span>Duffel
												</label>
												<input class="" type="checkbox" name="suitcase" id="defaultCheck1">
												<label class="form-check-label lable-cursor" for="defaultCheck1">
													<span id="label-defaultCheck1">
														<!-- This span is needed to create the "checkbox" element -->
													</span>Suitcase
												</label>
											</div>
										</div>
										<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2  text-center">
											<div class="form-group">
												<?php
												if ($uid == '') {
													if ($subscription_status == 1) {
												?>
														<script src="https://checkout.stripe.com/checkout.js"></script>
														<input type="button" value="Continue" class="w-100 mt-3 btn btn-primary customButton">
													<?php
													} else {
													?>
														<a data-toggle="modal" data-target="#subscriptionModal" class="w-100 mt-3 btn btn-primary">
															Subscribe
														</a>
													<?php
													}
												} else {
													?>
													<a href="<?= base_url() ?>login" class="w-100 mt-3 btn btn-primary">
														Login
													</a>
												<?php
												}
												?>
											</div>
										</div>
									</form>
								</div>
							<?php
							} else {
							?>
								<div class="col-md-12 text-center request-form ftco-animate fadeInUp ftco-animated align-item-center">
									<img class="w-25" src="<?php base_url() ?>assets/images/racing.svg" alt="">
									<h5 class="mt-0 ">No Seat available!</h5>
								</div>
						<?php
							}
						}
					} else {
						?>
						<div class="col-md-12 text-center request-form ftco-animate fadeInUp ftco-animated align-item-center">
							<img class="w-25" src="<?php base_url() ?>assets/images/racing.svg" alt="">
							<h5 class="mt-0 ">No ride posted yet!</h5>
						</div>
					<?php
					}
					?>

				</div>
			</div>
			</div>
			</div>
		</section>


		<footer class="ftco-footer ftco-bg-dark ftco-section">
			<?php
			$this->load->view('includes/footer.php');
			?>
		</footer>



		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
				<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
				<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
			</svg></div>


		<?php
		$this->load->view('includes/js.php');
		?>
		<script>
			var handler = StripeCheckout.configure({
				key: 'pk_test_wvwEOhfkVFE6ujFnFB8C9pno00xmoaVWMc',
				//image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
				locale: 'auto',
				token: function(token) {
					// Send the token in an AJAX request
					$('.loading').show();
					var xhr = new XMLHttpRequest();
					xhr.open('POST', '<?php print site_url(); ?>ticket-checkout');
					xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
					xhr.onload = function() {
						if (xhr.status === 200) {
							// var resp = JSON.parse(xhr.responseText);
							$('.request-form:visible').find('input[name="txt_id"]').val(xhr.responseText);
							$('.request-form:visible').find('.bookingForm').submit();

						} else if (xhr.status !== 200) {
							console.log(xhr.responseText);
						}
					};

					xhr.send(encodeURI('stripeToken=' + token.id + '&stripeEmail=' + '<?= $email ?>'));
				}
			});

			$('.customButton').click(function(e) { // Open Checkout with further options:
				// console.log($('input[name="suitcase"]').val());
				handler.open({
					name: '<?= $setting->ticket_title ?>',
					email: '<?= $email ?>',
					description: '$<?= $setting->ticket_price ?> / Ticket',
					amount: <?= $setting->ticket_price * 100 ?>
				});
				e.preventDefault();
			});
		</script>

	</body>

	</html>