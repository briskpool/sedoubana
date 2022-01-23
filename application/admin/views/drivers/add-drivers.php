<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1> Add Drivers</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo site_url() ?>dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?php echo site_url() ?>drivers">Drivers</a></div>
                    <div class="breadcrumb-item">add</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card">
                                            <form role="form" class="needs-validation" method="post"
                                                  action="<?php echo site_url() ?>add-drivers-post"
                                                  enctype="multipart/form-data">
                                                <input type="hidden" name="drivers_id">
                                                <div class="col-12 col-md-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text"
                                                                       class="form-control"
                                                                       id="fname" name="fname" required>
                                                                <div class="invalid-feedback">
                                                                    First name?
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text"
                                                                       class="form-control"
                                                                       id="lname" name="lname" required>
                                                                <div class="invalid-feedback">
                                                                    Last name?
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="gender">Gender:</label>
                                                                <select class="form-control" id="gender" name="gender">
                                                                    <option value="male" >
                                                                        Male
                                                                    </option>
                                                                    <option value="female">
                                                                        Female
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="dob">Dob:</label>
                                                                <input type="text"
                                                                       class="form-control"
                                                                       id="dob" name="dob">
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="country">Country:</label>
                                                                <input type="text"
                                                                       class="form-control"
                                                                       id="country" name="country">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="city">City:</label>
                                                                <input type="text"
                                                                       class="form-control"
                                                                       id="city" name="city">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="province">Province:</label>
                                                                <input type="text"
                                                                       class="form-control"
                                                                       id="province" name="province">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email">Email:</label>
                                                                <input type="email"
                                                                       class="form-control"
                                                                       id="email" name="email">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phone">Phone:</label>
                                                                <input type="number"
                                                                       class="form-control"
                                                                       id="phone" name="phone">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="status">Status:</label>
                                                                <select class="form-control" id="status" name="status">
                                                                    <option value="1" >
                                                                        active
                                                                    </option>
                                                                    <option value="0">
                                                                        Inactive
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
<?php $this->load->view('includes/footer'); ?>