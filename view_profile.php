<?php
	session_start();
	if (isset($_SESSION['u_id']))
	{
		include_once 'header.php';
?>
<?php

	include_once 'includes/dbh.inc.php';
	$id = $_GET['id'];

	
	try
	{
		$sql = "INSERT INTO views (views_usee, views_user) VALUES (:usee, :user)";
		$pdo = $conn->prepare($sql);
		$pdo->bindParam(":usee", $_SESSION['u_id']);
		$pdo->bindParam(":user", $id);
		$pdo->execute();
	}
	catch (PDOException $var)
	{
		echo $var->getMessage();
	}



	try
	{
		$sql = "SELECT * FROM users WHERE user_id=:id LIMIT 1";
		$pdo = $conn->prepare($sql);
		$pdo->bindParam(':id', $id);
		$pdo->execute();
		
		$result = $pdo->fetch(PDO::FETCH_ASSOC);
		
		if ($result)
		{
			$uid = $result['user_uid'];
			$name = $result['user_first'].' '.$result['user_last'];
			$age = $result['user_age'];

			$sql = "SELECT * FROM preferences WHERE pref_uid=:id LIMIT 1";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':id', $id);
			$pdo->execute();
			
			$res = $pdo->fetch(PDO::FETCH_ASSOC);


			$user = $_SESSION['u_id'];
			$sql = "SELECT * FROM preferences WHERE pref_uid=:id LIMIT 1";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':id', $user);
			$pdo->execute();

			$u_pref = $pdo->fetch(PDO::FETCH_ASSOC);
			$u_tags = explode(',', $u_pref['pref_tags']);
			if ($res)
			{
				$bio = $res['pref_bio'];
				$sex = $res['pref_sex'];
				$gender = $res['pref_gender'];
				$profile = $res['pref_profile'];
				$f_rate = $res['pref_fameRate'];
				$my_tags = explode(',', $res['pref_tags']);
				
				echo '<div class="jumbotron text-danger bg-dark" style="margin-top: 2%">
						<div class="btn btn-warning" style="float: right">Fame Rating: '.$f_rate.'!!</div>
						<h1 class="display-4">'.$uid.'</h1>
						<a class="btn btn-outline-danger" style="float: right" href="report_user.php?id='.$id.'">Report User?</a>
						<a class="btn btn-outline-danger" style="float: right; margin-right: 1%" href="block_user.php?id='.$id.'">Block User?</a>
						<p class="lead">'.$bio.'</p>
						<hr class="my-4 bg-danger">
						<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-25 mx-auto" src="data:image/png;base64,'.$profile.'" alt="First slide">
								</div>';
				if (!(empty($res['pref_ot-pic1'])))
				{
					echo '<div class="carousel-item">
							<img class="d-block w-25 mx-auto" src="data:image/png;base64,'.$res['pref_ot-pic1'].'" alt="Second slide">
						</div>';
				}
				if (!(empty($res['pref_ot-pic2'])))
				{
					echo '<div class="carousel-item">
							<img class="d-block w-25 mx-auto" src="data:image/png;base64,'.$res['pref_ot-pic2'].'" alt="Third slide">
						</div>';
				}
				if (!(empty($res['pref_ot-pic3'])))
				{
					echo '<div class="carousel-item">
							<img class="d-block w-25 mx-auto" src="data:image/png;base64,'.$res['pref_ot-pic3'].'" alt="Fourth slide">
						</div>';
				}
				if (!(empty($res['pref_ot-pic4'])))
				{
					echo '<div class="carousel-item">
							<img class="d-block w-25 mx-auto" src="data:image/png;base64,'.$res['pref_ot-pic4'].'" alt="Fifth slide">
						</div>';
				}
				echo '</div>
						</div>
						<h3 style="text-align: center; margin-top: 2%">/Name/ '.$name.'</h3>
						<h3 style="text-align: center; margin-top: 2%">/Gender/ '.$gender.'</h3>
						<h3 style="text-align: center; margin-top: 2%">/Sexuality/ '.$sex.'</h3>
						<div style="width: 25%; margin-top: 2%" class="container" scroll="auto">
						<h2 style="text-align: center;" class="text-danger">Common-Tags</h2>';
					include_once 'includes/functions1.inc.php';
					foreach ($my_tags as $val)
					{
						$check = tagExists($val, $u_tags);
						if ($check == TRUE)
						{
							echo ' <a href="" class="btn btn-danger btn-xlg" style="margin: 0.1% 0.1% 0.1% 0.1%" role="button">#'.$val.'</a>';
						}
					}
				echo '</div><div class="text-center" style="margin-top: 1%;"><a class="btn btn-outline-danger btn-lg" href="includes/match.inc.php?id='.$id.'" role="button">Like?</a></div>
					  </div>';
			}
		}
		else
		{
			header("Location: index.php?error=error");
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