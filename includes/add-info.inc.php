<?php

	session_start();

	if (isset($_POST['submit']) && isset($_SESSION['u_id']))
	{
		$gender = $_POST['genders'];
		$sex = $_POST['sexuality'];
		$bio = htmlentities($_POST['bio']);

		$profile = base64_encode(file_get_contents($_FILES['profile']['tmp_name']));
		if (isset($_FILES['ot-pic1']))
		{
			$other1 = base64_encode(file_get_contents($_FILES['ot-pic1']['tmp_name']));
		}
		if (isset($_FILES['ot-pic1']))
		{
			$other2 = base64_encode(file_get_contents($_FILES['ot-pic2']['tmp_name']));
		}
		if (isset($_FILES['ot-pic1']))
		{
			$other3 = base64_encode(file_get_contents($_FILES['ot-pic3']['tmp_name']));
		}
		if (isset($_FILES['ot-pic1']))
		{
			$other4 = base64_encode(file_get_contents($_FILES['ot-pic4']['tmp_name']));
		}
		if (empty($gender) || empty($sex) || empty($bio))
		{
			header("Location: ../index.php?error=PleaseLogin");
			exit();
		}
		else
		{
			$id = $_SESSION['u_id'];
			include_once 'dbh.inc.php';
			try
			{
				$sql = "SELECT * FROM users WHERE user_id=:id Limit 1";
				$pdo = $conn->prepare($sql);
				$pdo->bindParam(':id', $id);
				$pdo->execute();
				$check = $pdo->fetch(PDO::FETCH_ASSOC);
			}
			catch (PDOException $var)
			{
				echo $var->getMessage();
			}
			if (empty($check))
			{
				header("Location: ../index.php?error=PleaseLogin");
				exit();
			}
			else
			{
				try
				{
					$x = 1;
					$sql = "UPDATE users SET user_add = :add WHERE user_id = :id";
					$pdo = $conn->prepare($sql);
					$pdo->bindParam(':add', $x);
					$pdo->bindParam(':id', $id);
					$pdo->execute();
				}
				catch (PDOException $var)
				{
					echo $var->getMessage();
				}

				$_SESSION['u_add'] = '1';
				try
				{
					$sql = 'INSERT INTO preferences (pref_gender, pref_sex, pref_bio, pref_uid, pref_profile, `pref_ot-pic1`, `pref_ot-pic2`, `pref_ot-pic3`, `pref_ot-pic4`) VALUES (:gender, :sex, :bio, :id, :profiles, :other1, :other2, :other3, :other4);';
					$pdo = $conn->prepare($sql);
					$pdo->bindParam(':gender', $gender);
					$pdo->bindParam(':sex', $sex);
					$pdo->bindParam(':bio', $bio);
					$pdo->bindParam(':id', $id);
					$pdo->bindParam(':profiles', $profile);
					$pdo->bindParam(':other1', $other1);
					$pdo->bindParam(':other2', $other2);
					$pdo->bindParam(':other3', $other3);
					$pdo->bindParam(':other4', $other4);
					$pdo->execute();
					header("Location: ../index.php?Success");
					exit();
				}
				catch (PDOException $var)
				{
					echo $var->getMessage();
				}
				
			}
		}
	}
	else
	{
		header("Location: ../index.php?error=PleaseLogin");
		exit();
	}

?>