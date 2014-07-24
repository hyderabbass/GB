<?php $itemkit_no = array(
              'name'        => 'itemkit_no',
              'id'          => 'itemkit_no',
              'value'       => $inv->itemkit_no,
              'class'       => 'span4'
            );
            $itemkit_name = array(
              'name'        => 'itemkit_name',
              'id'          => 'itemkit_name',
              'value'       => $inv->itemkit_name,
              'class'       => 'span4'
            );
############################################################################################################
#            /* START - HYDER - 21 July 2014 */                                                            #
############################################################################################################
            $gift_one = array(
              'name'        => 'gift_one',
              'id'          => 'gift_one',
              'value'       => $inv->gift_one,// Issue #1 - Hyder
              'class'       => 'span4'
            );
            $gift_two = array(
              'name'        => 'gift_two',
              'id'          => 'gift_two',
              'value'       => $inv->gift_two,// Issue #1 - Hyder
              'class'       => 'span4'
            );
            $gift_three = array(
              'name'        => 'gift_three',
              'id'          => 'gift_three',
              'value'       => $inv->gift_three,// Issue #1 - Hyder
              'class'       => 'span4'
            );

            $gift_four = array(
                'name'        => 'gift_four',
                'id'          => 'gift_four',
                'value'       => $inv->gift_four,// Issue #1 - Hyder
                'class'       => 'span4'
            );
            $gift_five = array(
                'name'        => 'gift_five',
                'id'          => 'gift_five',
                'value'       => $inv->gift_five,// Issue #1 - Hyder
                'class'       => 'span4'
            );
##########################################################################################################
#                               /* END - HYDER - 21 July 2014 */                                         #
##########################################################################################################

            $new_price = array(
              'name'        => 'new_price',
              'id'          => 'new_price',
              'value'       => $inv->new_price,
              'class'       => 'span4'
            );
            $itemkit_unit = array(
              'name'        => 'itemkit_unit',
              'id'          => 'itemkit_unit',
              'value'       => '0',//$inv->itemkit_unit,
              'class'       => 'span4'
            );
			$date = array(
              'name'        => 'date',
              'id'          => 'date',
              'value'       => date(PHP_DATE, strtotime($inv->date)),
              'class'       => 'span4'
            );
            $start_date = array(
              'name'        => 'start_date',
              'id'          => 'start_date',
              'value'       => $inv->start_date,
              'class'       => 'span4'
            );
            $end_date = array(
              'name'        => 'end_date',
              'id'          => 'end_date',
              'value'       => $inv->end_date,
              'class'       => 'span4'
            );
			$note = array(
              'name'        => 'note',
              'id'          => 'note',
              'value'       => $inv->note,
			  'class'		=> 'input-block-level',
              'style'       => 'height: 100px;'
            );
			
			
			$pr_value = sizeof($inv_products);
			$cno = $pr_value +1;
			
