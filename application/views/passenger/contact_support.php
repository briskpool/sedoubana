<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $this->load->view('includes/head.php');
    ?>
</head>
<body>

<?php
$this->load->view('includes/passenger-nav.php');
?>


<section class="ftco-section ftco-animate  pb-4">
    <div class="container ">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-6 col-8 pb-0 pr-0">
                <h5>Submit A Request</h5>

            </div>
            <div class="form-group col-md-2  d-none d-lg-block d-md-block ">
                <a href="<?php echo base_url(); ?>requests" class="float-right  px-0"><i
                            class="mr-1 far fa-envelope"></i>My Requests</a>
            </div>
            <div class="form-group col-md-2 d-block d-lg-none d-md-none ">
                <a href="<?php echo base_url(); ?>requests" class="px-0"><i class="mr-1 far fa-envelope"></i>My Requests</a>
            </div>


        </div>
        <div class="row px-2 justify-content-center">
            <div class="col-md-8 py-2  request-form ftco-animate fadeInUp ftco-animated">

                <!--  d-none d-lg-block d-md-block -->
                <div class="row  ">
                    <form action="<?php echo base_url(); ?>support/request" method="post" enctype="multipart/form-data"
                          class="needs-validation col-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Category</label>
                            <select class="form-control" name="category" id="exampleFormControlSelect1" required>
                                <?php
                                foreach ($category as $key => $value) {
                                    ?>
                                    <option value="<?= $value ?>"><?= $value ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="validationCustom01">Subject</label>
                            <input class="form-control" name="subject" type="text" id="validationServer01"
                                   placeholder="Subject"
                                   required>

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                      required></textarea>
                        </div>
                        <div class="form-group " style="height:0px; overflow:hidden;">
                            <input type="file" name="file" class="custom-file-input" id="custom-file">
                            <label class="custom-file-label" for="validatedCustomFile"></i>Attachments</label>

                        </div>
                        <span id="file2" class=" d-block d-lg-none d-md-none pr-3 mt-1 "></span>
                        <button type="submit" class=" px-5 float-right btn btn-primary">Submit</button>
                        <span onclick="chooseFile() " id="test" style="text-decoration: underline; cursor: pointer;"
                              class="pr-3 mt-1 float-right text-primary"><i
                                    class="fas fa-paperclip  mr-1"></i>Attach</span>
                        <span id="file" class=" d-none d-lg-block d-md-block  pr-3 mt-1 float-right"></span>
                    </form>
                </div>

            </div>
            <!--for mobile screen-->
            <!-- <div class="col-md-12 mt-2 py-2 d-block d-lg-none d-md-none request-form ftco-animate fadeInUp ftco-animated">
        <?php $i = 'abc1';
            while ($i < 'abc5') { ?>
                <div class="row pt-2 pb-2">
                    <div class="col-12 ">
                    <p  class="  mb-0 font-extra-small">09-09-2019</p >
                    </div>
                    <div class="col-12 pr-0">
                      <p class="mb-0 text-dark font-extra-small ">Hi!, we have recieved your request... <span class="text-info  " data-toggle="collapse" href="#<?php echo $i; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $i; ?>">Read</span > </p>


                    </div>

                    <div class=" col-12 collapse-color font-extra-small  collapse" id="<?php echo $i; ?>">

                       <p class="mb-0 py-1">Funds Cleared <a href="#">(view More)</a></p>
                      </div>

                </div>

        <?php
                $i++;
            } ?>




               </div> -->

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
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>


<?php
$this->load->view('includes/js.php');
?>


</body>
</html>