<?php
 session_start();
include('includes/common.php');
require_once('includes/db_credentials.php');
?>

<?php
$con=mysqli_connect("localhost","root","","project_reports");
if($con == false){
    die("Connection Error". mysqli_connect_error());
}
?>
<?php
if(isset($_POST['submit'])){
    $date=$_POST['date'];
    $timeofcheck=trim($_POST['timeofcheck']);
    $project=$_POST['project'];
    $Projectmanager=trim($_POST['Projectmanager']);
    $overallStatus=$_POST['overallstatus'];
    $Schdule=$_POST['schdule'];
    $quality=$_POST['quality'];
    $comments=trim($_POST['comments']);

    $query=mysqli_query($con, "INSERT INTO status_report  VALUES(NULL,'$date','$timeofcheck','$project','$Projectmanager','$overallStatus','$Schdule',' $quality','$comments')");

  if($query){
    echo "Data inserted successfully";
  }
else{
    echo "There is an error";
}
header("Location:statusreport.php");
}

?>



<?php


if(isset($_POST['submithome'])){
    $date=$_POST['date'];
    $timeofcheck=trim($_POST['timeofcheck']);
    $project=$_POST['project'];
    $Projectmanager=trim($_POST['Projectmanager']);
    $overallStatus=$_POST['overallstatus'];
    $Schdule=$_POST['schdule'];
    $quality=$_POST['quality'];
    $comments=trim($_POST['comments']);

    $query=mysqli_query($con, "INSERT INTO status_report  VALUES(NULL,'$date','$timeofcheck','$project','$Projectmanager','$overallStatus','$Schdule',' $quality','$comments')");

  if($query){
    echo "Data inserted successfully";
  }
else{
    echo "There is an error";
}
header("Location:reporthome.php");
}

?>

<?php

if(isset($_POST['update'])){
  $ed1=$_POST['updateid'];
// echo "hello";
    $date=$_POST['date'];
    $timeofcheck=trim($_POST['timeofcheck']);
    $project=$_POST['project'];
    $Projectmanager=trim($_POST['Projectmanager']);
    $overallStatus=$_POST['overallstatus'];
    $Schdule=$_POST['schdule'];
    $quality=$_POST['quality'];
    $comments=trim($_POST['comments']);

   $con=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

   if($con == false){
    die("Connection Error". mysqli_connect_error());
}

$result1=mysqli_query($con,"UPDATE status_report 
INNER JOIN project_names
 
 ON status_report.projectID = project_names.projectID
 SET submit_date='$date',
     submit_time='$timeofcheck',
     ProjectName='$project',
     ProjectManager='$Projectmanager',
     overallStatus='$overallStatus',
     schedule='$Schdule',
     quality='$quality',
     Comments='$comments'
     WHERE id='{$ed1}'");
 
  if($result1){
    echo "Data updated successfully";
  }
else{
    echo "There is an error";
}
header("Location:reporthome.php");
}


?>