<?php
	include_once 'header.php';

	if (isset($_SESSION['u_id']))
	{
?>
	
<!-- <section class="header-container">
	<div class="header-bar">
		<h2>Additional Information</h2>
	</div>
</section>

<form class="add-info" action="includes/add-info.inc.php" method="post">
	<h1>Gender</h1>
	<br>
			<input type="radio" name="gender" id="Male" checked>
		<label for="Male">Male</label>
			<br>
			<input type="radio" name="gender" id="Female">
		<label for="Female">Female</label>
			<br>
			<input type="radio" name="gender" id="Other">
		<label for="Other">Other</label>
		<br>
		<br>
	<h1>Sexuality</h1>
	<br>
			<input type="radio" name="sexuality" id="Heterosexual" checked>
		<label for="Heterosexual">Heterosexual</label>
			<br>
			<input type="radio" name="sexuality" id="Homosexual">
		<label for="Homosexual">Homosexual</label>
			<br>
			<input type="radio" name="sexuality" id="Bisexual">
		<label for="Bisexual">Bisexual</label>
		<br>
		<br>
	<h1>Bio</h1>
	<br>
		<textarea name="bio" id="bio" placeholder="Tell People about Yourself" required></textarea>
	<button type="submit" value="submit">Add Info!</button>
</form> -->


<form action="includes/add-info.inc.php" method="post" class="add-info rounded">
	<legend class="text-danger" style="text-decoration: underline">Add-Info</legend>

	<label for="genders" class="text-danger">Gender:</label>
	<input list="gender" id="genders" class="form-control">
	<datalist id="gender">
		<option value="Female">Female</option>
		<option value="Male"></option>
	</datalist>
	<br>
	<label for="sex" class="text-danger">Sexuality:</label>
	<input list="sexuality" id="sex" class="form-control">
	<datalist id="sexuality">
		<option value="Heterosexual"></option>
		<option value="Homosexual"></option>
		<option value="Bisexual"></option>
	</datalist>
	<br>
	<label for="bio" class="text-danger">Bio:</label>
	<textarea name="bio" id="bio" class="form-control"></textarea>
	<button type="submit" name="submit" id="submit" class="btn btn-danger form-control" style="margin-top: 1%" btn-lg btn-block>Add Info</button>
</form>




<?php
	}
	else
	{
		header("Location: index.php?error=PleaseLogin");
		exit();	
	}
	include_once 'footer.php';

?>