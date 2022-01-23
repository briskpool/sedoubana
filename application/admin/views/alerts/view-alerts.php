<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h3>View Alert</h3>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo site_url() ?>dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?php echo site_url() ?>alerts">Alerts</a></div>
                    <div class="breadcrumb-item">View</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="col-12 col-md-12 col-lg-12">
                            <article class="article article-style-c">
                                <div class="article-details">
                                    <div class="article-category">
                                        Sent On: <?= dateTimeToLocal($alert->date_time) ?>
                                    </div>
                                    <div class="article-category">
                                       Message:
                                    </div>
                                    <p><?= $alert->message ?> </p>
                                    <div class="article-user">
                                        <div class="article-category">
                                            Sent To:
                                        </div>
                                        <?php

                                        if ($users->num_rows() > 0) {
                                            foreach ($users->result() as $row) {
                                                ?>
                                                <div class="badge badge-primary"><?=$row->name?></div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $this->load->view('includes/footer'); ?>