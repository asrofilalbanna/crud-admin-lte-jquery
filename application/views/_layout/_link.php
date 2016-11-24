<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<?php
			$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
			$total  = count($crumbs);

			for($i=3; $i<$total;$i++){ 
		?>
			<a href="<?php echo $crumbs[$i]?>" style="text-transform: capitalize;"><?php echo $crumbs[$i]?></a>
		<?php
			if ($crumbs[$i]!=""){
				echo '<i class="fa fa-angle-double-right"></i><?php echo $i;?>';
				}
			}
		?>
		Here
	</li>
</ol>
