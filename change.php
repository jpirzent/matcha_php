<?php

	include_once 'header.php';

	if (isset($_SESSION['u_id']) && isset($_GET['change']))
	{

		if ($_GET['change'] == "uid")
		{
			echo '<form style="width: 50%; margin-top: 3%; padding: 1% 1% 1% 1%" class="mx-auto bg-dark" action="includes/change_details.inc.php" method="post">
			<h1 class="text-danger" style="text-align: center">Change Username</h1>
			<input type="text" class="form-control text-danger" placeholder="New Username" required name="newuid">
			<input type="password" class="form-control text-danger" placeholder="Password" required name="pwd">
			<button type="submit" name="submit" value="uid" id="submit" class="btn btn-danger" style="margin-top: 1%; display: block; width: 100%" btn-lg btn-block">Change!!</button>
		</form>';
		}
		else if ($_GET['change'] == "email")
		{
			echo '<form style="width: 50%; margin-top: 3%; padding: 1% 1% 1% 1%" class="mx-auto bg-dark" action="includes/change_details.inc.php" method="post">
			<h1 class="text-danger" style="text-align: center">Change Email</h1>
			<input type="email" class="form-control text-danger" placeholder="New Email" required name="newemail">
			<input type="password" class="form-control text-danger" placeholder="Password" required name="pwd">
			<button type="submit" name="submit" id="submit" value="email" class="btn btn-danger" style="margin-top: 1%; display: block; width: 100%" >Change!!</button>
		</form>';
		}
		else if ($_GET['change'] == "pwd")
		{
			echo '<form style="width: 50%; margin-top: 3%; padding: 1% 1% 1% 1%" class="mx-auto bg-dark" action="includes/change_details.inc.php" method="post">
			<h1 class="text-danger" style="text-align: center">Change Password</h1>
			<input type="password" class="form-control text-danger" placeholder="New Password" required name="newpwd">
			<input type="password" class="form-control text-danger" placeholder="Old Password" required name="oldpwd">
			<button type="submit" name="submit" id="submit" value="pwd" class="btn btn-danger" style="margin-top: 1%; display: block; width: 100%" >Change!!</button>
		</form>';
		}
		else if ($_GET['change'] == "gender")
		{
			echo '<form style="width: 50%; margin-top: 3%; padding: 1% 1% 1% 1%" class="mx-auto bg-dark" action="includes/change_details.inc.php" method="post">
			<h1 class="text-danger" style="text-align: center">Change Gender</h1>
			<div class="radio" id="genders">
				<label class="text-danger" style="margin-left: 1%;"><input type="radio" name="genders" value="Female" checked>Female</label>
				<label class="text-danger" style="margin-left: 1%"><input type="radio" name="genders" value="Male">Male</label>
			</div>
			<input type="password" class="form-control text-danger" placeholder="Password" required name="pwd">
			<button type="submit" name="submit" id="submit" value="gender" class="btn btn-danger" style="margin-top: 1%; display: block; width: 100%" >Change!!</button>
		</form> ';
		}
		else if ($_GET['change'] == "sex")
		{
			echo '<form style="width: 50%; margin-top: 3%; padding: 1% 1% 1% 1%" class="mx-auto bg-dark" action="includes/change_details.inc.php" method="post">
			<h1 class="text-danger" style="text-align: center">Change Sexuality</h1>
			<div class="radio" id="sex">
				<label class="text-danger" style="margin-left: 1%;"><input type="radio" name="sexuality" value="Heterosexual" checked>Heterosexual</label>
				<label class="text-danger" style="margin-left: 1%"><input type="radio" name="sexuality" value="Homosexual">Homosexual</label>
				<label class="text-danger" style="margin-left: 1%"><input type="radio" name="sexuality" value="Bisexual">Bisexual</label>
			</div>
			<input type="password" class="form-control text-danger" placeholder="Password" required name="pwd">
			<button type="submit" name="submit" id="submit" value="sex" class="btn btn-danger" style="margin-top: 1%; display: block; width: 100%" >Change!!</button>
		</form>';
		}
		else if ($_GET['change'] == "bio")
		{
			echo '<form style="width: 50%; margin-top: 3%; padding: 1% 1% 1% 1%" class="mx-auto bg-dark" action="includes/change_details.inc.php" method="post">
			<h1 class="text-danger" style="text-align: center">Change Bio</h1>
			<textarea name="bio" id="bio" class="form-control text-danger" style="margin-bottom: 1%" placeholder="New Bio" required></textarea>
			<input type="password" class="form-control text-danger" placeholder="Password" required name="pwd">
			<button type="submit" name="submit" id="submit" value="bio" class="btn btn-danger" style="margin-top: 1%; display: block; width: 100%" >Change!!</button>
		</form>';
		}
		else if ($_GET['change'] == "pic")
		{
			echo '<form action="includes/change_details.inc.php" method="post" class="add-info rounded" id="add" enctype="multipart/form-data">
					<h1 class="text-danger" style="text-align: center">Change Pictures</h1>
					<p class="text-danger">Profile Picture:</p><input type="file" name="profile" id="prof-pic" required>
					<br>
					<br>
					<p class="text-danger">Other Pictures:</p>
					<input type="file" name="ot-pic1" id="ot-pic1" style="width: 25%">
					<input type="file" name="ot-pic2" id="ot-pic2" style="width: 25%">
					<input type="file" name="ot-pic3" id="ot-pic3" style="width: 25%">
					<input type="file" name="ot-pic4" id="ot-pic4" style="width: 20%">
					<br>
					<br>
					<button type="submit" name="submit" id="submit" value="pic" class="btn btn-danger form-control" style="margin-top: 1%" btn-lg btn-block>Change Pictures</button>
				</form>';
		}
?>

<?php
	}

	include_once 'footer.php';

?>