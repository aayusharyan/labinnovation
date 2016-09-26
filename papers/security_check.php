<?php
session_start();
$username = $_SESSION["username"];
$userid = $_SESSION["userid"];
$name = $_SESSION["name"];
if ($username == NULL || $userid == NULL || $name == NULL)
{
     $_SESSION["response"] = "<div class=\"uk-alert uk-alert-danger\" data-uk-alert=\"\">
                                <a href=\"\" class=\"uk-alert-close uk-close\"></a>
                                Please Log In.
                            </div>";
          header ("location: index.php");
}
else
{

$sql = "SELECT type FROM userdetails WHERE username = '$username' AND id = '$userid' AND name = '$name'";
$result = mysql_query ($sql);
$final = ($result)?(mysql_num_rows ($result) == 1)?(mysql_fetch_assoc ($result) ["type"] == "user")?true:false:false:false;
if (!$final)
{
     $_SESSION["response"] = "<div class=\"uk-alert uk-alert-warning\" data-uk-alert=\"\">
                                <a href=\"\" class=\"uk-alert-close uk-close\"></a>
                                Please Log In again.
                            </div>";
          header ("location: index.php");
}
}
?>