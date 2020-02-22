<?php
include ('inc/config.php');
session_start();
$url='';
$urlhome = SITEURL."index.php";


/*if(!isset($_REQUEST["product"]) && $_REQUEST["product"] == ""){
 echo "Please select any one product from out of three"; exit;
}*/

$ship_info = PRODUCT_SHIPPING_ID;

$card_type = trim($_POST['cc_type']);
$card_code = trim($_POST['cc_number']);
$month = trim($_POST['fields_expmonth']);
$year = trim($_POST['fields_expyear']);
$cvv = trim($_POST['cc_cvv']);
$product_id = trim($_POST['product']);

$errMsg = array();


if(trim($_POST['billingSameAsShipping']) == "no")
{	
	$bfirst_name = trim($_POST['billing_firstname']);
	$blast_name = trim($_POST['billing_lastname']);
	$baddress = trim($_POST['billing_street_address']);
	$bcity = trim($_POST['billing_city']);
	$bstate = trim($_POST['billing_state']);
	$bcountry = $_SESSION["order"]["address_info"]["SA"]["country"];
	$bzipcode = trim($_POST['billing_postcode']);
	$bphone = $_SESSION["order"]["address_info"]["SA"]["phone"];
	$bemail = $_SESSION["order"]["address_info"]["SA"]["email"];
	
	
	if($bfirst_name == '')
	{
		$errMsg["error"] = 'Please enter all mandatory fields.';
	}
	if($blast_name == '')
	{
		$errMsg["error"] = 'Please enter all mandatory fields.';
	}
	if($baddress == '')
	{
		$errMsg["error"] = 'Please enter all mandatory fields.';
	}
	if($bcity == '')
	{
		$errMsg["error"] = 'Please enter all mandatory fields.';
	}
	/*if($bcountry == '')
	{
		$errMsg["error"] = 'Please enter all mandatory fields.';
	}*/
	if($bstate == '')
	{
		$errMsg["error"] = 'Please enter all mandatory fields.';
	}
	
	if($bzipcode == '')
	{
		$errMsg["error"] = 'Please enter all mandatory fields.';
	}
	if($bphone == '')
	{
		$errMsg["error"] = 'Please enter all mandatory fields.';
	}
}

if($card_type == '')
{
	$errMsg["error"] = 'Please enter all mandatory fields.';
}
if($card_code == '')
{
	$errMsg["error"] = 'Please enter all mandatory fields.';
}
if($month == '')
{
	$errMsg["error"] = 'Please enter all mandatory fields.';
}
if($year == '')
{
	$errMsg["error"] = 'Please enter all mandatory fields.';
}
if($cvv == '')
{
	$errMsg["error"] = 'Please enter all mandatory fields.';
}
if(!is_numeric($cvv) && $cvv != '')
{
	$errMsg["cvv"] = 'CVV number should be numeric.';
	$arrFields['cvv'] = $cvv;
}

if( $card_code != '1555555555555550') {
$result = validateCC($card_code, $card_type);
    if($result != 1)
	{
	$errMsg["error"] = $result;
	$arrFields['card_code'] = "";
	}
}

if(!is_numeric($cvv) && $cvv != '')
{
	$errMsg["cvv"] = 'Security Code should be numeric.';
}

