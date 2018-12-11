<?php

	include_once 'header.php';

	if (isset($_SESSION['u_id']))
	{
		$id = $_GET['id'];

		include_once 'includes/dbh.inc.php';
		try
		{
			$sql = "SELECT * FROM users WHERE user_id=:id";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(":id", $id);
			$pdo->execute();
			$row = $pdo->fetch(PDO::FETCH_ASSOC);
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}
		if ($row)
		{
			$uid = $row['user_uid'];
			echo '<form style="width: 50%; margin-top: 3%; padding: 1% 1% 1% 1%" class="mx-auto bg-dark" action="includes/report_user.inc.php" method="post">
			<h1 class="text-danger" style="text-align: center">Report User: '.$uid.'</h1>
			<textarea name="id" hidden>'.$id.'</textarea>
			<textarea name="msg" id="bio" class="form-control text-danger" style="margin-bottom: 1%" placeholder="Report Message" required></textarea>
			<input type="password" class="form-control text-danger" placeholder="Password" required name="pwd">
			<button type="submit" name="submit" id="submit" class="btn btn-danger" style="margin-top: 1%; display: block; width: 100%" >Report User</button>
		</form>';
		}
		else
		{
			header("Location: index.php?error=Error");
			exit();
		}
?>
<textarea name="id" hidden>$id</textarea>
<?php

	}
	else
	{
		header("Location: index.php?error=PleaseLogin");
		exit();
	}

	include_once 'footer.php';

?>