?>
<!--<link href="<?php echo $this->config->base_url(); ?>assets/css/datepicker.css" rel="stylesheet">-->
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
	$( "#date" ).datepicker({
        	format: "<?php echo JS_DATE; ?>",
			autoclose: true
    });
    
     /*$( "#start_date" ).datepicker({
        	format: "<?php echo JS_DATE; ?>",
			autoclose: true
    });
	$( "#start_date" ).datepicker("setDate", new Date());
    
    $( "#end_date" ).datepicker({
        	format: "<?php echo JS_DATE; ?>",
			autoclose: true
    });
	$( "#end_date" ).datepicker("setDate", new Date());*/
    
	$('form').form();
    
	var count = <?php echo $cno; ?>; var an = <?php echo $cno; ?>;	
	$('#code').keydown(function(e){
		var item_price;
		var item_name;
		var item_code;
			
			if(e.keyCode == 13){

			if(an>=<?php echo TOTAL_ROWS; ?>) {
				 alert("You have reached the max item limit.");
				 return false;
			}
			if(count>=200) {
				 alert("You have reached the max item limit.");
				 return false;
			}
			 
			 item_code = $(this).val();

			$.ajax({
			  type: "get",
			  async: false,
			  url: "<?php echo $this->config->base_url(); ?>index.php?module=sales&view=scan_item",
			  data: { <?php echo $this->security->get_csrf_token_name(); ?>: "<?php echo $this->security->get_csrf_hash() ?>", code: item_code },
			  dataType: "json",
			  success: function(data) {
				
				   item_price = data.price;
				   item_name = data.name;
					
				},
			error: function(){
       			alert('<?php echo $this->lang->line('code_error'); ?>');
				item_name = false;
    		}
			  
			});
			
			if(item_name == false) { $(this).val(''); return false; }
		
			
			var newTr = $('<tr id="row_'+ count +'"></tr>');
			newTr.html('<td><input name="product'+ count +'" type="hidden" value="'+ item_code +'"><input class="span5 tran" style="text-align:left;" name="item'+ count +'" type="text" value="'+ item_name +' ('+ item_code +')"></td><?php 
			if(PRODUCT_SERIAL) { echo '<td><input class="span2 tran2" name="serial\'+ count +\'" type="text" value=""></td>'; } 
			if(DISCOUNT_OPTION == 2) { echo '<td><select class="span2 tran" data-placeholder="Select..." name="discount\' + count + \'" id="tax_rate\' + count + \'">';
				foreach($discounts as $discount) {
					echo "<option value=" . $discount->id;
					if($discount->id == DEFAULT_DISCOUNT) { echo ' selected="selected"'; }
					echo ">" . $discount->name . "</option>";
				}
			echo '</select></td>'; } 
			if(TAX1) { echo '<td><select class="span2 tran" data-placeholder="Select..." name="tax_rate\' + count + \'" id="tax_rate\' + count + \'">';
				foreach($tax_rates as $tax) {
					echo "<option value=" . $tax->id;
					if($tax->id == DEFAULT_TAX) { echo ' selected="selected"'; }
					echo ">" . $tax->name . "</option>";
				}
			echo '</select></td>'; }
			?><td><input class="span2 tran" name="quantity'+ count +'" type="text" value="1" onClick="this.select();"></td><td><input class="span2 tran" style="text-align:right;" name="unit_price'+ count +'" type="text" value="'+ item_price +'"></td><td><i class="icon-trash tip del" id="'+ count +'" title="Remove this Item" style="cursor:pointer;" data-placement="right"></i></td>');
			newTr.appendTo("#dyTable");
	
		count++;
		an++;
		$("form select").chosen({no_results_text: "<?php echo $this->lang->line('no_results_matched'); ?>", disable_search_threshold: 5, allow_single_deselect:true });
		
		$(this).val('');	
		e.preventDefault();
		return false;
		}
		
	});	

	$('#code').bind('keypress', function(e)
	{
	   if(e.keyCode == 13)
	   {
		  e.preventDefault();
		  return false;
	   }
	});	

	$("#dyTable").on("click", '.del', function() {
		 		
		 var delID=$(this).attr('id');
		 
		 row_id = $("#row_"+delID);
		 row_id.remove();
		 
		 an--;
				
	});	
	
		<?php if($this->input->post('submit')) { echo "$('.item_name').hide();"; } ?>
        $(".show_hide").slideDown('slow');
 
		$('.show_hide').click(function(){
			$(".item_name").slideToggle();
			return false;
		});
		
		$( "#name" ).autocomplete({
			source: function(request, response) {
				$.ajax({ url: "<?php echo site_url('module=sales&view=suggestions'); ?>",
				data: { <?php echo $this->security->get_csrf_token_name(); ?>: "<?php echo $this->security->get_csrf_hash() ?>", term: $("#name").val()},
				dataType: "json",
				type: "get",
				success: function(data){
					response(data);
				}
			});
		},
		minLength: 2, 

		select: function( event, ui ) {

			if(an>=<?php echo TOTAL_ROWS; ?>) {
				 alert("You have reached the max item limit.");
				 return false;
			}
			if(count>=200) {
				 alert("You have reached the max item limit.");
				 return false;
			}
			var item_code; var item_price;
			var item_name = ui.item.label;
			
			$.ajax({
			  type: "get",
			  async: false,
			  url: "<?php echo $this->config->base_url(); ?>index.php?module=sales&view=add_item",
			  data: { <?php echo $this->security->get_csrf_token_name(); ?>: "<?php echo $this->security->get_csrf_hash() ?>", name: item_name },
			  dataType: "json",
			  success: function(data) {
				
				   item_code = data.code;
				   item_price = data.price;
					
				},
			error: function(){
       			alert('<?php echo $this->lang->line('code_error'); ?>');
				$('.ui-autocomplete-loading').removeClass("ui-autocomplete-loading");
				item_name = false;
    		}
			  
			});
			
			if(item_name == false) { $(this).val(''); return false; }
			
			
			var newTr = $('<tr id="row_'+ count +'"></tr>');
			newTr.html('<td><input name="product'+ count +'" type="hidden" value="'+ item_code +'"><input class="span5 tran" style="text-align:left;" name="item'+ count +'" type="text" value="'+ item_name +' ('+ item_code +')"></td><?php 
			if(PRODUCT_SERIAL) { echo '<td><input class="span2 tran2" name="serial\'+ count +\'" type="text" value=""></td>'; } 
			if(DISCOUNT_OPTION == 2) { echo '<td><select class="span2 tran" data-placeholder="Select..." name="discount\' + count + \'" id="discount\' + count + \'">';
				foreach($discounts as $discount) {
					echo "<option value=" . $discount->id;
					if($discount->id == DEFAULT_DISCOUNT) { echo ' selected="selected"'; }
					echo ">" . $discount->name . "</option>";
				}
			echo '</select></td>'; } if(TAX1) { echo '<td><select class="span2 tran" data-placeholder="Select..." name="tax_rate\' + count + \'" id="tax_rate\' + count + \'">';
				foreach($tax_rates as $tax) {
					echo "<option value=" . $tax->id;
					if($tax->id == DEFAULT_TAX) { echo ' selected="selected"'; }
					echo ">" . $tax->name . "</option>";
				}
			echo '</select></td>'; }
			?><td><input class="span2 tran" name="quantity'+ count +'" type="text" value="1" onClick="this.select();"></td><td><input class="span2 tran" style="text-align:right;" name="unit_price'+ count +'" type="text" value="'+ item_price +'"></td><td><i class="icon-trash tip del" id="'+ count +'" title="Remove this Item" style="cursor:pointer;" data-placement="right"></i></td>');
			newTr.appendTo("#dyTable"); 
	
		count++;
		an++;
		$("form select").chosen({no_results_text: "<?php echo $this->lang->line('no_results_matched'); ?>", disable_search_threshold: 5, allow_single_deselect:true });
			
		
		},
		close: function () {
			$('#name').val('');
		}
		});
		
		$( ".ui-autocomplete " ).addClass('span4');
		$('#item_name').bind('keypress', function(e)
		{
		   if(e.keyCode == 13)
		   {
			 e.preventDefault();
			 return false;
		   }
		});
		$("form").submit(function () { 
			if(an <= 1) {
				alert("<?php echo $this->lang->line('no_invoice_item'); ?>");
				return false;
			}
		});
		
		$('#customer_l').on('click', function(){ setTimeout(function(){ $('#customer_s').trigger('liszt:open');	}, 0); });
		$('#biller_l').on('click', function(){ setTimeout(function(){ $('#biller_s').trigger('liszt:open'); }, 0); });
		$('#warehouse_l').on('click', function(){ setTimeout(function(){ $('#warehouse_s').trigger('liszt:open'); }, 0); });
		$('#discount_l').on('click', function(){ setTimeout(function(){ $('#discount_s').trigger('liszt:open'); }, 0); });
		$('#tax2_l').on('click', function(){ setTimeout(function(){ $('#tax2_s').trigger('liszt:open'); }, 0); });
		$('#byTab a').click(function (e) {
    		e.preventDefault();
    		$(this).tab('show');
    	})
		
		//For Product Name
		$('#byTab a:last').tab('show');
		
		//For Barcode Scanner Please uncommetn the below 3 lines just remove the // in start of lines only
		//$('#byTab a:first').tab('show');
		//$('#by_name').removeClass('active');
		//$('#by_code').addClass('active');
});
</script>

