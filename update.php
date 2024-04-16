<?php 
session_start();
require_once ("connectdb.php");
if (isset($_POST['id'])) {
  $pid = $_POST['id'];
} else {
  echo "Project ID not found";
}
try {
  $stat1 = $db->prepare("SELECT title, start_date, end_date, phase, description, uid FROM projects WHERE pid = ?");
  $stat1->execute(array($pid));
  if ($stat1->rowCount()>0){ 
    $row1=$stat1->fetch();
  }
  $title = $row1['title'];
  $start_date = $row1['start_date'];
  $end_date = $row1['end_date'];
  $phase = $row1['phase'];
  $short_description = $row1['description'];
  $uid = $row1['uid'];
} catch (PDOException $ex) {
    echo "A database error occurred <br>";
    echo "Error details: <em>". $ex->getMessage()."</em>";
} 
?>

<!DOCTYPE html>
<!--Specifying language is good practice-->
<html lang="en">
<head>
  <!--Also good practice to specify character set, webpage may be interpreted incorrectly otherwise-->
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Project</title>
</head>
<body>
<link rel = "stylesheet" type="text/css"  href="style.css" /> <!--Linked CSS-->
<div class = "update_project">  
   <h2>Update Project</h2> 
   <form method = "post" action = "update_process.php">
    <input type="hidden", name="pid" value="<?= $pid?>"> 
    Title: <input type="text" name="title" required/> <br>
    Start Date: <input type="date" name="start_date" required/> <br>
    End Date: <input type="date" name="end_date" required/> <br>
    Phase: <select name = "phase">
      <option value="design">Design</option>
      <option value="development">Development</option>
      <option value="testing">Testing</option>
      <option value="deployment">Deployment</option>
      <option value="complete">Complete</option>
    </select required><br>
    Short Description: <input type="text" name="short_description" required/> <br>
    <input type="submit" value="Submit" />
	  <input type="reset" value="Clear"/>
    <input type="hidden" name="submitted" value="true"/>
   </form>
</div>
</body>
</html>