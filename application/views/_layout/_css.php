<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="<?php echo base_url()?>assets/css/style.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/morris.css" type="text/css"/>
	<!-- Font CSS -->
	<link href="<?php echo base_url()?>assets/css/font-awesome.css" rel="stylesheet"> 
	<!-- chart -->
	<script src="<?php echo base_url()?>assets/js/Chart.js"></script>
	<!-- lined-icons -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon-font.min.css" type='text/css' />

<!-- Bootstrap Core for Tables CSS -->
    <!-- DataTables CSS -->
    <link href="<?php echo base_url()?>assets/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url()?>assets/css/dataTables.responsive.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">

<!-- FONTS CSS -->
	<link href='<?php echo base_url()?>assets/css/font-monsters.css' rel='stylesheet' type='text/css'/>
	<link href='<?php echo base_url()?>assets/css/font-monstersrat.css' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url()?>assets/css/font-awesome.css" rel="stylesheet"> 

<!-- jQuery -->
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="<?php echo base_url()?>assets/js/jquery-2.1.4.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<!-- tables -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/table-style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/basictable.css" />
	<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css"> -->
	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" type="text/css"> -->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.basictable.min.js"></script>
	
	<script type="text/javascript">
	    $(document).ready(function() {
	      $('#table').basictable();

	      $('#table-breakpoint').basictable({
	        breakpoint: 768
	      });

	      $('#table-swap-axis').basictable({
	        swapAxis: true
	      });

	      $('#table-force-off').basictable({
	        forceResponsive: false
	      });

	      $('#table-no-resize').basictable({
	        noResize: true
	      });

	      $('#table-two-axis').basictable();

	      $('#table-max-height').basictable({
	        tableWrapper: true
	      });
	    });
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#add_another").click(function(){

			});
		});

		function goDelete(id){
			var agree = confirm("Are you sure you want to delete this?");
			if(agree){
				$("#event"+id).fadeOut('slow');
				$.post('<?php echo base_url().'pegawai/hapus/id'?>', function(){

				});
			}else{
				return false;
			}
		}
	</script>
