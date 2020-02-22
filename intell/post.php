<?php
include_once('inc/config.php');	
$str_qry='';
$afid='';
$sid='';

//Code for Upsell Product....
if(isset($_POST['upsell'])) {
	session_start();
	//$product['product_id'] = UP_SELL_PRODUCT_ID_1;
}

	if(isset($_SESSION['order']['afid']))
	{
		$str_qry.='afid='.$_SESSION['order']['afid'].'&';
		$afid=$_SESSION['order']['afid'];
	}
	if(isset($_SESSION['order']['sid']))
	{
		$str_qry.='sid='.$_SESSION['order']['sid'];
		$sid=$_SESSION['order']['sid'];
	}
	if($str_qry!='')
	{
		$str_qry='?'.$str_qry;
	}


$billing_info = $_SESSION["order"]["address_info"]["BA"];
$shipping_info = $_SESSION['order']['address_info']['SA'];	
$user_payment = $_SESSION["order"]["user_payment"];
$product = $_SESSION["order"]["product"];
$upsellPID = $_POST["upsellid"];


//This is for NewOrderWithProspect method.
if(!empty($_SESSION['prospectId']))
{
 
$limi_light = array(
	'sessionId' => session_id(),
	'username' => USERNAME,
	'password' => PASSWORD,
	'method' => 'NewOrderWithProspect', 
	'prospectId' => $_SESSION['prospectId'],
	'productId' => $product,
	//'productId' => PRODUCT_ID_3,
	'product_qty_1' =>1,
	'campaignId' => CAMPAIGN_ID,
	'shippingId' => $_POST['shipping_type'],
	'creditCardType' => $user_payment['card_type'],
	'creditCardNumber' => $user_payment['card_code'],
	'expirationDate' => $user_payment['month'].''.$user_payment['year'],
	'CVV' => $user_payment['cvv'],
	'ipAddress' => $_SERVER['REMOTE_ADDR'],
	'tranType' => 'Sale',							
	'billingAddress1' => $billing_info['address'],
	'billingCity' => $billing_info['city'],
	'billingState' => $billing_info['state'],
	'billingZip' => $billing_info['zipcode'],
	'billingCountry' => $billing_info['country'],
	'site' => APIURL
);
		  
}else
{
//This is for NewOrder method.		
	  
	$limi_light = array(
	'sessionId' => session_id(),
	'username' => USERNAME,
	'password' => PASSWORD,
	'method' => 'NewOrder',
	//'productId' => $product['product_id'],
	'productId' => $upsellPID,
	'product_qty_1' => 1,
	'campaignId' => UP_SELL_CAMPAIGN_ID,
	'shippingId' => UP_SELL_PRODUCT_SHIPPING_ID,
	'firstName' => $shipping_info['first_name'],
	'lastName' => $shipping_info['last_name'],
	'shippingAddress1' => $shipping_info['address'],
	'shippingCity' => $shipping_info['city'],
	'shippingState' => $shipping_info['state'],
	'shippingZip' => $shipping_info['zipcode'],
	'shippingCountry' => $shipping_info['country'],
	'billingFirstName' => $billing_info['first_name'],
	'billingLastName' => $billing_info['last_name'],
	'billingAddress1' => $billing_info['address'],
	'billingCity' => $billing_info['city'],
	'billingState' => $billing_info['state'],
	'billingZip' => $billing_info['zipcode'],
	'billingCountry' => $billing_info['country'],
	'phone' => $shipping_info['phone'],
	'email' => $shipping_info['email'],
	'creditCardType' => $user_payment['card_type'],
	'creditCardNumber' => $user_payment['card_code'],
	'expirationDate' => $user_payment['month'].''.$user_payment['year'],
	'CVV' => $user_payment['cvv'],
	'AFID'=>$afid,
	'SID'=>$sid,
	'ipAddress' => $_SERVER['REMOTE_ADDR'],
	'tranType' => 'Sale',
	'site' => APIURL
);
					  
//print_r($limi_light); exit;
}

$output = array();
$url = 'https://'.APIURL.'transact.php';
$data = $limi_light;

$curlSession = curl_init();
curl_setopt($curlSession, CURLOPT_URL, $url);
curl_setopt($curlSession, CURLOPT_HEADER, 0);
curl_setopt($curlSession, CURLOPT_POST, 1);
curl_setopt($curlSession, CURLOPT_POSTFIELDS, $data);
curl_setopt($curlSession, CURLOPT_RETURNTRANSFER,1);
curl_setopt($curlSession, CURLOPT_TIMEOUT,5000);
curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curlSession, CURLOPT_SSL_VERIFYHOST, 1);

$rawresponse = curl_exec($curlSession);

if (strpos($rawresponse, '&'))
{
  $response = explode('&', $rawresponse);
  $output = array();
  $count = count($response);
  for ($i=0; $i < $count; $i++)
  {
	 $splitAt = strpos($response[$i], "=");
	 $output[trim(substr($response[$i], 0, $splitAt))] = trim(substr(urldecode($response[$i]), ($splitAt+1)));
  }
}
else
{
  $output = $rawresponse;
}

if($output['responseCode'] != '100')
{	
    if(isset($output['declineReason']) && $output['declineReason'] != ""){
    	$errMsg["error"] = $output['declineReason'];
	}else{
		if($output['responseCode'] == '800'){
			$errMsg["error"] = 'This transaction has been declined. Please check your credit card number, expiration date and security code.';
		}else{
			$errMsg["error"] = $output['errorMessage'];
		}
	}
}

curl_close ($curlSession);

if(count($errMsg) > 0)
{
	$Result = @implode("<br/>", $errMsg);
}
else
{
	$_SESSION['order']['orderId'] = $output['orderId'];
	$Result = 'success';
}

//Code for Upsell Product....
if(isset($_POST['upsell'])) {
	header('Location: /offer/step2/thankyou/');
}?>