<?php if($message) { echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>"; } ?>

	<h3 class="title"><?php echo $page_title; ?></h3>
	<p><?php echo $this->lang->line("enter_info"); ?></p>
    
	<?php $attrib = array('class' => 'form-horizontal', 'id' => 'addSale_form'); echo form_open("module=itemkits&view=edit&id=".$id, $attrib); ?>
<div class="control-group">
  <label class="control-label" for="date"><?php echo $this->lang->line("date"); ?></label>
  <div class="controls"> <?php echo form_input($date);?></div>
</div>
<div class="control-group">
  <label class="control-label" for="itemkit_no"><?php echo $this->lang->line("itemkit_no"); ?></label>
  <div class="controls"> <?php echo form_input($itemkit_no); ?> </div>
</div>
<div class="control-group">
  <label class="control-label" for="itemkit_name"><?php echo $this->lang->line("itemkit_name"); ?></label>
  <div class="controls"> <?php echo form_input($itemkit_name); ?> </div>
</div>
<!-- Issue #1 - Mone hide sa parski pas bizin sa zistoir la lr form la - Hyder - 17 June 2014 - START -->
<div class="control-group" style="display:none;">
  <label class="control-label" for="itemkit_unit"><?php echo $this->lang->line("itemkit_unit"); ?></label>
  <div class="controls"> <?php echo form_input($itemkit_unit); ?> </div>
</div>
<!-- Issue #1 - Mone hide sa parski pas bizin sa zistoir la lr form la - Hyder - 17 June 2014 -END -->

<!--- Issue #1 - Hyder - 21 July 2014 - Added 5 field to accomodate  more gifts- START -->
<div class="control-group">
    <label class="control-label" id="gift_one">Gift-No. One</label>
    <div class="controls">
        <?php

        $whx3[''] = '';
        foreach($products as $product_name){
            $whx3[$product_name->id] = $product_name->name; // Issue #1 - Hyder - 18 June 2014 - Mone ajoute productid ladans
        }
        echo form_dropdown('gift_one', $whx3, $inv->gift_one, 'id="gift_one_s" data-placeholder="'.$this->lang->line("select").' '.$this->lang->line("gifts").'" "');
        ?>
    </div>
</div>

<div class="control-group">
    <label class="control-label" id="gift_two">Gift-No. Two</label>
    <div class="controls">
        <?php

        $whx3[''] = '';
        foreach($products as $product_name){
            $whx3[$product_name->id] = $product_name->name; // Issue #1 - Hyder - 18 June 2014 - Mone ajoute productid ladans
        }
        echo form_dropdown('gift_two', $whx3,$inv->gift_two, 'id="gift_two_s" data-placeholder="'.$this->lang->line("select").' '.$this->lang->line("gifts").'" "');
        ?>
    </div>
</div>

<div class="control-group">
    <label class="control-label" id="gift_three">Gift-No. Three</label>
    <div class="controls">
        <?php

        $whx3[''] = '';
        foreach($products as $product_name){
            $whx3[$product_name->id] = $product_name->name; // Issue #1 - Hyder - 18 June 2014 - Mone ajoute productid ladans
        }
        echo form_dropdown('gift_three', $whx3, $inv->gift_three, 'id="gift_three_s" data-placeholder="'.$this->lang->line("select").' '.$this->lang->line("gifts").'" "');
        ?>
    </div>
</div>


<div class="control-group">
    <label class="control-label" id="gift_four">Gift-No. Four</label>
    <div class="controls">
        <?php

        $whx3[''] = '';
        foreach($products as $product_name){
            $whx3[$product_name->id] = $product_name->name; // Issue #1 - Hyder - 18 June 2014 - Mone ajoute productid ladans
        }
        echo form_dropdown('gift_four', $whx3, $inv->gift_four, 'id="gift_four_s" data-placeholder="'.$this->lang->line("select").' '.$this->lang->line("gifts").'" "');
        ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" id="gift_five">Gift-No. Five</label>
    <div class="controls">
        <?php

        $whx3[''] = '';
        foreach($products as $product_name){
            $whx3[$product_name->id] = $product_name->name; // Issue #1 - Hyder - 18 June 2014 - Mone ajoute productid ladans
        }
        echo form_dropdown('gift_five', $whx3,$inv->gift_five, 'id="gift_five_s" data-placeholder="'.$this->lang->line("select").' '.$this->lang->line("gifts").'" "');
        ?>
    </div>
</div>

<!-- Issue #1 - Hyder - 21 July 2014 - Added 2 field to accomodate 2 more gifts- END -->
<div class="control-group" style="display: none;">
  <label class="control-label" for="start_date"><?php echo $this->lang->line("start_date"); ?></label>
  <div class="controls"> <?php echo form_input($start_date); ?> </div>
</div>
<div class="control-group" style="display: none;">
  <label class="control-label" for="end_date"><?php echo $this->lang->line("end_date"); ?></label>
  <div class="controls"> <?php echo form_input($end_date); ?> </div>
</div>

<div class="control-group">
  <label class="control-label" for="new_price"><?php echo $this->lang->line("new_price"); ?></label>
  <div class="controls"> <?php echo form_input($new_price); ?> </div>
</div>





<div class="control-group">
<div class="controls">
<div class="span4" id="drag">
<div class="add_options clearfix" id="add_options">
<div id="draggable"><?php echo $this->lang->line('draggable'); ?></div>
<div class="fancy-tab-container">

<ul class="nav nav-tabs two-tabs fancy" id="byTab">
<li class="active"><a href="#by_code"><?php echo $this->lang->line("barcode_scanner"); ?></a></li>
<li><a href="#by_name"><?php echo $this->lang->line("product_name"); ?></a></li>
</ul>
 
<div class="tab-content">

<div class="tab-pane tab-bg" id="by_code" >
 
  <?php echo form_input('code', '', 'class="input-block-level" id="code" placeholder="'.$this->lang->line("barcode_scanner").'" title="'. $this->lang->line("use_barcode_scanner_tip") .'"');?>
   </div>
   
<div class="tab-pane tab-bg active" id="by_name">

 <?php echo form_input('name', '', 'class="input-block-level" id="name" placeholder="'.$this->lang->line("product_name").'" title="'. $this->lang->line("au_pr_name_tip") .'"');?>
  
</div>
 
</div>
</div>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>

<div class="control-group">
<label class="control-label"><?php echo $this->lang->line("invoice_items"); ?></label>
  <div class="controls">
  <table id="dyTable" class="table items table-striped table-bordered table-condensed table-hover">
  <thead>
      <th class="span5"><?php echo $this->lang->line("product_name")." (".$this->lang->line("product_code").")"; ?></th>
      <th class="span2"><?php echo $this->lang->line("quantity"); ?></th>
      <th class="span2"><?php echo $this->lang->line("unit_price"); ?></th>
      <th style="width: 20px;"><i class="icon-trash" style="opacity:0.5; filter:alpha(opacity=50);"></i></th>
   </thead>
  <tbody>
  <?php $r = 1; foreach($inv_products as $prod){ 
			
             echo '<tr id="row_'.$r.'"><td><input name="product'.$r.'" type="hidden" value="'.$prod->product_code.'"><input class="span5 tran" style="text-align:left;" name="item'.$r.'" type="text" value="'.$prod->product_name.' ('.$prod->product_code.')"></td>';

			 
			 echo '<td><input class="span2 tran" name="quantity'.$r.'" type="text" value="'.$prod->quantity.'"></td><td><input class="span2 tran" style="text-align:right;" name="unit_price'.$r.'" type="text" value="'.$prod->unit_price.'"></td><td><i class="icon-trash tip del" id="'.$r.'" title="Remove this Item" style="cursor:pointer;" data-placement="right"></i></td></tr>'; 
		$r++; } ?>
  </tbody>
</table>

	</div>
</div>   





<div class="control-group"><div class="controls"><?php echo form_submit('submit', $this->lang->line("submit"), 'class="btn btn-primary" style="padding: 6px 15px;"');?></div></div>
<?php echo form_close();?> 


