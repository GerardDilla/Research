
    
    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>

    <!-- Tooltips -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/mdb.min.js"></script>
	
	<!-- Event Handlers -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/EventHandler.js"></script>

	<!-- File Manager -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/FileManager.js"></script>

	<!-- Department/Category Manager -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/CategoryManager.js"></script>

	<!-- Admin Account Manager -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/AccountManager.js"></script>

    <script>
        new WOW().init();
    </script>
    
    <script src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js'></script>
    
	<script>

		//Session from login attempt
		active = "<?php echo $this->session->flashdata('activetab'); ?>";
		if(active == 'teacher'){
			$('#panel1').removeClass('in show active');
			$('#panel2').addClass('in show active');
		}else{
			$('#panel2').removeClass('in show active');
			$('#panel1').addClass('in show active');
		}

	</script>

	<!-- AJAX Start -->
	<script>

		function base_url(){

			return '<?php echo base_url(); ?>';

		}

	</script>



</body>

</html>