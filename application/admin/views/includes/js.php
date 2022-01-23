<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
  <!-- General JS Scripts -->
  <script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/prism/prism.js"></script>
  
  <!-- JS Libraies -->
<?php
if ($this->uri->segment(1) == "drivers" || $this->uri->segment(1) == "cites" || $this->uri->segment(1) == "driver-subscription" || $this->uri->segment(1) == "view-drivers" || $this->uri->segment(1) == "tickets"|| $this->uri->segment(1) == 'passengers'|| $this->uri->segment(1) == 'rides' || $this->uri->segment(1) == 'trips') {
    ?>
    <script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-datatables.js"></script>
<?php
}elseif ($this->uri->segment(1) == "edit-ride" || $this->uri->segment(1) == "add-ride" ||  $this->uri->segment(1) == "create-alerts") { ?>
    <script src="<?php echo base_url(); ?>assets/modules/cleave-js/dist/cleave.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <?php
}elseif ($this->uri->segment(1) == "thread") { ?>
    <script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/codemirror/lib/codemirror.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/codemirror/mode/javascript/javascript.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <?php
}elseif ($this->uri->segment(1) == "settings") { ?>
    <script src="<?php echo base_url(); ?>assets/modules/codemirror/lib/codemirror.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/codemirror/mode/javascript/javascript.js"></script>
    <?php
}
?>

  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script>
    $("#change_status").change(function () {
        var val = this.value;
var chat_id = $(this).data('chat_id');
        console.log(chat_id);

        $.ajax({
            type: "POST",
            url: "<?=base_url()?>change-status",
            data: {
                values: val,
                chat_id:chat_id
            },
            success: function(msg) {
                if (msg) {
                    // console.log(msg);
                    // alert('success'); //testing purposes
                } else {

                }
            },
            error:function(e){
                alert("something wrong"+ e) // this will alert an error
            }
        });
    });

</script>
</body>
</html>