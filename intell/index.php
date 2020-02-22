<?php
include 'inc/config.php';
session_start();
$arrFields = $userdata = array();
	$first_name ='';
	$last_name ='';
	$address = '';
	$city = '';
	$country = 'US';
	$state = '';
	$zipcode = '';
	$phone = '';
	$email = '';
$errMsg=array();
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
if(isset($_SESSION['order']['user_info']))
{
	$userdata=$_SESSION['order']['user_info'];
	$first_name =$userdata['first_name'];
	$last_name =$userdata['last_name'];
	$address = $userdata['address'];
	$city = $userdata['city'];
	$state = $userdata['state'];
	$zipcode = $userdata['zipcode'];
	$phone = $userdata['phone'];
	$email = $userdata['email'];
	//unset($_SESSION['order']);
}
if(!empty($_REQUEST['action']) && $_REQUEST['action'] == "add")
{
	$first_name = trim($_POST['shipping_firstname']);
	$last_name = trim($_POST['shipping_lastname']);
	$address = trim($_POST['shipping_address']);
	$city = trim($_POST['shipping_city']);
	$state = trim($_POST['shipping_state']);
	$zipcode = trim($_POST['shipping_zipcode']);
	$phone = trim($_POST['shipping_phone']);
	$email = trim($_POST['shipping_email']);
	$order_placed = "No";
	$status = "1";
	
	$errMsg = array();
	if($first_name == '')
	{
		$errMsg['error'] = 'Please enter first name';
		$arrFields['first_name'] = "";
	}
	if($last_name == '')
	{
		$errMsg['error'] = 'Please enter last name';
		$arrFields['last_name'] = "";
	}
	if($address == '')
	{
		$errMsg['error'] = 'Please enter address';
		$arrFields['address'] = "";
	}
	if($city == '')
	{
		$errMsg['error'] = 'Please enter city';
		$arrFields['city'] = "";
	}	
	if($state == '')
	{
		$errMsg['error'] = 'Please select state';
		$arrFields['state'] = "";
	}
	if($zipcode == '')
	{
		$errMsg['error'] = 'Please enter zipcode';
		$arrFields['zipcode'] = "";
	}
	if($phone == '')
	{
		$errMsg['error'] = 'Please enter phone';
		$arrFields['phone'] = "";
	}
	if($email == '')
	{
		$errMsg['error'] = 'Please enter email';
		$arrFields['email'] = "";
	}
	if($email != '' && !filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$errMsg['error'] = 'Please enter valid email';
		$arrFields['email'] = "";
	}
	
	$arrFields = array("first_name"=>$first_name, "last_name"=>$last_name, "address"=>$address, "city"=>$city, "state"=>$state, "country"=>$country, "zipcode"=>$zipcode, "phone"=>$phone, "email"=>$email,"order_placed"=>$order_placed,"status"=>$status);

	if(count($errMsg) < 1)
	{
		$_SESSION['order']['address_info']["SA"] = $arrFields;
		$_SESSION['order']['user_info']= $arrFields;	
		//print_r($_POST);
		/*echo '<pre>';
		print_r($_SESSION['order']);
		echo '</pre>';
		exit;	*/
		include_once('post_user.php');
	}
	else
	{
		$errMsg['error'] = "Please enter all mandatory fields.";
	}
	//print_r($errMsg);
	//exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="no-js">

<head>

<title><?php echo $sitetitle ?></title>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<meta http-equiv="cache-control" content="no-cache" />

<meta http-equiv="pragma" content="no-cache" />

<meta name="robots" content="index, follow" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="css/foundation.css" type="text/css" />

<script src="js/modernizr.js"></script>
  
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>

<script src="js/vendor/modernizr.js"></script>

<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>

<script type="text/javascript" language="JavaScript" src="js/jquery.select_options.js"></script>

<script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>

<script src="js/inputmask.js" type="text/javascript"></script>

<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    jQuery(document).ready(function (){		
		jQuery("#shipping_phone").mask("(999) 999-9999");
        jQuery("#formID").validationEngine();
    });	
</script>

<script type='text/javascript'>
	var currencySymbol = '$';
	jQuery( document ).ready(function() {
		jQuery(function() {
			var us_state = [
				{ text: 'Alabama (AL)', value: 'AL' },
				{ text: 'Alaska (AK)', value: 'AK' },
				{ text: 'Arizona (AZ)', value: 'AZ' },
				{ text: 'Arkansas (AR)', value: 'AR' },
				{ text: 'California (CA)', value: 'CA' },
				{ text: 'Colorado (CO)', value: 'CO' },
				{ text: 'Connecticut (CT)', value: 'CT' },
				{ text: 'Delaware (DE)', value: 'DE' },
				{ text: 'District of Columbia (DC)', value: 'DC' },
				{ text: 'Florida (FL)', value: 'FL' },
				{ text: 'Georgia (GA)', value: 'GA' },
				{ text: 'Hawaii (HI)', value: 'HI' },
				{ text: 'Idaho (ID)', value: 'ID' },
				{ text: 'Illinois (IL)', value: 'IL' },
				{ text: 'Indiana (IN)', value: 'IN' },
				{ text: 'Iowa (IA)', value: 'IA' },
				{ text: 'Kansas (KS)', value: 'KS' },
				{ text: 'Kentucky (KY)', value: 'KY' },
				{ text: 'Louisiana (LA)', value: 'LA' },
				{ text: 'Maine (ME)', value: 'ME' },
				{ text: 'Maryland (MD)', value: 'MD' },
				{ text: 'Massachusetts (MA)', value: 'MA' },
				{ text: 'Michigan (MI)', value: 'MI' },
				{ text: 'Minnesota (MN)', value: 'MN' },
				{ text: 'Mississippi (MS)', value: 'MS' },
				{ text: 'Missouri (MO)', value: 'MO' },
				{ text: 'Montana (MT)', value: 'MT' },
				{ text: 'Nebraska (NE)', value: 'NE' },
				{ text: 'Nevada (NV)', value: 'NV' },
				{ text: 'New Hampshire (NH)', value: 'NH' },
				{ text: 'New Jersey (NJ)', value: 'NJ' },
				{ text: 'New Mexico (NM)', value: 'NM' },
				{ text: 'New York (NY)', value: 'NY' },
				{ text: 'North Carolina (NC)', value: 'NC' },
				{ text: 'North Dakota (ND)', value: 'ND' },
				{ text: 'Ohio (OH)', value: 'OH' },
				{ text: 'Oklahoma (OK)', value: 'OK' },
				{ text: 'Oregon (OR)', value: 'OR' },
				{ text: 'Pennsylvania (PA)', value: 'PA' },
				{ text: 'Puerto Rico (PR)', value: 'PR' },
				{ text: 'Rhode Island (RI)', value: 'RI' },
				{ text: 'South Carolina (SC)', value: 'SC' },
				{ text: 'South Dakota (SD)', value: 'SD' },
				{ text: 'Tennessee (TN)', value: 'TN' },
				{ text: 'Texas (TX)', value: 'TX' },
				{ text: 'Utah (UT)', value: 'UT' },
				{ text: 'Vermont (VT)', value: 'VT' },
				{ text: 'Virginia (VA)', value: 'VA' },
				{ text: 'Washington (WA)', value: 'WA' },
				{ text: 'West Virginia (WV)', value: 'WV' },
				{ text: 'Wisconsin (WI)', value: 'WI' },
				{ text: 'Wyoming (WY)', value: 'WY' }	
			];
			
			var sel_state='';
			<?php  if($state!=''){ ?>
				sel_state='<?php echo $state;  ?>';
			<?php } ?>
			jQuery('#shipping_state').selectOptions(us_state, { includeBlank: '* Select State', selected:sel_state });	
		});
	});		
</script>

</head>

<body>

<!-- BEGIN NOTIFICATION -->

<div class="row" id="notification" style="display:<?php echo count($errMsg)?'block':'none'?>">

	<div class="large-12 columns success"><?php echo "<br/>", $errMsg;?>
	
		<img src="images/close.png" alt="Close" class="close" onclick="jQuery('#notification').hide();"/>
		
	</div>
	
</div>

<!-- END NOTIFICATION -->

<!-- BEGIN ALERT -->

<div class="warning">

	<span>ATTENTION:</span>Due to high demand from recent media coverage we can no longer guarantee supply. <br/>As of 
	
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
</script>we currently have the product IN STOCK and will ship within 24 hours of purchase.
    
</div>

<!-- END ALERT -->

<div style="width:100%; background-color:#1e1b56;">


</div>

<div style="width:100%;">

   <div align="center" style="background-color:#000017;">

	<img src="img/header.jpg" />
    
  </div>

</div>

<div class="row">

	<div class="large-12 columns">
		<br>
		<h4>DOUBLE BLIND CLINICAL STUDY CONDUCTED BY AMERICA'S TOP RATED HOSPITAL</h4>
		<br>
		<p>WGCP™ has been clinically shown to increase focus and concentration for 5 to 6 hours  and minimal to no side effects from participants of a clinical trial.* The study investigated the effects of WGCP™ on the ability of neurotypical individuals without a diagnosis of ADHD to exercise executive functions associated with: sustained attention, spatial working memory, response inhibition and impulsivity. These assist executive functions and remote cognitive activity similar to academic study.</p>

		<p>To measure the effects of WGCP™ on core executive functions used in standard academic study, the Cleveland Clinic used the ADHD core battery of the Cambridge Neuropsychological Test Automated Battery (CANTAB). The study used the withdrawal design to examine the differential effects of WGCP and placebo in neurotypical college-age adults ages 18 to 25 years.</p>

		<p>WGCP is NOT an ADD/ADHD medication or cure, it is a clinically tested focus and study aid product.<br>
		<i>*These statements have not been evaluated by the Food and Drug Administration. It is not intended to diagnose, treat, cure, or prevent any disease or disorder. Use only as directed.</i></p>

	</div>

</div>



	<div class="row">

    	<div class="large-6 columns panel">
    
    		<img src="../img/clevelandclinic.jpg">

    	</div>

    	<div class="large-5 columns panel" style="border-image: linear-gradient(to bottom right, #7a7979 0%, #c8c6c7 100%); border-radius:25px;">
    <a id="addyorderform">
        	<div align="center"><img src="img/send.png" /></div>
        
        	<br />
                    
        	<?php include 'form.php'; ?>
        </a>
    	</div>    

	</div>
    


<div class="row">

	<div class="large-9 columns">

		<h4>CLEVELAND CLINIC</h4>

		<p>The WGCP™ clinical study was conducted by the Cleveland Clinic, rated one of America’s Top 4 hospitals for the last twenty years by the U.S. News and World Report. </p>
		
		<p>The Cleveland Clinic is a non-profit organization that does not endorse any particular product. They conduct clinical trials and report the facts and findings of the study.</p>
		
		<h4>THE UNIVERSITY OF TAMPA</h4>
		
		<p>Clinical study conducted by the University of Tampa shows 6 to 8 hours of sustained release energy with no crash.</p>
	
	</div>
	
	<div class="large-3 columns">
	
		<img src="img/clinical.png" />
	
	</div>

</div>


<div class="row">

	<div class="large-12 columns">

		<h2 style="color:#181643"><b>Intellearl CHALLENGE</b></h2>

		
<h4 style="color:#57c1e8">THE PURPOSE OF THE Intellearl CHALLENGE IS TO STOP PEOPLE FROM TAKING ADD/ADHD MEDICATIONS ILLICITLY.</h4>

	</div>

</div>

<div class="row">

	<div class="large-6 columns">

		<img src="../img/challenge.jpg">

	</div>

	<div class="large-6 columns">

		<img src="../img/perks.jpg">

		<p>Intellearl is safe, effective and clinically tested by one of America's top rated hospitals.
		<br>
		Intellearl<sup>s</sup> does not require a prescription and the clinical data reported no adverse side effects.<sup>*</sup>
		</p>

		<center><a href="#addyorderform"><img src="../img/order.png"></a></center><br />

	</div>

</div>


<div class="row">
	
	<div class="large-6 columns">
		<h4 style="color:#57c1e8"><b>WHAT IS WGCP&trade;?</b></h2>
		<h4>WHOLE GREEN COFFEE POWDER DOES NOT DRAIN THE ADRENAL GLANDS.</h4>
		
		<p>There’s much more to coffee than you think. In its raw form, coffee is a super food, with a long list of health benefits.<br>
		While in their original state, raw coffee beans are green in color and grow on trees inside a bright red coffee berry. Before the roasting process, green coffee beans contain five essential acids, caffeine, fiber and the nutrients that produce tremendous health benefits.</p>

		<p>One of raw coffee’s helpful acids in particular, chlorogenic acid – found in green coffee in combination with the natural caffeine – produces weight loss. Unfortunately, when the green coffee bean is roasted it loses these beneficial nutrients. When you drink roasted coffee you’re only getting a tiny fraction of the benefits that raw coffee can provide you.</p>
		
		<p>WGCP™ is a patent pending process of whole green coffee powder.</p>
	
	</div>

	<div class="large-6 columns">

		<img src="../img/steps.jpg">

	</div>

</div>


<div class="row">
	
	<div class="large-12 columns">
	
		<h2 style="color:#181643"><b>WHY WGCP&trade; WORKS BETTER?</b></h2>

		<h4 style="color:#57c1e8">WGCP&trade; is the first product thatdelivers caffeine with a natural time release that does not overwork the heart.</h4>

		<img src="../img/levels.jpg">
	
	</div>

</div>

<div class="row">

	<div class="large-12 columns">

		<h2 style="color:#181643">WHO USES Intelleral?</h2>

	</div>

</div>

<div class="row">

	<div class="large-3 columns">

		<img src="img/student.png">

	</div>

	<div class="large-3 columns">

		<img src="img/students.png"><br>
		<p>“I don’t have ADD, but I do need to focus extra hard for school- especially during finals. I took a single dose of Intelleral and got 6 solid hours of study time in!
		<br>Afterward, I felt great and got some sleep. This stuff works!</p>
	
	</div>
	
	<div class="large-3 columns">
	
		<img src="img/athlete.png">
	
	</div>
	
	<div class="large-3 columns">
	
		<img src="img/athletes.png"><br>
		<p>“The game requires me to be at my top level of performance. Energy products never last the entire game and the crash afterwards is serious. Intelleral enables me to think clearly on the field and at the same time gives me lasting endurance throughout the entire game.”</p>
	
	</div>

</div>

<div class="row">

	<div class="large-3 columns">

		<img src="img/family.png">

	</div>

	<div class="large-3 columns">

		<img src="img/families.png"><br>
		<p>“My son was having trouble staying focused in the classroom. After the very first dose of Intelleral , my son was able to stay on task and get his work done. The teacher said he’s had a major improvement.
		<br>He’s feeling better and more confident in himself, now that he’s doing so well in school.</p>

	</div>

	<div class="large-3 columns">

		<img src="img/senior.png">

	</div>

	<div class="large-3 columns">

		<img src="img/seniors.png">
		<p>“Over-the-counter memory and focus products are pricey and don’t seem to be much more than a multivitamin.</p>

		<p>Intelleral, however, works immediately. Thats what we’re looking for in a focus and memory product.”</p>

	</div>

</div>


<div class="row">

	<div class="large-12 columns">

		<h2 style="color:#181643">DEVELOPED &amp; HIGHLY RECOMMENDED BY PHYSICIANS</h2>

	</div>

</div>

<div class="row">

	<div class="large-6 columns">

		<img src="../img/doctors.jpg"><br><br>

		<span class="doctor">Dr. Samuel Amen</span><br>
		<span class="physician">General practitioner, specializes in Internal Medicine and an addiction specialist.</span><br>
		<span><i>"WGCP<sup>TM</sup> is an awakening of the brain that instantly promotes focus and concentration."</i></span>
		<br><br>
		<span class="doctor">Dr. Mary Ellen O'Brien</span><br>
		<span class="physician">Naturopathic Physician, RN, MSN, FNP</span><br>
		<span><i>"WGCP<sup>TM</sup> has been clinically tested to improve focus, memory and well-being. Very few products can even come close to making that claim."</i></span>
		<br><br>
	</div>

	<div class="large-6 columns">

		<span class="doctor">Dr. Alex Desoler</span><br>
		<span class="physician">NMD, Practicing Physician</span><br>
		<span><i>"It's the first healthy product to actually increase focus from the very first dose - without a prescription. I highly recommend it!"</i></span>
		<br><br>
		<span class="doctor">Dr. Lisa Green</span><br>
		<span class="physician">DNP, Psychiatric Developmental Specialist.</span><br>
		<span><i>"Just because you have trouble focusing does not automatically mean you have ADD. I recommend WGCP<sup>TM</sup> and am very impressed with the results!"</i></span>

		<img src="../img/perks.jpg">
		<br>
		<br>
		<center><a href="#addyorderform"><img src="../img/order.png">
		<br><br>

	</div>

</div>

<div class="row">

	<div class="large-12 columns">

		<p><i>*These statements have not been evaluated by the Food and Drug Administration. It is not intended to diagnose, treat, cure, or prevent any disease or disorder. Use only as directed.</i></p>

	</div>

</div>


    <!-- FOOTER -->
    
    <div class="row">
    
        <div class="large-12 column">
    
            <?php include 'inc/foot.php'; ?>
        
        </div>
        
    </div>
<script type="text/javascript"> function pixelMe(){ $("body").append('<img src="http://pixel.sitescout.com/iap/d4a93dd5bd36fa82" style="display:none;" /><img src="https://pixel.sitescout.com/iap/16dcf7db464dfab7" style="display:none;" />'); }setTimeout(function(){pixelMe()}, 45000);</script>
<!-- /FOOTER -->

</div>

<script src="js/foundation.min.js"></script>
    <script src="js/foundation/foundation.reveal.js"></script>
    <script>
      $(document).foundation();
    </script>

</body>

</html>