if(count($errMsg) < 1)
{
	if(isset($_SESSION["order"]) && $_SESSION["order"] != "")
	{				
		//$_SESSION["order"]['drop_chk']='No';
		if(trim($_POST['billingSameAsShipping']) == "yes")
		{
			 $_SESSION["order"]["address_info"]["BA"] = $_SESSION['order']['address_info']['SA'];
			 //$_SESSION["order"]['drop_chk']='No';
		}
		else
		{
			$_SESSION["order"]["address_info"]["BA"]['first_name'] = $bfirst_name;
			$_SESSION["order"]["address_info"]["BA"]['last_name'] = $blast_name;
			$_SESSION["order"]["address_info"]["BA"]['address'] = $baddress;
			$_SESSION["order"]["address_info"]["BA"]['city'] = $bcity;
			$_SESSION["order"]["address_info"]["BA"]['zipcode'] = $bzipcode;
			$_SESSION["order"]["address_info"]["BA"]['phone'] = $bphone;			
			$_SESSION["order"]["address_info"]["BA"]['country'] = $bcountry;
			$_SESSION["order"]["address_info"]["BA"]['state'] = $bstate;
			$_SESSION["order"]["address_info"]["BA"]['email'] = $bemail;
			//$_SESSION["order"]['drop_chk']='Yes';
			//$_SESSION["order"]["address_info"]["SA"] = $_SESSION['order']['address_info']['BA'];
			$_SESSION["order"]["user_info"] = $_SESSION['order']['address_info']['BA'];
		}	
		 
		$_SESSION["order"]["user_payment"]["card_type"] = $card_type;
		$_SESSION["order"]["user_payment"]["card_code"] = $card_code;
		$_SESSION["order"]["user_payment"]["month"] = $month;
		$_SESSION["order"]["user_payment"]["year"] = $year;
		$_SESSION["order"]["user_payment"]["cvv"] = $cvv;
		$_SESSION["order"]["product"] = $product_id;
		//$_SESSION["order"]["product"]["product_qnty"]=1;				
		
		$coupon_code='';
		$billing_info = $_SESSION["order"]["address_info"]["BA"];
		$shipping_info = $_SESSION["order"]["address_info"]["SA"];
		$user_info = array("first_name"=>$shipping_info['first_name'], "last_name"=>$shipping_info['last_name'], "address"=>$shipping_info['address'], "city"=>$shipping_info['city'], "state"=>$shipping_info['state'], "country"=>$shipping_info['country'], "zipcode"=>$shipping_info['zipcode'], "phone"=>$shipping_info['phone'], "email"=>$shipping_info['email']);
		
		include('post.php');		
		}else{
			$errMsg["selectProduct"] = "Please select any one product from out of three.";
		}	
}

if(count($errMsg) > 0){
	$Result = @implode("<br/>", $errMsg);
}
else{
	$Result = "success";
}

echo trim($Result);
?>
<?php
function validateCC($cc_num, $type) {

	if($type == "American" || $type == "amex") {
	$denum = "American Express";
	} elseif($type == "Dinners") {
	$denum = "Diner's Club";
	} elseif($type == "discover") {
	$denum = "Discover";
	} elseif($type == "master") {
	$denum = "Master Card";
	} elseif($type == "visa") {
	$denum = "Visa";
	}

	if($type == "American" || $type == "amex") {
	$pattern = "/^([34|37]{2})([0-9]{13})$/";//American Express
	if (preg_match($pattern,$cc_num)) {
	$verified = true;
	} else {
	$verified = false;
	}
	
	
	} elseif($type == "Dinners") {
	$pattern = "/^([30|36|38]{2})([0-9]{12})$/";//Diner's Club
	if (preg_match($pattern,$cc_num)) {
	$verified = true;
	} else {
	$verified = false;
	}
	
	
	} elseif($type == "discover") {
	$pattern = "/^([6011]{4})([0-9]{12})$/";//Discover Card
	if (preg_match($pattern,$cc_num)) {
	$verified = true;
	} else {
	$verified = false;
	}
	
	
	} elseif($type == "master") {
	$pattern = "/^([51|52|53|54|55]{2})([0-9]{14})$/";//Mastercard
	if (preg_match($pattern,$cc_num)) {
	$verified = true;
	} else {
	$verified = false;
	}
	
	
	} elseif($type == "visa") {
	$pattern = "/^([4]{1})([0-9]{12,15})$/";//Visa
	if (preg_match($pattern,$cc_num)) {
	$verified = true;
	} else {
	$verified = false;
	}
	
	}
	
	if($verified == false) {
	//Do something here in case the validation fails
	$msg = "Credit card invalid. Please make sure that you entered a valid <em>" . $denum . "</em> credit card ";
	return $msg;
	} else { //if it will pass...do something
	//echo "Your <em>" . $denum . "</em> credit card is valid";
	return true;
	}


}
?>