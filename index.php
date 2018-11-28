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

<?php

	include_once 'footer.php';

?>