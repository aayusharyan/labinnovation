<?php
     session_start ();
     require_once('connection.php');
     require_once('security_check.php');
     $GLOBALS['counter'] = 0;
     if (true)  //Need to Work on this
     {
          $request = $_SERVER["HTTP_REFERER"];
          $request_address = array_pop(explode('/', $request));
          if (($request_address == "user.php") || ($request_address == "settings.php"))
               if (isset ($_POST["search"]))
               {
                    $searchquery = $_POST["search"];
                    $searchquery = str_ireplace("School"," ",$searchquery);
                    $searchquery = str_ireplace("Class"," ",$searchquery);
                    $searchquery = preg_replace('/\s+/', ' ',$searchquery);
                    $searchquery = trim($searchquery, " ");
                    $searchquery = str_replace(" ","|",$searchquery);
                    $searchquery = mysql_real_escape_string($searchquery);
                    $sql = "SELECT * FROM filedetails WHERE uploadedby = '$username' AND uploadedbyid = '$userid'";
                    $query = mysql_query($sql);
                    $array1 = array();
                    while ($row = mysql_fetch_array($query))
                    {
                         $array1[] = $row;
                    }
                    $sql = "SELECT * FROM filedetails WHERE uploadedby = '$username' AND uploadedbyid = '$userid' AND school RLIKE '[[:<:]]$seqrchquery\[[:>:]]'";
                    $query = mysql_query($sql);
                    $array2 = array();
                    while ($row = mysql_fetch_array($query))
                    {
                         $array2[] = $row;
                    }
                    $sql = "SELECT * FROM filedetails WHERE uploadedby = '$username' AND uploadedbyid = '$userid' AND subject RLIKE '[[:<:]]$searchquery\[[:>:]]'";
                    $query = mysql_query($sql);
                    $array3 = array();
                    while ($row = mysql_fetch_array($query))
                    {
                         $array3[] = $row;
                    }
                    $sql = "SELECT * FROM filedetails WHERE uploadedby = '$username' AND uploadedbyid = '$userid' AND class RLIKE '[[:<:]]$searchquery\[[:>:]]'";
                    $query = mysql_query($sql);
                    $array4 = array();
                    while ($row = mysql_fetch_array($query))
                    {
                         $array4[] = $row;
                    }
                    $sql = "SELECT * FROM filedetails WHERE uploadedby = '$username' AND uploadedbyid = '$userid' AND board RLIKE '[[:<:]]$searchquery\[[:>:]]'";
                    $query = mysql_query($sql);
                    $array5 = array();
                    while ($row = mysql_fetch_array($query))
                    {
                         $array5[] = $row;
                    }
               
                    if (count ($array2) == 0)
                         $GLOBALS['counter'] ++;
                    if (count ($array3) == 0)
                         $GLOBALS['counter'] ++;
                    if (count ($array4) == 0)
                         $GLOBALS['counter'] ++;
                    if (count ($array5) == 0)
                         $GLOBALS['counter'] ++;
               
                    function in_array_custom($item, $array)
                    {
                         if(count ($array) == 0)
                         {
                              return true;
                         }
                         return in_array($item, $array);
                    }
                    function intersect($item)
                    {
                         global $array2;
                         global $array3;
                         global $array4;
                         global $array5;
                         return in_array_custom($item, $array2) && in_array_custom($item, $array3) && in_array_custom($item, $array4) &&    in_array_custom($item, $array5);
                    }
                    $seqel = "SELECT * FROM filedetails WHERE uploadedby = '$username' AND uploadedbyid = '$userid' AND id IN (";
                    $output = (array_filter($array1, "intersect"));
                    $count = 0;
                    for ($i=0; $i<=count($array1); $i++)
                         if (isset($output[$i]))
                         {
                              $count ++;
                              $seqel = $seqel.$output[$i]["id"].",";
                         }
                    $seqel = $seqel."-1) ORDER BY date DESC";
                    var_dump ($GLOBALS["counter"]);
                    if ($counter != 4)
                    {
                         $_SESSION["searchresult"] = $seqel;
                         $_SESSION["searchpanel"] = "Search result for ".$_POST["search"]." yeilded ".$count." results.";
                    }
                    else
                    {
                         $_SESSION["searchresult"] = "SELECT * FROM filedetails WHERE id = -1";
                         $_SESSION["searchpanel"] = "Search result for ".$_POST["search"]." yeilded no specific results, please broaden your search";
                    }
                    header ("location: user.php");
               }
               else
               {
                    header ("location: user.php");
               }
          else
               header ("location: 404.html");
     }
?>