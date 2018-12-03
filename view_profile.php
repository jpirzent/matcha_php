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
		$sql = "SELECT * FROM users WHERE user_id=:id LIMIT 1";
		$pdo = $conn->prepare($sql);
		$pdo->bindParam(':id', $id);
		$pdo->execute();

		$result = $pdo->fetch(PDO::FETCH_ASSOC);

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

				echo '<div class="jumbotron text-danger bg-dark" style="margin-top: 2%">
						<h1 class="display-4">'.$uid.'</h1>
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
						<p>'.$name.'</p>
						<p>'.$gender.'</p>
						<p>'.$sex.'</p>
						<p>/common tags/</p>
						<a class="btn btn-danger btn-lg" href="#" role="button">match?</a>
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