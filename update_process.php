<?php
session_start();
require_once("connectdb.php");
$pid = $_POST['pid'];
$title = $_POST['title'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$phase = $_POST['phase'];
$short_description = $_POST['short_description'];
try {
    //Need to validate that the username even exists within the users table 
    //Might need to think off a better method than this but it works for now
    $stat=$db->prepare('UPDATE projects SET title = ?, start_date = ?, end_date = ?, phase = ?, description = ? WHERE pid = ?');
    $stat->execute(array($title, $start_date, $end_date, $phase, $short_description, $pid));
    if ($stat->rowCount() > 0) {
    echo "<p>Project has been updated. You can return to the <a href=aproject.php>home page</a></p>";
    } else {
    echo "Failed to update project.";
    }
    
    } catch (PDOexception $ex) {
        echo "A database error occurred<br>";
        echo "Error details: <em>". $ex->getMessage()."</em>";
    }
?>