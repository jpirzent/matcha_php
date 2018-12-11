<?php
	session_start();

	if (isset($_SESSION['u_id']) && isset($_POST['submit']))
	{
		$msg = htmlentities($_POST['msg']);
		$pwd = $_POST['pwd'];
		$r_id = $_POST['id'];
		$u_id = $_SESSION['u_id'];
		
		if (empty($msg) || empty($r_id) || empty($pwd))
		{
			header("Location: ../index.php?login=error");
			exit();
		}
		else
		{
			include_once 'dbh.inc.php';
			try
			{
				$sql = "SELECT * FROM users WHERE user_id=:id";
				$pdo = $conn->prepare($sql);
				$pdo->bindParam(":id", $u_id);
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
					header("Location: ../report_user.php?error=invalid-pwd&id=".$r_id."");
					exit();
				}
				else if ($hashpwdcheck == TRUE)
				{
					try
					{
						$sql = "INSERT INTO reports (rep_reportee, rep_reporter, rep_msg) VALUES (:r_id, :u_id, :msg);";
						$pdo = $conn->prepare($sql);
						$pdo->bindParam(":r_id", $r_id);
						$pdo->bindParam(":u_id", $u_id);
						$pdo->bindParam(":msg", $msg);
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
	}
	else
	{
		header("Location: ../index.php?login=post_not_set");
		exit();
	}

?>