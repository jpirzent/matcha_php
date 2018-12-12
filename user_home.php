<?php
	session_start();

	if (isset($_SESSION['u_id']))
	{
		include_once 'header.php';

?>

<?php

include_once 'includes/dbh.inc.php';
$id = $_SESSION['u_id'];
try
{
	$sql = "SELECT * FROM users WHERE user_id=:id LIMIT 1";
	$pdo = $conn->prepare($sql);
	$pdo->bindParam(':id', $id);
	$pdo->execute();

	$result = $pdo->fetch(PDO::FETCH_ASSOC);

	$sql = 'SELECT * FROM tags';
	$pdo = $conn->prepare($sql);
	$pdo->execute();

	$tags = $pdo->fetchAll();
	if ($result)
	{
		$uid = $result['user_uid'];
		$name = $result['user_first'].' '.$result['user_last'];

		$sql = "SELECT * FROM preferences WHERE pref_uid=:id LIMIT 1";
		$pdo = $conn->prepare($sql);
		$pdo->bindParam(':id', $id);
		$pdo->execute();
		
		$res = $pdo->fetch(PDO::FETCH_ASSOC);
		if ($res)
		{
			$bio = $res['pref_bio'];
			$sex = $res['pref_sex'];
			$gender = $res['pref_gender'];
			$profile = $res['pref_profile'];
			$my_tags = explode(',', $res['pref_tags']);

			echo '<div class="jumbotron text-danger bg-dark" style="margin-top: 2%">
					<h1 class="display-4">'.$uid.'</h1>
					<a class="btn btn-danger" style="float: right;margin-right: 1%;" href="matches.php">Matches</a>
					<a class="btn btn-danger" style="float: right;margin-right: 1%;" href="likes.php">Likes</a>
					<a class="btn btn-danger" style="float: right; margin-right: 1%;" href="views.php">Views</a>
					<a class="btn btn-danger" style="float: right;margin-right: 1%;" href="change_details.php">Change Details?</a>
					<p class="lead">'.$bio.'</p>
					<hr class="my-4 bg-danger">
					<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-25 mx-auto" src="data:image/png;base64,'.$profile.'" alt="First slide">
							</div>
						</div>
					</div>
					<h3 style="text-align: center; margin-top: 2%">/Name/ '.$name.'</h3>
					<h3 style="text-align: center; margin-top: 2%">/Gender/ '.$gender.'</h3>
					<h3 style="text-align: center; margin-top: 2%">/Sexuality/ '.$sex.'</h3>
					<div style="width: 25%; margin-top: 2%" class="container" scroll="auto">
						<h2 style="text-align: center;" class="text-danger">My-Tags</h2>';
						foreach ($my_tags as $val)
						{
							echo ' <a href="includes/remove-tag.inc.php?name='.$val.'" class="btn btn-danger" style="margin: 0.1% 0.1% 0.1% 0.1%" role="button">#'.$val.'</a>';
						}
					echo '</div>
					<div style="width: 25%;" class="container" scroll="auto">
						<h2 style="text-align: center; margin-top: 2%" class="text-danger">Add-Tags?</h2>';
						include_once 'includes/functions1.inc.php';
						foreach ($tags as $tag)
						{
							$check = tagExists($tag['tag_name'], $my_tags);
							if ($check == FALSE)
							{
								echo ' <a href="includes/add-tag.inc.php?id='.$tag['tag_id'].'" class="btn btn-danger" style="margin: 0.1% 0.1% 0.1% 0.1%" role="button">#'.$tag['tag_name'].'</a>';
							}
						}	
					echo '</div>
				  </div>';
		}
	}
	else
	{
		header("Location: ../index.php?error=error");
		exit();
	}
}
catch (PDOException $var)
{
	echo $var->getMessage();
}
?>

<?php
		include_once 'footer.php';
	}
	else
	{
		header("Location: index.php?error=PleaseLogin");
		exit();
	}


?>