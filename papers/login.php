<?php
session_start ();
require_once('connection.php');

if (isset ($_POST["login_username"]))
{
$username = $_POST["login_username"];
}
else if (isset ($_SESSION["login_username"]))
{
    $username = $_SESSION["login_username"];
}
else
{
    unknownaccess ();
}
$username = stripslashes($username);
$username = rtrim($username);
if (isset ($_POST["login_password"]))
{
$password = $_POST["login_password"];
}
else if (isset ($_SESSION["login_password"]))
{
    $password = $_SESSION["login_password"];
}
else
{
    unknownaccess ();
}

$password = stripslashes($password);
$password = rtrim($password);
$stay_signedin = rtrim (stripslashes (isset ($_POST["login_stay_signed"]) ? $_POST["login_stay_signed"] : false)) == "true" ? true : false;


$sql = "SELECT * FROM userdetails WHERE username = '$username' AND password = '$password' AND type = 'user'";
$data = mysql_query($sql);
if (mysql_num_rows($data) == 1)
{
     $qr = mysql_fetch_assoc($data);
     $_SESSION["userid"] = $qr["id"];
     $_SESSION["username"] = $qr["username"];
     $_SESSION["name"] = $qr["name"];
     if ($stay_signedin)
     {
          $info ["username"] = $username;
          $info ["eye"] = $_SERVER['REMOTE_ADDR'];
          $eye = $info ["eye"];
          if (isset ($_SERVER['HTTP_X_FORWARDED_FOR']))
          {
              $info ["eyepee"] = $_SERVER['HTTP_X_FORWARDED_FOR'];
          }
          else
              $info ["eyepee"] = NULL;
          $eyepee = $info ["eyepee"];
          $info ["namak"] = md5(uniqid(rand(), true)) . md5(uniqid(rand(), true)) . md5(uniqid(rand(), true));
          $namak = $info ["namak"];
          $info ["namak2"] = md5(uniqid(rand(), true)) . md5(uniqid(rand(), true)) . md5(uniqid(rand(), true));
          $namak2 = $info ["namak2"];
          $sql = "UPDATE userdetails SET last_login = CURRENT_TIMESTAMP(), last_ip = '$eye', last_forward_ip = '$eyepee', last_salt = '$namak', last_salt2 = '$namak2' WHERE username = '$username' AND password = '$password' AND type = 'user'";
          $result = mysql_query ($sql);
          if ($result)
              setcookie('question_papers', json_encode($info), time()+3600);
          else
          {
              $_SESSION["response"] = "<div class=\"uk-alert uk-alert-danger\" data-uk-alert=\"\">
                                <a href=\"\" class=\"uk-alert-close uk-close\"></a>
                                Internal Server Error, Please Try Again.
                            </div>";
              header ("location: index.php");
          }
     }
     header ("location: user.php");
     }
else
{
     $sql = "SELECT * FROM userdetails WHERE username = '$username' AND type = 'user'";
     $data = mysql_query($sql);
     if (mysql_num_rows($data) == 1)
     {
          $_SESSION["response"] = "<div class=\"uk-alert uk-alert-danger\" data-uk-alert=\"\">
                                <a href=\"\" class=\"uk-alert-close uk-close\"></a>
                                Incorrect Password, Please try again.
                            </div>";
          header ("location: index.php");
     }
     else
     {
          $_SESSION["response"] = "<div class=\"uk-alert uk-alert-warning\" data-uk-alert=\"\">
                                <a href=\"\" class=\"uk-alert-close uk-close\"></a>
                                Username not found, Do you want to register?
                            </div>";
          header ("location: index.php");
     }
}

?>