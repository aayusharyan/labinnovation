<?php
require_once('connection.php');
require_once('security_check.php');

$id = $_GET["id"];
$sql = "DELETE FROM filedetails WHERE id = '$id' AND uploadedby = '$username' AND uploadedbyid = '$userid'";

//Keep this in some temp thing where we can restore the last deleted file...
$result = mysql_query ($sql);
if ($result)
{
     $_SESSION["delete_result"] = true;
     header ("location: user.php");
}

else
     echo false;


?>