<?php

/**
 * Template Name: Join Now
 */

get_header(); 

global $centireThemeTemplate;
global $centirePlans;

echo $centireThemeTemplate->slider();
?>

	<!-- membership bar wrapper -->
	<div class="membership-bar-wrapper">
		<div class="container clear">
			<?php echo $centireThemeTemplate->subsciptionTabs(); ?>
		</div>
	</div>
	<!-- membership bar wrapper -->

	<div class="membership-content-wrapper">
		<div class="container clear">
			<div id="choose-membership" class="tab-content active">
				<h1 class="section-title">Select your membership type</h1>
				<?php echo $centirePlans->getPlansHTML('student'); ?>
			</div>
			<div id="additions" class="tab-content">
				<h1 class="section-title">Would you like to add to your membership?</h1>
				<div class="additions-block">
					<div class="clear">
						<div class="additions-col">
							<img class="additions-icon" alt="" src="images/additions-icon-blue-1.png" srcset="images/additions-icon-blue-1.png 1x, images/additions-icon-blue-1_2x.png 2x" />
							<h3>Unlimited Creche</h3>
							<p>$5 per week</p>
							<a href="#"><span><img alt="" src="images/white-tick.png" srcset="images/white-tick.png 1x, images/white-tick_2x.png 2x" /></span>ADDED</a>
						</div>
						<div class="additions-col">
							<img class="additions-icon" alt="" src="images/additions-icon-blue-3.png" srcset="images/additions-icon-blue-3.png 1x, images/additions-icon-blue-3_2x.png 2x" />
							<h3>No thanks, I don’t</h3>
							<p>need any additions.</p>
							<a href="#">NO ADDITIONS</a>
						</div>
					</div>
					<a href="#" class="continue-btn">continue</a>
				</div>
			</div>
			<div id="personal-detail" class="tab-content">
				<div class="personal-detail-block clear">
					<div class="personal-col-left">
						<h1 class="section-title">Personal Details</h1>
						<a href="#" class="facebook-btn"><img alt="" src="images/facebook-btn.png" srcset="images/facebook-btn.png 1x, images/facebook-btn_2x.png 2x" /></a>
						<label class="enter-detail">Or enter details</label>
						<div class="personal-info-col">
							<input type="text" class="text-box" placeholder="First Name">
						</div>
						<div class="personal-info-col">
							<input type="text" class="text-box" placeholder="Last Name">
						</div>
						<div class="personal-info-col gendor-col clear">
							<div class="half-col"><div class="custom-checkbox"><label class="custom-icon-box"><input data-type="interest" name="interest" checked="" autocomplete="off" type="radio"><span class="custom-r"></span> Male</label></div></div>
							<div class="half-col"><div class="custom-checkbox"><label class="custom-icon-box"><input data-type="interest" name="interest" checked="" autocomplete="off" type="radio"><span class="custom-r"></span> Female</label></div></div>
						</div>
						<div class="personal-info-col">
							<input type="text" class="text-box" placeholder="Date of Birth (dd/mm/yyyy)">
						</div>
						<div class="personal-info-col">
							<input type="text" class="text-box" placeholder="Mobile">
						</div>
						<div class="personal-info-col">
							<input type="text" class="text-box" placeholder="Phone">
						</div>
						<div class="personal-info-col gendor-col">
							<label class="preference-label">Contact Preference</label>
							<div class="clear">
								<div class="half-col"><div class="custom-checkbox"><label class="custom-icon-box"><input data-type="interest" name="interest" checked="" autocomplete="off" type="radio"><span class="custom-r"></span> Mobile</label></div></div>
								<div class="half-col"><div class="custom-checkbox"><label class="custom-icon-box"><input data-type="interest" name="interest" checked="" autocomplete="off" type="radio"><span class="custom-r"></span> Phone</label></div></div>
							</div>
						</div>
						<div class="personal-info-col">
							<input type="text" class="text-box" placeholder="Email Address">
						</div>
					</div>
					<div class="personal-col-center">
						<h1 class="section-title">Upload Photo</h1>
						<label class="upload-file-label">
							<input type="file" id="myFile">
							<span class="browse-icon">+</span>
							<p>Drag image here or click upload</p>
						</label>
					</div>
					<div class="personal-col-right">
						<h1 class="section-title">Address Info</h1>
						<div class="personal-info-col">
							<input type="text" class="text-box" placeholder="Street">
						</div>
						<div class="personal-info-col">
							<input type="text" class="text-box" placeholder="Street (Optional)">
						</div>
						<div class="personal-info-col">
							<input type="text" class="text-box" placeholder="Suburb">
						</div>
						<div class="personal-info-col clear">
							<div class="half-col"><input type="text" class="text-box" placeholder="Postcode"></div>
							<div class="half-col"><input type="text" class="text-box" placeholder="State"></div>
						</div>
						<h1 class="section-title emergency-title">Emergency Contact</h1>
						<div class="personal-info-col">
							<input type="text" class="text-box" placeholder="Contact Name">
						</div>
						<div class="personal-info-col">
							<input type="text" class="text-box" placeholder="Contact Number">
						</div>
						<div class="personal-info-col">
							<input type="text" class="text-box" placeholder="Relationship">
						</div>
					</div>
				</div>
				<div class="personal-info-col stay-touch">
					<div class="custom-checkbox"><label class="custom-icon-box"><input data-type="interest" name="interest" checked="" autocomplete="off" type="radio"><span class="custom-r"></span> Stay in touch with Healthworks news and special offers.</label></div>
				</div>
				<a href="#" class="continue-btn">continue</a>

			</div>
			<div id="payment-details" class="tab-content">
				<div class="payment-detail-block">
					<div class="clear">
						<div class="payment-detail-col">
							<h1 class="section-title">Administration <br>(UPFRONT)</h1>
							<div class="payment-box">
								<div class="payment-row clear">
									<div class="payment-row-left">One Off Billing Administration</div>
									<div class="payment-row-right">$20</div>
								</div>
								<div class="payment-row clear">
									<div class="payment-row-left">One Off Start Up</div>
									<div class="payment-row-right">$59</div>
								</div>
							</div>
							<div class="card-row clear">
								<a href="#" class="direct-debit">Direct Debit</a>
								<a href="#" class="credit-card">Credit Card</a>
							</div>
							<div class="payment-info-col">
								<input type="text" class="text-box" placeholder="Bank Name">
							</div>
							<div class="payment-info-col">
								<input type="text" class="text-box" placeholder="Account Name">
							</div>
							<div class="payment-info-col">
								<input type="text" class="text-box" placeholder="BSB">
							</div>
							<div class="payment-info-col">
								<input type="text" class="text-box" placeholder="Account Number">
							</div>
						</div>
						<div class="payment-detail-col">
							<h1 class="section-title">Membership <br>(ONGOING)</h1>
							<div class="payment-box">
								<div class="payment-row clear">
									<div class="payment-row-left">Base Membership</div>
									<div class="payment-row-right">$17.95</div>
								</div>
								<div class="payment-row clear">
									<div class="payment-row-left">Creche Add On</div>
									<div class="payment-row-right">$5.00</div>
								</div>
								<div class="payment-row clear">
									<div class="payment-row-left">Weekly Total</div>
									<div class="payment-row-right">$22.95</div>
								</div>
							</div>

							<div class="payment-row membership-checkbox">
								<div class="custom-checkbox"><label class="custom-icon-box"><input data-type="interest" name="interest" checked="" autocomplete="off" type="radio"><span class="custom-r"></span> Use same payment method as for upfront payment. Where upfront payment by Account Debit,
										ongoing payment must use the same details.</label></div>
							</div>

							<div class="payment-row membership-checkbox">
								<div class="custom-checkbox"><label class="custom-icon-box"><input data-type="interest" name="billing address" checked="" autocomplete="off" type="radio"><span class="custom-r"></span> Same billing address as membership</label></div>
							</div>
						</div>
					</div>
					<p class="authorise-text">
						I authorise Debitsuccess Pty Ltd ACN 095 551 581, APCA User ID Number 184534 to debit my/our account at the Financial
						Institution identified here though the Bulk Electronic Clearing System (BECS).
						<br><br>
						By ticking the below box and continuine, you agree that you are joining Healthworks Hendra and acknowledge that you accept
						the associated termsn ad tonditions.
					</p>
					<div class="payment-row terms-checkbox">
						<div class="custom-checkbox"><label class="custom-icon-box"><input data-type="interest" name="billing address" checked="" autocomplete="off" type="radio"><span class="custom-r"></span> I agree to the <a href="#">terms and conditions</a></label></div>
					</div>
					<div class="payment-row terms-checkbox">
						<div class="custom-checkbox"><label class="custom-icon-box"><input data-type="interest" name="billing address" checked="" autocomplete="off" type="radio"><span class="custom-r"></span> I have read and agree to the <a href="#">health check</a></label></div>
					</div>
					<input type="button" class="paynow-btn" value="pay now">
				</div>
			</div>
			<div id="confirmation" class="tab-content">
				<div class="confirmation-block">
					<img class="user-image" alt="" src="images/trav.jpg" srcset="images/trav.jpg 1x, images/trav_2x.jpg 2x" />
					<h3 class="welcome-user">Welcome Travis!</h3>
					<p class="amazing-text">Amazing work on becoming a member. Here’s what happens next:</p>
					<div class="clear">
						<div class="confirmation-col">
							<div class="trial-number">1</div>
							<h3>CHECK YOUR EMAIL</h3>
							<p>We’re really glad to have you here. We will send an email confirming your sign up.</p>
						</div>
						<div class="confirmation-col">
							<div class="trial-number">2</div>
							<h3>START TRAINING</h3>
							<p>We’re expecting you. Visit reception on your first visit and collect your membership tag.</p>
						</div>
						<div class="confirmation-col">
							<div class="trial-number">3</div>
							<h3>FEEL BETTER</h3>
							<p>We look forward to helping with what ever it is you’re here to achieve.</p>
						</div>
					</div>
				</div>
				<div class="confirmation-thanks-wrapper">
					<div class="thanks-block">
						<h1 class="section-title">Thanks for choosing Healthworks Hendra</h1>
						<p>We’re here to help. If you have any questions about your sign up please reach out to us.</p>
						<div class="thanks-contact clear">
							<div class="thanks-icon"><img alt="" src="images/phone-icon-blue.png" /></div>
							<div>(07) 3898 1992</div>
							<div class="thanks-icon mail-icon"><img alt="" src="images/mail-icon-blue.png" /></div>
							<div>info@healthworkshendra.com.au</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

<?php

if(have_posts()) {
	while (have_posts()) {
		the_post();

		the_content();

	}

}


$centireThemeTemplate->sections();


get_footer();