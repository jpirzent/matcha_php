<?php

	include_once 'header.php';

	if (isset($_SESSION['u_id']))
	{
?>

<div class="container">
	<div class="page-header">
		<h1 class="text-danger text-center">People Who have Liked Your Profile</h1>      
	</div>
</div>

<div class="alert alert-danger mx-auto" style="width: 20%; margin-top: 2%;">
  <strong>Click</strong> on the User to see Their Profile
</div>

<?php
	include_once 'includes/dbh.inc.php';

	try
	{
		$sql = "SELECT * FROM likes WHERE likes_profile=:id";
		$pdo = $conn->prepare($sql);
		$pdo->bindParam(':id', $_SESSION['u_id']);
		$pdo->execute();
		$likes = $pdo->fetchAll();
	}
	catch (PDOException $var)
	{
		echo $var->getMessage();
	}
	if (empty($likes))
	{
		echo '<h1 class="text-danger text-center" style="margin-top: 10%;">No Likes <strong>YET!</strong></h1>';
		/* header("Location: index.php?error=error");
		exit(); */
	}
	else
	{
		echo '<div class="container mx-auto bg-dark" style="width: 70%; display: block; margin-top: 2.5%; padding: 1% 1% 1% 1%;">';
		foreach ($likes as $val)
		{
			$sql = "SELECT `user_uid` FROM users WHERE user_id=:id LIMIT 1";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':id', $val['likes_user']);
			$pdo->execute();
			$viewer = $pdo->fetch(PDO::FETCH_ASSOC);

			echo '<a href="view_profile.php?id='.$val['likes_user'].'" class="btn btn-danger" style="display: block; margin: 1% 1% 1% 1%;">'.$viewer['user_uid'].'</a>';
		}
		echo '</div>';
	}
?>

<?php

	}
	else
	{
		header("Location: index.php?error=PleaseLogin");
		exit();
	}

	include_once 'footer.php';

?>