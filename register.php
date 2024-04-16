<?php
//Checks that the form has been submitted
if (isset($_POST['submitted'])){
  // Connects to the database
  require_once('connectdb.php');	
  // ?, If username and password is set in post, set the username and password variables
  // :, Else be false
  // password_hash(PASSWORD ITSELF, Hashing algorithm to be used)
  $username=isset($_POST['username'])? trim($_POST['username']):false;
  $password=isset($_POST['password'])?password_hash($_POST['password'],PASSWORD_DEFAULT):false;
  $email=isset($_POST['email'])?$_POST['email']:false;
  try {
	// $stat is a prepared statement, a template for the SQL statement
	// ? act as placeholders for the username, password and email
	// default uses the default value for the ID column
	$stat=$db->prepare("INSERT INTO users VALUES(default,?,?,?)");
	//Actually replaces the ? with a username and password
	$stat->execute(array($username, $password, $email));
	$id=$db->lastInsertId();
	echo "You are now registered. Your ID is: $id  ";  	
  } catch (PDOexception $ex){
	echo "A database error occurred<br>";
	echo "Error details: <em>". $ex->getMessage()."</em>";
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
  <title>Register</title>
</head>
<body>
<link rel = "stylesheet" type="text/css"  href="style.css" /> <!--Linked CSS-->
<div class = "register">  
  <h2>Register</h2>
  <form method = "post" action="register.php">
	Username: <input type="text" name="username" required/><br>
	Password: <input type="password" name="password" required/><br>
  Email:    <input type="email" name="email" required/><br><br>  
	<input type="submit" value="Register" /> 
	<input type="reset" value="Clear"/>
	<input type="hidden" name="submitted" value="true"/>
  </form>  
  <p>Already a user? <a href="login.php">Log in</a></p>
</div>
</body>
</html>