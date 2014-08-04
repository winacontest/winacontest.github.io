<html>

<?php
    $message    = ""; //Error Message -- if there is one
    $emailclass = "basictext";
    $username   = "";
    
        if ($_POST['process'] == 1) {

        $pattern = '/.*@.*\..*/';
        
      $firstname = $_POST['firstname'];     //required field
        $lastname = $_POST['lastname'];     //required field
        $addy = $_REQUEST['address'];
        $city = $_REQUEST['city'];
        $prov = $_REQUEST['province'];          //required field
        $pc = $_REQUEST['pc'];
        $phone = $_REQUEST['phone'];
        $heard = $_REQUEST['heardfrom'];
        $referrer = $_REQUEST['refer'];
        $email   = $_POST['email'];                 //required field
        //$urlname = urlencode($$_POST['username']);
        
        $message = "Please enter a valid <ul class=\"NoBullet\">";
        $valid = true;
        
        if ( $firstname == '') {
            
            $message .= " <li>First name</li>";
            $valid= false;
        
            }
            
         if ($lastname == '') {
            
            $message .= " <li>Last name </li>";
            $valid=false;
            }   
            
         if ($prov == "MM") {
            $message .=  " <li>Province</li>";
            $valid=false;
        }
        
        if (preg_match($pattern, $_POST['email']) <> 1) {
            //header(
              
        $message .= "<li>E-mail address</li>";
        $valid=false;
              }
              
        $message .= "</ul>";
        
       if( $valid == true) {
           
                $to = 'i.am.golden@gmail.com';
                $subject = 'Trial Offer Request';
                //create a boundary string.  
                $random_hash = md5(date('r', time())); 
                
                $headers = 'From: webmaster@winacontest.com' . "\r\n" .
                              'Return-Path: Sylvia Gold <winacontest.com@gmail.com>' . "\r\n" . 
                              'Reply-To: Sylvia Gold <winacontest.com@gmail.com>' . "\r\n" .
                              'X-Mailer: PHP/' . phpversion() .  "\r\n" .
                              'mime-Version: 1.0' . "\r\n" . 
                              "Content-Type: multipart/alternative; boundary=\"PHP-alt-" . $random_hash. "\""; 
        
               $emailMessage = '--PHP-alt-'. $random_hash . "\r\n" .
                                'Content-Type: text/plain; charset="iso-8859-1' . "\r\n" .
                                'Content-Transfer-Encoding: 7bit' . "\r\n" . "\r\n" .
                               'First name: ' . $firstname . "\n" . 
                            'Last name: ' . $lastname . "\n" . 
                           'Address: ' . $addy . "\n" . 
                           'City: ' . $city . "\n" . 
                           'Province: ' . $prov . "\n" . 
                           'Postal Code: ' . $pc . "\n" . 
                           'Phone Number: ' . $phone . "\n" .
                           'How did you hear about us?: ' . ucwords($heard) . "\n" . 
                           'Referred by: ' . ucwords($referrer) . "\n" .  
                           'E-mail Address: ' . $email . "\r\n" . "\r\n" .
                                '--PHP-alt-' . $random_hash . "\r\n" . 
                                'Content-Type: text/html; charset="iso-8859-1' . "\r\n" .
                                'Content-Transfer-Encoding: 7bit' . "\r\n" . "\r\n" .
                
                                '<p>First name: <b>' . $firstname . '</b> </p>' . "\r\n" .
                                '<p>Last name: <b>' . $lastname . '</b> </p>' . "\r\n" .
                                '<p>Address: <b>' . $addy . '</b> </p>' . "\r\n" .
                                '<p>City: <b>' . $city . '</b> </p>' . "\r\n" .
                                '<p>Province: <b>' . $prov . '</b> </p>' . "\r\n" .
                                '<p>Postal Code: <b>' . $pc . '</b> </p>' . "\r\n" .
                                '<p>Phone Number: <b>' . $phone . '</b> </p>' . "\r\n" .
                                '<p>How did they hear about us?: <b>' . ucwords($heard) . '</b> </p>' . "\r\n" .
                                '<p>Referred by: <b>' . ucwords($referrer) . '</b> </p>' . "\r\n" .
                                '<p>Email Address: <b> <a href="mailto:' . $email . "\">" . $email . '</a></b> </p>' . "\r\n" .
                                                 
                                '--PHP-alt-' . $random_hash . '--';
                
                $mail_sent = mail( $to , $subject, $emailMessage , $headers );
                
                //$message =  $mail_sent ? "Mail sent" : "Mail failed";
                header("location: thankyou.php?&username=$email");

            }
        
        $emailclass = "errortext";
        
        
    }
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Trial Request</title>

    <link rel="stylesheet" type="text/css" title="CSS" href="style1.css" media="screen" />

    <script src="validation.js" type="text/javascript"></script>
