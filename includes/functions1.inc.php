<?php
	function tagExists($tag, $tag_arr)
	{
		$bool = false;
		foreach ($tag_arr as $val)
		{
			if ($val == $tag)
			{
				$bool = TRUE;
			}
		}
		return ($bool);
	}

	function tagSimilar($myTags, $userTags)
	{
		$num = 0;
		foreach ($myTags as $tag)
		{
			foreach ($userTags as $val)
			{
				if ($tag === $val)
				{
					$num++;
				}
			}
		}
		return $num;
	}

	function ageGap($myAge, $userAge)
	{
		$gap = $myAge - $userAge;

		if ($gap >= 0)
		{
			return $gap;
		}
		else
		{
			$gap = $gap * -1;
			return $gap;
		}
	}

	function fameRate($user, $conn)
	{
		$age = ageGap($_SESSION['u_age'], $user['user_age']);
		try
		{
			$sql = "SELECT * FROM preferences WHERE pref_uid = :id LIMIT 1";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':id', $user['user_id']);
			$pdo->execute();

			$u_pref = $pdo->fetch(PDO::FETCH_ASSOC);
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}
		try
		{
			$sql = "SELECT * FROM preferences WHERE pref_uid=:id LIMIT 1";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':id', $_SESSION['u_id']);
			$pdo->execute();

			$my_pref = $pdo->fetch(PDO::FETCH_ASSOC);
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}

		$simTags = tagSimilar($my_pref, $u_pref);

		$tag_rate = $simTags;
		$rate = 100 - $age;
		$rate = $rate + $tag_rate;
		return $rate;
	}

	function sortMatches($users, $conn)
	{
		$total = count($users);
		$changed = 1;
		while ($changed == 1)
		{
			$changed = 0;
			for ($x = 0; $x <= $total; $x++)
			{
				$tmp1 = fameRate($users[$x], $conn);
				$tmp2 = fameRate($users[$x + 1], $conn);
				if ($tmp1 < $tmp2)
				{
					$temp_arr = $users[$x];
					$users[$x] = $users[$x + 1];
					$users[$x + 1] = $temp_arr;
					$changed = 1;
				}
			}
		}
		$users = array_filter($users);
		return $users;
	}


	function getQuery($conn, $id)
	{
		try
		{
			$sql = "SELECT pref_gender, pref_sex FROM preferences WHERE pref_uid=:id LIMIT 1";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':id', $id);
			$pdo->execute();

			$gender = $pdo->fetch(PDO::FETCH_ASSOC);
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}

		switch ($gender['pref_gender'])
		{
			case 'Male':
				switch ($gender['pref_sex'])
				{
					case 'Heterosexual':
						$sql = "SELECT pref_uid 
								FROM preferences 
								WHERE pref_gender='Female' 
								AND (pref_sex='Heterosexual' OR pref_sex='Bisexual')";
					break;
					case 'Homosexual':
						$sql = "SELECT pref_uid 
								FROM preferences 
								WHERE pref_gender='Male' 
								AND (pref_sex='Homosexual' OR pref_sex='Bisexual')";
					break;
					case 'Bisexual':
						$sql = "SELECT pref_uid 
								FROM preferences 
								WHERE (pref_gender='Female' AND pref_sex='Heterosexual') 
								OR (pref_gender='Female' AND pref_sex='Bisexual')
								OR (pref_gender='Male' AND pref_sex='Homosexual')
								OR (pref_gender='Male' AND pref_sex='Bisexual')";
					break;
				}
			break;
			case 'Female':
			switch ($gender['pref_sex'])
				{
					case 'Heterosexual':
						$sql = "SELECT pref_uid 
								FROM preferences 
								WHERE pref_gender='Male' 
								AND (pref_sex='Heterosexual' OR pref_sex='Bisexual')";
					break;
					case 'Homosexual':
						$sql = "SELECT pref_uid 
								FROM preferences 
								WHERE pref_gender='Female' 
								AND (pref_sex='Homosexual' OR pref_sex='Bisexual')";
					break;
					case 'Bisexual':
						$sql = "SELECT pref_uid 
								FROM preferences 
								WHERE (pref_gender='Male' AND pref_sex='Heterosexual') 
								OR (pref_gender='Male' AND pref_sex='Bisexual')
								OR (pref_gender='Female' AND pref_sex='Homosexual')
								OR (pref_gender='Female' AND pref_sex='Bisexual')";
					break;
				}
			break;
		}
		return $sql;
	}


	function checkUser($user, $conn)
	{
		try
		{
			$sql = "SELECT COUNT(*) FROM `block` WHERE block_user=:id";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':id', $user['user_id']);
			$pdo->execute();

			$count = $pdo->fetchColumn();
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}

		if ($count == 0)
		{
			return TRUE;
		}
		else
		{
			try
			{
				$sql = "SELECT * FROM `block` WHERE block_user=:id";
				$pdo = $conn->prepare($sql);
				$id = $user['user_id'];
				$pdo->bindParam(':id', $id);
				$pdo->execute();
	
				$list = $pdo->fetchAll();
			}
			catch (PDOException $var)
			{
				echo $var->getMessage();
			}
			if ($list)
			{
				foreach ($list as $val)
				{
					if ($_SESSION['u_id'] == $val['block_blocker'])
					{
						return FALSE;
					}
				}
				return TRUE;
			}
		}
	}



	function updateFameRating($conn)
	{
		//get view_count
		try
		{
			$sql = "SELECT COUNT(*) FROM views WHERE views_user=:id";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':id', $_SESSION['u_id']);
			$pdo->execute();

			$views = $pdo->fetchColumn();
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}

		//get blocked_count
		try
		{
			$sql = "SELECT COUNT(*) FROM `block` WHERE block_user=:id";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':id', $_SESSION['u_id']);
			$pdo->execute();

			$block_count = $pdo->fetchColumn();
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}

		//get report_count
		try
		{
			$sql = "SELECT COUNT(*) FROM reports WHERE rep_reportee=:id";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':id', $_SESSION['u_id']);
			$pdo->execute();

			$report_count = $pdo->fetchColumn();
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}

		$f_rate = 100 + round($views / 3) - (3 * $block_count) - (2 * $report_count);

		try
		{
			$sql = "UPDATE preferences SET pref_fameRate=:rate WHERE pref_uid=:id";
			$pdo = $conn->prepare($sql);
			$pdo->bindParam(':rate', $f_rate);
			$pdo->bindParam(':id', $_SESSION['u_id']);
			$pdo->execute();
		}
		catch (PDOException $var)
		{
			echo $var->getMessage();
		}
	}