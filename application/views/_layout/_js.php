<script>
	$(document).on("click",".hapus",function() {

		id = $(this).attr('id');

		if (confirm("Did you wanna erase this data?")){
			$.ajax({
				method: "POST",
				// url: 'delete.php?id='+id,
				url: '<?php echo base_url('pegawai/hapus/'); ?>'+id,
				success: function(){
				}
			});	
			$(this).parent().parent().parent().fadeOut(300); 
			// $(this).closest("tr").remove();
		} return false;
	});
</script>
<script>
	var toggle = true;

	$(".sidebar-icon").click(function() {                
		if (toggle)
		{
			$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
			$("#menu span").css({"position":"absolute"});
		}
		else
		{
			$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
			setTimeout(function() {
				$("#menu span").css({"position":"relative"});
			}, 400);
		}

		toggle = !toggle;
	});
</script>

<!--js -->
	<script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js"></script>
	<script src="<?php echo base_url()?>assets/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
	<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
	<script src="<?php echo base_url()?>assets/js/raphael-min.js"></script>
	<script src="<?php echo base_url()?>assets/js/morris.js"></script>
<!-- Tables -->
 	<script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/dataTables.responsive.js"></script>
    <!-- <script src="<?php echo base_url()?>assets/js/sb-admin-2.js"></script> -->

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
<!-- Custom  -->
    <script src="<?php echo base_url()?>assets/custom/kota.js"></script>
    <script src="<?php echo base_url()?>assets/custom/posisi.js"></script>
    <script src="<?php echo base_url()?>assets/custom/pegawai.js"></script>