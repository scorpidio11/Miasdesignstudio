<?php
include_once('inc/config.php');
$str_qry='';
$afid='';
$sid='';
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

$shipping_info = $_SESSION["order"]["address_info"]["SA"];
$limi_light = array(
	'sessionId' => session_id(),
	'username' =>USERNAME,
	'password' => PASSWORD,
	'method' => 'NewProspect',
	'campaignId' => CAMPAIGN_ID,
	'firstName' => $shipping_info['first_name'],
	'lastName' => $shipping_info['last_name'],
	'address1' => $shipping_info['address'],
	'city' => $shipping_info['city'],
	'state' => $shipping_info['state'],
	'zip' => $shipping_info['zipcode'],
	'country' => $shipping_info['country'],
	'phone' => $shipping_info['phone'],
	'email' => $shipping_info['email'],
	'ipAddress' => $_SERVER['REMOTE_ADDR'],
	'AFID'=>$afid,
	'SID'=>$sid,
	'site' => APIURL
  );

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
	//$errMsg["responseCode"] = $output['errorMessage'];
		if($output['declineReason'] != ""){
			$errMsg["error"] = $output['declineReason'];
		}else{
			$errMsg["error"] = $output['errorMessage'];
		}
}

curl_close ($curlSession);

if(count($errMsg) > 0)
{
	$Result = @implode("<br/>", $errMsg);
	$_SESSION['prospectId'] = '';
}
else
{	
	
	$_SESSION['prospectId'] = $output['prospectId'];
	$Result = "success";
	header('Location:'.SITEURL.'order/'.$str_qry);
	exit;
}



?>