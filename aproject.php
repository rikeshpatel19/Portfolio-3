<!DOCTYPE html>
<!--Specifying language is good practice-->
<html lang="en">
<head>
  <!--Also good practice to specify character set, webpage may be interpreted incorrectly otherwise-->
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AProject</title>
</head>
<link rel = "stylesheet" type="text/css"  href="style.css" /> <!--Linked CSS-->
<script defer src="filter.js" ></script> <!--Linked JavaScript-->
<body>
<header id="main-header">
    <nav class = "navbar">
        <ul> 
            <!--'#' means stay on the same page-->
            <li><a href="#">AProject</a></li>
            <li><a href="addproject.php">Add Project</a></li>
            <li><input type="text" id="input" onkeyup="filter()" placeholder="Search by title.."></li>
            <?php 
            session_start();
            if (!isset($_SESSION['username'])) {
            ?>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
            <?php
            }
            else if (isset($_SESSION['username'])) {
            ?>
            <li><a href="logout.php">Logout</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>
    </header> </br>
    <ul> <!--Shows basic information of each project (title, start date, short description)-->
      <?php
      require_once ("connectdb.php");
      try {
        $query = "SELECT pid, title, start_date, description FROM  projects ";
		    //Runs the query
		    $rows = $db->query($query);
        if ($rows && $rows->rowCount()>0) {
	          echo'<table cellspacing="0"  cellpadding="5" id="project_table">
	          <tr><th>Title</th><th>Start Date</th><th>Description</th ></tr>';
		        // Fetch and Prints all the records
			      while ($row = $rows->fetch())	{
              $pid = $row['pid'];
              $title = $row['title'];
              $start_date = $row['start_date'];
              $short_description = $row['description'];
              echo "<tr><td><a href=project.php?id=$pid>$title</a></td><td>$start_date</td><td>$short_description</td></tr>";
            }
            echo '</table>';
        }
      } catch (PDOException $ex) {
          echo "A database error occurred <br>";
		      echo "Error details: <em>". $ex->getMessage()."</em>";
      } 
      ?>
    </ul>
</body>
</html>