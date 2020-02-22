<?php include 'config.php'; ?>
<div id="contactModal" class="reveal-modal" data-reveal>
 <h2>Need to Get in Touch?</h2>
 <div class="CodeRay">
  <div> 
   <p><b>Contact us by email:</b> <?php echo $companyemail ?></p>
   <p><b>Contact us by phone:</b> <?php echo $companyphone ?></p>
   <?php /*?><p class="lead">Need to cancel a subscription? <a href="http://easyorderlookup.com/metabo">Click Here</a></p> 
   <p><a href="http://easyorderlookup.com/metabo">Easy Online Subscription Cancel</a></p>
   <?php */?><p class="lead">Need to arrange a return?</p> 
   <p>All returns must be accompanied by a Return Merchandise Authorization (RMA) number. To get an RMA, please call customer support at <?php echo $companyphone ?>.</p>
   <p><strong>Return Address:</strong></p>
   <p><?php echo $LLproductName ?> Returns<br />
      <?php echo $returnaddress ?><br />
      <?php echo $returncity ?>, <?php echo $returnstateabv ?> <?php echo $returnzip ?></p>
    <p class="lead"><strong>Send us a postcard:</strong></p>
      <p><?php echo $companyname ?><br />
      <?php echo $companyaddress ?><br />
      <?php echo $companycity ?>, <?php echo $stateabv ?> <?php echo $companyzip ?></p>
  </div>
 </div>
</div>
