<?php
	include_once 'header.php';
?>


<div class="container">
	<div class="page-header">
		<h1 class="text-danger text-center">Forgot Password</h1>      
	</div>
</div>

<form style="width: 50%; margin-top: 3%; padding: 1% 1% 1% 1%" class="mx-auto bg-dark" action="includes/forgot_pwd.inc.php" method="post">
	<h1 class="text-danger" style="text-align: center">Change Bio</h1>
	<input type="text" class="form-control text-danger" placeholder="Username" required name="uid">
	<input type="email" class="form-control text-danger" placeholder="Email" required name="email">
	<button type="submit" name="submit" id="submit" class="btn btn-danger" style="margin-top: 1%; display: block; width: 100%" >Send Email</button>
</form>


<?php
	include_once 'footer.php';
?>