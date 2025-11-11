<?php 
// include_once('includes/header.php');
?>

<?php
// session_start();
?>
<!-- <h2>Login Form </h2> -

<section>
<?php
// $a=$_POST['username'];
// $b=$_POST['password'];
// echo $a;
// echo"<br>";
// echo $b;

// if($_POST['password']){
//  $password=$_POST['password'];
//  echo "Your Password is: $password";

//  $hash=password_hash($password,PASSWORD_DEFAULT);
//  echo "<br><br>";
//  echo "Encripted password:$hash";
//  echo "<br><br>";


//  $savesPassword="phpwebdesign";
//  if(password_verify($savesPassword, $hash)){
//     echo "Success!";
//  }
//  else{
//     echo "Failure";
//  }
// }
function login(){

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $userlevel=$_POST['ulevel'];
   
    $_SESSION['status']=TRUE;
  
    header("Location: reporthome.php");
    
}
    else{
        $_SESSION['status']=FALSE;
        header("Location: userform.php");  
    }
}

login();
include('includes/common.php');
loginToSite($_POST['username'],$_POST['password'],$_POST['ulevel']);



?>

</section>
<?php include_once('includes/footer.php'); ?>



