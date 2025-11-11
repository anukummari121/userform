<?php
//  session_start();
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

<?php
if(isset($_POST['edit'])){
  $ed1=$_POST['editid'];
  echo "The id is $ed1";
  // $overallStatus=$_POST['overallstatus'];
  // $Schdule=$_POST['schdule'];
  // $quality=$_POST['quality'];
  
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
    echo "<h2>Welcome, $a </h2>";?>
    <h1>Edit Status Report</h1>
    <div>

    <?php
    $con=getDatabaseConnection();
    $result=mysqli_query($con,"SELECT * FROM status_report  
    INNER JOIN project_names 
    ON status_report.projectID = project_names.projectID AND id='{$ed1}'");
    
    while($row = mysqli_fetch_assoc($result)){
    ?>


      <form action="report_include.php" method="post">
    <fieldset>
    
   
   <label for="date"><strong>Date:</strong></label>
    <br>
   
  <select name="date" id="date" required>
    <option value="date"><?php echo $row['submit_date'] ?></option>
  <?Php
    getDates();
  ?>
  </select>

    <p class="toc"><label for="timeofcheck"><strong>Time of Check</strong></label>
    <!-- <br> -->
    <input type="text" id="timeofcheck" name="timeofcheck" required maxlength="20" size="20" value="<?php echo $row['submit_time'];?>"/></p>
   
    <p><label for="project"><strong>Project</strong></label></p>
    
    <select name="project" id="project" required>
    <option value="project"><?php echo $row['ProjectName'] ?></option>
<?php
    getProjects();

  ?>
  </select>
 <p class="pm"><label for="Project manager"><strong>Project Manager</strong></label>
    
     <input type="text" id="Projectmanager" name="Projectmanager" maxlength="20" size="20" value="<?php echo $row['ProjectManager'] ?>" required/></p> 
  </fieldset>
  
  <fieldset>
    
    <legend><strong>Status</strong></legend>
    
    <ol>
    <li>
    <label>Overall status?</label>
    <input type="radio" id="overallstatus" name="overallstatus" required <?php if (isset($overallStatus) &&  $overallStatus=="Green") echo "checked"; ?>
 value="Green"/>
 <label for="overallstatus">Green</label>
    <input type="radio" id="overllstatus" name="overallstatus" required <?php if (isset($overallStatus) && $overallStatus=="Yellow") echo "checked"; ?>
 value="Yellow"/>
 <label for="overallstatus">Yellow</label>
    <input type="radio" id="overallstatus" name="overallstatus" required <?php if (isset($overallStatus) && $overallStatus=="Red") echo "checked"; ?>
 value="Red"/>
 <label for="overallstatus">Red*</label>
    </li>
    

  
  <li>
  <label>Schdule?</label>
  <input type="radio" id="schdule" name="schdule" required <?php if (isset($Schdule) && $Schdule=="Green") echo "checked"; ?>
 value="Green">
 <label for="schdule">Green</label>
  <input type="radio" id="schdule" name="schdule" required <?php if (isset($Schdule) && $Schdule=="Yellow") echo "checked"; ?>
value="Yellow">
<label for="schdule">Yellow</label>
  <input type="radio" id="schdule" name="schdule" required <?php if (isset($Schdule) && $Schdule=="Red") echo "checked"; ?>
value="Red">
<label for="schdule">Red*</label>
   </li>
   

   
   <li>
  <label>Quality?</label>
  <input type="radio" id="quality" name="quality" required <?php if (isset($quality) && $quality=="Green") echo "checked"; ?>
  value="Green">
  <label for="quality">Green</label>

  <input type="radio" id="quality" name="quality" required <?php if (isset($quality) && $quality=="Yellow") echo "checked"; ?>
value="Yellow">
<label for="quality">Yellow</label>
  <input type="radio" id="quality" name="quality" required <?php if (isset($quality) && $quality=="Red") echo "checked"; ?>
value="Red">
<label for="quality">Red*</label>
</li>
</ol>

  </fieldset>

  <fieldset>
    
  <h3>*Please note in comments reasons behind Red status:</h3>
  <legend><strong>Comments</strong></legend>
  <textarea id="comments" name="comments" rows="4" cols="70" required><?php echo $row['Comments'] ?></textarea>
  </select>
  
     
  </fieldset>


<?php
 $con=getDatabaseConnection();
 
 $result1=mysqli_query($con,"SELECT * FROM status_report  
 INNER JOIN project_names 
 ON status_report.projectID = project_names.projectID AND id=$ed1");
 
 while($row2=mysqli_fetch_assoc($result1)){
?>

<form action="report_include.php" method="post">
    <input type="hidden" name="updateid" id="updateid" value=" <?php echo $row2['id'] ?>"/>
  
    <input type="hidden" name="update" value="Update"/>

<?php
}
?>

<input type="submit" name="update" value="Update"/>

      </form>
      </form>
 
<?php
}?>
 
  <a href="reporthome.php"><input type="submit" value="Cancel" name="Cancel" id="Cancel"/></a>
  <a href="logout.php"><input type="submit" value="Logout" name="logout" id="logout"/></a> 
    </div>
</body>
</html>