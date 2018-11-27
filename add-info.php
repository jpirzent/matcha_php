<?php
	include_once 'header.php';

	if (isset($_SESSION['u_id']))
	{
?>
	
<section class="header-container">
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