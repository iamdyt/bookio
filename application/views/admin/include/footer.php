
  <?php include APPPATH.'views/include/js_msg_list.php'; ?>

  <?php $success = $this->session->flashdata('msg'); ?>
  <?php $error = $this->session->flashdata('error'); ?>
  <input type="hidden" id="success" value="<?php echo html_escape($success); ?>">
  <input type="hidden" id="error" value="<?php echo html_escape($error);?>">
  <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
  <input type="hidden" id="lc" value="<?php echo strlen(settings()->ind_code); ?>">


  <footer class="page-footer">
			<p class="mb-0"><?php echo trans('copyright') ?> &copy; <?php echo date('Y') ?>  <?php echo trans('all-rights-reserved') ?></p>
  </footer>
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/trumbowyg.min.js" integrity="sha512-t4CFex/T+ioTF5y0QZnCY9r5fkE8bMf9uoNH2HNSwsiTaMQMO0C9KbKPMvwWNdVaEO51nDL3pAzg4ydjWXaqbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<!-- <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatable/js/dataTables.bootstrap5.js"></script> -->
<!-- Admin App -->
<script src="<?php echo base_url() ?>assets/admin/js/admin.js?var=<?= settings()->version ?>&time=<?=time();?>"></script>

<script src="<?php echo base_url() ?>assets/admin/js/validation.js"></script>

<script src="<?php echo base_url() ?>assets/admin/js/sweet-alert.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/js/bootstrap-tagsinput.min.js"></script>

<!-- select2 js -->
<script src="<?php echo base_url()?>assets/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- nice select js -->
<script src="<?php echo base_url()?>assets/admin/js/nice-select.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/js/tata.js"></script>

<!-- date & time picker -->
<script src="<?php echo base_url() ?>assets/admin/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/js/timepicker.min.js"></script>
<!-- animation js -->
<script src="<?php echo base_url() ?>assets/front/js/aos.js"></script>

<!-- bs-custom-file-input -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- SYN-Started -->
<script src="<?php echo base_url() ?>assets/admin/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<!-- <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script> -->
	<script src="<?php echo base_url() ?>assets/admin/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/highcharts/js/highcharts.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/highcharts/js/exporting.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/highcharts/js/variable-pie.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/highcharts/js/export-data.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/highcharts/js/accessibility.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>

	<script src="<?php echo base_url() ?>assets/admin/js/index2.js"></script>
	<!--app JS-->
	<script src="<?php echo base_url() ?>assets/admin/js/app.js"></script>
	<script>
		new PerfectScrollbar('.customers-list');
		new PerfectScrollbar('.store-metrics');
		new PerfectScrollbar('.product-list');
	</script>

  <!-- SYN-ENDED -->

<!-- stripe js -->
<?php include'stripe-js.php'; ?>

<!-- admin chart js -->
<?php if (isset($page) && $page == 'Dashboard'): ?>
  <?php $this->load->view('admin/include/charts'); ?>
<?php endif ?>

<!-- calendar js -->
<?php if (isset($page_title) && $page_title == 'Calendars'): ?>
<?php include'calendar-js.php'; ?>
<?php endif ?>

<script type="text/javascript">
  <?php if ($this->business->time_format == 'HH'): ?>
    $(document).on("focusin",".timepicker", function () {
      $('input.timepicker').timepicker({ timeFormat: 'HH:mm', interval: <?php echo $this->business->time_interval; ?> });
    });
  <?php else: ?>
    $(document).on("focusin",".timepicker", function () {
      $('input.timepicker').timepicker({ timeFormat: 'hh:mm p', interval: <?php echo $this->business->time_interval; ?> });
    });
  <?php endif ?>
</script>
<script>
	function mobileToggle(){
		if ($('.wrapper').hasClass('toggled')){
			$('.wrapper').removeClass('toggled')
		} else {
			$('.wrapper').addClass('toggled')
		}
	}

	function toggleSetting(e){
		if ($('.sp').hasClass('d-block')){
			$('.sp').removeClass('d-block')
			$('.sp').addClass('d-none')
			$('.caller').attr('aria-expanded','false')
		} else {
			$('.sp').removeClass('d-none')
			$('.sp').addClass('d-block')
			$('.caller').attr('aria-expanded','true')
		}

	}

	function togglePage(e){
		if ($('.pg').hasClass('d-block')){
			$('.pg').removeClass('d-block')
			$('.pg').addClass('d-none')
			$('.callery').attr('aria-expanded','false')
		} else {
			$('.pg').removeClass('d-none')
			$('.pg').addClass('d-block')
			$('.callery').attr('aria-expanded','true')
		}

	}

</script>
<script>
	$(document).ready( function () {
    $('#ditable').DataTable();
} );
</script>
	
<script>

$('#summernote').trumbowyg();
$(document).ready(function() {
    $('.select2').select2();
});
</script>
</body>
</html>


