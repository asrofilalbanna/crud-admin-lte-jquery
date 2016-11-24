<!DOCTYPE HTML>
<html>
<head>
<title>Pooled Admin Panel Category Flat Bootstrap Responsive Web Template | Charts :: w3layouts</title>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<!-- Graph CSS -->
<!-- jQuery -->
<!-- //jQuery -->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
</head> 
<body>
<div id="lk" align="center"  data-value="<?php echo $dataLK['0']['jml'];?>"></div>
<div id="pr" align="center"  data-value="<?php echo $dataPR['0']['jml'];?>"></div>
<?php 

$host     = 'localhost';
$username = 'root';
$password = '';

$conn = mysql_connect($host, $username, $password);
mysql_select_db('cendana');

$query = mysql_query("SELECT count(*) as 'jumlah' FROM tb_pegawai WHERE jk_pegawai=1");
$data  = mysql_fetch_array($query);
?>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
		<div class="w3-agile-chat">
				<div class="charts">
					<div class="col-md-4 w3l-char">
						<div class="charts-grids widget">
							<h4 class="title">Pie Chart Example</h4>
							<span id="jumlahLaki" value="<?php echo $data['jumlah'];?>"></span>
							<canvas id="pie"> </canvas>
						</div>
					</div>
					<div class="clearfix"></div>
							 <script>
						 	var lk = document.getElementById("lk").getAttribute("data-value"); 
						 	var pr = document.getElementById("pr").getAttribute("data-value"); 
								var pieData = [
										{
											value: 12,
											color:"rgb(23, 136, 210)",
											label: "Product 1"
										},
										{
											value : 9,
											color : "rgb(199, 54, 39)",
											label: "Product 2"
										}
										
									];
								
							new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
							
							</script>
							
				</div>
			</div>	
				
</div>
</div>
</div>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>