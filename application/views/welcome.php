<?php
	$datas = $this->session->userdata();
	print_r($datas);
	echo '<a href="'.base_url().'index.php/Login/logout"><input type="button" name="btn" value="Logout"></a>';