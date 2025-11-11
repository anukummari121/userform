<?php
// session_start();
require('includes/common.php');
require_once('includes/db_credentials.php'); 


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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles-2.css">

    <style>
.toc{
    white-space: nowrap;

  }
  .pm{
    white-space: nowrap;
  }
    </style>

</head>
<body>
<?php
   $a=$_SESSION['fname'];
 
   echo "<h2>Welcome, $a </h2>";
   ?>
    
    <h1>Create Status Report</h1>
    <div>
      <form action="report_include.php" method="post">
    <fieldset>
    
    <label for="date"><strong>Date:</strong></label>
    <br>
   
  <select name="date" id="date" required>
    <option value="date">Select Date</option>

    <?php
    $db=getDatabaseConnection();
    $sql="SELECT * FROM report_dates ORDER BY reportDate ";
    $result=mysqli_query($db,$sql);
     $resultCheck=mysqli_num_rows($result);

     if($resultCheck>0){
    while($row=mysqli_fetch_assoc($result)){
    ?>
    <option value="<?php echo $row['reportDate']?>"><?php echo $row['reportDate']?></option>
    <?php
  }
  ?>
  <?php
     }
  ?>
  </select>
  <p class="toc"><label for="timeofcheck"><strong>Time of Check</strong></label>
    <br>
    <input type="text" id="timeofcheck" name="timeofcheck" maxlength="20" size="20" value="" required/></p>
    <p><label for="project"><strong>Project</strong></label>
    <br>
    <select name="project" id="project" required>
    <option value="project">Select Project</option>

    <?php
    $db=getDatabaseConnection();
    $sql="SELECT * FROM project_names ORDER BY ProjectName";
    $result=mysqli_query($db,$sql);
    $resultCheck=mysqli_num_rows($result);

  if($resultCheck>0){
  while($row=mysqli_fetch_assoc($result)){
    ?>
  
    <option value="<?php echo $row['ProjectID']?>"><?php echo $row['ProjectName']?></option>
    <?php
  }
  ?>
<?php
  }
?>
  </select>
  <p class="pm"><label for="Project manager"><strong>Project Manager</strong></label>
   <input type="text" id="Projectmanager" name="Projectmanager" maxlength="20" size="20" value="" required/></p> 
  </fieldset>
  <fieldset>
    
    <legend><strong>Status</strong></legend>
    <ol>
    <li>
    <label>Overall status?</label>
    <input type="radio" id="overallstatus" name="overallstatus" value="Green" required>
    <label for="overallstatus">Green</label>
    <input type="radio" id="overallstatus" name="overallstatus" value="Yellow" required>
    <label for="overallstatus">Yellow</label>
    <input type="radio" id="overallstatus" name="overallstatus" value="Red" required>
    <label for="overallstatus">Red*</label>
    </li>
    
  <li>
  <label>Schdule?</label>
  <input type="radio" id="schdule" name="schdule" value="Green" required>
  <label for="schdule">Green</label>
  <input type="radio" id="schdule" name="schdule" value="Yellow" required>
  <label for="schdule">Yellow</label>
  <input type="radio" id="schdule" name="schdule" value="Red" required>
   <label for="schdule">Red*</label>
   </li>
   
   <li>
  <label>Quality?</label>
  <input type="radio" id="quality" name="quality" value="Green" required>
  <label for="quality">Green</label>
  <input type="radio" id="quality" name="quality" value="Yellow" required>
  <label for="quality">Yellow</label>
  <input type="radio" id="quality" name="quality" value="Red" required>
  <label for="quality">Red*</label>
</li>
</ol>

  </fieldset>
  <fieldset>
    
  <h3>*Please note in comments reasons behind Red status:</h3>
  <legend><strong>Comments</strong></legend>
  <textarea id="comments" name="comments" rows="4" cols="70" required></textarea>
  </select>  
  </fieldset>
  
  <input type="submit" value="Submit" name="submit" id="submit"/>
  <input type="submit" value="Submit & Return Home" name="submithome" id="submithome"/>
 
  </form>
 
  <a href="reporthome.php"><input type="submit" value="Cancel" name="Cancel" id="Cancel"/></a>
  <a href="logout.php"><input type="submit" value="Logout" name="logout" id="logout"/></a> 
    </div>
</body>
</html>