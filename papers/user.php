<?php
require_once('connection.php');
require_once('security_check.php');
$searchexists = false;
$nofile = true;
if (isset ($_SESSION["searchresult"]))
{
     $sql = $_SESSION["searchresult"];
     $searchexists = true;
     unset ($_SESSION["searchresult"]);
}
else
{
     $sql = "SELECT * FROM filedetails WHERE uploadedby = '$username' AND uploadedbyid = '$userid' ORDER BY date DESC";
}
               
              
                     $month = date ("m");
                     $year = date ("Y");
?>
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->


<!-- Mirrored from altair_html.tzdthemes.com/page_mailbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Jul 2016 11:13:51 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">

    <title>Question Paper | User Profile</title>
     
     <!-- dropify -->
    <link rel="stylesheet" href="assets/skins/dropify/css/dropify.css">
    


    <!-- uikit -->
    <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="assets/icons/flags/flags.min.css" media="all">

    <!-- style switcher -->
    <link rel="stylesheet" href="assets/css/style_switcher.min.css" media="all">
    
    <!-- altair admin -->
    <link rel="stylesheet" href="assets/css/main.min.css" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="assets/css/themes/themes_combined.min.css" media="all">

    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.js"></script>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.addListener.js"></script>
        <link rel="stylesheet" href="assets/css/ie.css" media="all">
    <![endif]-->

