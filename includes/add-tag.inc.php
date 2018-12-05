<?php
	session_start();


	if (isset($_SESSION['u_id']) && isset($_GET['id']))
	{
		$id = $_SESSION['u_id'];
		$tag_id = $_GET['id'];
		include_once 'dbh.inc.php';

		//get name of tag//
		try
		{
			$sql = 'SELECT * FROM tags WHERE tag_id=:id LIMIT 1';
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':id', $tag_id);
			$pdo->execute();

			$tag_name = $pdo->fetch(PDO::FETCH_ASSOC);
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}

		//get current tags from db//
		try
		{
			$sql = 'SELECT * FROM preferences WHERE pref_uid=:id LIMIT 1';
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':id', $id);
			$pdo->execute();

			$user = $pdo->fetch(PDO::FETCH_ASSOC);
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}
		if ($user['pref_tags'] == NULL)
		{
			$fresh_tag = $tag_name['tag_name'].',';
			
			//add the fresh tag//
			try
			{
				$sql = "UPDATE preferences SET pref_tags=:tag WHERE pref_uid=:id LIMIT 1";
				$pdo = $conn->prepare($sql);
				$pdo->bindParam(':tag', $fresh_tag);
				$pdo->bindParam(':id', $id);
				$pdo->execute();
				header("Location: ../user_home.php?error=PleaseLogin");
				exit();
			}
			catch (PDOException $var)
			{
				echo $var->getMessage();
			}
		}
		else
		{
			$tags = explode(',', $user['pref_tags']);
			foreach ($tags as $val)
			{
				if ($val == $tag_name['tag_name'])
				{
					header("Location: ../user_home.php?error=AlreadyHaveThatTag");
					exit();
				}
			}
			$tags = array_filter($tags);
			array_push($tags, $tag_name['tag_name']);
			$arr = implode(",", $tags);

			try
			{
				$sql = "UPDATE preferences SET pref_tags=:tag WHERE pref_uid=:id LIMIT 1";
				$pdo = $conn->prepare($sql);
				$pdo->bindParam(':tag', $arr);
				$pdo->bindParam(':id', $id);
				$pdo->execute();
				header("Location: ../user_home.php?add=successfull");
				exit();
			}
			catch (PDOException $var)
			{
				echo $var->getMessage();
			}
		}
	}
	else
	{
		header("Location: ../index.php?error=PleaseLogin");
		exit();
	}

?>