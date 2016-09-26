<?php
session_start ();
require_once('connection.php');
require_once('security_check.php');
$password = $_POST["password"];
$sql = "SELECT password FROM userdetails WHERE id = '$userid' AND username = '$username' AND password = '$password'";
$result = mysql_query ($sql);
$row = mysql_fetch_assoc($result);
if ($row["password"] === $password)
{
     $sql = "DELETE FROM `userdetails` WHERE id = '$userid' AND username = '$username' AND password = '$password'";
     mysql_query($sql);
     $sql = "DELETE FROM `lasts` WHERE id = $userid";
     mysql_query($sql);
     unset ($_SESSION["username"]);
     unset ($_SESSION["userid"]);
     unset ($_SESSION["name"]);
     echo true;
}
else
     echo false;
?>