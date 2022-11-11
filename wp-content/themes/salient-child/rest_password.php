<?php

/*
Template Name: Custom WordPress Password Reset
*/
/*https://code.tutsplus.com/tutorials/build-a-custom-wordpress-user-flow-part-3-password-reset--cms-23811*/
get_header();
global $wpdb, $user_ID; ?>

<script
  src="https://code.jquery.com/jquery-3.4.0.js"
  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  crossorigin="anonymous"></script>
<script type="text/javascript">
	// var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
<?php 
 
	/*if($_GET['action']==='rp') {
	    $key = isset( $_GET['key'] ) ? $_GET['key'] : '';
	    $login = isset( $_GET['login'] ) ? $_GET['login'] : '';
	    wp_redirect( site_url( '/ set-password/' ) . '?key=' . $key . '&login=' . $login );
	    exit;
	}*/
if(isset($_POST['submit']))  {



    global $wpdb;

        $user_email = $_POST['user_email'];
        $user_password = md5($_POST['pass1']); 
        $execut= $wpdb->query("UPDATE `wp_users` SET `user_pass` = '".$user_password."' WHERE `user_email` ='".$user_email."'");
            $message = 'Password changed for user:'.$user_email;
        $subject = "Password Reset Successfully";
         $headers = 'From: '. $user_email . "\r\n" .
       
         $sent = wp_mail($user_email, $subject, strip_tags($message), $headers);
          if($sent) {
                echo "<p class='success-msg'><span>Password Update Successfully</span></p>";
                ?>
                    <script type="text/javascript">
                        

                           window.setTimeout(function() {
                            window.location.href = window.location.origin;+'/login-to-smarttag/?login=1';
                            }, 5000);

                    </script>

                <?php
          }//message sent!
          else  {
             echo "<p class='success-msg'><span>Unable to procced Fail !! Try again</span</p>";
          }
}

?>

<div id="content" class="content-area" role="main">
    <div class="forms-wrapper">
        <div class="forms-wrappe-inner">
        <div class="form-reset-password-wrapper">
            <h1>Reset your password</h1>
            <form id="form-reset-password" name="resetpassform" class="form-reset-password" action="#" method="post" autocomplete="off">
                <input type="hidden" id="user_login" name="user_email" value="<?php echo $_GET['login']; ?>" autocomplete="off">
                <input type="hidden" name="rp_key"  value="<?php echo $_GET['key']; ?>" autocomplete="off">
                <p class="form-row">
                    <label for="user_pass">New password
                    <input type="text"  name="pass1" id="pass1" class="input password-input hide-if-no-js strong" size="24" value="" autocomplete="off">
                </p>
    
                <p class="reset-password-submit">
                    <input type="submit" id="reset-password-btn" name="submit" class="reset-password-btn" value="Submit"/>
                </p>
                <div class="form-reset-password-errors"></div>
            </form>
        </div>
    </div>
    </div>
</div>
<?php get_footer(); ?>