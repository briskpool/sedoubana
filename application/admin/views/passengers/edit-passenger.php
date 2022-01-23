<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Drivers</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo site_url()?>dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?php echo site_url()?>passengers">Passengers</a></div>
                    <div class="breadcrumb-item">edit</div>
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
                                                  action="<?php echo site_url() ?>edit-passenger-post"
                                                  enctype="multipart/form-data">
                                                <input type="hidden" value="<?php echo $passenger->id ?>"
                                                       name="passenger_id">
                                                <div class="col-12 col-md-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" value="<?php echo $passenger->fname ?>"
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
                                                                <input type="text" value="<?php echo $passenger->lname ?>"
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
                                                                    <option value="male" <?= ($passenger->gender == 'male') ? "selected" : '' ?>>
                                                                        Male
                                                                    </option>
                                                                    <option value="female" <?= ($passenger->gender == 'female') ? "selected" : '' ?>>
                                                                        Female
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="dob">Dob:</label>
                                                                <input type="text" value="<?php echo $passenger->dob ?>"
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
                                                                       value="<?php echo $passenger->country ?>"
                                                                       class="form-control"
                                                                       id="country" name="country">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="city">City:</label>
                                                                <input type="text" value="<?php echo $passenger->city ?>"
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
                                                                       value="<?php echo $passenger->province ?>"
                                                                       class="form-control"
                                                                       id="province" name="province">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email">Email:</label>
                                                                <input type="email"
                                                                       value="<?php echo $passenger->email ?>"
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
                                                                       value="<?php echo $passenger->phone ?>"
                                                                       class="form-control"
                                                                       id="phone" name="phone">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="status">Status:</label>
                                                                <select class="form-control" id="status" name="status">
                                                                    <option value="1" <?= ($passenger->status == '1') ? "selected" : '' ?>>
                                                                        active
                                                                    </option>
                                                                    <option value="0" <?= ($passenger->status == '0') ? "selected" : '' ?>>
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