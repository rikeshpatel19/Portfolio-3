<?php
session_start();
require_once ("connectdb.php");
try {
  $stat1 = $db->prepare("SELECT title, start_date, end_date, phase, description, uid FROM projects WHERE pid = ?");
  $stat1->execute(array($_GET['id']));
  if ($stat1->rowCount()>0){ 
    $row1=$stat1->fetch();
  }
  $stat2 = $db->prepare("SELECT username, email FROM users WHERE uid = ?");
  $stat2->execute(array($row1['uid']));
  if ($stat2->rowCount()>0){ 
    $row2=$stat2->fetch();
  }
  $pid = $_GET['id'];
  $title = $row1['title'];
  $start_date = $row1['start_date'];
  $end_date = $row1['end_date'];
  $phase = $row1['phase'];
  $short_description = $row1['description'];
  $uid = $row1['uid'];
  $username = $row2['username'];
  $email = $row2['email'];
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
  <title>Project</title>
</head>
<body>
<link rel = "stylesheet" type="text/css"  href="style.css" /> <!--Linked CSS-->
<div class = "project">
  <h2>Project</h2>
  <table cellspacing="0"  cellpadding="5" id="project_table">
  <tr><th>Project ID</th><th>Title</th><th>Start Date</th><th>End Date</th><th>Description</th><th>Phase</th></tr>
  <tr><td><?= $pid ?></td><td><?= $title ?></td><td><?= $start_date ?></td><td><?= $end_date ?></td><td><?= $short_description ?></td><td><?= $phase ?></td></tr>
  </table>
  <p>Created by: <?= $username ?></p>
  <p>Email: <?= $email ?></p></br>
  <?php
  if (isset($_SESSION['username']) && isset($pid) && isset($uid) && $uid == $_SESSION['uid']) {
    echo '<form method="post" action="update.php">';
    echo '<input type="hidden" name="id" value="' . $pid . '">';
    echo '<button type="submit">Edit</button>';
    echo '</form>';
  }
  ?>
</div>
</body>
</html>