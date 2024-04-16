<?php 
session_start();
if (isset($_SESSION["username"])) {
if (isset($_POST['submitted'])){
    // Connects to the database
    require_once('connectdb.php');	
    $title=isset($_POST['title'])?trim($_POST['title']):false;
    $start_date=isset($_POST['start_date'])?$_POST['start_date']:false;
    $end_date=isset($_POST['end_date'])?$_POST['end_date']:false;
    $phase=isset($_POST['phase'])?$_POST['phase']:false;
    $short_description=isset($_POST['short_description'])?trim($_POST['short_description']):false;
    try {
      //Need to validate that the username exists within the users table 
      $stat1=$db->prepare('SELECT uid FROM users WHERE username = ?');
      $stat1->execute(array($_SESSION['username']));
      if ($stat1->rowCount()>0){ 
        $row=$stat1->fetch();
      }
      $stat2=$db->prepare('INSERT INTO projects VALUES(default,?,?,?,?,?,?)');
      $stat2->execute(array($title, $start_date, $end_date, $phase, $short_description, $row['uid']));
      echo "<p>Project has been added. You can return to the <a href=aproject.php>home page</a></p>";
    } catch (PDOexception $ex){
      echo "A database error occurred<br>";
      echo "Error details: <em>". $ex->getMessage()."</em>";
    }
  }

} else {
  echo "Only registered users can add projects";
  echo "<p>Already a user? <a href=login.php>Log in</a></p>";
  echo "<p>You can return to the <a href=aproject.php>home page</a></p>";
  exit;
}
?>

<!DOCTYPE html>
<!--Specifying language is good practice-->
<html lang="en">
<head>
  <!--Also good practice to specify character set, webpage may be interpreted incorrectly otherwise-->
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Project</title>
</head>
<body>
<link rel = "stylesheet" type="text/css"  href="style.css" /> <!--Linked CSS-->
<div class = "add_project">  
   <h2>Add Project</h2> 
   <form method = "post" action = "addproject.php">
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
