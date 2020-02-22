<div class="row">

    <form name="formID" id="formID" method="post" action="" autocomplete="on">
    
        <input type="hidden" name="action"  value="add" />
        
        <input type="text" name="shipping_firstname" id="shipping_firstname" value="<?php echo $first_name;  ?>" placeholder="First Name" class="field validate[required]" />
        
        <input type="text" name="shipping_lastname" id="shipping_lastname" value="<?php echo $last_name;  ?>" placeholder="Last Name" class="field validate[required]" />
        
        <input type="text" name="shipping_address" id="shipping_address" value="<?php echo $address;  ?>" placeholder="Address" class="field validate[required]" />
        
        <input type="text" name="shipping_city" id="shipping_city" value="<?php echo $city;  ?>" placeholder="City" class="field validate[required]" />
        
        <select name="shipping_state" id="shipping_state" alt="state" class="field validate[required]" >
        
            <option value="">Select State/Province</option>
        
        </select>
        
        <input type="text" name="shipping_zipcode" id="shipping_zipcode" value="<?php echo $zipcode;  ?>" placeholder="ZIP" class="field validate[required]" />
        
        <input type="text" name="shipping_phone" id="shipping_phone" value="<?php echo $phone;  ?>" placeholder="Phone" class="field validate[required]" />
        
        <input type="text" name="shipping_email" id="shipping_email" value="<?php echo $email;  ?>" placeholder="Email" class="field validate[required, custom[email]]" />
        
        <div align="center"><a href="http://addyfocustrial.com/order/"><input type="image" name="btnorder_sub" id="btnorder_sub" src="img/order.png" border="0"  style="border:0;"/></a></div>
    
    </form>
</div>