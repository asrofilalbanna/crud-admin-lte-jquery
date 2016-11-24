<div class="header-main">
	<div class="w3layouts-left">
		<div class="w3-search-box" style="height: 47px">
			<form action="#" method="post">
				<input style="height: 45px;" type="text" placeholder="Search..." required="">	
				<input type="submit" value="">					
			</form>
		</div>
		<div class="clearfix"> </div>
	</div>

	<div class="profile_details w3l" style="float: right;">		
		<ul>
			<li class="dropdown profile_details_drop">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<div class="profile_img">
						<span style="margin-top: 10px;" class="prfil-img"><img src="<?php echo base_url()?>assets/images/in1.jpg" alt="Administrator"> </span> 
						<div style="margin-top: 25px;" class="user-name">
							<p><?php echo $this->user_login->nama_user; ?></p>
						</div>
						<i class="fa fa-angle-down"></i>
						<i class="fa fa-angle-up"></i>
						<div class="clearfix"></div>	
					</div>	
				</a>
				<ul class="dropdown-menu drp-mnu">
					<li> <a href="<?php echo site_url('login/actLogut')?>"><i style="margin-top: -5px" class="fa fa-sign-out"></i> Logout</a> </li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="clearfix"> </div>	
</div>