</head>

<body>

<!-- Begin Container -->
<div id="container">
    <!-- Begin Masthead -->
    <div id="masthead">
        <h1>Win a Contest Newsletter</h1>
        <h3>The Ultimate Contesting Experience</h3>
        <h4>for Canadian Residents</h4>
    </div>
    <!-- End Masthead -->
    <!-- Begin Navigation -->
    <div id="navigation">
        <ul>
            <li><a href="default.htm">Home</a></li>
            <li><a href="benefits.htm">Benefits</a></li>
            <li><a href="membership.htm">Membership</a></li>
            <li><a href="trial.htm">Trial Offer</a></li>
            <li><a href="credits.htm">Extras</a></li>
            <li><a href="terms.htm">Terms and Conditions</a></li>
            <li><a href="faq.htm">FAQ</a></li>
            <li><a href="testimonials.htm">Testimonials</a></li>
            <li><a href="contact.htm">Contact Us</a></li>
        </ul>
    </div>
    <!-- End Navigation -->
    <!-- Begin Content -->
    <div id="content">
        <!-- #BeginEditable "content" -->
            
                <h2>Trial Offer - Request Form - TESTER</h2>
        <form action="trialtest.php" method="post">
 <?php if ($message != "") {
        echo '<span class="errortext">'.$message.'</span><br>';
    } 
    ?>
        
        <table width="400">
        <tr><td class="<?php print errorCheck($message, 'First'); ?>" align="left" >First Name:<label style="color:red;">*</label></td><td><input type="text" id="firstname" name="firstname" value="<?php print $firstname; ?>"/></td</tr>
        <tr><td class="<?php print errorCheck($message, 'Last'); ?>" align="left">Last Name:<label style="color:red;">*</label></td><td><input type="text" id="lastname" name="lastname" value="<?php print $lastname; ?>" /></td</tr>
        <tr><td>Address:</td><td><input type="text" name="address" size="30" value="<?php print $addy; ?>"/></td</tr>
        <tr><td>City:</td><td><input type="text" name="city" value="<?php print $city; ?>"/></td</tr>
        <tr><td class="<?php print errorCheck($message, 'Prov'); ?>">Province:<label style="color:red;">*</label></td><td><select name="province" id="province" value="<?php print $prov; ?>">
                                    <option value="MM" <?php print selectCheck($prov, 'MM'); ?> >Select</option>
                                    <option value="AB" <?php print selectCheck($prov, 'AB'); ?>>AB</option>
                                    <option value="BC" <?php print selectCheck($prov, 'BC'); ?>>BC</option>

                                    <option value="MB" <?php print selectCheck($prov, 'MB'); ?>>MB</option>
                                    <option value="NB" <?php print selectCheck($prov, 'NB'); ?>>NB</option>
                                    <option value="NL" <?php print selectCheck($prov, 'NL'); ?>>NL</option>
                                    <option value="NT" <?php print selectCheck($prov, 'NT'); ?>>NT</option>
                                    <option value="NS" <?php print selectCheck($prov, 'NS'); ?>>NS</option>
                                    <option value="NU" <?php print selectCheck($prov, 'NU'); ?>>NU</option>

                                    <option value="ON" <?php print selectCheck($prov, 'ON'); ?>>ON</option>
                                    <option value="PE" <?php print selectCheck($prov, 'PE'); ?>>PE</option>
                                    <option value="QC" <?php print selectCheck($prov, 'QC'); ?>>QC</option>
                                    <option value="SK" <?php print selectCheck($prov, 'SK'); ?>>SK</option>
                                    <option value="YT" <?php print selectCheck($prov, 'YT'); ?>>YT</option>
                                </select></td</tr>
        <tr><td>Postal Code:</td><td><input type="text" name="pc" value="<?php print $pc; ?>"/></td</tr>
        <tr><td class="<?php print errorCheck($message, 'E-mail'); ?>">E-mail:<label style="color:red;">*</label></td><td><input type="text" id="email" name="email" value="<?php print $email; ?>" /></td</tr>
        <tr><td>Telephone:</td><td><input type="text" name="phone" value="<?php print $phone; ?>" /></td</tr>
        <tr><td>How did you hear about us?</td><td><select name="heardfrom" value="<?php print $heard; ?>">
                                                                                                <option value="unspecified" <?php print selectCheck($heard, 'unspecified'); ?>>Select</option>
                                                                                                <option value="friend" <?php print selectCheck($heard, 'friend'); ?>>Friend</option>
                                                                                                <option value="search" <?php print selectCheck($heard, 'search'); ?>>Search Engine</option>
                                                                                                <option value="mouth" <?php print selectCheck($heard, 'mouth'); ?>>Word of Mouth</option>
                                                                                                <option value="other" <?php print selectCheck($heard, 'other'); ?>>Other</option></td</tr>
        <tr><td>Referred by:</td><td><input type="text" name="refer" value="<?php print $referrer; ?>"/></td</tr>
        <tr><td></td><td><label style="color:red;">*</label> Required Fields</td></tr>
        <tr><td></td><td></td></tr>
        <tr><td align="center" colspan="2"><input type="hidden" name="process" value="1"><input type="submit" value="Submit" /></td></tr>
        </table>
    <br/>
    </form>
        
