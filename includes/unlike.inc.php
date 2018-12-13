<?php

	session_start();
	include_once 'dbh.inc.php';

	if (isset($_SESSION['u_id']) && isset($_GET['id']))
	{
		//to do:
		//remove all likes from the current user with the current profile
		//check if we matched
		//if matched, remove match

		$my_id = $_SESSION['u_id'];
		$id = $_GET['id'];

		try
		{
			$sql = "DELETE FROM likes WHERE (likes_profile=:id AND likes_user=:my_id)";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':id', $id);
			$pdo->bindParam(':my_id', $my_id);
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
			$pdo->bindParam(':p2', $id);
			$pdo->bindParam(':p3', $id);
			$pdo->bindParam(':p4', $my_id);
			$pdo->execute();

			$count = $pdo->fetchColumn();
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}
		if ($count > 0)
		{
			try
			{
				$sql = "DELETE FROM matches WHERE (match_p1 = :p1 AND match_p2 = :p2) OR (match_p1 = :p3 AND match_p2 = :p4)";
				$pdo = $conn->prepare($sql);
				$pdo->bindParam(':p1', $my_id);
				$pdo->bindParam(':p2', $id);
				$pdo->bindParam(':p3', $id);
				$pdo->bindParam(':p4', $my_id);
				$pdo->execute();

				header("Location: ../index.php?Success--rm");
				exit();
			}
			catch (PDOException $var)
			{
				echo $var->getMessage();
			}
		}
		else
		{
			header("Location: ../index.php?Success--notm");
			exit();
		}

	}
	else
	{
		header("Location: ../index.php?error=PleaseLogin");
		exit();
	}
	
?>
	header("Location: ../index.php?Success");
	exit();