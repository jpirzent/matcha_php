
<?php
	include_once 'header.php';
?>

<div class="container">
  <div class="page-header">
    <h1 class="text-danger text-center">Sign-Up</h1>      
  </div>      
</div>

  <form style="width: 50%; margin-top: 3%" class="mx-auto" action="includes/signup.inc.php" method="post">
  <div class="form-col">
    <div class="col">
	  <input type="text" class="form-control" placeholder="First Name" required name="first">
	  <input type="text" class="form-control" placeholder="Last Name" required name="last">
	  <input type="email" class="form-control" placeholder="Email" required name="email">
	  <input type="number" name="age" class="form-control" id="age" min="18" placeholder="Age">
	  <input type="text" class="form-control" placeholder="Username" required name="uid">
	  <input type="password" class="form-control" placeholder="Password" required name="pwd">
	  <button type="submit" name="submit" id="submit" class="btn btn-danger" style="margin-top: 1%; display: block; width: 100%" btn-lg btn-block" >Sign-Up</button>
    </div>
  </div>
</form>

<?php
	include_once 'footer.php';
