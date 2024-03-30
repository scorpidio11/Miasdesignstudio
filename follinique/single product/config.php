<?php
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('America/New_York');
define('SITEURL','http://www.follinique.com/');
define('APIURL','crmprazahealth.limelightcrm.com/');
define('USERNAME','verticaopsapi');
define('PASSWORD','RhnQ2nrq8YB2nx');
define('CAMPAIGN_ID','52');

 //LL API Login Details //

$limelight_api_username = 'verticaopsapi';
$limelight_api_password = 'RhnQ2nrq8YB2nx';
$limelight_crm_instance = 'crmprazahealth.limelightcrm.com/';

//check to see if the customer has already been assigned to a campaign. 
//grab from cookie or session...
$whatpercentage = 15;


//------- Straight Sale Bottle Pricing -------//

$bottle1 = '$59.95'; // SS single bottle price

$perbottle1 ='59.95'; // Per bottle price

$bottle3 = '$119.90'; // SS three bottle price

$perbottle3 ='39.95'; // Per bottle price

$bottle5 = '$179.85'; // SS five bottle price

$perbottle5 ='35.95'; // Per bottle price


//include('includes/limelight.php');


$campaign_path           = 'http://www.follinique.com/';

$folder_name             = '';

$campaign_id             = 52;

$prepaid_campaign_id     = 52;

$bottle1_product_id      = 74;
$bottle1_shipping_id     = 3; 

$bottle3_product_id      = 75;
$bottle3_shipping_id     = 1; 

$bottle5_product_id      = 76;
$bottle5_shipping_id     = 1; 

$country				 = 'US';

$currency_text           = 'AUD';

$currency_symbol         = 'A$';

$calculator              = 'block'; // block , none //

$cdn_image_path          = '';

$cnd_img_path = '';

$ssl_url = 'http://www.follinique.com/';

$cloudfont_path = '';

$siteurl = SITEURL; // leave this alone

$siteurl_terms = SITEURL_TERMS; //  URL for Terms, Contact and Privacy ONLY!!

$sitetitle = 'Follique - 2% Minoxidil'; // your site meta title

$LLproductName = 'Follinique'; // limelight product name

$companyname = 'Follinique'; // for the terms and conditions and footer

$companyemail = 'support@follinique.com'; // for customer service

$companyphone = '888-577-7451'; // for customer service

$hours = '9am-5pm MST'; //call center hours

$restockingFee = '$19.95'; // restocking fee

// CONTACT ADDRESS
$contact = 'PO Box 52126 Phoenix, AZ 85072';

// MAILING ADDRESS
$companyaddress = 'PO Box 52126';
$companycity = 'Phoenix';
$companystate = 'Arizona';
$stateabv = 'AZ';
$companyzip = '85072';

// RETURN ADDRESS (the address below is for merchants using TEN fulfillment)
$returnaddress = 'PO Box 52126';
$returncity = 'Phoenix';
$returnstate = 'Arizona';
$returnstateabv = 'AZ';
$returnzip = '85072';