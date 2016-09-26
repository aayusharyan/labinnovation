<?php
session_start ();
$_SESSION["response"] = "<div class=\"uk-alert uk-alert-warning\" data-uk-alert=\"\">
                                <a href=\"\" class=\"uk-alert-close uk-close\"></a>
                                Internal Server Error, Please try agian after some time.
                            </div>";
          header ("location: index.php");

?>