</head>
<body onload="load_function ()">
    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
               <!-- secondary sidebar switch -->
                 <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                        <li><a href="" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                        <li><a href="" onclick="pare_reload()" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE5D5;</i></a></li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><span class="uk-badge">0</span></a>
                            <div class="uk-dropdown uk-dropdown-xlarge">
                                <div class="md-card-content">
                                    <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                        <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Messages (0)</a></li>
                                        <li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Alerts (0)</a></li>
                                    </ul>
                                    <ul id="header_alerts" class="uk-switcher uk-margin">
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <span class="md-user-letters md-bg-cyan"><i class="material-icons">&#xEB3D;</i></span>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Nothing to Show here</a></span>
                                                        <span class="uk-text-small uk-text-muted">You have all the Infinite wisdom.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-success">&#xE8B2;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">It's all Under Control</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Nothing to worry here for the moment.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_image"><img class="md-user-image" src="user_avatar/<?= $username?>.png" alt=""/></a>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav js-uk-prevent">
                                    <li><a href="settings.php"><i class="material-icons">&#xE8B8;</i> Settings</a></li>
                                    <li><a href="logout.php"><i class="material-icons">&#xE8AC;</i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="header_main_search_form">
            <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
            <form class="uk-form" action="search.php" method="post">
                <input type="text" name="search" class="header_main_search_input" required/>
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
                <!--<script type="text/autocomplete">
                    <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">
                        {{~items}}
                        <li data-value="{{ $item.value }}">
                            <a href="{{ $item.url }}">
                                {{ $item.value }}<br>
                                <span class="uk-text-muted uk-text-small">{{{ $item.text }}}</span>
                            </a>
                        </li>
                        {{/items}}
                    </ul>
                </script> -->
            </form>
        </div>
    </header><!-- main header end -->
    <!-- main sidebar -->
  

    <div id="top_bar">
        <div class="md-top-bar">
            <div class="uk-width-large-8-10 uk-container-center">
                <div class="uk-clearfix">
                    <div class="md-top-bar-actions-left">
                        <div class="md-top-bar-checkbox">
                            <input type="checkbox" name="mailbox_select_all" id="mailbox_select_all" data-md-icheck />
                        </div>
                        <div class="md-btn-group">
                            <a id="select_archieve" href="#" class="md-btn md-btn-flat md-btn-small md-btn-wave" data-uk-tooltip="{pos:'bottom'}" title="Archive"><i class="material-icons">&#xE149;</i></a>
                            <a id="select_download" href="#" class="md-btn md-btn-flat md-btn-small md-btn-wave" data-uk-tooltip="{pos:'bottom'}" title="Delete"><i class="material-icons">&#xE872;</i></a>
                        </div>
                    </div>
                    <div class="md-top-bar-actions-right">
                        <div class="md-top-bar-icons">
                            <i id="mailbox_list_split" class=" md-icon material-icons">&#xE8EE;</i>
                            <i id="mailbox_list_combined" class="md-icon material-icons">&#xE8F2;</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
     

    <div id="page_content">
        <div id="page_content_inner">
             

            <div class="md-card-list-wrapper" id="mailbox">
                 
                  <div class="uk-width-large-8-10 uk-container-center">
                       
                       <?php if ($searchexists)
{
     ?>
                     
                     <div class="uk-alert uk-alert-info" data-uk-alert="">
                                <a class="uk-alert-close uk-close" onClick="page_reload()" data-uk-tooltip="{pos: 'bottom'}" title="Close"></a>
                                <?= $_SESSION["searchpanel"]; ?>
                            </div>
                       <?php 
     unset ($_SESSION["searchpanel"]);
}
                 ?>
                                   
                     <?php
                     $present = false;
                $result = mysql_query($sql);
                while($row = mysql_fetch_assoc($result))
                         {
                     $row_month = date ("m", strtotime($row["date"]));
                     $row_year = date ("Y", strtotime($row["date"]));
                    if (($month == $row_month) && ($year == $row_year))
                    {
                         $present = true;
                         $nofile = false;
                    }
                }
                     if ($present)
                     {
                             ?>
                    <div class="md-card-list">
                        <div class="md-card-list-header heading_list">This Month</div>
                        <div class="md-card-list-header md-card-list-header-combined heading_list" style="display: none">All Time</div>
                        <ul class="hierarchical_slide">
                             <?php } else { ?>
                             <div class="md-card-list" style="margin-top: 48px;">
                          <div class="md-card-list-header md-card-list-header-combined heading_list" style="display: none">All Time</div>
                             </div>
                          
                   <?php  }
               $result = mysql_query($sql);
                while($row = mysql_fetch_assoc($result))
                         {
                     $row_month = date ("m", strtotime($row["date"]));
                     $row_year = date ("Y", strtotime($row["date"]));
                    if (($month == $row_month) && ($year == $row_year))
                    {
                             ?>
                               <li>
                                
                                
                                    <span class="md-card-list-item-date"><a href="delete.php?id=<?= $row["id"]?>" class="right material-icons" style="position:right;">&#xE872;</a></span>
                                <span class="md-card-list-item-date"><a class="right material-icons" onclick="download_file (<?= $row["id"]?>)" style="position:right;">&#xE2C4;</a></span>
                                <span class="md-card-list-item-date"><?= date ("d-M", strtotime($row["date"]))?></span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-grey">M</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span><?= $row["board"] ?></span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <span><strong><?= $row["subject"]?>, <?= $row["class"] ?>, <?= $row["type"] ?></strong></span>
                                </div>
                            </li>
                             <?php }}
                             if ($present) {?>
                        </ul>
                    </div>
                     <?php } $result = mysql_query($sql);
                     $future = false;
                     while($row = mysql_fetch_assoc($result))
                     {
                         $row_month = date ("m", strtotime($row["date"]));
                     $row_year = date ("Y", strtotime($row["date"]));
                     if (($row_year>$year) || (($row_year == $year) && ($row_month>$month)))
                     {
     ?>
                    <div class="md-card-list">
                        <div class="md-card-list-header heading_list">Future</div>
                        <ul class="hierarchical_slide">
                             <?php $future=true;
                          $nofile = false;
                              break;
                     }} ?>
                         <?php if ($future) {
                             $result = mysql_query($sql);
      while($row = mysql_fetch_assoc($result))
                     {
            $row_month = date ("m", strtotime($row["date"]));
                     $row_year = date ("Y", strtotime($row["date"]));
           if (($row_year>$year) || (($row_year == $year) && ($row_month>$month)))
                     {
                             ?><li>
                                <span class="md-card-list-item-date"><a href="delete.php?id=<?= $row["id"]?>" class="right material-icons" style="position:right;">&#xE872;</a></span>
                                <span class="md-card-list-item-date"><a class="right material-icons" onclick="download_file (<?= $row["id"]?>)" style="position:right;">&#xE2C4;</a></span>
                                <span class="md-card-list-item-date"><?= date ("d-M", strtotime($row["date"]))?></span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-grey">M</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span><?= $row["board"] ?></span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    
                                    <span><strong><?= $row["subject"]?>, <?= $row["class"] ?>, <?= $row["type"] ?></strong></span>
                                </div>
                            </li>
                             <?php } }?>
                        </ul>
                    </div>
                     <?php }?>
                     <?php $result = mysql_query($sql);
                     $past = false;
                     while($row = mysql_fetch_assoc($result))
                     {
                         $row_month = date ("m", strtotime($row["date"]));
                     $row_year = date ("Y", strtotime($row["date"]));
                     if (($row_year<$year) || (($row_year == $year) && ($row_month<$month)))
                     {
     ?>
                    <div class="md-card-list">
                        <div class="md-card-list-header heading_list">Past</div>
                        <ul class="hierarchical_slide">
                             <?php $past=true;
                          $nofile = false;
                              break;
                     }} ?>
                         <?php if ($past) {
                             $result = mysql_query($sql);
      while($row = mysql_fetch_assoc($result))
                     {
            $row_month = date ("m", strtotime($row["date"]));
                     $row_year = date ("Y", strtotime($row["date"]));
           if (($row_year<$year) || (($row_year == $year) && ($row_month<$month)))
                     {
                             ?><li>
                                <span class="md-card-list-item-date"><a href="delete.php?id=<?= $row["id"]?>" class="right material-icons" style="position:right;">&#xE872;</a></span>
                                <span class="md-card-list-item-date"><a class="right material-icons" onclick="download_file (<?= $row["id"]?>)" style="position:right;">&#xE2C4;</a></span>
                                <span class="md-card-list-item-date"><?= date ("d-M", strtotime($row["date"]))?></span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-grey">M</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span><?= $row["board"] ?></span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    
                                    <span><strong><?= $row["subject"]?>, <?= $row["class"] ?>, <?= $row["type"] ?></strong></span>
                                </div>
                            </li>
                             <?php } }?>
                        </ul>
                    </div>
                     <?php }
                     if ($nofile)
                     {
                          if ($searchexists)
                          {
                               ?>
                       <h3 class="uk-text-warning" style="text-align: center;">No Files Found...</h3>
                       <?php 
                          } else {
                     ?>
                     <h3 class="uk-text-warning" style="text-align: center;">No Files Found, Please Upload some...</h3>
                     <?php } } ?>
                </div>
            </div>

        </div>
    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-accent md-fab-wave" href="#mailbox_new_message" data-uk-modal="{center:true}">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>

    <div class="uk-modal" id="mailbox_new_message">
        <div class="uk-modal-dialog">
            <button class="uk-modal-close uk-close" type="button"></button>
             <?php
             $sql = "SELECT * FROM lasts WHERE id= $userid";
               $result = mysql_query($sql);
                $row = mysql_fetch_assoc($result)
                     ?>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">Upload File</h3>
                </div>
                 <div class="uk-grid">
                      <div class="uk-width-1-3">
                <div class="uk-margin-medium-bottom">
                    <label for="class">Class</label>
                    <input type="text" class="md-input" id="class" name="class" value="<?= $row["class"] ?>"/>
                </div>
                           </div>
                      <div class="uk-width-1-3">
                <div class="uk-margin-medium-bottom">
                    <label for="type">Test Name</label>
                    <input type="text" class="md-input" id="type" name="type" value="<?= $row["type"] ?>"/>
                </div>
                           </div>
                      <div class="uk-width-1-3">
                <div class="uk-margin-medium-bottom">
                    <label for="marks">Marks</label>
                    <input type="text" class="md-input" id="marks" name="mark" value="<?= $row["marks"] ?>"/>
                </div>
                           </div>
                      <div class="uk-width-1-3">
                <div class="uk-margin-medium-bottom">
                    <label for="time">Time</label>
                    <input type="text" class="md-input" id="time" name="time" value="<?= $row["time"] ?>"/>
                </div>
                           </div>
                      <div class="uk-width-1-3">
                <div class="uk-margin-medium-bottom">
                    <label for="board">Board</label>
                    <input type="text" class="md-input" id="board" name="board" value="<?= $row["board"] ?>"/>
                </div>
                           </div>
                    <!--  <div class="uk-width-1-3">
                <div class="uk-margin-medium-bottom">
                    <label for="date">Date</label>
                    <input type="text" class="md-input" id="date" name="date" value="<?= $row["date"] ?>"/>
                </div> -->
                           
                      <div class="uk-width-1-3">
                <div class="uk-margin-medium-bottom">
                                        
                                        <div class="md-input-wrapper md-input-filled"><label for="uk_dp_1">Select date</label><input class="md-input" type="text" id="uk_dp_1" data-uk-datepicker="{format:'YYYY-MM-DD'}" name="date" value="<?= $row["date"] ?>"><span class="md-input-bar "></span></div>
                                        
                           </div>
                           
                           </div>
                      <div class="uk-width-1-3">
                <div class="uk-margin-medium-bottom">
                    <label for="section">Section</label>
                    <input type="text" class="md-input" id="section" name="section" value="<?= $row["section"] ?>"/>
                </div>
                           </div>
                      <div class="uk-width-1-3">
                <div class="uk-margin-medium-bottom">
                    <label for="subject">Subject</label>
                    <input type="text" class="md-input" id="subject" name="subject" value="<?= $row["subject"] ?>"/>
                </div>
                           </div>
                      <div class="uk-width-1-3">
                <div class="uk-margin-medium-bottom">
                    <label for="school">School</label>
                    <input type="text" class="md-input" id="school" name="school" value="<?= $row["school"] ?>"/>
                </div>
                           </div>
                 </div>
                 <div class="md-card-content">
                            <input type="file" id="input-file-a" class="dropify" data-max-file-size="20480K" name="fileToUpload" multiple/>
                        </div>
                   
                 <!--<div id="mail_upload-drop" class="uk-file-upload">
                    <p class="uk-text">Drop file to upload</p>
                    <p class="uk-text-muted uk-text-small uk-margin-small-bottom">or</p>
                    <a class="uk-form-file md-btn">choose file<input id="mail_upload-select" type="file" name="fileToUpload" required></a>
                </div>
                <div id="mail_progressbar" class="uk-progress uk-hidden">
                    <div class="uk-progress-bar" style="width:0">0%</div>
                </div> -->
                <div class="uk-modal-footer">
                    <button type="submit" class="uk-float-right md-btn md-btn-flat md-btn-flat-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
    <!-- google web fonts -->
    <script>
      /*  WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })(); */
    </script>

    <!-- common functions -->
    <script src="assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="assets/js/altair_admin_common.min.js"></script>

 <!--  notifications functions -->
    <script src="assets/js/pages/components_notifications.min.js"></script>
    
    <!--  mailbox functions -->
    <script src="assets/js/pages/page_mailbox.min.js"></script>
     
      <!-- page specific plugins -->
    <!--  dropify -->
    <script src="assets/js/custom/dropify/dist/js/dropify.min.js"></script>

    <!--  form file input functions -->
    <script src="assets/js/pages/forms_file_input.min.js"></script>
   
    
    <script>
        $(function() {
            if(isHighDensity) {
                // enable hires images
                altair_helpers.retina_images();
            }
            if(Modernizr.touch) {
                // fastClick (touch devices)
                FastClick.attach(document.body);
            }
        });
        $window.load(function() {
            // ie fixes
            altair_helpers.ie_fix();
        });
    </script>
