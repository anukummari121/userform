<?php
// session_start();
require('includes/common.php');
?>

<?php
 $ul=$_SESSION['ulevel'];
?>

<?php

if($ul==1)
{?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports Home</title>
    <link rel="stylesheet" href="./styles-2.css">
    <style>
        .lb{
            display: block;
            margin: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    
   <?php
   $a=$_SESSION['fname'];
 
   echo "<h2>Welcome, $a </h2>";
   ?>
    <h1>Status Report Home</h1>
    
     <div class="reporthome">
     <a href="statusreport.php">
    <button>Submit New Status Report</button>
     </a>
        <fieldset>
        
            <h2>Status Reports </h2>
            
            <div class="lb">
                <label><strong>Project Name</strong></label>
                <label><strong>Project Manager</strong></label>
                <label><strong>Date of Report</strong></label>
                <label><strong>Time of Report</strong></label>
                
                 </div>
        <?php
        $con=mysqli_connect("localhost","root","","project_reports");
        
        if(!$con){
             die('Could not connect my sql');
        }
        
        ?>

        <?php
        $result=mysqli_query($con,"SELECT * FROM status_report  
        INNER JOIN project_names 
        ON status_report.ProjectID = project_names.ProjectID ");
        if(mysqli_num_rows($result)>0){

        ?>
        <?php
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            echo $row['ProjectName'].'&nbsp'.'&nbsp';
              echo str_repeat('&nbsp;', 30);
            echo $row['ProjectManager'];
              echo str_repeat('&nbsp;', 35).'&nbsp'.'&nbsp';
            echo $row['submit_date'];
            echo str_repeat('&nbsp;', 1);
              echo str_repeat('&nbsp;', 30).'&nbsp'.'&nbsp';
            echo $row['submit_time'];
             echo str_repeat('&nbsp;', 20).'&nbsp';
            
        ?>

      
      <form action="edit_statusreport.php" method="post">
       <input type="hidden" name="editid" id="editid" value="<?php echo $row['id']?>">
       
       <input type="submit" value="Edit" name="edit">

      </form>
      
    
    <br>
        </a>
     <?php 
    
      ?>
       
        <br>
        <?php

        $i++;
       
    }
    echo "</div>";
        ?>
   
      <?php
}
else{
      echo "no result";
}

      ?>

        </fieldset>
        <a href="logout.php"><input type="submit" value="Logout" name="Cancel" id="Cancel"/></a>
    </div>
    
</body>
</html>

<?php
}
?>


<?php


// ---------------------
if($ul==2)
{?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports Home</title>
    <link rel="stylesheet" href="./styles-2.css">
    <style>
        .lb{
            display: block;
            margin: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    
   <h2><?php
   $a=$_SESSION['fname'];
 
   echo "<h2>Welcome, $a </h2>";
   ?>
    <h1>Status Report Home</h1>
    
     <div class="reporthome">
     <a href="statusreport.php">
    <button>Submit New Status Report</button>
     </a>
        <fieldset>
        
            <h2>Status Reports </h2>
            
            <div class="lb">
                <label><strong>Project Name</strong></label>
                <label><strong>Project Manager</strong></label>
                <label><strong>Date of Report</strong></label>
                <label><strong>Time of Report</strong></label>
                
                 </div>
        <?php
        $con=mysqli_connect("localhost","root","","project_reports");
        
        if(!$con){
             die('Could not connect my sql');
        }
        
        ?>

        <?php
        $result=mysqli_query($con,"SELECT * FROM status_report  
        INNER JOIN project_names 
        ON status_report.ProjectID = project_names.ProjectID ");
        if(mysqli_num_rows($result)>0){

        ?>
        <?php
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            echo $row['ProjectName'].'&nbsp'.'&nbsp';
              echo str_repeat('&nbsp;', 30);
            echo $row['ProjectManager'];
              echo str_repeat('&nbsp;', 35).'&nbsp'.'&nbsp';
            echo $row['submit_date'];
            echo str_repeat('&nbsp;', 1);
              echo str_repeat('&nbsp;', 30).'&nbsp'.'&nbsp';
            echo $row['submit_time'];
             echo str_repeat('&nbsp;', 20).'&nbsp';
  
        ?>

      
      <form action="edit_statusreport.php" method="post">

       <input type="hidden" name="editid" id="editid" value="<?php
        echo $row['id']?>">

        <input type="hidden" value="Edit" name="edit">

      </form>
       
    
    <br>
      </a>
        <br>
        <?php
        $i++;
       
         }
    echo "</div>";
        ?>
   
      <?php
}
else{
      echo "no result";
}
  ?>
        </fieldset>
        <a href="logout.php"><input type="submit" value="Logout" name="Cancel" id="Cancel"/></a>
    </div>
    
</body>
</html>

<?php
}
?>





