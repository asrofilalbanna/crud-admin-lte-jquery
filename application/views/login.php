<div class="main-wthree">
	<div class="container">
		<div class="sin-w3-agile">
			<h2>Sign In</h2>
			<?php echo $this->session->flashdata('alert_msg'); ?>
			<form action="<?php echo base_url('login/actLogin')?>" method="POST">
				<div class="username">
					<span class="username">Username:</span>
					<input type="text" name="username" class="name" placeholder="Username" required="">
					<div class="clearfix"></div>
				</div>
				<div class="password-agileits">
					<span class="username">Password:</span>
					<input type="password" name="password" class="password" placeholder="********" required="">
					<div class="clearfix"></div>
				</div>
				<div class="login-w3">
					<input type="submit" class="login" value="Sign In">
				</div>
				<div class="clearfix"></div>
			</form>
			<div class="footer">
				<p>&copy; 2016 Pooled . All Rights Reserved</p>
			</div>
		</div>
	</div>
</div>
