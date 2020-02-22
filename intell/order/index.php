<?php
session_start();
//session_destroy();
//unset($_SESSION['order']);
include_once('../inc/config.php');
//echo $_SESSION['prospectId'];
/*echo '<pre>';
print_r($_SESSION['order']);
echo '</pre>';*/ 
$current_4_year = date('Y');
$current_2_year = date('y');
$state = $_SESSION['order']['address_info']['SA']['state'];
if(empty($_SESSION['order']) || empty($_SESSION['prospectId'])){
	@header("Location:".SITEURL."index.php");
	exit;
}

$billing_info = array();
if(!empty($_SESSION['order']['address_info']['BA'])) {
$billing_info = $_SESSION['order']['address_info']['BA'];
} else {
$billing_info = $_SESSION['order']['address_info']['SA'];
}

$str_qry='';
if(isset($_REQUEST['afid']))
{
	$str_qry.='afid='.$_REQUEST['afid'].'&';
	$_SESSION['order']['afid']=$_REQUEST['afid'];
}
if(isset($_REQUEST['sid']))
{
	$str_qry.='sid='.$_REQUEST['sid'];
	$_SESSION['order']['sid']=$_REQUEST['sid'];
}
if($str_qry!='')
{
	$str_qry='?'.$str_qry;
}
$shippinginfo = array();
$first_name='';
$last_name='';
$user_info = $_SESSION['order']['user_info'];
//$shippinginfo['address'] = $_SESSION['order']['address_info']['SA'];
//$billinginfo['address'] = $_SESSION['order']['address_info']['BA'];
$first_name=$user_info['first_name'];
$last_name=$user_info['last_name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>

<title><?php echo $sitetitle ?> Secure Checkout</title>

<meta name="robots" content="noindex, nofollow" /><!-- ** change into index, follow ** -->

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<script src="../js/vendor/modernizr.js"></script> 

<script src="../js/vendor/jquery.js"></script>

<script src="../js/foundation.min.js"></script>

<script src="../js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>

<script src="../js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script src="../js/countdown.js" type="text/javascript"></script>

<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css"/>

<link rel="stylesheet" href="../css/foundation.css" type="text/css"/>

<script type="text/javascript" src="../js/custom-form-elements.js"></script>

    <script type="text/javascript">
	/* <![CDATA[ */
	$(function() {
		var input = document.createElement("input");
		if(('placeholder' in input)==false) { 
			$('[placeholder]').focus(function() {
				var i = $(this);
				if(i.val() == i.attr('placeholder')) {
					i.val('').removeClass('placeholder');
					if(i.hasClass('password')) {
						i.removeClass('password');
						this.type='password';
					}			
				}
			}).blur(function() {
				var i = $(this);	
				if(i.val() == '' || i.val() == i.attr('placeholder')) {
					if(this.type=='password') {
						i.addClass('password');
						this.type='text';
					}
					i.addClass('placeholder').val(i.attr('placeholder'));
				}
			}).blur().parents('form').submit(function() {
				$(this).find('[placeholder]').each(function() {
					var i = $(this);
					if(i.val() == i.attr('placeholder'))
						i.val('');
				})
			});
		}
	});
	/* ]]> */
    </script>
    
	<script type="text/javascript">
	function preload(images) {
		if (document.images) {
			var i = 0;
			var imageArray = new Array();
			imageArray = images.split(',');
			var imageObj = new Image();
			for(i=0; i<=imageArray.length-1; i++) {
				//document.write('<img src="' + imageArray[i] + '" />');// Write to page (uncomment to check images)
				imageObj.src=imageArray[i];
			}
		}
	}
	
	// perform the image preload
	preload('../img/order1.jpg,../img/order2.jpg,../img/order3.jpg../img/order1_on.jpg,../img/order2_on.jpg,../img/order3_on.jpg');
	
	// what to do when a selection is made
	function selectThree() {
    	$("#orderThree").attr('src', '../img/order3_on.jpg');
		$("#orderTwo").attr('src', '../img/order2.jpg');
		$("#orderOne").attr('src', '../img/order1.jpg');
		$('#product').attr('value', '97');
		$('#shipping_type').attr('value', '1');
	}
	function selectTwo() {
    	$("#orderTwo").attr('src', '../img/order2_on.jpg');
		$("#orderThree").attr('src', '../img/order3.jpg');
		$("#orderOne").attr('src', '../img/order1.jpg');
		$('#product').attr('value', '96');
		$('#shipping_type').attr('value', '1');
	}
	function selectOne() {
    	$("#orderOne").attr('src', '../img/order1_on.jpg');
		$("#orderTwo").attr('src', '../img/order2.jpg');
		$("#orderThree").attr('src', '../img/order3.jpg');
		$('#product').attr('value', '95');
		$('#shipping_type').attr('value', '3');
	}
</script>

<script type="text/javascript">
    jQuery(document).ready(function (){
        jQuery("#opt_in_form").validationEngine('attach', {
		  onValidationComplete: function(form, status){
				//submitOrder();
				if(status){ submitOrder(); }
			 }  
		});
    });
	
	jQuery(function() {
		jQuery('#top_slide').delay(1500).slideDown();
	});
	
	function toggleBillingAddress(){
		if (jQuery('input[name="billingSameAsShipping"]:checked').val() == 'no')
		{
			jQuery('#billingDiv').show();
			
		}else{
			jQuery('#billingDiv').hide();
		}
	}
	
	jQuery(document).ready(function (){
        // Re-check billing fields
		if (jQuery('input[name="billingSameAsShipping"]:checked').val() == 'no')
		{
			jQuery('#radioTwo').click();
		}
    });	
 
	var currencySymbol = '$';	
	
</script>

</head>

<body>

<!-- BEGIN ALERT -->

<div class="warning">

	<b><span style="color: #e96c20;">WARNING:</span> We only have a limited supply available.</b> As of 
	
	<script language="Javascript">
<!-- 

// Array of day names
var dayNames = new Array("Sunday","Monday","Tuesday","Wednesday",
				"Thursday","Friday","Saturday");

// Array of month Names
var monthNames = new Array(
"January","February","March","April","May","June","July",
"August","September","October","November","December");

var now = new Date();
document.write(dayNames[now.getDay()] + ", " + 
monthNames[now.getMonth()] + " " + 
now.getDate() + ", " + now.getFullYear());

// -->
</script> we currently have product in stock and ship within 24 hours of purchase.
    
</div>

<!-- END ALERT -->

<div class="row" style="min-width:100%;">

    <div class="large-12 columns" align="center">
    
        <!--<p><img src="../img/header.png"></p>-->
        
    </div>

</div>

<div class="row">

    <div class="large-12 columns" align="center" style="padding: 20px 0; line-height: 30px;">

        <span style="font-size: 22px; color:#666; text-transform:uppercase; font-weight:bold;">Get Focused Naturally!</span>
        
        <br />
        
        <span style="font-size: 22px; color:#F30; text-transform:uppercase; font-weight:bold;">Time's Running Out!</span><br />
        
     
    
		<script type="application/javascript">
			var myCountdown1 = new Countdown({
			time: 86400 / 2, // 86400 seconds = 1 day
			width:300, 
			height:60,  
			rangeHi:"day",
			style:"flip"	// <- no comma on last item!
			});
        </script>    
    
    
    
    
    
    
    

    </div>

</div>

<div class="row">

    <div class="large-7 columns panel" style="background: #FFF; border-right: 0;" align="center">
    
    	<div><img src="../img/select_package.jpg" /></div>
            
        <p><img src="../img/order3_on.jpg" id="orderThree" style="" onmouseover="this.style=''" onmouseout="this.style=''" onClick="selectThree();" /></p>
        
        <p><img src="../img/order2.jpg" id="orderTwo" style="" onmouseover="this.style=''" onmouseout="this.style=''" onClick="selectTwo();" /></p>
        
        <p><img src="../img/order1.jpg" id="orderOne" style="" onmouseover="this.style=''" onmouseout="this.style=''" onClick="selectOne();" /></p>
        
    </div>
    
    <div class="large-5 columns panel" style="background: #FFF;">

        <div align="center"><img src="../img/final_step.png" /></div>
        
        <?php include 'checkout_form.php'; ?>

	</div>    

</div>

    <!-- FOOTER -->
    
    <div class="row">
    
        <div class="large-12 column">
    
            <?php include '../inc/foot.php'; ?>
        
        </div>
        
    </div>

<!-- /FOOTER -->

<script>

 function submitOrder()
 {
					
	 jQuery('#notification').show();
	 jQuery('.success, .warning, .attention, .information').remove();
	 jQuery("#downprocessing").show();
	 jQuery("#btnorder_sub").hide();

	 var myform = jQuery("#opt_in_form");
	jQuery.ajax({
		type : "post",
		url: "../submit_order.php",
		data: myform.serialize(),
		success: function(result){
			var result = jQuery.trim(result);	
			jQuery("#downprocessing").hide();
			jQuery("#btnorder_sub").show();
			//result = html.split("|");
			if(result == "success"){
				window.location.href = "../thankyou/";
			}
			else if(result == "Please enter all mandatory fields.")
			{
				//ll("#shipInfo").show();
				jQuery('#notification').html('<div class="success" style="display: none;">'+result+'<img src="images/close.png" alt="" class="close" onclick="jQuery(\'#notification\').hide();"/></div>');
				jQuery("#downprocessing").hide();
				jQuery("#btnorder_sub").show();
				jQuery('.success').fadeIn('slow');//.delay(3000).fadeOut();
			}else{
				//ll("#divW, #divWM, #divE2, #divE3,#divE1,#divSM").hide();
				//ll("#divE51").show().html(result);
				jQuery('#notification').html('<div class="success" style="display: none;">'+result+'<img src="images/close.png" alt="" class="close" onclick="jQuery(\'#notification\').hide();"/></div>');
				jQuery('.success').fadeIn('slow');//.delay(3000).fadeOut();
				//scrollpage(180);						
			}
		}
	});
	//return false;
 } 
</script>
    <script>
      $(document).foundation();
    </script>
    
</body>
</html>