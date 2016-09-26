<?php
if (isset($_COOKIE['question_papers']))
{
$data = json_decode($_COOKIE['question_papers'], true);
$username = $data ["username"];
$eye = $data ["eye"];
$eyepee = $data ["eyepee"];
$namak = $data ["namak"];
$namak2 = $data ["namak2"];

require_once('connection.php');
$sql = "SELECT * FROM userdetails WHERE username = '$username' AND last_ip = '$eye' AND last_forward_ip = '$eyepee' AND last_salt = '$namak' AND last_salt2 = '$namak2'";

$data = mysql_query($sql);
if (mysql_num_rows($data) == 1)
{
    $qr = mysql_fetch_assoc($data);
     $_SESSION["login_username"] = $qr["username"];
     $_SESSION["login_password"] = $qr["password"];
     $id = $qr ["id"];
    $sql = "UPDATE userdetails SET last_login = CURRENT_TIMESTAMP() WHERE id = $id";
    $result = mysql_query  ($sql);
    if ($result)
    {
    header ("location: login.php");
    }
    else
    {
        $_SESSION["response"] = "<div class=\"uk-alert uk-alert-danger\" data-uk-alert=\"\">
                                <a href=\"\" class=\"uk-alert-close uk-close\"></a>
                                Internal Server Error, Please Try Again.
                            </div>";
              header ("location: index.php");
                unset_all ();
    }
}
else
{
    unset_all ();
}
}
function unset_all ()
{
    unset($_COOKIE["question_papers"]);
$res = setcookie("question_papers", '', time() - 3600);
header ("location: index.php");
}
?>