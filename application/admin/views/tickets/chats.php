<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('includes/header');

?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h3> Tickets </h3>
                <div class="section-header-button pull-right">
                    <select id="change_status" data-chat_id="<?=$chat_id?>" class="form-control">
                        <option value="in-progress" <?=($chat_status == 'in-progress')?'selected':''?>>in-progress</option>
                        <option value="completed" <?=($chat_status == 'completed')?'selected':''?> >Completed</option>
                    </select>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo site_url() ?>dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?php echo site_url() ?>tickets">tickets</a></div>
                </div>
            </div>
            <div class="section-body">

                <div class="card chat-box" id="mychatbox">
                    <div class="card-header">
                        <h4>Chat with <?=ucfirst($user->name)?> </h4> Subject: <?=$user->subject?>

                    </div>
                    <div class="card-body chat-content" tabindex="2" style="overflow: hidden; outline: none;">
                        <?php
                        if ($chats->num_rows() > 0) {
                            foreach ($chats->result() as $row) {
                                $photo = base_url() . 'assets/img/avatar/avatar-1.png';
                                if ($row->photo) {
                                    $photo = front_url() . $row->photo;
                                }

                                ?>
                                <div class="chat-item <?=($row->role == 'admin')?'chat-right':'chat-left'?>" style="">
                                    <img src="<?=$photo?>">
                                    <div class="chat-details">
                                        <div class="chat-text"><?= $row->message ?></div>
                                        <div class="chat-time"><?= time_elapsed_string($row->created_at) ?></div>
                                        <?php
                                        if ($row->file) {
                                            $path = front_url() . $row->file;
                                            $bgImage = base_url() . 'assets/img/news/img01.jpg';
                                            ?>
                                            <div class="gallery">
                                                <div class="gallery-item"
                                                     data-image="<?= $path ?>"
                                                     data-title="Image 1"
                                                     href="<?= $path ?>"
                                                     title="Image 1"
                                                     style="background-image: url(<?= $bgImage ?>);"></div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="card-footer">

                    <form id="chat-form" action="<?php echo base_url(); ?>thread-chat" method="post"
                          enctype="multipart/form-data" class="needs-validation">
                        <input type="hidden" name="support_id" value="<?= $chat_id ?>">
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-11">
                                <textarea id="message" name="message" class="summernote" rows="1"></textarea>
                            </div>
                            <div class="col-sm-12 col-md-1">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Reply
                            </button>
                            </div>
                        </div>

                    </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $this->load->view('includes/footer'); ?>