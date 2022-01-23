<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $title; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/prism/prism.css">

    <!-- CSS Libraries -->
    <?php
    if ($this->uri->segment(1) == "dashboard" || $this->uri->segment(2) == "index") { ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
        <link rel="stylesheet"
              href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet"
              href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

        <?php

    } elseif ($this->uri->segment(1) == "drivers" ||$this->uri->segment(1) == "cites" || $this->uri->segment(1) == "driver-subscription" || $this->uri->segment(1) == "view-drivers"  || $this->uri->segment(1) == "tickets" || $this->uri->segment(1) == "passengers" || $this->uri->segment(1) == "rides" || $this->uri->segment(1) == "trips") { ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.css">
        <link rel="stylesheet"
              href="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet"
              href="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
        <?php
    }elseif ($this->uri->segment(1) == "edit-ride" || $this->uri->segment(1) == "add-ride" ||  $this->uri->segment(1) == "create-alerts" ) { ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jquery-selectric/selectric.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
        <?php
    }elseif ($this->uri->segment(1) == "thread") { ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/codemirror/lib/codemirror.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/codemirror/theme/duotone-dark.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jquery-selectric/selectric.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/chocolat/dist/css/chocolat.css">
        <?php
    }elseif ($this->uri->segment(1) == "settings") { ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/codemirror/lib/codemirror.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/codemirror/theme/duotone-dark.css">
        <?php
    }
    ?>

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA --></head>

<?php

if (getSettings()->site_nav == "top") {
    if (isset($this->session->userdata['logged_in']) && ($this->uri->segment(1) != "auth" && $this->uri->segment(1) != "forgot-password" && $this->uri->segment(1) != "reset-password")) {
        $this->load->view('includes/layout-top');
    }

}else{
    if (isset($this->session->userdata['logged_in']) && ($this->uri->segment(1) != "auth" && $this->uri->segment(1) != "forgot-password" && $this->uri->segment(1) != "reset-password")) {
        $this->load->view('includes/layout');
        $this->load->view('includes/sidebar');
    }
}

?>
