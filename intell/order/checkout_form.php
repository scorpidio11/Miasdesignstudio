 <form accept-charset='ISO-8859-1' enctype='application/x-www-form-urlencoded;charset=ISO-8859-1' name='opt_in_form' id='opt_in_form' action='' method='post'>
		
    <input type='hidden' name='limelight_charset' id='limelight_charset' value='ISO-8859-1'/>
    
    <input type='hidden' name ='product' id='product' value= "97" />
    
    <input id="shipping_type" name="shipping_type" value="1" type="hidden" />
    
    <input type='hidden' name ='billingSameAsShipping' id='billingSameAsShipping' value= "yes" />
    
    <input type='hidden' name = 'product_name' id='product_name' value= "<?php echo $LLproductName ?>" />
    
    <div align="center" style="font-size:11px;">Shipping address same as billing?
    
        <input id="radioOne" onclick="toggleBillingAddress()" type="radio" name="billingSameAsShipping" style="height:15px;" value="yes" checked="checked">Yes &nbsp;<input id="radioTwo" onclick="toggleBillingAddress()" type="radio" name="billingSameAsShipping" style="height:15px;" value="no" >No          
    
    </div>
    
    <div align="center" style="padding-bottom:20px;"><img src="../img/cc.jpg"></div>
    
    <!-- BEGIN BILLING ADDRESS (display if billing is NOT same as shipping) -->
    
    <div style="display:none;" id="billingDiv">

        <p style="color: #fff;">Please enter your billing address</p>

        <label for="billing_firstname">First Name:</label>
        
        <input type="text" id="billing_firstname" name="billing_firstname" class="validate[required]" value="<?php echo $billing_info['first_name']; ?>"/>
        
        <label for="billing_lastname">Last Name:</label>
        
        <input type="text" id="billing_lastname" name="billing_lastname" class="validate[required]" value="<?php echo $billing_info['last_name']; ?>"/>
        
        <label for="billing_street_address">Address:</label>
        
        <input type="text" id="billing_street_address" name="billing_street_address" class="validate[required]" value="<?php echo $billing_info['address']; ?>"/>
        
        <label for="billing_city">City:</label>
        
        <input type="text" id="billing_city" name="billing_city" class="validate[required]" value="<?php echo $billing_info['city']; ?>"/>
        
        <label for="billing_postcode">Zip:</label>
        
        <input type="text" id="billing_postcode" name="billing_postcode" class="validate[required]" value="<?php echo $billing_info['zipcode']; ?>"/>
        
        <label for="billing_state" id="billing_state_region">State:</label>
        
        <select border="0" id="billing_state" name="billing_state" class="validate[required]" size="1"><option value="">Select State</option><option value="AL">Alabama (AL)</option><option value="AK">Alaska (AK)</option><option value="AZ">Arizona (AZ)</option><option value="AR">Arkansas (AR)</option><option value="CA">California (CA)</option><option value="CO">Colorado (CO)</option><option value="CT">Connecticut (CT)</option><option value="DE">Delaware (DE)</option><option value="DC">District of Columbia (DC)</option><option value="FL">Florida (FL)</option><option value="GA">Georgia (GA)</option><option value="HI">Hawaii (HI)</option><option value="ID">Idaho (ID)</option><option value="IL">Illinois (IL)</option><option value="IN">Indiana (IN)</option><option value="IA">Iowa (IA)</option><option value="KS">Kansas (KS)</option><option value="KY">Kentucky (KY)</option><option value="LA">Louisiana (LA)</option><option value="ME">Maine (ME)</option><option value="MD">Maryland (MD)</option><option value="MA">Massachusetts (MA)</option><option value="MI">Michigan (MI)</option><option value="MN">Minnesota (MN)</option><option value="MS">Mississippi (MS)</option><option value="MO">Missouri (MO)</option><option value="MT">Montana (MT)</option><option value="NE">Nebraska (NE)</option><option value="NV">Nevada (NV)</option><option value="NH">New Hampshire (NH)</option><option value="NJ">New Jersey (NJ)</option><option value="NM">New Mexico (NM)</option><option value="NY">New York (NY)</option><option value="NC">North Carolina (NC)</option><option value="ND">North Dakota (ND)</option><option value="OH">Ohio (OH)</option><option value="OK">Oklahoma (OK)</option><option value="OR">Oregon (OR)</option><option value="PA">Pennsylvania (PA)</option><option value="RI">Rhode Island (RI)</option><option value="SC">South Carolina (SC)</option><option value="SD">South Dakota (SD)</option><option value="TN">Tennessee (TN)</option><option value="TX">Texas (TX)</option><option value="UT">Utah (UT)</option><option value="VT">Vermont (VT)</option><option value="VA">Virginia (VA)</option><option value="WA">Washington (WA)</option><option value="WV">West Virginia (WV)</option><option value="WI">Wisconsin (WI)</option><option value="WY">Wyoming (WY)</option></select>

    </div>
                
    <!-- END BILLING ADDRESS -->

            <select class="validate[required]" id="cc_type" name="cc_type" style="z-index:1;">
            
                <option value="">Card Type</option>
                
                <option value = "visa" >Visa</option>
                
                <option value = "master" >Master Card</option>
                
             	<option value = "amex" >American Express</option>

                <option value="discover">Discover</option>                
            
            </select>
        
            <input type="text" maxlength="16" class="validate[required,custom[integer]]" id="cc_number" name="cc_number" autocomplete="off" placeholder="Card Number" />
        
            <select name="fields_expmonth" class="validate[required]" id="fields_expmonth" style="z-index:1;">
            
                <option  selected  value="">Exp.</option>
                
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
                                
            <select name="fields_expyear" class="validate[required]" id="fields_expyear" style="z-index:1;">
           
                
                <option  value='16'>2016</option>
                
                <option  value='17'>2017</option>
                
                <option  value='18'>2018</option>
                
                <option  value='19'>2019</option>
                
                <option  value='20'>2020</option>
                
                <option  value='21'>2021</option>
                
                <option  value='22'>2022</option>
                
                <option  value='23'>2023</option>
                
                <option  value='24'>2024</option>
                
                <option  value='25'>2025</option>
                
                <option  value='26'>2026</option>
                
                <option  value='27'>2027</option>
                
                <option  value='28'>2028</option>
            
            </select>
                    
            <input autocomplete="off" type="text" class="validate[required,custom[integer]]" id="cc_cvv" name="cc_cvv" placeholder="CVV" maxlength="3" />
            
            <div class="disclaimer" style="text-align:center;" ><b>By submitting my order, I agree to the<br /><a href="../inc/terms.php">Terms &amp; Conditions</a> and <a href="../inc/terms.php">Privacy Policy</a></b></div>
                                            
    <div align="center"><input type="image" src="../img/order.png" name="btnorder_sub" id="btnorder_sub" value='Submit' style="border:0;" onclick="window.onbeforeunload = null;"></div>
                      
    <div align="center" class="loading" id="downprocessing" style="display:none;"><img width="65" vspace="5" height="65" src="../img/loading.gif"></div>
    
    <p><img src="../img/secure.jpg" class="hundo"></p>

</form>