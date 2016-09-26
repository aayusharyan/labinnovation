<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<?php
     session_start ();
     include_once "check_login.php";
?>
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!-- Remove Tap Highlight on Windows Phone IE -->
     <meta name="msapplication-tap-highlight" content="no"/>
     <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
     <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">
     <title>Question Papers</title>
     <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
     <!-- uikit -->
     <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css"/>
     <!-- altair admin login page -->
     <link rel="stylesheet" href="assets/css/login_page.min.css" />
</head>
<body class="login_page">
     <div class="login_page_wrapper">
          <?php
                if (isset ($_SESSION["username"]))
                {
                    unset ($_SESSION["username"]);
                }
                if (isset ($_SESSION["userid"]))
                {
                    unset ($_SESSION["userid"]);
                }
                if (isset ($_SESSION["name"]))
                {
                    unset ($_SESSION["name"]);
                }
         
               if (isset ($_SESSION["response"]))
               {
                    echo $_SESSION["response"];
                    unset ($_SESSION["response"]);
               }
          ?>
          <div class="md-card" id="login_card">
               <div class="md-card-content large-padding" id="login_form">
                    <div class="login_heading">
                         <div class="user_avatar"></div>
                    </div>
                    <form action="login.php" method="post">
                         <div class="uk-form-row">
                              <label for="login_username">Username</label>
                              <input class="md-input" type="text" id="login_username" name="login_username" />
                         </div>
                         <div class="uk-form-row">
                              <label for="login_password">Password</label>
                              <input class="md-input" type="password" id="login_password" name="login_password" />
                         </div>
                         <div class="uk-margin-medium-top">
                              <input type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large" value="Sign In"/>
                         </div>
                         <div class="uk-margin-top">
                              <a href="#" id="login_help_show" class="uk-float-right">Need help?</a>
                              <span class="icheck-inline">
                                   <input type="checkbox" name="login_stay_signed" id="login_stay_signed" value="true" data-md-icheck />
                                   <label for="login_stay_signed" class="inline-label">Stay signed in</label>
                              </span>
                         </div>
                    </form>
               </div>
               <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
                    <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                    <h2 class="heading_b uk-text-success">Can't log in?</h2>
                    <p>Here’s the info to get you back in to your account as quickly as possible.</p>
                    <p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps Lock is turned off, and that your username is spelled correctly, and then try again.</p>
                    <p>If your password still isn’t working, it’s time to <a href="#" id="password_reset_show">reset your password</a>.</p>
               </div>
               <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
                    <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                    <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
                    <form>
                         <div class="uk-form-row">
                              <label for="login_email_reset">Your email address</label>
                              <input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
                         </div>
                         <div class="uk-margin-medium-top">
                              <a href="index.html" class="md-btn md-btn-primary md-btn-block">Reset password</a>
                         </div>
                    </form>
               </div>
               <div class="md-card-content large-padding" id="register_form" style="display: none">
                    <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                    <h2 class="heading_a uk-margin-medium-bottom">Create an account</h2>
                    <form action="register.php" method="POST">
                         <div class="uk-form-row">
                              <label for="register_username">Username</label>
                              <input class="md-input" type="text" id="register_username" name="register_username" onchange="checkusername()" required/>
                              <span id="register_username_status"></span>
                         </div>
                         <div class="uk-form-row">
                              <label for="register_password">Password</label>
                              <input class="md-input" type="password" id="register_password" onchange="checkpassword ()" name="register_password" required/>
                              <span id="register_password_status"></span>
                         </div>
                         <div class="uk-form-row">
                              <label for="register_password_repeat">Repeat Password</label>
                              <input class="md-input" type="password" id="register_password_repeat" name="register_password_repeat" onchange="checkpassword ()" name="register_password_repeat" required/>
                              <span id="register_password_repeat_status"></span>
                         </div>
                         <div class="uk-form-row">
                              <label for="register_mail">E-mail</label>
                              <input class="md-input" type="email" id="register_mail" onchange="checkemail ()" name="register_email" required/>
                              <span id="register_mail_status"></span>
                         </div>
                         <div class="uk-margin-medium-top">
                              <input type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large" value="Sign Up"/>
                         </div>
                    </form>
               </div>
          </div>
          <div class="uk-margin-top uk-text-center">
               <a href="#" id="signup_form_show">Create an account</a>
          </div>
     </div>
     <!-- common functions -->
     <script src="assets/js/common.min.js"></script>
     <!-- uikit functions -->
     <script src="assets/js/uikit_custom.min.js"></script>
     <!-- altair core functions -->
     <script src="assets/js/altair_admin_common.min.js"></script>
     <!-- altair login page functions -->
     <script src="assets/js/pages/login.min.js"></script>
     <script>
          // check for theme
          if (typeof(Storage) !== "undefined") 
          {
               var root = document.getElementsByTagName( 'html' )[0],
               theme = localStorage.getItem("altair_theme");
               if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) 
               {
                    root.className += ' app_theme_dark';
               }
          }
     </script>
     <script>
          function checkusername ()
          {
               if ($("#register_username").val () == "")
               {
                    $("#register_username_status").html ("Required Field.");
                    $("#register_username_status").removeClass ("uk-text-success"); 
                    $("#register_username_status").addClass ("uk-text-danger");
               }
               else
               {
               $.ajax({
    type: "POST",
    url: 'check.php',
    data: {username: $("#register_username").val ()},
    success: function(data){
         if (!data)
              {
                   $("#register_username_status").html ("Username is already taken.");
                   $("#register_username_status").removeClass ("uk-text-success");
                   $("#register_username_status").addClass ("uk-text-danger");
              }
         else
              {
                   $("#register_username_status").html ("Username is available.");
                   $("#register_username_status").removeClass ("uk-text-danger");
                   $("#register_username_status").addClass ("uk-text-success");
              }
    }
});
               
          }
          }
     function checkemail ()
          {
               if ($("#register_mail").val () == "")
                    {
                        $("#register_mail_status").html ("Required Field.");
                   $("#register_mail_status").removeClass ("uk-text-success"); 
                         $("#register_mail_status").addClass ("uk-text-danger");
                    }
               else
                    {
               $.ajax({
    type: "POST",
    url: 'check.php',
    data: {mail: $("#register_mail").val ()},
    success: function(data){
         if (!data)
              {
                   $("#register_mail_status").html ("EMail is already registered.");
                   $("#register_mail_status").addClass ("uk-text-danger");
              }
         else
              {
                   $("#register_mail_status").html ("");
                   $("#register_mail_status").removeClass ("uk-text-danger");
              }
    }
});
               
          }
               
          }
     function checkpassword ()
          {
               if (($("#register_password").val () == "") && ($("#register_password_repeat").val () == ""))
                    {
                         $("#register_password_status").html ("");
                         $("#register_password_repeat_status").html ("");
                         $("#register_password_status").removeClass ("uk-text-danger");
                         $("#register_password_repeat_status").removeClass ("uk-text-danger");
                    }
               else if (($("#register_password").val () == "") && ($("#register_password_repeat").val () != ""))
                     {
                          $("#register_password_status").addClass ("uk-text-danger");
                         $("#register_password_status").html ("Required field.");
                         $("#register_password_repeat_status").html ("");
                          $("#register_password_repeat_status").removeClass ("uk-text-danger");
                    }
               else if ($("#register_password").val () != $("#register_password_repeat").val ())
                     {
                          $("#register_password_repeat_status").addClass ("uk-text-danger");
                         $("#register_password_repeat_status").html ("Passwords don't match.");
                         $("#register_password_status").removeClass ("uk-text-danger");
                          $("#register_password_status").html ("");
                    }
               else if ($("#register_password").val () == $("#register_password_repeat").val ())
                     {
                          $("#register_password_repeat_status").removeClass ("uk-text-danger");
                         $("#register_password_repeat_status").html ("");
                         $("#register_password_status").removeClass ("uk-text-danger");
                          $("#register_password_status").html ("");
                    } 
          }
     </script>

</body>

</html>