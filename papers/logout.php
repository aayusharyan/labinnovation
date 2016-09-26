<?php
session_start ();
session_destroy ();
unset($_COOKIE["question_papers"]);
$res = setcookie("question_papers", '', time() - 3600);
header ("location: index.php");
?>