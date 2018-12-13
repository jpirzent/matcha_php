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


<form action="includes/add-info.inc.php" method="post" class="add-info rounded" id="add" enctype="multipart/form-data">
	<legend class="text-danger" style="text-decoration: underline">Add-Info</legend>

	<label for="genders" class="text-danger">Gender:</label>
	<div class="radio" id="genders">
      <label class="text-danger" style="margin-left: 1%;"><input type="radio" name="genders" value="Female" checked>Female</label>
	  <label class="text-danger" style="margin-left: 1%"><input type="radio" name="genders" value="Male">Male</label>
    </div>
	<br>
	<label for="sex" class="text-danger">Sexuality:</label>
	<div class="radio" id="sex">
    	<label class="text-danger" style="margin-left: 1%;"><input type="radio" name="sexuality" value="Heterosexual" checked>Heterosexual</label>
		<label class="text-danger" style="margin-left: 1%"><input type="radio" name="sexuality" value="Homosexual">Homosexual</label>
		<label class="text-danger" style="margin-left: 1%"><input type="radio" name="sexuality" value="Bisexual">Bisexual</label>
    </div>
	<br>
	<label for="bio" class="text-danger">Bio:</label>
	<textarea name="bio" id="bio" class="form-control" required></textarea>
	<br>
	<p class="text-danger">Profile Picture:</p><input type="file" name="profile" id="prof-pic" required>
	<br>
	<br>
	<p class="text-danger">Other Pictures:</p>
	<input type="file" name="ot-pic1" id="ot-pic1" style="width: 25%">
	<input type="file" name="ot-pic2" id="ot-pic2" style="width: 25%">
	<input type="file" name="ot-pic3" id="ot-pic3" style="width: 25%">
	<input type="file" name="ot-pic4" id="ot-pic4" style="width: 20%">
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