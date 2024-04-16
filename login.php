<?php
//Checks that the form has been submitted
if (isset($_POST['submitted'])){
    //Username and Password has not been set
    if ( !isset($_POST['username'], $_POST['password']) ) {
		exit('Please fill both the username and password fields!');
	}
	// Connects to the database
	require_once ("connectdb.php");
    try {
		//Quries the database to find a matching username and password
        //Uses prepared statements to prevent SQL injections
		$stat = $db->prepare('SELECT uid, password FROM users WHERE username = ?');
		$stat->execute(array($_POST['username']));
		// Checks that the username exists within the database
		if ($stat->rowCount()>0){ 
			//Fetches that row from the database
            $row=$stat->fetch();
            // Checks that the passwords match 
			if (password_verify($_POST['password'], $row['password'])){ 
				//Sessions starts	
				session_start();
				// Assigns value to key "username" within the $_SESSION array
                $_SESSION["uid"] = $row['uid'];
				$_SESSION["username"]=$_POST['username'];
				//Redirects to aproject.php and exits the script
                header("Location:aproject.php");
				exit();
			} else {
				echo "<p style='color:red'>Error logging in, password does not match </p>";
            }
		} else {
			echo "<p style='color:red'>Error logging in, username not found </p>";
		}
	} catch(PDOException $ex) {
		echo("Failed to connect to the database.<br>");
		echo($ex->getMessage());
		exit;
	}
}
?>

<!DOCTYPE html>
<!--Specifying language is good practice-->
<html lang="en">
<head>
  <!--Also good practice to specify character set, webpage may be interpreted incorrectly otherwise-->
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<link rel = "stylesheet" type="text/css"  href="style.css" /> <!--Linked CSS-->
<body>
<div class = "login">  
  <h2>Login</h2>
  <form method = "post" action="login.php">
	Username: <input type="text" name="username" /><br>
	Password: <input type="password" name="password" /><br><br>
	<input type="submit" value="Login" /> 
	<input type="reset" value="Clear"/>
	<input type="hidden" name="submitted" value="true"/>
  </form>  
  <p>Not registered yet? <a href="register.php">Register</a></p>
</div>
</body>
</html>
