<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h3> Alerts Create</h3>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo site_url() ?>dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo site_url() ?>tickets">tickets</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success">
                        <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
                    </div>
                <?php }else if($this->session->flashdata('error')){ ?>
                    <div class="alert alert-danger">
                        <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('error'); ?></strong>
                    </div>
                <?php } ?>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sent Alert</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url() ?>alert-send" method="post">


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sent To</label>
                                    <div class="col-sm-12 col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sentTo" value="all"
                                                   id="driver" checked="">
                                            <label class="form-check-label" for="driver">
                                                All
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sentTo" value="driver"
                                                   id="driver">
                                            <label class="form-check-label" for="driver">
                                                All Drivers Only
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sentTo" value="passenger"
                                                   id="passenger">
                                            <label class="form-check-label" for="passenger">
                                                All Passenger only
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sentTo" value="manual"
                                                   id="exampleRadios2">
                                            <label class="form-check-label" for="manual">
                                                Manual Select
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div id="users-select" class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select
                                        Users</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="users" class="form-control select2">
                                            <?php

                                            if ($users->num_rows() > 0) {
                                                foreach ($users->result() as $row) {
                                                    ?>
                                                    <option value="<?= $row->id ?>"><?= $row->email ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="message" class="form-control" rows="5" style="min-height: 200px;"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" name="send" value="sub" class="btn btn-primary">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('includes/footer'); ?>
<script>
    $(document).ready(function () {
        $("#users-select").hide();
        $("input[name$='sentTo']").click(function () {
            var sentTo = $(this).val();
            console.log("XXXX", sentTo);
            if (sentTo == 'manual') {
                $("#users-select").show();
            } else {
                $("#users-select").hide();
            }
        });
    });
</script>
