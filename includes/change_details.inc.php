<?php

	session_start();
	include_once 'dbh.inc.php';

	if (isset($_SESSION['u_id']) && isset($_POST['submit']))
	{
		//uid
		if ($_POST['submit'] == "uid")
		{
			$n_uid = $_POST['newuid'];
			$o_uid = $_SESSION['u_uid'];
			$pwd = $_POST['pwd'];

			if (empty($n_uid) || empty($pwd))
			{
				header("Location: ../change.php?error=empty-fields&change=uid");
				exit();
			}
			else
			{
				if (!preg_match("/^[a-zA-Z]*$/", $n_uid))
				{
					header("Location: ../change.php?error=invalid-name&change=uid");
					exit();
				}
				else
				{
					try
					{
						$sql = "SELECT COUNT(*) FROM users WHERE user_uid=:username";
						$pdo = $conn->prepare($sql);
						$pdo->bindParam(":username", $n_uid);
						$pdo->execute();
						$resCheck = $pdo->fetchColumn();
					}
					catch (PDOException $var)
					{
						echo $var->getMessage();
					}
					if ($resCheck > 0)
					{
						header("Location: ../change.php?error=invalid-name&change=uid");
						exit();
					}
					else
					{
						try
						{
							$sql = "SELECT * FROM users WHERE user_uid=:username";
							$pdo = $conn->prepare($sql);
							$pdo->bindParam(":username", $o_uid);
							$pdo->execute();
							$row = $pdo->fetch(PDO::FETCH_ASSOC);
						}
						catch (PDOException $var)
						{
							echo $var->getMessage();
						}
						if ($row)
						{
							$hashpwdcheck = password_verify($pwd, $row['user_pwd']);
							if ($hashpwdcheck == FALSE)
							{
								header("Location: ../change.php?error=invalid-pwd&change=uid");
								exit();
							}
							else if ($hashpwdcheck == TRUE)
							{
								try
								{
									$sql = "UPDATE users SET user_uid=:username WHERE user_id=:id LIMIT 1";
									$stmt = $conn->prepare($sql);
									$stmt->bindParam(":username", $n_uid);
									$stmt->bindParam(":id", $_SESSION['u_id']);
									$stmt->execute();
									header("Location: ../index.php?change=successfull");
									exit();
								}
								catch (PDOException $var)
								{
									echo $var->getMessage();
								}
							}
						}
					}
				}
			}
		}
		//pwd
		else if ($_POST['submit'] == "pwd")
		{
			$id = $_SESSION['u_id'];
			$n_pwd = $_POST['newpwd'];
			$o_pwd = $_POST['oldpwd'];

			if (empty($n_pwd) || empty($o_pwd))
			{
				header("Location: ../change.php?error=empty-fields&change=pwd");
				exit();
			}
			else
			{
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
					$hashpwdcheck = password_verify($o_pwd, $row['user_pwd']);
					if ($hashpwdcheck == FALSE)
					{
						header("Location: ../change.php?error=invalid-pwd&change=pwd");
						exit();
					}
					else if ($hashpwdcheck == TRUE)
					{
						if (preg_match( '~[A-Z]~', $n_pwd) && preg_match( '~[a-z]~', $n_pwd) && preg_match( '~\d~', $n_pwd) && (strlen( $n_pwd) > 8))
						{
							try
							{
								$hashpwd = password_hash($n_pwd, PASSWORD_DEFAULT);
								$sql = "UPDATE users SET user_pwd=:hashpwd WHERE user_id=:id";
								$stmt = $conn->prepare($sql);
								$stmt->bindParam(":hashpwd", $hashpwd);
								$stmt->bindParam(":id", $id);
								$stmt->execute();
								header("Location: ../index.php?change=successfull");
								exit();
							}
							catch (PDOException $var)
							{
								echo $var->getMessage();
							}
						}
						else
						{
							header("Location: ../change.php?error=invalid-pwd&change=pwd");
							exit();
						}
					}
				}
			}
		}
		//email
		else if ($_POST['submit'] == "email")
		{
			$id = $_SESSION['u_id'];
			$pwd = $_POST['pwd'];
			$email = $_POST['newemail'];

			if (empty($pwd) || empty($email))
			{
				header("Location: ../change.php?error=empty-fields&change=email");
				exit();
			}
			else
			{
				if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					header("Location: ../change.php?error=invalid-email&change=email");
					exit();
				}
				else
				{
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
						$hashpwdcheck = password_verify($pwd, $row['user_pwd']);
						if ($hashpwdcheck == FALSE)
						{
							header("Location: ../change.php?error=invalid-pwd&change=email");
							exit();
						}
						else if ($hashpwdcheck == TRUE)
						{
							try
							{
								$sql = "UPDATE users SET user_email=:email WHERE user_id=:id LIMIT 1";
								$stmt = $conn->prepare($sql);
								$stmt->bindParam(":email", $email);
								$stmt->bindParam(":id", $id);
								$stmt->execute();
								header("Location: ../index.php?change=successfull");
								exit();
							}
							catch (PDOException $var)
							{
								echo $var->getMessage();
							}
						}
					}
				}
			}
		}
		//gender
		else if ($_POST['submit'] == "gender")
		{
			$id = $_SESSION['u_id'];
			$gender = $_POST['genders'];
			$pwd = $_POST['pwd'];

			if (empty($gender) || empty($pwd))
			{
				header("Location: ../change.php?error=empty-fields&change=gender");
				exit();
			}
			else
			{
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
					$hashpwdcheck = password_verify($pwd, $row['user_pwd']);
					if ($hashpwdcheck == FALSE)
					{
						header("Location: ../change.php?error=invalid-pwd&change=gender");
						exit();
					}
					else if ($hashpwdcheck == TRUE)
					{
						try
						{
							$sql = "UPDATE preferences SET pref_gender=:gender WHERE pref_uid=:id LIMIT 1";
							$stmt = $conn->prepare($sql);
							$stmt->bindParam(":gender", $gender);
							$stmt->bindParam(":id", $id);
							$stmt->execute();
							header("Location: ../index.php?change=successfull");
							exit();
						}
						catch (PDOException $var)
						{
							echo $var->getMessage();
						}
					}
				}
			}
		}
		//sex
		else if ($_POST['submit'] == "sex")
		{
			$id = $_SESSION['u_id'];
			$sex = $_POST['sexuality'];
			$pwd = $_POST['pwd'];

			if (empty($sex) || empty($pwd))
			{
				header("Location: ../change.php?error=empty-fields&change=sex");
				exit();
			}
			else
			{
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
					$hashpwdcheck = password_verify($pwd, $row['user_pwd']);
					if ($hashpwdcheck == FALSE)
					{
						header("Location: ../change.php?error=invalid-pwd&change=sex");
						exit();
					}
					else if ($hashpwdcheck == TRUE)
					{
						try
						{
							$sql = "UPDATE preferences SET pref_sex=:sex WHERE pref_uid=:id LIMIT 1";
							$stmt = $conn->prepare($sql);
							$stmt->bindParam(":sex", $sex);
							$stmt->bindParam(":id", $id);
							$stmt->execute();
							header("Location: ../index.php?change=successfull");
							exit();
						}
						catch (PDOException $var)
						{
							echo $var->getMessage();
						}
					}
				}
			}
		}
		//bio
		else if ($_POST['submit'] == "bio")
		{
			$id = $_SESSION['u_id'];
			$pwd = $_POST['pwd'];
			$bio = htmlentities($_POST['bio']);

			if (empty($pwd) || empty($bio))
			{
				header("Location: ../change.php?error=empty-fields&change=bio");
				exit();
			}
			else
			{
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
					$hashpwdcheck = password_verify($pwd, $row['user_pwd']);
					if ($hashpwdcheck == FALSE)
					{
						header("Location: ../change.php?error=invalid-pwd&change=bio");
						exit();
					}
					else if ($hashpwdcheck == TRUE)
					{
						try
						{
							$sql = "UPDATE preferences SET pref_bio=:bio WHERE pref_uid=:id LIMIT 1";
							$stmt = $conn->prepare($sql);
							$stmt->bindParam(":bio", $bio);
							$stmt->bindParam(":id", $id);
							$stmt->execute();
							header("Location: ../index.php?change=successfull");
							exit();
						}
						catch (PDOException $var)
						{
							echo $var->getMessage();
						}
					}
				}
			}
		}
		else if ($_POST['submit'] == "pic")
		{
			$id = $_SESSION['u_id'];
			if (isset($_FILES['profile']))
			{
				$profile = base64_encode(file_get_contents($_FILES['profile']['tmp_name']));
			}
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
			try
			{
				$sql = "UPDATE preferences 
						SET pref_profile = :profiles, `pref_ot-pic1` = :other1, `pref_ot-pic2` = :other2, `pref_ot-pic3` = :other3, `pref_ot-pic4` = :other4 
						WHERE pref_uid=:id LIMIT 1";
				$pdo = $conn->prepare($sql);
				$pdo->bindParam(':profiles', $profile);
				echo 'what?<br>';
				$pdo->bindParam(':other1', $other1);
				$pdo->bindParam(':other2', $other2);
				$pdo->bindParam(':other3', $other3);
				$pdo->bindParam(':other4', $other4);
				$pdo->bindParam(':id', $id);
				$pdo->execute();

				header("Location: ../index.php?change=successfull");
				exit();
			}
			catch (PDOException $var)
			{
				echo $var->getMessage();
			}
		}
	}

?>