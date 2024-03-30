<?php

include 'includes/limelight.php';
include 'config.php';

$kount_session = str_replace('.', '', microtime(true));
$_SESSION['order']['kount_session'] = $kount_session;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $sitetitle?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- Favicone Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="icon" type="image/png" href="img/favicon.ico">
    <link rel="apple-touch-icon" href="img/favicon.ico">

    <!-- CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="css/ionicons.css" rel="stylesheet" type="text/css" />
    <link href="css/plugin/sidebar-menu.css" rel="stylesheet" type="text/css" />
    <link href="css/plugin/animate.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	
    <!-- SLIDER REVOLUTION CSS SETTINGS -->
    <link href="plugin/rs-plugin/css/settings.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
    <!-- Site Wraper -->
    <div class="wrapper">
        <!-- Header -->
        <header id="header" class="header1">
            <div class="container header-inner">
                <!-- Logo -->
                <div class="logo">
                    <a href="index.php">
                        <img class="logo-light" src="img/logo-white.png" alt="Follinique" />
                    </a>
                </div>
                <!-- End Logo -->
                <!-- Mobile Navbar Icon -->
                <div class="nav-mobile nav-bar-icon">
                    <span></span>
                </div>
                <!-- End Mobile Navbar Icon -->
                <!-- Navbar Navigation -->
				<?php include 'nav.php';?>
                <!-- End Navbar Navigation -->
            </div>
        </header>
        <!-- End Header -->
		<div class="spacer-60"></div>
        <div class="clearfix"></div>
        <!-- CONTENT -->
        <section id="pricing" class="ptb ptb-sm-80">
            <div class="container text-center">
				<div class="spacer-30  hidden-md hidden-sm hidden-xs"></div>
				<div class="spacer-30"></div>
                <div class="spacer-10  hidden-md hidden-sm hidden-xs"></div>
				<div class="spacer-30  hidden-lg hidden-xl"></div>
                <div class="row">
                    <div class="col-md-3 ptb-sm-80">
                        <div class="Pricing-box">
                            <div class="price-title spacing-box">
                                <h4>BEST VALUE</h4>
                            </div>
                            <hr>
                            <div class="spacing-box">
                                <div class="price"><span class="price-sm">$</span>
                                    <span class="price-lg"><?= $perbottle5 ?></span>
                                </div>
                                <div class="price-tenure">per bottle <br/>5 month supply for <?php echo $bottle5 ?></div>
                            </div>
                            <hr>
                            <div class="pricing-features spacing-grid">
                                <ul> 
                                    <li><h4>BUY 3 GET 2 FREE</h4></li>
                                </ul>
								    <ul><img src="img/product/5bottles.png" class="img-responsive center-block"/></ul>
								 <ul>
                                    <li><strong><i class="ion ion-android-checkmark-circle"></i> 5 MONTH SUPPLY</strong></li>
									<li><strong><i class="ion ion-android-checkmark-circle"></i> fREE SHIPPING</strong></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="spacing-grid">
                                <a class="btn btn-lg btn-lblueh btn2" data-toggle="collapse" aria-toggle="collapse" id="5" aria-controls="collapseOne" onClick="packagechange(<?=$bottle5_product_id;?>,<?=$bottle5_shipping_id;?>);" href="#collapseOne">Buy Now</a>
                            </div>
                        </div>
                        <span data-id="5"></span>
                    </div>
                    <div class="col-md-3 ptb-sm-80">
                        <div class="Pricing-box">
                            <div class="price-title spacing-box">
                                <h4>Standard</h4>
                            </div>
                            <hr>
                            <div class="spacing-box">
                                <div class="price"><span class="price-sm">$</span><span class="price-lg"><?php echo $perbottle3 ?></span></div>
                                <div class="price-tenure">per bottle<br/>3 month supply for <?php echo $bottle3 ?></div>
                            </div>
                            <hr>
                            <div class="pricing-features spacing-grid">
                                <ul>
                                    <li>
                                        <h4>BUY 2 GET 1 FREE</h4>
                                    </li>
                                </ul>
								<ul>
                                    <img src="img/product/3bottles.png" class="img-responsive center-block"/>
                                </ul>
								<ul>
                                    <li><strong><i class="ion ion-android-checkmark-circle"></i> 3 MONTH SUPPLY</strong></li>
									<li><strong><i class="ion ion-android-checkmark-circle"></i> fREE SHIPPING</strong></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="spacing-grid">
                                <a class="btn btn-lg btn-lblueh btn2" 
                                    data-toggle="collapse"  
                                    id="3" 
                                    onClick="packagechange(<?=$bottle3_product_id;?>,<?=$bottle3_shipping_id;?>);"
                                    aria-toggle="collapse" aria-controls="collapseOne" href="#collapseOne">Buy Now
                                </a>
                            </div>
                        </div>
                        <span data-id="3"></span>
                    </div>
                    <div class="col-md-3 ptb-sm-80">
                        <div class="Pricing-box">
                            <div class="price-title spacing-box">
                               <h4>BASIC</h4>
                            </div>
                            <hr>
                            <div class="spacing-box">
                                <div class="price"><span class="price-sm">$</span><span class="price-lg"><?php echo $perbottle1 ?></span></div>
                                <div class="price-tenure">per bottle<br/>1 month supply for <?php echo $bottle1 ?></div>
							</div>
                            <hr>
                            <div class="pricing-features spacing-grid"> 
                                <ul>
                                    <li><h4>BUY 1 Bottle</h4></li>
                                </ul>
								    <ul><img src="img/product/1bottle.png" class="img-responsive center-block" /></ul>
								<ul>
                                    <li><strong><i class="ion ion-android-checkmark-circle"></i> 1 MONTH SUPPLY</strong></li>
									<li><strong><i class="ion ion-android-checkmark-circle"></i> $ 4.95 S&H</strong></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="spacing-grid">
                                <a class="btn btn-lg btn-lblueh btn2" data-toggle="collapse"  id="1" aria-toggle="collapse" onClick="packagechange(<?=$bottle1_product_id;?>,<?=$bottle1_shipping_id;?>);" aria-controls="collapseOne" href="#collapseOne">Buy Now</a>
                            </div>
                        </div>
                        <span data-id="1"></span>
                    </div>
					<div class="col-md-3 ptb-sm-80">
                        <div class="Pricing-box highlight">
                            <div class="price-title spacing-box">
                                <h4>EVALUATION</h4>
                            </div>
                            <hr>
                            <div class="spacing-box">
                                <div class="price"><span class="price-sm">$</span><span class="price-lg">0</span></div>
                                <div class="price-tenure">per bottle <br/>+ $4.95 S&H </div>
							</div>
                            <hr>
                            <div class="pricing-features spacing-grid"> 
                                <ul>
                                    <li><h4>EVALUATION</h4></li>
                                </ul>
								    <ul><img src="img/product/1bottle_gray.png" class="img-responsive center-block" /></ul>
								 <ul>
                                    <li><strong><i class="ion ion-android-checkmark-circle"></i> 1 MONTH SUPPLY</strong></li>
									<li><strong><i class="ion ion-android-checkmark-circle"></i> $ 4.95 S&H</strong></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="spacing-grid">
                                <div class="btn btn-lg btn-gray">SOLD OUT</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="spacer-30  hidden-md hidden-sm hidden-xs"></div>
        <!-- Accordian DROP -->
        <div class="container">
        	<div class="row">
        	    <div class="col-md-12 center-column">
        			<div class="row">
        			    <div class="col-md-12 checkout2">
        					<div class="panel-group checkout">
        					    <div class="panel panel-default">
            						<div class="spacer-30  hidden-md hidden-lg"></div>
            						<a id="step_1" data-cust="shipping" data-toggle="collapse1" aria-toggle="collapse" aria-controls="collapseOne" href="#collapseOne">
                                        <h4>Shipping Information:</h4>
                                    </a>
    								<form name="formID" id="formID" class="form123" method="post" autocomplete="on">
                                        <div class="collapse" id="collapseOne">
                                            <input type='hidden' name='limelight_charset' id='limelight_charset' value='ISO-8859-1'/>
                                            <input type='hidden' id='campaign_id' name='campaign_id' value='<?php echo $campaign_id;?>' />
                                            <input type='hidden' name = 'product_name' id='product_name' value= "" />
                                            <input type="hidden" id="custom_product" name="custom_product" value="<?php echo $bottle5_product_id;?>" />
                                            <input type="hidden" name="notes" id="notes"  value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"/>
                                            <input type="hidden" name="shipping" id="shipping" value="<?php echo $bottle5_shipping_id;?>" />

                                            <?php
                                                foreach($_GET as $key => $value) {
                                                    echo "<input type='hidden' name='".strtoupper(safeRequestLimelight($key))."' value='".safeRequestLimelight($_GET[$key])."'>";
                                                }
                                            ?>
                                            <?php if ($AFID == 3) { ?>
                                                <input type="hidden" name="AFID" id="AFID" value="<?= $AFID;?>"/>
                                            <? }?>
                                            <input type="hidden" name="country"  value="US" id="country"/>
        									<div class="row">
    											<div class="col-md-6">
    												<div class="form-group">
    													<input type="text" name="fields_fname" id="fields_fname" value="<?php echo $first_name;  ?>" placeholder="First Name" class="form-control field validate[required] field_form1">
    												</div>
    											</div>
    											<div class="col-md-6">
    												<div class="form-group">
    													<input type="text" name="fields_lname" id="fields_lname" value="<?php echo $last_name;  ?>" placeholder="Last Name" class="form-control field validate[required] field_form1">
    												</div>
    											</div>
    											<div class="col-md-12">
    												<div class="form-group">
    													<input type="text" name="fields_address1" id="fields_address1" value="<?php echo $address;  ?>" placeholder="Address" class="form-control field validate[required] field_form1">
    												</div>
    											</div>
                                                <div class="col-md-12">
    												<div class="form-group">
    													<input type="text" name="fields_city" id="fields_city" value="<?php echo $city;  ?>" placeholder="City" class="form-control field validate[required] field_form1">
    												</div>
    											</div>
    											<div class="col-md-6">
    												<div class="form-group">
    													<select id="state" name="fields_state" alt="state" class="form-control required field field_form1">
    														<option value="">Select State</option>
    														<option value="AL">Alabama (AL)</option>
    														<option value="AK">Alaska (AK)</option>
    														<option value="AZ">Arizona (AZ)</option>
    														<option value="AR">Arkansas (AR)</option>
    														<option value="CA">California (CA)</option>
    														<option value="CO">Colorado (CO)</option>
    														<option value="CT">Connecticut (CT)</option>
    														<option value="DE">Delaware (DE)</option>
    														<option value="DC">District of Columbia (DC)</option>
    														<option value="FL">Florida (FL)</option>
    														<option value="GA">Georgia (GA)</option>
    														<option value="HI">Hawaii (HI)</option>
    														<option value="ID">Idaho (ID)</option>
    														<option value="IL">Illinois (IL)</option>
    														<option value="IN">Indiana (IN)</option>
    														<option value="IA">Iowa (IA)</option>
    														<option value="KS">Kansas (KS)</option>
    														<option value="KY">Kentucky (KY)</option>
    														<option value="LA">Louisiana (LA)</option>
    														<option value="ME">Maine (ME)</option>
    														<option value="MD">Maryland (MD)</option>
    														<option value="MA">Massachusetts (MA)</option>
    														<option value="MI">Michigan (MI)</option>
    														<option value="MN">Minnesota (MN)</option>
    														<option value="MS">Mississippi (MS)</option>
    														<option value="MO">Missouri (MO)</option>
    														<option value="MT">Montana (MT)</option>
    														<option value="NE">Nebraska (NE)</option>
    														<option value="NV">Nevada (NV)</option>
    														<option value="NH">New Hampshire (NH)</option>
    														<option value="NJ">New Jersey (NJ)</option>
    														<option value="NM">New Mexico (NM)</option>
    														<option value="NY">New York (NY)</option>
    														<option value="NC">North Carolina (NC)</option>
    														<option value="ND">North Dakota (ND)</option>
    														<option value="OH">Ohio (OH)</option>
    														<option value="OK">Oklahoma (OK)</option>
    														<option value="OR">Oregon (OR)</option>
    														<option value="PA">Pennsylvania (PA)</option>
    														<option value="PR">Puerto Rico (PR)</option>
    														<option value="RI">Rhode Island (RI)</option>
    														<option value="SC">South Carolina (SC)</option>
    														<option value="SD">South Dakota (SD)</option>
    														<option value="TN">Tennessee (TN)</option>
    														<option value="TX">Texas (TX)</option>
    														<option value="UT">Utah (UT)</option>
    														<option value="VT">Vermont (VT)</option>
    														<option value="VA">Virginia (VA)</option>
    														<option value="WA">Washington (WA)</option>
    														<option value="WV">West Virginia (WV)</option>
    														<option value="WI">Wisconsin (WI)</option>
    														<option value="WY">Wyoming (WY)</option>
    													</select>
    												</div>
    											</div>
    											<div class="col-md-6">
    												<div class="form-group">
    													<input type="tel" maxlength="5" name="fields_zip" id="fields_zip" value="<?php echo $zipcode;  ?>" placeholder="ZIP" class="form-control field validate[required] field_form1">
    												</div>
    											</div>
    											<div class="col-md-6">
    												<div class="form-group">
    													<input type="tel" maxlength="10" name="fields_phone" id="fields_phone" value="<?php echo $phone;  ?>" placeholder="Phone" class="form-control field validate[required] field_form1" >
    												</div>
    											</div>
    											<div class="col-md-6">
    												<div class="form-group">
    													<input type="text" name="fields_email" id="fields_email" value="<?php echo $email;  ?>" placeholder="Email" class="form-control field validate[required, custom[email]] field_form1">
    												</div>
    											</div>
        									</div><!-- End .row -->
            						    </div><!-- End of collapseOne -->

            							<div class="spacer-30  hidden-md hidden-lg"></div>
    									<a id="step_2" data-cust="payment" data-toggle="collapse1" data-parent="#accordion" href="#collapseTwo">
                                            <h4>Payment Information:</h4>
                                        <a/>
            							<div class="collapse" id="collapseTwo">
            								<div class="row">
            									<div class="col-md-4">
    												<div class="form-group">
    													 <select class="form-control required field field_form1" name="cc_type" id="cc_type" style="z-index:1;">
    														<option value="">Card Type</option>
    														<option value="visa">Visa</option>
    														<option value="master">Master Card</option>
    													 </select>
    												</div>
            									</div>
    											<div class="col-md-6">
    												<div class="form-group">
    													 <input type="tel" maxlength="16" class="form-control required" id="cc_number" name="cc_number" autocomplete="off" placeholder="Card Number" />
    												</div>
    											</div>
    											<div class="col-md-4">
    												<div class="form-group">
    													<select class="form-control required" name="fields_expmonth" id="fields_expmonth" style="z-index:1;">
                                                            <option value="">Expiration Month</option>
    														<option  value="01">January</option>
    														<option  value="02">February</option>
    														<option  value="03">March</option>
    														<option  value="04">April</option>
    														<option  value="05">May</option>
    														<option  value="06">June</option>
    														<option  value="07">July</option>
    														<option  value="08">August</option>
    														<option  value="09">September</option>
    														<option  value="10">October</option>
    														<option  value="11">November</option>
    														<option  value="12">December</option>
    													</select>
    												</div>
    											</div>
    											<div class="col-md-4">
    												<div class="form-group">
    													<select class="form-control required" name="fields_expyear" id="fields_expyear" style="z-index:1;">
                                                            <option value="">Expiration Year</option>
                                                            <?php for ($i = 0; $i <= 15; $i++) :?>
                                                            <?php 
                                                                $year = date('Y') + $i;
                                                                $value = date('y') + $i;
                                                            ?>
                                                                <option value="<?=$value?>"><?=$year?></option>
                                                            <?php endfor;?>
    													</select>
    												</div>
    											</div>
    											<div class="col-md-4">
    												<div class="form-group">
    													 <input autocomplete="off" type="tel" class="form-control required" id="cc_cvv" name="cc_cvv" placeholder="CVV" maxlength="3" />
    												</div>
    											</div>
    										</div>
    										<div align="center">
                                                <button 
                                                    type="button" 
                                                    name="btnorder_sub" 
                                                    id="btnorder_sub" 
                                                    class="btn btn-lg btn-lblue" 
                                                    style="border:0;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Submit Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </button>
    											<!--<input type="image" src="../img/order.png" name="btnorder_sub" id="btnorder_sub" value='Submit' style="border:0;" onclick="window.onbeforeunload = null;">-->
    										</div>
                                        </div> <!-- End of CollapseTwo -->
            						</form>
        					    </div><!-- End .panel-body -->
        				    </div>
        			    </div><!-- End .panel -->
        		    </div>
        	    </div>
            </div><!-- End .row -->
        </div><!-- End .center-column -->
        <!-- END Accordian DROP -->
			<!--KOUNT PIXEL-->
			<input type="hidden" name="sessionId" value="<?=$kount_session?>" />
			<iframe 
				width=1 
				height=1 
				frameborder=0 
				scrolling=no 
				src="https://crmprazahealth.limelightcrm.com/pixel.php?t=htm&campaign_id=<?=CAMPAIGN_ID?>&sessionId=<?=$kount_session?>">
			    <img width=1 height=1 src="https://crmprazahealth.limelightcrm.com/pixel.php?t=gif&campaign_id=<?=CAMPAIGN_ID?>&sessionId=<?=$kount_session?>"/>
			</iframe>
			<!--/KOUNT PIXEL-->
		<!-- Footer -->
		<?php include 'footer.php';?>
		<!-- End Footer -->

        <!-- Scroll Top -->
        <a class="scroll-top">
            <i class="fa fa-angle-double-up"></i>
        </a>
        <!-- End Scroll Top -->
    </div>
    <!-- Site Wraper End -->

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.easing.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.flexslider.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.fitvids.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.viewportchecker.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.stellar.min.js" type="text/javascript"></script>
    <script src="js/plugin/wow.min.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.colorbox-min.js" type="text/javascript"></script>
    <script src="js/plugin/owl.carousel.min.js" type="text/javascript"></script>
	<script src="js/plugin/jquery.singlePageNav.js" type="text/javascript"></script>
    <script src="js/plugin/isotope.pkgd.min.js" type="text/javascript"></script>
    <script src="js/plugin/masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="js/plugin/imagesloaded.pkgd.min.js" type="text/javascript"></script>
    <script src="js/plugin/sidebar-menu.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.fs.tipper.min.js" type="text/javascript"></script>
    <script src="js/plugin/mediaelement-and-player.min.js"></script>
    <script src="js/theme.js" type="text/javascript"></script>
    <script src="js/navigation.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/additional-methods.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
            $('#step_1').hide();
            $('#step_2').hide();
			
			var form_html = $('.checkout2').html();
			var pre_id;

			$("body").delegate("a[data-toggle='collapse']","click",function() {
                $('#step_1').show();
                $('#step_2').show();
				// console.log($(this).attr("id"));
				if ($(window).width() < 1024) {
					if ( pre_id != "" && pre_id == $(this).attr("id") ){
						$("div#collapseOne").slideUp();
						$("div#collapseTwo").slideUp(function(){
							$("html, body").scrollTop($('span[data-id="'+pre_id+'"]').offset().top-120);
							pre_id = "";
						});
					 } else {
                        //console.log('here we go');
						//$(".checkout2, .checkout").html('');
					 	//pre_id = $(this).attr("id");
						//$('span[data-id="'+$(this).attr("id")+'"]').html('<div class="panel-group checkout">'+form_html+'</div>');	
						$("div#collapseOne").slideDown(function() {
							$("html, body").scrollTop($("div[id='collapseOne']").offset().top-120);
						}); 
					}
				}
                // scroll to shipping info on "Buy Now" click
                window.scrollTo(0,document.body.scrollHeight);
                $("div#collapseTwo").show().css("visibility","visible").slideDown();
			});

            $('#formID').validate({
                errorPlacement: function(error, element) {
                    error.insertBefore(element);
                    error.addClass('valid_error');
                },
                rules: {
                    fields_fname: {
                        required: true,
                        lettersonly: true
                    },
                    fields_lname: {
                        required: true,
                        lettersonly: true
                    },
                    fields_email: {
                        required: true,
                        email: true
                    },
                    fields_address1: {
                        required: true,
                        maxlength: 150
                    },
                    state: {
                        required: true
                    },
                    fields_phone: {
                        required: true,
                        phoneUS: true,
                        maxlength: 10,
                        minlength: 10,
                        digits: true
                    },
                    fields_zip: {
                        required: true,
                        maxlength: 6,
                        minlength: 5,
                        digits: true
                    },
                    fields_city: {
                        required: true,
                        minlength: 2
                    },
                    cc_type: {
                        required: true
                    },
                    cc_number: {
                        required: true,
                        digits: true
                    },
                    fields_expmonth: {
                        required: true
                    },
                    fields_expyear: {
                        required: true
                    },
                    cc_cvv: {
                        required: true,
                        digits: true
                    }
                },
                messages: {
                    fields_fname: {
                        required: 'Please enter your First Name',
                        lettersonly: 'First Name must be letters only'
                    },
                    fields_lname: {
                        required: 'Please enter your Last Name',
                        lettersonly: 'Last Name must be letters only'
                    },
                    fields_city: {
                        required: 'Please enter your City',
                        minlength: 'Your City name can\'t be less than 2 letters'
                    },
                    fields_zip: {
                        required: 'Please enter your ZIP code',
                        minlength: 'Your ZIP code can\'t be less than 5 characters',
                        maxlength: 'Your ZIP code can\'t be more than 5 characters',
                        digits: 'Your ZIP code must use digits only'
                    },
                    fields_address1: {
                        required: 'Please enter your address',
                        maxlength: 'Your address can\'t be more than 150 characters'
                    },
                    state: {
                        required: 'Please select your state'  
                    },
                    fields_email: {
                        required: 'Please enter your email address',
                        email: 'Please enter a valid email address'
                    },
                    fields_phone: {
                        required: 'Please enter a valid US phone!',
                        maxlength: 'A valid US phone number can\'t be more than 10 digits',
                        minlength: 'A valid US phone number can\'t be less than 10 digits',
                        digits: 'Please digits only'
                    },
                    cc_type: {
                        required: 'Please select your Card Type' 
                    },
                    cc_number: {
                        required: 'Please enter your Card Number',
                        digits: 'Please numbers only'
                    },
                    fields_expmonth: {
                        required: 'Please select your Expiration Month'
                    },
                    fields_expyear: {
                        required: 'Please select your Expiration Year'
                    },
                    cc_cvv: {
                        required: 'Please enter your CVV code',
                        digits: 'Please numbers only'
                    }
                },
                onkeyup: false,
                highlight : function (element) {
                    $(element).addClass('input_error');
                },
                unhighlight : function (element) {
                    $(element).removeClass('input_error');
                }
            });

            //$('#formID').on('submit', function(e) {
            $('#btnorder_sub').click(function(e) {
                e.preventDefault();
                // All checking passed
                if ($('#formID').valid() && $('#cc_number').val()) {
                    // ShowExitPopup = false;
                    //  internal = 1;
                    //  isExit=false;
                   
                    $('#loading-indicator').fadeIn(500);

                    var page_ajax = 'submit_order_limelight.php?cc_type=' + 
                        $('#cc_type').val() + 
                        '&cc_number=' + 
                        $('#cc_number').val() + 
                        '&cc_cvv=' + 
                        $('#cc_cvv').val() + 
                        '&fields_expmonth=' + 
                        $('#fields_expmonth').val() + 
                        '&fields_expyear=' + 
                        $('#fields_expyear').val();

                    $.ajax({
                        type:'POST', 
                        url: 'includes/' + page_ajax,
                        data: $('#formID').serialize(),
                        success: function(response) {
                            var res = response.split("|");
                            if (res[0] == 'decline') {
                                // Decline Page Error
                                alert('=>'+response);
                            } else if (res[0] == 'ok') {
                                window.location.href = '<?php echo $campaign_path.$folder_name; ?>thankyou.php'+res[1];
                            } else if ( res[0] == 'okprepaid' ) {
                                window.location.href = '<?php echo $campaign_path.$folder_name; ?>thankyou.php'+res[1];
                            } else {
                                $('#loading-indicator').hide();
                                var li = '';
                                li += '<li>' + res[0] + '</li>';
                                var html = '';
                                html += '<div id="error_handler_overlay">';
                                html += '<div class="error_handler_body"><a href="javascript:void(0);" id="error_handler_overlay_close">X</a><ul>' + li + '</ul></div>';
                                html += '</div>';
                                
                                //return html;
                                $('body').append(html);
                                $('#error_handler_overlay').fadeIn(500);
                            }
                        }
                    });
                }   
            });
		});	

        //  Onepage Nav Elements
        $('.singlepage-nav').singlePageNav({
            offset: 0,
            filter: ':not(.external)',
            updateHash: true,
            currentClass: 'current',
            easing: 'swing',
            speed: 750,
            beforeStart: function () {
                if ($(window).width() < 991) {
                    $('.singlepage-nav > ul').hide();
                };
            },
            onComplete: function () {
                console.log('done scrolling');
            }
        });
 	
        function packagechange(product, shipping) {
            $('#custom_product').val(product);
            $('#shipping').val(shipping);
        }
	
        $(function() {
        	$(window).keydown(function(e) {
        		if (e.which === 27 && $('#error_handler_overlay').length) {
        			$('#error_handler_overlay').remove();
        		}
        	});

        	$(document).off('click', '#error_handler_overlay');
        	$(document).on('click', '#error_handler_overlay', function() {
        		$(this).remove();
        	});

        	$(document).off('click', '#error_handler_overlay_close');
        	$(document).on('click', '#error_handler_overlay_close', function() {
        		$('#error_handler_overlay').remove();
        	});
        	

        	$(document).on('click', '#app_common_modal_close', function() {
        		//     alert('close');
        		$('#app_common_modal').remove(); 
        	});	
        	
        	$(document).on('click', '.btn2', function() {
        		//     alert('close');
    			//$('#app_common_modal').remove();
    			$('.btn2').removeClass('btn-gray');
    			$('.btn2').addClass('btn-black');
    			$(this).removeClass('btn-black');
    			$(this).addClass('btn-gray');
        	});
        });
    </script>

    <p id="loading-indicator" style="display:none;">Processing...</p>
    <p id="crm-response-container" style="display:none;">Limelight messages will appear here...</p>

    <style> 
        .input_error {
           border-color: #f00 !important;
        }

        #error_handler_overlay, #app_common_modal {
            position: fixed;
            top: 0px;
            left: 0px;
            padding: 0;
            margin: 0;
            width: 100%;
            height: 100%;
            z-index: 2147483647;
            background:#333;
            background: rgba(255,255,255,0.8);
            display: none;
            overflow-x: hidden;
            -webkit-overflow-scrolling: touch;
        }
        #error_handler_overlay  .error_handler_body {
            margin: 100px auto;
            width: 95%;
            max-width: 600px;
            color: #333;
            padding: 20px;
            background-color: #fff;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid #999;
            border: 1px solid rgba(0,0,0,.2);
            border-radius: 0px;
            outline: 0;
            -webkit-box-shadow: 0 3px 9px rgba(0,0,0,.5);
            box-shadow: 0 3px 9px rgba(0,0,0,.5);
            font-family: Verdana, Geneva, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            position: relative;
            box-sizing: border-box;-webkit-box-sizing: border-box; -moz-box-sizing: border-box;
        }

        #error_handler_overlay_close, #app_common_modal_close {
            position: absolute;
            right: -10px;
            top: -10px;
            color: #FFF;
            background-color: #333;
            border: 2px solid #FFF;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            line-height: 30px;
            padding: 0;
            margin: 0;
        }

        #app_common_modal  .app_modal_body {
            margin: 100px auto;
            min-width: inherit;
            width:95%;
            max-width: 600px;
            min-height: 400px;
            color: #333;
            padding: 2.5%;
            background-color: #fff;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid #999;
            border: 1px solid rgba(0,0,0,.2);
            border-radius: 0px;
            outline: 0;
            -webkit-box-shadow: 0 3px 9px rgba(0,0,0,.5);
            box-shadow: 0 3px 9px rgba(0,0,0,.5);
            font-family: Verdana, Geneva, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            position: relative;
            box-sizing:border-box;
            -webkit-box-sizing:border-box;
            -moz-box-sizing:border-box;
            -ms-box-sizing:border-box;
        }
        #app_common_modal  .app_modal_body iframe {
            min-height: 400px;
            width: 100%;
            border: 1px solid rgb(213, 214, 239);
        }
          #loading-indicator {
            background-color: rgba(0, 0, 0, 0.5);
            bottom: 0;
            box-sizing: border-box;
            font-size: 1px;
            height: 100%;
            left: 0;
            margin: 0 !important;
            padding: 0 !important;
            position: fixed;
            right: 0;
            top: 0;
            width: 100%;
            z-index:2147483646;
        }
        #loading-indicator::before {
            background: rgba(0, 0, 0, 0) url("img/loading.GIF") no-repeat scroll center center;
            box-sizing: border-box;
            content: "";
            height: 70px;
            left: 50%;
            margin-left: -35px;
            margin-top: -70px;
            position: absolute;
            top: 50%;
            width: 70px;
            z-index: 2;
        }
        #loading-indicator::after {
            background: #ffffff none repeat scroll 0 0;
            border-radius: 5px;
            box-sizing: border-box;
            color: #000000;
            content: "Processing, one moment please... ";
            font-family: arial;
            font-size: 17px;
            height: 110px;
            left: 50%;
            line-height: 98px;
            margin-left: -150px;
            margin-top: -75px;
            padding-top: 35px;
            position: absolute;
            text-align: center;
            top: 50%;
            width: 300px;
            z-index: 1;
        }
    </style>
</body>
</html>