<a id="delete_message" data-timeout="50000" style="display: none;">Top Right</a>
     <script>
     var l = document.getElementById("delete_message");
     </script>
     
     <script>
          function success_delete ()
          {
               l.setAttribute("data-message", "<i class=\"notify-action material-icons\" data-uk-tooltip=\"{pos: 'bottom'}\" title=\"Close\">&#xE14C;</i> <i class=\"notify-action material-icons\" data-uk-tooltip=\"{pos: 'bottom'}\" title=\"Undo (Coming Soon!)\">&#xE166;</i> File Deletion Successful");
                              l.setAttribute("data-status", "success");
                              l.setAttribute("data-pos", "top-right");
                              l.click ();
          }
          function success_upload ()
          {
               l.setAttribute("data-message", "<i class=\"notify-action material-icons\" data-uk-tooltip=\"{pos: 'bottom'}\" title=\"Close\">&#xE14C;</i> Upload Successful.");
                              l.setAttribute("data-status", "success");
                              l.setAttribute("data-pos", "top-right");
                              l.click ();
          }
          function fail_download ()
          {
               l.setAttribute("data-message", "<i class=\"notify-action material-icons\" data-uk-tooltip=\"{pos: 'bottom'}\" title=\"Close\">&#xE14C;</i> Please use the download button instead of a link.");
                              l.setAttribute("data-status", "danger");
                              l.setAttribute("data-pos", "top-right");
                              l.click ();
          }
     </script>
     <script>
     function load_function ()
          {
              <?php 
          if (isset($_SESSION["download_result"]))
          {
               $result = $_SESSION["download_result"];
               unset ($_SESSION["download_result"]);
               if (!($result))
               echo "fail_download ();";
          }
          ?> 
              <?php 
          if (isset($_SESSION["delete_result"]))
          {
               $result = $_SESSION["delete_result"];
               unset ($_SESSION["delete_result"]);
               if ($result)
               echo "success_delete ();";
          }
          ?> 
               <?php 
          if (isset($_SESSION["upload_result"]))
          {
               $result = $_SESSION["upload_result"];
               unset ($_SESSION["upload_result"]);
               if ($result)
               echo "success_upload ();";
          }
          ?> 
               <?php if ($nofile)
{ ?>
    $('#mailbox_list_split').css ("pointer-events", "none");
    $('#mailbox_list_combined').css ("pointer-events", "none");
    $('#select_archieve').css ("pointer-events", "none");
    $('#select_download').css ("pointer-events", "none");
    $('#mailbox_select_all').attr ("disabled", "disabled");
               <?php 
} ?>
          }
     </script>
     <script>
     
          function download_file (fileid)
          {
$.ajax({
    type: "POST",
    url: 'download.php',
    data: {id: fileid},
    success: function(data){
        window.location = 'download.php?link='+data;
    }
});
          }
          
     </script>
     <script>
     function page_reload ()
          {
               setTimeout(function()
               {
                    window.location.reload()
               }, 200);
          }
     </script>
  
</body>

<!-- Mirrored from altair_html.tzdthemes.com/page_mailbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Jul 2016 11:13:52 GMT -->
</html>