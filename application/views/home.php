<ol class="breadcrumb">
	<?php echo $this->session->flashdata('alert_msg'); ?>
	<div class="four-grids">
		<div class="col-md-3 four-grid">
			<a href="<?php echo base_url()."pegawai";?>">
				<div class="four-agileits">
					<div class="icon">
						<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
					</div>
					<div class="four-text">
						<h3>Pegawai</h3>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-3 four-grid">
			<a href="<?php echo base_url()."kota";?>">
				<div class="four-agileinfo">
					<div class="icon">
						<i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
					</div>
					<div class="four-text">
						<h3>Kota</h3>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-3 four-grid">
			<a href="<?php echo base_url()."posisi";?>">
				<div class="four-wthree">
					<div class="icon">
						<i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
					</div>
					<div class="four-text">
						<h3>Posisi</h3>
					</div>
				</div>
			</a>
		</div>
		<div class="clearfix"></div>
	</div>

<div id="lk" align="center"  data-value="<?php echo $dataLK['0']['jml'];?>"></div>
<div id="pr" align="center"  data-value="<?php echo $dataPR['0']['jml'];?>"></div>

	<!--/content-inner-->
			<div class="w3-agile-chat">
				<div class="charts">
					<div class="col-md-4 w3l-char">
						<div class="charts-grids widget">
							<h4 class="title">Pie Chart Example</h4>
							<canvas id="pie"> </canvas>
						</div>
					</div>
					<div class="clearfix"></div>
					<script>
						var lk = document.getElementById("lk").getAttribute("data-value"); 
						var pr = document.getElementById("pr").getAttribute("data-value"); 
						console.log(pr);
						var pieData = [
						{
							value: lk,
							color:"rgb(23, 136, 210)",
							label: "Laki-laki"
						},
						{
							value : pr,
							color : "rgb(199, 54, 39)",
							label: "Perempuan"
						}

						];

						new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);

					</script>

				</div>
			</div>	

</ol>
<script>
	

</script>