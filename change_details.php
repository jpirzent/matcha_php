<?php

	include_once 'header.php';

	if (isset($_SESSION['u_id']))
	{
?>

		<div class="container mx-auto bg-dark" style="width: 50%; display: block; margin-top: 10%; padding: 1% 1% 1% 1%;">

			<a href="change.php?change=uid" class="btn btn-danger" style="display: block; margin: 1% 1% 1% 1%;">Change Username</a>
			<a href="change.php?change=email" class="btn btn-danger" style="display: block; margin: 1% 1% 1% 1%;">Change Email</a>
			<a href="change.php?change=pwd" class="btn btn-danger" style="display: block; margin: 1% 1% 1% 1%;">Change Password</a>
			<a href="change.php?change=gender" class="btn btn-danger" style="display: block; margin: 1% 1% 1% 1%;">Change Gender</a>
			<a href="change.php?change=sex" class="btn btn-danger" style="display: block; margin: 1% 1% 1% 1%;">Change Sexuality</a>
			<a href="change.php?change=bio" class="btn btn-danger" style="display: block; margin: 1% 1% 1% 1%;">Change Bio</a>
			<a href="change.php?change=pic" class="btn btn-danger" style="display: block; margin: 1% 1% 1% 1%;">Change Pictures</a>
		
		</div>

<?php
	}

	include_once 'footer.php';

?>