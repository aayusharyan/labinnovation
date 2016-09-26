<?php
session_start ();

require_once('connection.php');
require_once('security_check.php');


$school = $_POST["school"];
$subject = $_POST["subject"];
$class = $_POST["class"];
$board = $_POST["board"];
$section = $_POST["section"];
$type = $_POST["type"];
$mark = $_POST["mark"];
$time = $_POST["time"];
$date = $_POST["date"];





$target_dir = "uploads/";

$uploadOk = 1;
$filetype = pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);
$filename = md5(uniqid(rand(), true)) . md5(uniqid(rand(), true)) . md5(uniqid(rand(), true));
$target_file = $target_dir . $filename . "." . $filetype;
// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
} */
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5242880) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
/*if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg"
&& $filetype != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
} */
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
         
         $sql = "INSERT INTO filedetails (school , subject, class, board, section, type, mark, time, date, uploadedby, uploadedbyid, link, filetype) VALUES ('$school', '$subject', '$class', '$board', '$section', '$type', '$mark', '$time', '$date', '$username', '$userid', '$target_file', '$filetype')";
$result = mysql_query ($sql);
if ($result)
{
     $sql = "UPDATE lasts SET school = '$school', subject = '$subject', class = '$class', type = '$type', board= '$board', marks = '$mark', time = '$time', date = '$date', section = '$section' WHERE id = $userid";
     $result = mysql_query ($sql);
     if ($result)
          {
          $_SESSION["upload_result"] = true;
          header ("location: user.php");
          
     }
     else
          echo "Some Problem Updating...";
}
else
     echo "Errorrrrrr";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}











     ?>