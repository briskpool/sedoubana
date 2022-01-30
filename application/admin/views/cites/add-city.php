<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <div class="section-header-back">
                <a href="<?=base_url()?>cities" class="btn btn-icon"><i
                            class="fas fa-arrow-left"></i></a>
            </div>
            <h4>City Add</h4>
            <div class="section-header-breadcrumb">
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo site_url() ?>dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?php echo site_url() ?>cities">Cities</a></div>
                    <div class="breadcrumb-item">add</div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form role="form" class="needs-validation" method="post"
                                  action="<?php echo site_url() ?>add-city-post"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="drivers_id">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text"
                                                       class="form-control"
                                                       id="name" name="name" required>
                                                <div class="invalid-feedback">
                                                    City Name?
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Status Name</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Add City</button>
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