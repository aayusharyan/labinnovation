<?php
$conn = mysql_connect ("localhost", "root", "");
if (!$conn)
{
          header ("location: connection_fail.php");
}
else
{
mysql_selectdb ("questionpapers", $conn);
}

?>