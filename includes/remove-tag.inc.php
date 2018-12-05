<?php

	session_start();

	if (isset($_SESSION['u_id']) && isset($_GET['name']))
	{
		$id = $_SESSION['u_id'];
		$tag = $_GET['name'];
		include_once 'dbh.inc.php';

		try
		{
			$sql = 'SELECT * FROM preferences WHERE pref_uid=:id LIMIT 1';
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':id', $id);
			$pdo->execute();

			$pref = $pdo->fetch(PDO::FETCH_ASSOC);
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}

		$tags = explode(',', $pref['pref_tags']);
		$tags = array_filter($tags);
		$x = 0;
		foreach ($tags as $val)
		{
			echo $val;
			echo '<br>'.$tag.'<br>';
			if ($val == $tag)
			{
				break;
			}
			$x++;
		}
		$x++;
		if ($x > 0)
		{
			unset($tags[$x - 1]);
		}
		$tags = array_filter($tags);
		$arr = implode(",", $tags);

		try
		{
			$sql = "UPDATE preferences SET pref_tags=:tags WHERE pref_uid=:id LIMIT 1";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':tags', $arr);
			$pdo->bindParam('id', $id);
			$pdo->execute();
			
			header("Location: ../user_home.php?changeSuccesfull?".$x);
			exit();
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}
	}
	else
	{
		header("Location: ../index.php?error=PleaseLogin");
		exit();
	}

?>