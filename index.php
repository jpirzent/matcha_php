<?php
	include_once 'header.php';
?>

<div class="container">
	<div class="page-header">
		<h1 class="text-danger text-center">Feed</h1>      
	</div>
</div>

<?php

if (isset($_GET['error']))
{
	echo '<div class="index-error">
			<h1>Error:</h1>
			<p>'.$_GET['error'].'</p>
		</div>';
}
?>
<div class="container">
<div class="row">
<?php

	if (isset($_SESSION['u_id']))
	{
		include_once 'includes/dbh.inc.php';

		$sql = 'SELECT * FROM users';
		$pdo = $conn->prepare($sql);
		$pdo->execute();

		$result = $pdo->fetchAll();
		foreach ($result as $value)
		{
			$uid = $value['user_uid'];
			$id = $value['user_id'];

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

?>
</div>
</div>
<?php

	include_once 'footer.php';

?>