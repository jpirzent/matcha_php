<?php
	include_once 'header.php';
?>

<div class="container">
	<div class="page-header">
		<h1 class="text-danger text-center">Feed</h1>      
	</div>
</div>

<div class="container">
<div class="row">
<?php

	include_once 'includes/functions1.inc.php';
	if (isset($_SESSION['u_id']))
	{
		include_once 'includes/dbh.inc.php';
		
		$sql = getQuery($conn, $_SESSION['u_id']);
		$pdo = $conn->prepare($sql);
		$pdo->execute();
		
		$result = $pdo->fetchAll();
		$x = 0;
		$users = array();
		foreach ($result as $val)
		{
			$m_id = $val['pref_uid'];
			
			try
			{
				$sql = "SELECT * FROM users WHERE user_id=:id";
				$pdo = $conn->prepare($sql);
				$pdo->bindParam(':id', $m_id);
				$pdo->execute();
				
				$match = $pdo->fetch(PDO::FETCH_ASSOC);
			}
			catch (PDOException $var)
			{
				echo $var->getMessage();
			}
			$users[$x] = $match;
			$x++;
		}
		
		
		$users = sortMatches($users, $conn);
		
		
		foreach ($users as $value)
		{
			$uid = $value['user_uid'];
			$id = $value['user_id'];
			$valid = checkUser($value, $conn);
			if ($valid == TRUE)
			{
				if ($id != $_SESSION['u_id'])
				{
					try
					{
						$sql = "SELECT * FROM preferences WHERE pref_uid=:id Limit 1";
						$pdo = $conn->prepare($sql);
						$pdo->bindParam(':id', $id);
						$pdo->execute();
						$check = $pdo->fetch(PDO::FETCH_ASSOC);
					}
					catch (PDOException $var)
					{
						echo $var->getMessage();
					}

					$profile = $check['pref_profile'];
					$bio = $check['pref_bio'];
					echo '<div class="col-sm mt-3">
							<div class="card bg-dark" style="width: 18rem;">
								<img class="card-img-top" src="data:image/png;base64,'.($profile).'" alt="Profile Picture" style="height: 200px">
								<div class="card-body">
									<h5 class="card-title text-danger">'.$uid.'</h5>
									<p class="card-text text-danger">'.$bio.'</p>
									<a href="view_profile.php?id='.$value['user_id'].'" class="btn btn-danger">View Profile</a>
								</div>
							</div>
						</div>';
				}
			}
		}
	}

?>
</div>
</div>
<?php

	include_once 'footer.php';

?>