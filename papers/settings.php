<?php
require_once('connection.php');
require_once('security_check.php');
     $searchexists = false;
    $sql = "SELECT * FROM userdetails WHERE username = '$username' AND id = $userid AND type = 'user'";
     $data = mysql_query($sql);   
          $row = mysql_fetch_assoc($data);
?>
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> 
<html lang="en"> <!--<![endif]-->
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!-- Remove Tap Highlight on Windows Phone IE -->
     <meta name="msapplication-tap-highlight" content="no"/>
     <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
     <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">
     <title>Question Papers | Settings</title>
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
                              <li><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                              <li><a href="user.php" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE88A;</i></a></li>
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
               </form>
          </div>
     </header><!-- main header end -->
     <!-- main sidebar -->
     <div id="page_content">
          <div id="page_content_inner">
               <div class="md-card-list-wrapper" id="mailbox">
                    <div class="uk-width-large-8-10 uk-container-center">
                         <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                              <div class="uk-width-large-7-10 uk-row-first" style="min-height: 1680px;">
                                   <div class="md-card">
                                        <div class="user_heading">
                                             <div class="user_heading_avatar">
                                                  <div class="thumbnail">
                                                       <img src="user_avatar/<?= $username?>.png" alt="user avatar" class="">
                                                  </div>
                                             </div>
                                             <div class="user_heading_content">
                                                  <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate"><?= $name?></span><span class="sub-heading"><?= $row["about"]?></span></h2>
                                                  <ul class="user_stats">
                                                       <li>
                                                            <h4 class="heading_a">&nbsp;
                                                                 <?php
                                                                      $sql = "SELECT COUNT(id) as total FROM filedetails WHERE uploadedby = '$username' AND uploadedbyid = '$userid'";
                                                                      $result = mysql_query ($sql);
                                                                      $result = mysql_fetch_assoc($result);
                                                                      echo (intval ($result["total"]));                                           
                                                                 ?>
                                                            &nbsp;<span class="sub-heading">Files Uploaded</span></h4>
                                                       </li>
                                    
                                                  </ul>
                                             </div>
                                             
                                             <div class="md-fab-wrapper md-fab-in-card md-fab-speed-dial-horizontal">
                                <a id="edit_btn" class="md-fab md-fab-success" onclick="edit_profile()" style="transform: scale(1);"><i class="material-icons" style="display: block;">&#xE22B;</i><i class="material-icons md-fab-action-close" style="display: none;">&#xE14C;</i></a>
                                
                            </div>
                                                 
                                        </div>
                                        <div class="user_content">
                                             <div class="uk-sticky-placeholder" style="height: 45px; margin: 0px;">
                                                  <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" data-uk-sticky="{ top: 48, media: 960 }" style="margin: 0px;">
                                                       <li class="uk-active" aria-expanded="true"><a href="#">About</a></li>
                                                       <li class="uk-tab-responsive uk-active uk-hidden" aria-haspopup="true" aria-expanded="false"><a>About</a>
                                                            <div class="uk-dropdown uk-dropdown-small">
                                                                 <ul class="uk-nav uk-nav-dropdown"></ul>
                                                            </div>
                                                       </li>
                                                  </ul>
                                             </div>
                                             <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                                                  <li aria-hidden="false" class="uk-active">
                                                       <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin="">
                                                            <div class="uk-width-large-1-2 uk-row-first">
                                                                 <h4 class="heading_c uk-margin-small-bottom">Contact Info</h4>
                                                                 <ul class="md-list md-list-addon">
                                                                      <li>
                                                                           <div class="md-list-addon-element">
                                                                                <i class="md-list-addon-icon material-icons"></i>
                                                                           </div>
                                                                           <div class="md-list-content">
                                                                                <span class="md-list-heading"><?= $row["mail"]?></span>
                                                                                <span class="uk-text-small uk-text-muted">Email</span>
                                                                           </div>
                                                                      </li>
                                                                 </ul>
                                                            </div>
                                                            <div class="uk-width-large-1-2">
                                                                 <h4 class="heading_c uk-margin-small-bottom">&nbsp;</h4>
                                                                 <ul class="md-list md-list-addon">
                                                                      <li>
                                                                           <div class="md-list-addon-element">
                                                                                <i class="md-list-addon-icon material-icons"></i>
                                                                           </div>
                                                                           <div class="md-list-content">
                                                                                <span class="md-list-heading"><?= $row["number"]?></span>
                                                                                <span class="uk-text-small uk-text-muted">Phone</span>
                                                                           </div>
                                                                      </li>
                                                                 </ul>
                                                            </div>
                                                       </div>
                                                  </li>
                                             </ul>
                                        </div>
                                   </div>
                              </div>
                              <div class="uk-width-large-3-10" style="min-height: 1680px;">
                                   <div class="md-card">
                                        <div class="md-card-content">
                                             <h3 class="heading_c uk-margin-bottom">Danger Zone</h3>
                                             <ul class="md-list">
                                                  <li>
                                                       <a class="md-btn md-btn-warning md-btn-wave-light md-btn-icon waves-effect waves-button waves-light" href="javascript:void(0)" onclick="UIkit.modal.prompt('Enter your new password:', '', function(val){ changepassword (val); });" style="width: 100%;">
                                                            <i class="material-icons">lock</i>
                                                            Change Password
                                                       </a>
                                                  </li>
                                                  <li>
                                                       <a class="md-btn md-btn-danger md-btn-wave-light md-btn-icon waves-effect waves-button waves-light" onclick="UIkit.modal.prompt('Enter your password to confirm delete:', '', function(val){ confirmdelete (val); });" style="width: 100%;">
                                                            <i class="material-icons">&#xE92B;</i>
                                                            Delete Account
                                                       </a>
                                                  </li>
                                             </ul>
                                        </div>
                                   </div>
                              </div>
                         </div>     
                    </div>
               </div>
          </div>
     </div> 
     <div id="hidden_settings" style="display: none;">
          <ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#user_edit_tabs_content'}">
               <li class="uk-active" aria-expanded="true"><a href="#">Basic</a></li>
               <li class="uk-tab-responsive uk-active uk-hidden" aria-haspopup="true" aria-expanded="false"><a>Basic</a>
                    <div class="uk-dropdown uk-dropdown-small">
                         <ul class="uk-nav uk-nav-dropdown"></ul>
                    </div>
               </li>
          </ul>
          <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
               <li aria-hidden="false" class="uk-active">
                    <div class="uk-margin-top">
                         <h3 class="full_width_in_card heading_c">
                              General info
                         </h3>
                         <div class="uk-grid" data-uk-grid-margin="">
                              <div class="uk-width-medium-1-2 uk-row-first">
                                   <div class="md-input-wrapper md-input-filled"><label>Name</label><input type="text" class="md-input" id="user_edit_name" value="<?= $row["name"]?>"><span class="md-input-bar "></span></div>     
                              </div>
                              <div class="uk-width-medium-1-2">
                                   <div class="md-input-wrapper md-input-filled"><label>About</label><input type="text" class="md-input" id="user_edit_about" value="<?= $row["about"]?>"><span class="md-input-bar "></span></div>
                              </div>
                         </div>
                         <h3 class="full_width_in_card heading_c">
                              Contact info
                         </h3>
                         <div class="uk-grid">
                              <div class="uk-width-1-1">
                                   <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-2" data-uk-grid-margin="">
                                        <div class="uk-row-first">
                                             <div class="uk-input-group">
                                                  <span class="uk-input-group-addon">
                                                       <i class="md-list-addon-icon material-icons"></i>
                                                  </span>
                                                  <div class="md-input-wrapper md-input-filled"><label>Email</label><input type="email" class="md-input" id="user_edit_email" value="<?= $row["mail"]?>"><span class="md-input-bar "></span></div>             
                                             </div>
                                        </div>
                                        <div class="">
                                             <div class="uk-input-group">
                                                  <span class="uk-input-group-addon">
                                                       <i class="md-list-addon-icon material-icons"></i>
                                                  </span>
                                                  <div class="md-input-wrapper md-input-filled"><label>Phone Number</label><input type="number" class="md-input" id="user_edit_phone" value="<?= Row["number"]?>"><span class="md-input-bar "></span></div>          
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </li>
          </ul>
          <br />
          <div class="uk-width-medium-1-6 uk-push-5-6">
                            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" onclick="save_edit ()">Save</a>
                        </div>
     </div>
     <div class="hidden_user_heading" data-uk-sticky="{ top: 48, media: 960 }" style="margin: 0px; visibility: hidden;">
          <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
               <div class="fileinput-new thumbnail">
                    <img src="user_avatar/<?= $row["username"]?>.png" alt="user avatar" class="">
               </div>
               <div class="fileinput-preview fileinput-exists thumbnail"></div>
               <div class="user_avatar_controls">
                    <span class="btn-file">
                         <span class="fileinput-new"><i class="material-icons"></i></span>
                         <span class="fileinput-exists"><i class="material-icons"></i></span>
                         <input type="file" name="user_edit_avatar_control" id="user_edit_avatar_control" />
                    </span>
                    <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons"></i></a>
               </div>
          </div>
          <div class="user_heading_content">
               <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"><?= $row["name"]?></span><span class="sub-heading"      id="user_edit_position"><?= $row["about"]?></span></h2>
          </div>
         <div class="md-fab-wrapper md-fab-in-card md-fab-speed-dial-horizontal">
                                <a class="md-fab md-fab-success" onclick="location.reload();" style="transform: scale(1);"><i class="material-icons" style="display: block;">&#xE14C;</i><i class="material-icons md-fab-action-close" style="display: none;">&#xE14C;</i></a>
     </div>
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
     <script src="assets/js/pages/page_user_edit.min.js"></script>
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
               l.setAttribute("data-message", "<i class=\"notify-action material-icons\" data-uk-tooltip=\"{pos: 'bottom'}\" title=\"Close\">&#xE14C;</i> Upload Successful");
               l.setAttribute("data-status", "success");
               l.setAttribute("data-pos", "top-right");
               l.click ();
          }
     </script>
     <a id="delete_message" data-timeout="50000" style="display: none;">Top Right</a>
     <script>
     var l = document.getElementById("delete_message");
     </script>
     <script>
          function edit_profile ()
          {
               $(".user_content").html ($("#hidden_settings").html ());
               $("#edit_btn").attr ("onclick", "location.reload();");
               $(".user_heading").html ($(".hidden_user_heading").html ());
          }
          function save_edit ()
          {
               var myFormData = new FormData();
               var avatar = document.getElementById("user_edit_avatar_control");
               var name = document.getElementById("user_edit_name");
               var about = document.getElementById("user_edit_about");
               var email = document.getElementById("user_edit_email");
               var phone = document.getElementById("user_edit_phone");
               myFormData.append('avatar', avatar.files[0]);
               myFormData.append('name', name.value);
               myFormData.append('about', about.value);
               myFormData.append('email', email.value);
               myFormData.append('phone', phone.value);
               $.ajax({
                    type: "POST",
                    url: 'update.php',
                    processData: false, // important
                    contentType: false, // important
                    data: myFormData,
                    success: function(data){
                         location.reload();
                    }
               });
          }
     </script>
     <script>
          function load_function ()
          {
               
          }
     </script>
     <script>
          function confirmdelete (data)
          {
               $.ajax({
                    type: "POST",
                    url: 'delete_user.php',
                    data: {password: data},
                    success: function(data){
                         if (data)
                              window.location = 'logout.php';
                         else
                              console.log ("error");
                    }
               });
          }
          function changepassword (data)
          {
               $.ajax({
                    type: "POST",
                    url: 'update.php',
                    data: {password: data},
                    success: function(data){
                         if (data)
                              {
                                   l.setAttribute("data-message", "<i class=\"notify-action material-icons\" data-uk-tooltip=\"{pos: 'bottom'}\" title=\"Close\">&#xE14C;</i> Password Change succcessful.");
                                   l.setAttribute("data-status", "success");
                                   l.setAttribute("data-pos", "top-right");
                                   l.click ();
                              }
                         else
                              console.log ("error");
                    }
               });
          }
     </script>
</body>
</html>