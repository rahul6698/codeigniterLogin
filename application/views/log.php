<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	
</head>
<body>
<center>
	<form action="<?php echo base_url()?>Login_Controller/login_Validation" method="post">
		<h1>Sign in</h1>
		<label>Email :</label>
		<input type="email" placeholder="Email" name="email" value="<?php echo set_value('email');?>" /> <?php echo form_error('email', '<div class="error">', '</div>'); ?>
		<br><br>
		<label>Pass    :</label><input type="password" placeholder="Password"  name="password" value="<?php echo set_value('password');?>" /> <?php echo form_error('password', '<div class="error">', '</div>'); ?>
		<br><br>
		<input type="submit" name="btn" value="Sign In">
	</form>
	<?php
		echo $this->session->flashdata('error');
	?>
</center>
</body>
</html>
