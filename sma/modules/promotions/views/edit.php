<?php 

            $product_name = array(
              'name'        => 'product_name',
              'id'          => 'product_name',
              'value'       => $promotion->product_name,
              'class'       => 'span4'
            );
            
           $start_date = array(
              'name'        => 'start_date',
              'id'          => 'start_date',
              'value'       => $promotion->start_date,
              'class'       => 'span4'
            );				
			$end_date = array(
              'name'        => 'end_date',
              'id'          => 'end_date',
              'value'       => $promotion->end_date,
              'class'       => 'span4'
            );
            $normal_price = array(
              'name'        => 'normal_price',
              'id'          => 'normal_price',
              'value'       => $promotion->normal_price,
              'class'       => 'span4'
            );
            $discount_price = array(
              'name'        => 'discount_price',
              'id'          => 'discount_price',
              'value'       => $promotion->discount_price,
              'class'       => 'span4'
            );
		
			
?>
<!--<link href="<?php echo $this->config->base_url(); ?>assets/css/datepicker.css" rel="stylesheet">
<style type="text/css">
.table th { text-align:center; }
.table td { vertical-align: middle; }
.table td:last-child { text-align: center !important;}
</style>
<script src="<?php echo $this->config->base_url(); ?>assets/js/jquery-ui.js"></script>
<link href="http://127.0.0.1/sma2/assets/css/redactor.css" rel="stylesheet">
<script src="<?php echo $this->config->base_url(); ?>assets/js/redactor.min.js"></script>
<script src="<?php echo $this->config->base_url(); ?>assets/js/validation.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	 $( "#start_date" ).datepicker({
        	format: "<?php echo JS_DATE; ?>",
			autoclose: true
    });

    
    $( "#end_date" ).datepicker({
        	format: "<?php echo JS_DATE; ?>",
			autoclose: true
    });
	
  </script>  -->
  <link href="<?php echo $this->config->base_url(); ?>assets/css/datepicker.css" rel="stylesheet">
<style type="text/css">
.table th { text-align:center; }
.table td { vertical-align: middle; }
.table td:last-child { text-align: center !important;}
.select {
	min-height: 26px !important;  
	height: 26px !important;
	text-align:left !important;
	background: url(<?php echo $this->config->base_url(); ?>assets/img/darrow.png) no-repeat right transparent;
   }
</style>
<script src="<?php echo $this->config->base_url(); ?>assets/js/jquery-ui.js"></script>
<script src="<?php echo $this->config->base_url(); ?>assets/js/validation.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $( "#$start_date" ).datepicker({
        	format: "<?php echo JS_DATE; ?>",
			autoclose: true
    });

    
    $( "#$end_date" ).datepicker({
        	format: "<?php echo JS_DATE; ?>",
			autoclose: true
    });

	$('form').form();
    
    $('#product_name_l').on('click', function(){ setTimeout(function(){ $('#product_name_s').trigger('liszt:open'); }, 0); });
});
</script>




<?php if($message) { echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>"; } ?>

	<h3 class="title"><?php echo $page_title; ?></h3>
	<p><?php echo $this->lang->line("enter_info"); ?></p>
    
	<?php 
        $attrib = array(
                    'class' => 'form-horizontal', 
                    'id' => 'addSale_form'); 
        echo form_open("module=promotions&view=edit&id=".$id, $attrib); 
    ?>


<div class="control-group">
  <label class="control-label" for="product_name"><?php echo $this->lang->line("product_name"); ?></label>
  <div class="controls">    <?php 
  echo form_input($product_name, (isset($_POST['product_name']) ? $_POST['product_name'] : $rnumber), 'class="span4 tip" id="product_name" required="required" data-error="'.$this->lang->line("product_name").' '.$this->lang->line("is_required").'"'); ?> </div>
</div>
<!--
<div class="control-group">
  <label class="control-label" id="product_name_l"><?php echo $this->lang->line("product_name"); ?></label>
  <div class="controls"> 
  <?php 
  
	 $whx[''] = '';
	  foreach($products as $product_name){
 		   $whx[$product_name->name] = $product_name->name;
		}
		echo form_dropdown($product_name, $whx, (isset($_POST['product_name']) ? $_POST['product_name'] : DEFAULT_PRODUCT_NAME), 'id="product_name_s" data-placeholder="'.$this->lang->line("select").' '.$this->lang->line("product_name").'" required="required" data-error="'.$this->lang->line("product_name").' '.$this->lang->line("is_required").'"'); 
  ?> 
</div>
</div>
-->


<div class="control-group">
  <label class="control-label" for="start_date"><?php echo $this->lang->line("start_date"); ?></label>
  <div class="controls"> <?php echo form_input($start_date, (isset($_POST['start_date']) ? $_POST['start_date'] : ""), 'class="span4 tip" id="start_date" required="required" data-error="'.$this->lang->line("start_date").' '.$this->lang->line("is_required").'"'); ?> </div>
</div>
<div class="control-group">
  <label class="control-label" for="end_date"><?php echo $this->lang->line("end_date"); ?></label>
  <div class="controls"> <?php echo form_input($end_date, (isset($_POST['end_date']) ? $_POST['end_date'] : ""), 'class="span4" id="end_date" required="required" data-error="'.$this->lang->line("end_date").' '.$this->lang->line("is_required").'"');?></div>
</div>
<div class="control-group">
  <label class="control-label" for="normal_price"><?php echo $this->lang->line("normal_price"); ?></label>
  <div class="controls"> <?php echo form_input($normal_price, (isset($_POST['normal_price']) ? $_POST['normal_price'] : ""), 'class="span4" id="normal_price" required="required" data-error="'.$this->lang->line("normal_price").' '.$this->lang->line("is_required").'"');?></div>
</div>
<div class="control-group">
  <label class="control-label" for="discount_price"><?php echo $this->lang->line("discount_price"); ?></label>
  <div class="controls"> <?php echo form_input($discount_price, (isset($_POST['discount_price']) ? $_POST['discount_price'] : ""), 'class="span4" id="discount_price" required="required" data-error="'.$this->lang->line("discount_price").' '.$this->lang->line("is_required").'"');?></div>
</div>


  

<div class="control-group"><div class="controls"><?php echo form_submit('submit', $this->lang->line("submit"), 'class="btn btn-primary" style="padding: 6px 15px;"');?></div></div>
<?php echo form_close();?> 