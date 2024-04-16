<?php
session_start();
session_destroy();
echo "<p>Succesfully logged out. You can return to the <a href=aproject.php>home page</a></p>";
?>