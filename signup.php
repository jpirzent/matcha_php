
<?php
	include_once 'header.php';
?>

<div class="container">
  <div class="page-header">
    <h1 class="text-danger text-center">Sign-Up</h1>      
  </div>      
</div>

  <form style="width: 50%; margin-top: 3%" class="mx-auto">
  <div class="form-col">
    <div class="col">
	  <input type="text" class="form-control" placeholder="First Name">
	  <input type="text" class="form-control" placeholder="Last Name">
	  <input type="email" class="form-control" placeholder="Email">
	  <input type="text" class="form-control" placeholder="Username">
	  <input type="password" class="form-control" placeholder="Password">
	  <input type="password" class="form-control" placeholder="Password">
    </div>
	<a href="includes/signup.php" class="btn btn-success mx-auto" style="width: 200px; display: block; margin-top: 1%;">Signup</a>
  </div>
</form>

<?php
	include_once 'footer.php';