<h4 align="center"> <script type="text/javascript"><!--
google_ad_client = "pub-6324391291121661";
//234x60, created 11/20/07
google_ad_slot = "9119811803";
google_ad_width = 234;
google_ad_height = 60;
//--></script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</h4>
        <!-- #EndEditable "content" --></div>
    <!-- End Content -->
    <!-- Begin Footer -->
    <div id="footer">
        <p><a href="default.htm">Home</a> | <a href="benefits.htm">Benefits</a> |
        <a href="membership.htm">Membership</a> | <a href="trial.htm">Trial Offer</a> 
        | <a href="credits.htm">Extras</a> |
        <a href="terms.htm">Terms and Conditions</a> |
        <a href="faq.htm">FAQ</a> | 
        <a href="testimonials.htm">Testimonials</a> | 
        <a href="contact.htm">Contact Us</a></p>
    </div>
    <!-- End Footer --></div>
<!-- End Container -->
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-2011093-1";
urchinTracker();
</script>



<?php

//strstr  ( string $haystack  , mixed $needle  [, bool $before_needle= false  ] )


function errorCheck($message, $element)
{
   $elementClass = "";
    
    if( stristr($message, $element) <> FALSE) {
     //$element was found in the message
       $elementClass= "errortext";  
           
     }
    
    return $elementClass;
}

function selectCheck($formData, $element)
{
   $selected = "selected";
    
    if( $element <> $formData) {
     //$element was found in the message
       $selected= "";   
     }
    
    
    return $selected;
}

?>



</body>

<!-- #EndTemplate -->

</html>
