<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title." ".$this->lang->line("no")." ".$inv->id; ?></title>
<link rel="shortcut icon" href="<?php echo $this->config->base_url(); ?>assets/img/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?php echo $this->config->base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo $this->config->base_url(); ?>assets/css/rwd-table.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/jquery.js"></script>
<style type="text/css">
html, body { /* - Issue #1 -Hyder - print ti p sorti lr 2 page acoz sa boute css la! -- 21 July 2014 - height: 100%;  font-family: "Segoe UI", Candara, "Bitstream Vera Sans", "DejaVu Sans", "Bitstream Vera Sans", "Trebuchet MS", Verdana, "Verdana Ref", sans-serif; */ }
#wrap { padding: 20px; }
.table th { text-align:center; }
</style>
</head>

<body>

	

	<?php 
    echo "<p>";
	
	if($biller->cf1 != "-" && $biller->cf1 != "") { echo "<br />".$this->lang->line("bcf1").": ".$biller->cf1; }
	if($biller->cf2 != "-" && $biller->cf2 != "") { echo "<br />".$this->lang->line("bcf2").": ".$biller->cf2; }
	if($biller->cf3 != "-" && $biller->cf3 != "") { echo "<br />".$this->lang->line("bcf3").": ".$biller->cf3; }
	if($biller->cf4 != "-" && $biller->cf4 != "") { echo "<br />".$this->lang->line("bcf4").": ".$biller->cf4; }
	if($biller->cf5 != "-" && $biller->cf5 != "") { echo "<br />".$this->lang->line("bcf5").": ".$biller->cf5; }
	if($biller->cf6 != "-" && $biller->cf6 != "") { echo "<br />".$this->lang->line("bcf6").": ".$biller->cf6; }
	
	echo "</p>";
	?>
    
	</div>
  
    <div class="span6">
  
   <?php
    if($customer->cf1 != "-" && $customer->cf1 != "") { echo "<br />".$this->lang->line("ccf1").": ".$customer->cf1; }
	if($customer->cf2 != "-" && $customer->cf2 != "") { echo "<br />".$this->lang->line("ccf2").": ".$customer->cf2; }
	if($customer->cf3 != "-" && $customer->cf3 != "") { echo "<br />".$this->lang->line("ccf3").": ".$customer->cf3; }
	if($customer->cf4 != "-" && $customer->cf4 != "") { echo "<br />".$this->lang->line("ccf4").": ".$customer->cf4; }
	if($customer->cf5 != "-" && $customer->cf5 != "") { echo "<br />".$this->lang->line("ccf5").": ".$customer->cf5; }
	if($customer->cf6 != "-" && $customer->cf6 != "") { echo "<br />".$this->lang->line("ccf6").": ".$customer->cf6; }
   ?>

	</div> 
</div>
<div style="clear: both;"></div>
<p>&nbsp;</p>
<div class="row-fluid"> 
<div class="span9">
<h3 class="inv">Itemkit ID: <?php echo $inv->id;?> </h3>
</div>
<div class="span3">

<p style="font-weight:bold;">Item Kit: <?php echo $inv->itemkit_name; ?> (<?php echo $inv->itemkit_no; ?>)</p>

    <!--<p style="font-weight:bold;"><?php echo $this->lang->line("date"); ?>: <?php echo date(PHP_DATE, strtotime($inv->date)); ?></p>-->

    <!-- <p style="font-weight:bold;"><?php echo $this->lang->line("itemkit_price"); ?>: <?php echo $inv->new_price; ?></p> -->

    <!-- <p style="font-weight:bold;"><?php echo $this->lang->line("itemkit_unit"); ?>: <?php echo $inv->itemkit_unit; ?></p> -->

