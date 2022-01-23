<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'includes/head.php';
    ?>
</head>

<body>

    <?php
    if ($this->session->userdata('validated_driver')) {
        include 'includes/profile-nav.php';
    } else if ($this->session->userData('validated')) {
        include 'includes/passenger-nav.php';
    }
    ?>


    <section class="ftco-section ftco-section-full ftco-animate pb-4">
        <div class="container">
            <div class="row px-2 ">
                <a href="<?php echo base_url(); ?>requests" class="text-info font-small"><i class=" mr-1 fas fa-chevron-left"></i><?= $support->subject ?></a>
                <div id="chatItems" class="col-md-12 py-3 px-3  request-form ftco-animate fadeInUp ftco-animated chatItems" style="max-height: 326px;overflow-y: scroll;">
                    <!-- <a href="#" class="badge badge-primary">Primary</a> -->
                    <?php
                    if ($data->num_rows() > 0) {
                        //                    dd($data->result());
                        foreach ($data->result() as $row) {
                            if ($row->role == 'admin') {
                                $photo = 'assets/images/logo.png';
                            } else {
                                $photo = ($row->photo) ? $row->photo : 'assets/images/profile-placeholder.png';
                            }

                    ?>
                            <div class="row border-top pt-2 row-hover">
                                <div class="col-md-1 col-3">
                                    <img src="<?php echo base_url() . $photo; ?>" class="rounded border-0 w-100" alt="">
                                </div>
                                <div class="col-md-9 col-12">
                                    <span class="font-small font-weight-bold text-dark"><?php

                                                                                        if ($row->role == 'admin') {
                                                                                            echo "support";
                                                                                        } else {
                                                                                            echo $row->fname . ' ' . $row->lname;
                                                                                        }
                                                                                        ?></span>
                                    <p class="font-small text-dark">
                                        <?=
                                        $row->message
                                        ?>
                                    </p>
                                    <?php
                                    if (!empty($row->file)) {
                                    ?>
                                        <a href="<?= base_url() . $row->file ?>" target="_blank">Attachment</a>
                                    <?php
                                    }
                                    ?>

                                </div>
                                <div class="col-md-2 col-6">
                                    <span class="font-extra-small"><?= dateTimeToLocal($row->created_on) ?></span>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="row pt-2 pb-2 border-top row-hover">No Request Yet!</div>
                    <?php
                    }
                    ?>

                </div>

                <div class="col-md-12 col-12 px-2 mt-2 request-form ftco-animate fadeInUp ftco-animated">


                    <!-- <a href="#" class="badge badge-primary">Primary</a> -->
                    <form action="<?php echo base_url(); ?>requests/threadChat" method="post" id="ajacx-form" enctype="multipart/form-data" class="needs-validation col-12" novalidate>
                        <input type="hidden" name="support_id" value="<?= $support->id ?>">
                        <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="Type Here" id="exampleFormControlTextarea1" rows="5" required></textarea>
                        </div>
                        <div class="form-group " style="height:0px; overflow:hidden;">
                            <input type="file" name="file" class="custom-file-input" id="custom-file">
                            <label class="custom-file-label" for="validatedCustomFile"></i>Attachments</label>
                        </div>
                        <span id="file2" class=" d-block d-lg-none d-md-none pr-3 mt-1 "></span>
                        <button type="submit" class=" px-5 float-right btn btn-primary">Send</button>
                        <span onclick="chooseFile() " id="test" style="text-decoration: underline; cursor: pointer;" class="pr-3 mt-1 float-right text-primary"><i class="fas fa-paperclip mr-1"></i>Attach</span>
                        <span id="file" class=" d-none d-lg-block d-md-block  pr-3 mt-1 float-right"></span>
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
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>


    <?php
    include 'includes/js.php';
    ?>


</body>

</html>