 <?php
  session_start();
  require_once('includes/db_credentials.php');
?> 
<?php
?>

<?php
// function signon() {
  
//   echo "<h2>Welcome, Anu</h2>";
// }

// signon();

function success($number){

    
$i = 1;

while ($i <= 10) {
  //  echo '<img src="includes/success.jpg" alt="img" />';
  $i++;
}
echo "<br> The entered number is:$number";
}



//  echo "<br>";
function failure(){
  //  echo '<img src="includes/noLogin.jpg" alt="img" />';
}



// require('login.php');
// function loginToSite($username,$password,$number){
//   if($_POST['password']){
//     $password=$_POST['password'];
//     echo "Your Password is: $password";
   
//     $hash=password_hash($password,PASSWORD_DEFAULT);
//     echo "<br><br>";
//     echo "Encripted password:$hash";
//     echo "<br><br>";
   
   
//     $savesPassword="phpwebdesign";
//     if(password_verify($savesPassword, $hash)){
//       success($number);
//        return "Success!";
       
//     }
//     else{
//       failure();
//        return "Failure";
       
//     }
//    }
// }



function loginToSite($username,$password,$userlevel){
  function signon(){
  
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    // retrieve data
    $username=$_POST['username'];
    $password=$_POST['password'];
    $userlevel=$_POST['ulevel'];

 function getDatabaseConnection() { 
  $db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME); 
  if(mysqli_connect_errno()) { 
    $msg = "Database connection failed: "; 
    $msg .= mysqli_connect_error(); 
    $msg .= " (" . mysqli_connect_errno() . ")"; 
    exit($msg); 
  } 
  return $db; 
} 
$db=getDatabaseConnection();
 $query="SELECT *FROM users WHERE UserName='$username' AND UserPassword='$password'";
 $output=mysqli_query($db,$query);

   if($db->connect_error){
    die("connection failed:".$db->connect_error);
   }
   
   
    $result=$db->query($query);
    if($result->num_rows==1){

      while($s1=mysqli_fetch_assoc($output)){
      $_SESSION['fname']=$s1['FirstName'];
      $_SESSION['ulevel']=$s1['UserLevel'];

    }
    
   header("Location: reporthome.php");
  return TRUE;
   
      exit();
    }

    else{
      
 header("Location: userform.php");

return FALSE;
    exit();
  }
 $db->close();

  }
  
}
signon();

}


?>

<?php

function getDates(){
  ?>
 <?php
 $db=getDatabaseConnection();
 $sql="SELECT * FROM report_dates ORDER BY reportDate ";
  $result=mysqli_query($db,$sql);

  while($r=mysqli_fetch_assoc($result)){
    ?>
    <option value="<?php echo $r['reportDate']?>"><?php echo $r['reportDate']?></option>
    <?php
  }
  ?>

  <?php
    }
  ?>



<?Php
function getProjects(){
    ?>
   <?php
   $db=getDatabaseConnection();
   $sql="SELECT  * FROM project_names ORDER BY ProjectName ";
    $result=mysqli_query($db,$sql);

    while($row1=mysqli_fetch_assoc($result)){
      ?>
    
      <option value="<?php echo $row1['ProjectID']?>"><?php echo $row1['ProjectName']?></option>
      <?php
    }
    ?>
<?php
}
?>




