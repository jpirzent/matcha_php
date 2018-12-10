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
				if ($tag == $val)
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

		$tag_rate = $simTags * 10;
		if ($tag_rate > 100)
		{
			$tag_rate = 100;
		}

		$rate = 100 - $gap;
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
				if ($tmp1 > $tmp2)
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