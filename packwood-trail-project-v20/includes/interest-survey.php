<?php
/* Packwood Trail Project Interest Survey Page
/  Derek S Wilson
/  June 2018
/  Description: Page that contains the interest survey content
/               and Re-Captcha response.  Based on multiple.php.
/
*/

/**
 * multiple.php is a postback application designed to provide a 
 * contact form for users to email our clients.  
 * 
 * multiple.php provides a larger form with more elements to provide 
 * a richer example form.
 *
 * @package nmCAPTCHA2
 * @author Bill & Sara Newman <williamnewman@gmail.com>
 * @version 1.01 2015/11/17
 * @link http://www.newmanix.com/
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see contact_include.php 
 * @see recaptchalib.php
 * @see util.js 
 * @todo none
 */

#EDIT THE FOLLOWING:
$toAddress = "dspwilson@aol.com";  //place your/your client's email address here
$toName = "Packwood Trail Project"; //place your client's name here
$website = "Packwood Trail Project Interest Survey";  //place NAME of your client's website here
#--------------END CONFIG AREA ------------------------#
$sendEmail = TRUE; //if true, will send an email, otherwise just show user data.
$dateFeedback = true; //if true will show date/time with reCAPTCHA error - style a div with class of dateFeedback
include_once 'config.php'; #site keys go inside your config.php file
include 'contact-lib/contact_include.php'; #complex unsightly code moved here
$response = null;
$reCaptcha = new ReCaptcha($secretKey);
if (isset($_POST["g-recaptcha-response"]))
{// if submitted check response
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
if ($response != null && $response->success)
    {#reCAPTCHA agrees data is valid (PROCESS FORM & SEND EMAIL)
        handle_POST($skipFields,$sendEmail,$toName,$fromAddress,$toAddress,$website,$fromDomain);             #Here we can enter the data sent into a database in a later version of this file
    ?>
    <!-- START HTML FEEDBACK -->
    <div class="contact-feedback">
        <h2>Your Comments Have Been Received!</h2>
        <p>Thanks for the input!</p>
        <p>We'll respond via email within 48 hours, if you requested information.</p>
    </div>    
    <!-- END HTML FEEDBACK -->        
    <?php
}else{#show form, either for first time, or if data not valid per reCAPTCHA 
    if($response != null && !$response->success)
    {
        $feedback = dateFeedback($dateFeedback);
        send_POSTtoJS($skipFields); #function for sending POST data to JS array to reload form elements
    }//end failure feedback
 
?>
	<!-- START HTML FORM -->
	<form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post">
  
	<div>
		<label>
			Name:<br /><input type="text" name="Name" required="required" placeholder="Full Name (required)" title="Name is required" tabindex="10" size="44" autofocus />
		</label>
	</div>
        
	<div>	
		<label>
			Email:<br /><input type="email" name="Email" required="required" placeholder="Email (required)" title="A valid email is required" tabindex="20" size="44" />
		</label>
	</div>
        
	<!-- below change the HTML to your form elements - only 'Name' & 'Email' (above) are significant -->
	      
    <div> <!-- Support effort to build accessible trails in Packwood -->
        <fieldset class="interest-survey">
        <legend class="interest-survey">I support the effort to build more accessible trails in Packwood</legend>
			<input type="radio" name="Build_Trails?" value="Yes"  title="Build Trails?" tabindex="50"  
			/> Yes <br />
			<input type="radio" name="Build_Trails?" value="No" /> No <br />
        </fieldset>
	</div>
        
    <div> <!-- Live in Packwood -->
        <fieldset class="interest-survey">
        <legend class="interest-survey">I live in Packwood</legend>
			<input type="radio" name="Live_Packwood?" value="Yes"  title="Live in Packwood?" tabindex="50"  
			/> Yes <br />
			<input type="radio" name="Live_Packwood?" value="No" /> No <br />
        </fieldset>
	</div>
        
    <div> <!-- Vacation in Packwood -->
		<fieldset class="interest-survey">
			<legend class="interest-survey">I own a house here, live elsewhere, but vacation here</legend>
			<input type="radio" name="Vacation_Packwood?" value="Yes"  title="Vacation in Packwood?" tabindex="50"  
			/> Yes <br />
			<input type="radio" name="Vacation_Packwood?" value="No" /> No <br />
		</fieldset>
	</div>
        
    <div> <!-- I would use a hiker/runner/biker trail near packwood [blank] times per month -->
        <fieldset class="interest-survey">
		<legend class="interest-survey">
			I would use a hiker/runner/biker trail near Packwood [blank] times per month</legend>
			<select name="use_trail_per_month" title="Use trail per month" tabindex="30">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10_or_more">10 or more</option>
			</select>
        </fieldset>
	</div>
        
    <div> <!-- I would use trail these seasons -->
		<fieldset class="interest-survey">
			<legend class="interest-survey">I would use trail these seasons:</legend>
			<input type="checkbox" name="use_summer" value="Summer" tabindex="40" /> Summer <br />
			<input type="checkbox" name="use_fall" value="Fall" /> Fall <br />
			<input type="checkbox" name="use_winter" value="Winter" /> Winter <br />
			<input type="checkbox" name="spring_use" value="Spring" /> Spring <br />
		</fieldset>
	</div>
        
    <div> <!-- Volunteer time -->
		<fieldset class="interest-survey">
			<legend class="interest-survey">I would be willing to volunteer trail maintenance time.</legend>
			<input type="radio" name="Volunteer_time?" value="Yes"  title="Volunteer time?" tabindex="50"  
			/> Yes <br />
			<input type="radio" name="Volunteer_time?" value="No" /> No <br />
		</fieldset>
	</div>
        
     <div> <!-- Donate money -->
		<fieldset class="interest-survey">
			<legend class="interest-survey">I would be willing to donate money for trail projects.</legend>
			<input type="radio" name="Donate_money?" value="Yes"  title="Donate money?" tabindex="50"  
			/> Yes <br />
			<input type="radio" name="Donate_money?" value="No" /> No <br />
		</fieldset>
	</div>
        
      <div> <!-- I would use trail for these activities -->
		<fieldset class="interest-survey">
			<legend class="interest-survey">I would want to use the trail for:</legend>
            <input type="checkbox" name="use_running" value="running" tabindex="40" /> Running <br />
			<input type="checkbox" name="use_walking" value="walking" tabindex="40" /> Walking <br />
            <input type="checkbox" name="use_biking" value="biking" tabindex="40" /> Biking <br />
			<input type="checkbox" name="use_hunting" value="hunting" /> Hunting <br />
			<input type="checkbox" name="use_horse" value="horse" /> Horseback Riding <br />
		</fieldset>
	</div>
        
      <div> <!-- Inform by email -->
		<fieldset class="interest-survey">
			<legend class="interest-survey">Please keep me informed by email as progress is made!</legend>
			<input type="radio" name="Inform_email?" value="Yes"  title="Inform by email?" tabindex="50"  
			/> Yes <br />
			<input type="radio" name="Inform_email?" value="No" /> No <br />
		</fieldset>
	</div>
        
	<div>	
		<label>
			Comments:<br /><textarea name="Comments" cols="36" rows="4" placeholder="Your comments are important to us!" tabindex="60"></textarea>
		</label>
	</div>	
        
	<div><?=$feedback?></div>
    <div class="g-recaptcha" data-sitekey="<?=$siteKey;?>"></div>
	<div>
		<input type="submit" value="submit" />
	</div>
        
    </form>
	<!-- END HTML FORM -->
    <script type="text/javascript"
        src="https://www.google.com/recaptcha/api.js?hl=en">
    </script>
<?php
}
?>
