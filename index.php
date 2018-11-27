<?php
	include_once 'header.php';
?>

<section class="header-container">
	<div class="header-bar">
		<h2>Feed</h2>
	</div>
</section>

<?php

if (isset($_GET['error']))
{
	echo '<div class="index-error">
			<h1>Error:</h1>
			<p>'.$_GET['error'].'</p>
		</div>';
}

?>

<?php

	include_once 'footer.php';

?>