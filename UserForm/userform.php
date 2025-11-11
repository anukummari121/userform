<?php
// session_start();
?>


<?php include_once('includes/header.php');
 
?>


<h2>Login Form </h2>
<!-- <?php
// signon();
?> -->

<section>
<!-- Create Form -->

<form action="login.php" method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br>
  <label for="ulevel"> UserLevel:Enter 1: Admin, 2:User</label><br>
  <input type="number" id="ulevel" name="ulevel" min="1" max="2"><br>
  <br>
  <!-- <label for="number">Number (between 1 and 10):</label>
  <input type="number" id="number" name="number"><br><br> -->
  <input type="submit" value="Submit">
</form> 
</section>

<?php include_once('includes/footer.php'); ?>



