<?php

	session_start();
	include_once 'dbh.inc.php';


	if (isset($_GET['id']) && isset($_SESSION['u_id']))
	{
		$my_id = $_SESSION['u_id'];
		$profile_id = $_GET['id'];;
		
		//add to likes table
		try
		{
			$sql = "INSERT INTO likes (likes_profile, likes_user) VALUES (:prof, :user)";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':prof', $profile_id);
			$pdo->bindParam(':user', $my_id);
			$pdo->execute();
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}

		//check if they're matched
		try
		{
			$sql = "SELECT COUNT(*) FROM matches WHERE (match_p1 = :p1 AND match_p2 = :p2) OR (match_p1 = :p3 AND match_p2 = :p4)";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':p1', $my_id);
			$pdo->bindParam(':p2', $profile_id);
			$pdo->bindParam(':p3', $profile_id);
			$pdo->bindParam(':p4', $my_id);
			$pdo->execute();

			$count = $pdo->fetchColumn();
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}
		if ($count == 0)
		{
			//check if other person like current user
			try
			{
				$sql = "SELECT * from likes WHERE (likes_profile = :user AND likes_user = :prof)";
				$pdo = $conn->prepare($sql);
				$pdo->bindParam(':user', $my_id);
				$pdo->bindParam(':prof', $profile_id);
				$pdo->execute();

				$result = $pdo->fetchAll();
				if ($result)
				{
					//add match
					try
					{
						$sql = "INSERT INTO matches (match_p1, match_p2) VALUES (:prof, :user)";
						$pdo = $conn->prepare($sql);
						$pdo->bindParam(':prof', $profile_id);
						$pdo->bindParam(':user', $my_id);
						$pdo->execute();
	
						header("Location: ../index.php?Success--nm");
						exit();
					}
					catch (PDOException $var)
					{
						echo $var->getMessage();
					}
				}
				else
				{
					header("Location: ../index.php?Success--al");
					exit();
				}
			}
			catch (PDOException $var)
			{
				echo $var->getMessage();
			}
		}
		else
		{
			header("Location: ../index.php?Success--am");
			exit();
		}
	}
	else
	{
		header("Location: ../index.php?error=PleaseLogin");
		exit();	
	}

?>