<?php
require_once('connection.php');

if (isset ($_POST["username"]))
{
     $sql = "SELECT id FROM userdetails WHERE username= '".$_POST["username"]."'";
     $result = mysql_query ($sql);
     $count = mysql_num_rows ($result);
     if ($count == 0)
          echo true;
     else
          echo false;
}
else if (isset ($_POST["mail"]))
{
     $sql = "SELECT id FROM userdetails WHERE email= '".$_POST["mail"]."'";
     $result = mysql_query ($sql);
     $count = mysql_num_rows ($result);
     if ($count == 0)
          echo true;
     else
          echo false;
}

?>