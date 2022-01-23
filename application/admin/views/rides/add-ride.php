<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1> Add Ride</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo site_url() ?>dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?php echo site_url() ?>rides">Ride</a></div>
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
                                            <form role="form" method="post"
                                                  action="<?php echo site_url() ?>/add-rides-post">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="dep_date">Driver</label>
                                                            <select name="driver_id" class="form-control select2">
                                                                <?php
                                                                foreach ($driver->result() as $val) {
                                                                    ?>
                                                                    <option value="<?=$val->id?>"><?=$val->fname.' ('.$val->email.')'?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="dep_date">Dep Date:</label>
                                                            <input type="text" id="dep_date" name="dep_date"
                                                                   class="form-control datepicker"
                                                                   placeholder="YYYY/MM/DD">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="dep_time">Dep Time:</label>
                                                            <input type="text" class="form-control timepicker"
                                                                   id="dep_time"
                                                                   name="dep_time">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="dep_city">Dep City:</label>
                                                            <input type="text" class="form-control" id="dep_city"
                                                                   name="dep_city">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="dest_city">Dest City:</label>
                                                            <input type="text" class="form-control" id="dest_city"
                                                                   name="dest_city">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="pickup">Pickup:</label>
                                                            <input type="text" class="form-control" id="pickup"
                                                                   name="pickup">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="dropoff">Dropoff:</label>
                                                            <input type="text" class="form-control" id="dropoff"
                                                                   name="dropoff">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="seats">Seats:</label>
                                                            <input type="number" class="form-control" id="seats"
                                                                   name="seats">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="price">Price:</label>
                                                            <input type="number" class="form-control" id="price"
                                                                   name="price">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="details">Details:</label>
                                                            <textarea class="form-control" id="details" name="details"
                                                                      required="" spellcheck="false"></textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <button type="submit" class="btn btn-primary">Submit</button>
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