<?php
session_start();
require_once('connection.php');
$username = $_POST["register_username"];
$username = stripslashes($username);
$username = rtrim($username);

$password = $_POST["register_password"];
$password = stripslashes($password);
$password = rtrim($password);

$password_again = $_POST["register_password_repeat"];
$password_again = stripslashes($password_again);
$password_again = rtrim($password_again);

$mail = $_POST["register_email"];
$mail = stripslashes($mail);
$mail = rtrim($mail);

if ($password === $password_again)
{
    mysql_select_db("questionpapers", $conn);
$sql = "INSERT INTO userdetails (username , password, name, mail) VALUES ('$username', '$password', '$username', '$mail')";
$result = mysql_query ($sql);
     if ($result)
{
          $_SESSION["response"] = "<div class=\"uk-alert uk-alert-success\" data-uk-alert=\"\">
                                <a href=\"\" class=\"uk-alert-close uk-close\"></a>
                                Registration successful.
                            </div>";
          $sql = "INSERT INTO lasts (school, subject, class, type, board, marks, time, date, section) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
          $result = mysql_query ($sql);
          copy('default_avatar.png', 'user_avatar/'.$username.'.png');
          header ("location: index.php");
     }
     else
     {
          $_SESSION["response"] = "<div class=\"uk-alert uk-alert-warning\" data-uk-alert=\"\">
                                <a href=\"\" class=\"uk-alert-close uk-close\"></a>
                                An Internal Error Occured, Please try again.
                            </div>";
          header ("location: index.php");
     }
}
else
{
     $_SESSION["response"] = "<div class=\"uk-alert uk-alert-danger\" data-uk-alert=\"\">
                                <a href=\"\" class=\"uk-alert-close uk-close\"></a>
                                Password Mismatch.
                            </div>";
          header ("location: index.php");
     
}

?>