<p>&nbsp;</p>   

 
</div>
<div style="clear: both;"></div>	
</div>

	<table class="table table-bordered table-hover table-striped" style="margin-bottom: 5px;">

	<thead> 

	<tr> 

	    <th style="text-align:center; vertical-align:middle;"><?php echo $this->lang->line("no"); ?></th> 
	    <th style="vertical-align:middle;"><?php echo $this->lang->line("description"); ?></th> 
        <th style="text-align:center; vertical-align:middle;"><?php echo $this->lang->line("quantity"); ?></th>
         <th style="padding-right:20px; text-align:center; vertical-align:middle;"><?php echo $this->lang->line("unit_price"); ?></th>
        <!--   <?php if(DISCOUNT_OPTION == 2) { echo '<th style="text-align:center; vertical-align:middle;">'.$this->lang->line("discount").'</th>'; } ?>
       <?php if(TAX1) { echo '<th style="text-align:center; vertical-align:middle;">'.$this->lang->line("tax").'</th>'; } ?>
        <?php if(TAX1) { echo '<th style="padding-right:20px; text-align:center; vertical-align:middle;">'.$this->lang->line("tax").'</th>'; } ?>
	    <th style="padding-right:20px; text-align:center; vertical-align:middle;"><?php echo $this->lang->line("subtotal"); ?></th> -->
	</tr> 

	</thead> 

	<tbody> 

	<?php $r = 1; foreach ($rows as $row):?>
			<tr>
            	<td style="text-align:center; width:40px; vertical-align:middle;"><?php echo $r; ?></td>
                <td style="vertical-align:middle;"><?php echo $row->product_name." (".$row->product_code.")"; ?></td>
                
                <td style="width: 70px; text-align:center; vertical-align:middle;"><?php echo $row->quantity; ?></td>

                <td style="width: 80px; text-align:right; padding-right:10px; vertical-align:middle;"><?php echo $this->ion_auth->formatMoney($row->unit_price); ?></td>
                <!--    <?php if(DISCOUNT_OPTION == 2) { echo '<td style="width: 80px; text-align:center; vertical-align:middle;">'.$row->discount_val.'</td>'; } ?>
               <?php if(TAX1) { echo '<td style="width: 70px; text-align:center; vertical-align:middle;">'.$row->tax.'</td>'; } ?>
                <?php if(TAX1) { echo '<td style="width: 80px; text-align:right; vertical-align:middle;">'.$row->val_tax.'</td>'; } ?>

                <td style="width: 100px; text-align:right; padding-right:10px; vertical-align:middle;"><?php echo $this->ion_auth->formatMoney($row->gross_total); ?></td> -->
			</tr> 
    <?php 
		$r++; 
		endforeach;
	?>

<!-- Issue #1 - Hyder - Adding gifts details  -->

    <?php foreach($gifts as $gift): ?>
        <tr>
            <td style="text-align:center; width:40px; vertical-align:middle;"><?php echo $r; ?></td>
            <td style="vertical-align:middle;"><strong>Gift:</strong> <?php echo $gift->name." (".$gift->code.")"; ?></td>
            <td style="width: 70px; text-align:center; vertical-align:middle;">1</td>
            <td style="width: 80px; text-align:right; padding-right:10px; vertical-align:middle;">0.00</td>
        <!--    <td style="width: 80px; text-align:center; vertical-align:middle;">0.00</td>
            <td style="width: 80px; text-align:right; vertical-align:middle;"></td>
            <td style="width: 100px; text-align:right; padding-right:10px; vertical-align:middle;">0.00</td>-->
        </tr>

    <?php $r++; endforeach; ?>
 <!-- Issue #1 - Hyder - Adding gifts details  -->

    <?php $col = 1;  if(DISCOUNT_OPTION == 2) { $col += 1; } if(TAX1) { $col += 1; } ?>


<?php if(TAX2) { echo '<tr><td colspan="'.$col.'" style="text-align:right; padding-right:10px;;">'.$this->lang->line("invoice_tax").' ('. CURRENCY_PREFIX.')</td><td style="text-align:right; padding-right:10px;">'.$this->ion_auth->formatMoney($inv->total_tax2).'</td></tr>'; } ?>
<?php if($inv->shipping != 0) { echo '<tr><td colspan="'.$col.'" style="text-align:right; padding-right:10px;;">'.$this->lang->line("shipping").' ('. CURRENCY_PREFIX.')</td><td style="text-align:right; padding-right:10px;">'.$this->ion_auth->formatMoney($inv->shipping).'</td></tr>'; } ?>
<tr><td colspan="<?php echo $col; ?>" style="text-align:right; padding-right:10px; font-weight:bold;"><?php echo $this->lang->line("total_amount"); ?> (<?php echo CURRENCY_PREFIX; ?>)</td><td style="text-align:right; padding-right:10px; font-weight:bold;"><?php echo $inv->new_price; ?></td></tr>

	</tbody> 

	</table> 
<div style="clear: both;"></div>
<div class="row-fluid"> 
<div class="span12" style="text-align: center;">    	
    <?php if($inv->note || $inv->note != "") { ?>
	<p>&nbsp;</p>
	<p><span style="font-weight:bold; font-size:14px; margin-bottom:5px;"><?php echo $this->lang->line("note"); ?>:</span></p>
	<p><?php echo html_entity_decode($inv->note); ?></p>
	
    <?php } ?>
</div>
</div>
<div style="clear: both;"></div>
<div class="row-fluid">
<div class="span5"> 

</div>

</div>
</body>
</html>