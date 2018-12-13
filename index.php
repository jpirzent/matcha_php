<?php
	include_once 'header.php';
?>


<?php
	$DB_DSN = "localhost";
	$DB_USER  = "root";
	$DB_PASSWORD = "012345";
	$DB_NAME = "matcha";
	try
	{	
		$conn = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $var)
	{
		try
		{
			$sql = "CREATE DATABASE IF NOT EXISTS matcha";
			$conn = new PDO("mysql:host=$DB_DSN", $DB_USER, $DB_PASSWORD);
			$create = $conn->prepare($sql);
			$create->execute();
			
			include_once 'config/setup.con.php';
			$conn->query("use `$DB_NAME`");
			cr_users($conn);
			cr_likes($conn);
			cr_block($conn);
			cr_matches($conn);
			cr_pref($conn);
			cr_reports($conn);
			cr_tags($conn);
			cr_views($conn);
			echo "<script type='text/javascript'>alert('Database Created Successfully');</script>";
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}
	}
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
	if (isset($_SESSION['u_id']) && $_SESSION['u_add'] == 1)
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
	else
	{
		echo '<h1 class="text-danger text-center" style="margin-top: 10%;">Please Login</h1>';
	}

?>
</div>
</div>
<?php

	include_once 'footer.php';

?>