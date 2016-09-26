<?php
require_once('connection.php');
require_once('security_check.php');
if (isset ($_POST["id"]))
{
$fileid = $_POST["id"];

$sql = "SELECT * FROM filedetails WHERE id = '$fileid' AND uploadedby = '$username' AND uploadedbyid = '$userid'";
$data = mysql_query($sql);
if (mysql_num_rows($data) == 1)
{
     $qr = mysql_fetch_assoc($data);
     $filepath = $qr["link"];
     $filetype = $qr["filetype"];
     $link = md5(uniqid(rand(), true)) . md5(uniqid(rand(), true)) . md5(uniqid(rand(), true)) . "." . $filetype;
     $sql = "INSERT INTO downloads (link, true_link) VALUES ('$link', '$filepath')";
     if (mysql_query ($sql))
          echo $link;
     else
          echo "ERROR";
}
}
elseif (isset ($_GET["link"]))
{
     if (isset ($_SESSION["download_result"]))
          unset ($_SESSION["download_result"]);
     $download_success = false;
     $link = $_GET["link"];
     $sql = "SELECT * FROM downloads WHERE link = '$link' AND downloaded = 0";
     $data = mysql_query($sql);
     if (mysql_num_rows($data) == 1)
     {
          $qr = mysql_fetch_assoc($data);
          $file_link = $qr["true_link"];
          $sql = "SELECT * FROM filedetails WHERE uploadedby = '$username' AND uploadedbyid = '$userid' AND link = '$file_link'";
          $data = mysql_query($sql);
          if (mysql_num_rows($data) == 1)
          {
               $row = mysql_fetch_assoc($data);
               $file = $row["class"] . "-" . $row["board"] . "-" . $row["type"] . "-" . $row["subject"] . "." . $row["filetype"];          
               $downloadid = $qr["id"];
               $sql = "UPDATE `downloads` SET `downloaded` = 1 WHERE id = $downloadid";
               if (mysql_query ($sql))
               {
                    header("Cache-Control: private");
                    header("Content-Description: File Transfer");
                    header("Content-Disposition: attachment; filename=".$file."");
                    header("Content-Transfer-Encoding: binary");
                    header("Content-Type: binary/octet-stream");
                    readfile ($file_link);
                    $download_success = true;
               }
          }
     }
     if (!$download_success)
     {
          //Send a Notification to user that for security purposes, a file can be downloaded only once...
          $_SESSION["download_result"] = false;
          header ("location: user.php");
     }
}
?>