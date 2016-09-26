<?php
session_start();
require_once('connection.php');
require_once('security_check.php');
if (isset($_FILES["avatar"]))
{
     $target_dir = "user_avatar/";
     $uploadOk = 1;
     $filetype = pathinfo(basename($_FILES["avatar"]["name"]),PATHINFO_EXTENSION);
     $filename = $username;
     $target_file = $target_dir . $filename . "." . $filetype;
     if ($_FILES["avatar"]["size"] > 1024000) 
     {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
     }
     if ($uploadOk == 0) 
     {
          echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
     } 
     else 
     {
          move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
     }
}
if (isset($_POST["name"]))
{
     $name = $_POST["name"];
     $sql = "UPDATE userdetails SET name = '$name' WHERE id = $userid AND username = '$username'";
     mysql_query($sql);
     $_SESSION["name"] = $name;
}
if (isset($_POST["about"]))
{
     $about = $_POST["about"];
     $sql = "UPDATE userdetails SET about = '$about' WHERE id = $userid AND username = '$username'";
     mysql_query($sql);
}
if (isset($_POST["mail"]))
{
     $mail = $_POST["mail"];
     $sql = "UPDATE userdetails SET mail = '$mail' WHERE id = $userid AND username = '$username'";
     mysql_query($sql);
}
if (isset($_POST["phone"]))
{
     $phone = $_POST["phone"];
     $sql = "UPDATE userdetails SET phone = '$phone' WHERE id = $userid AND username = '$username'";
     mysql_query($sql);
}
if (isset ($_POST["password"]))
{
     $password = $_POST["password"];
     $sql = "UPDATE userdetails SET password = '$password' WHERE id = $userid AND username = '$username'";
     $result = mysql_query($sql);
     if ($result)
          echo true;
     else
          echo false;
}
?>