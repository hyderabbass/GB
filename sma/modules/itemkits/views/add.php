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
    
     $('#gift_one_l').on('click', function(){ setTimeout(function(){ $('#gift_one_s').trigger('liszt:open'); }, 0); });
     $('#gift_two_l').on('click', function(){ setTimeout(function(){ $('#gift_two_s').trigger('liszt:open'); }, 0); });
     $('#gift_three_l').on('click', function(){ setTimeout(function(){ $('#gift_three_s').trigger('liszt:open'); }, 0); });
	$( "#date" ).datepicker({
        	format: "<?php echo JS_DATE; ?>",
			autoclose: true
    });
	$( "#date" ).datepicker("setDate", new Date());
    
    $( "#start_date" ).datepicker({
        	format: "<?php echo JS_DATE; ?>",
			autoclose: true
    });
	$( "#start_date" ).datepicker("setDate", new Date());
    
    $( "#end_date" ).datepicker({
        	format: "<?php echo JS_DATE; ?>",
			autoclose: true
    });
	$( "#end_date" ).datepicker("setDate", new Date());
	$('form').form();
    
    
	
	var count = 1; var an = 1; var shipping = 0;
	var total = 0; var total_discount = 0; var total_tax1 = 0; var total_tax2 = 0;
	var discount_method = <?php echo DISCOUNT_METHOD; ?>;

	<?php if(DISCOUNT_OPTION == 2) { ?>
	var discount2 = <?php echo $discount_rate2; ?>; var discount_type2 = <?php echo $discount_type2; ?>;
	<?php } ?>
	<?php if(TAX1) { ?>
	var tax_rate = <?php echo $tax_rate; ?>; var tax_type = <?php echo $tax_type; ?>;
	<?php } ?>
	<?php if(TAX2) { ?>
	var tax_rate2 = <?php echo $tax_rate2; ?>; var tax_type2 = <?php echo $tax_type2; ?>;
	<?php } ?>

	$('#code').keydown(function(e){
		var item_price;
		var item_name;
		var item_code;
			
			if(e.keyCode == 13){

			if(an>=<?php echo TOTAL_ROWS; ?>) {
				 bootbox.alert("You have reached the max item limit.");
				 return false;
			}
			if(count>=200) {
				 bootbox.alert("You have reached the max item limit.");
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
       			bootbox.alert('<?php echo $this->lang->line('code_error'); ?>');
				item_name = false;
    		}
			  
			});
			
			if(item_name == false) { $(this).val(''); return false; }
		
			
			var newTr = $('<tr id="row_'+ count +'"></tr>');
			newTr.html('<td><input name="product'+ count +'" type="hidden" value="'+ item_code +'"><input class="span5 tran" style="text-align:left;" name="item'+ count +'" type="text" value="'+ item_name +' ('+ item_code +')"></td><td><input class="span2 tran" name="quantity'+ count +'" type="text" value="1" id="quantity-'+ count +'" onClick="this.select();"></td><td><input class="span2 tran" style="text-align:right;" name="unit_price'+ count +'" type="text" id="price-'+ count +'" value="'+ item_price +'"></td><td><i class="icon-trash tip del" id="'+ count +'" title="Remove this Item" style="cursor:pointer;" data-placement="right"></i></td>');
			newTr.prependTo("#dyTable");
	
		count++;
		an++;
			
	<?php if(TAX1) { ?>
		if(tax_type == 2){ pr_tax_rate = tax_rate; }
		if(tax_type == 1){ pr_tax_rate = (item_price*tax_rate)/100; }
		total_tax1 += pr_tax_rate;
	<?php } else { ?>
		pr_tax_rate = 0;
	<?php } ?>
	
	total += parseFloat(item_price);
		
	<?php if(TAX2) { ?>
		if(tax_type2 == 2){ total_tax2 = tax_rate2; }
		if(tax_type2 == 1){ total_tax2 = (total*tax_rate2)/100; }
	<?php } ?>
	<?php if(DISCOUNT_METHOD == 1 && DISCOUNT_OPTION == 1) { ?>
		if(discount_type == 2){ total_discount = discount; }
		if(discount_type == 1){ total_discount = (total*discount)/100; }
	<?php } elseif(DISCOUNT_METHOD == 2 && DISCOUNT_OPTION == 1) { ?>
		if(discount_type == 2){ total_discount = discount; }
		if(discount_type == 1){ total_discount = ((total + total_tax1 + total_tax2) * discount)/100; }
	<?php } ?>
		
	<?php if(DISCOUNT_OPTION == 2) { ?>
	
	<?php if(DISCOUNT_METHOD == 1) { ?>
		if(discount_type2 == 2){ pr_discount = discount2; }
		if(discount_type2 == 1){ pr_discount = (item_price*discount2)/100; }
	<?php } elseif(DISCOUNT_METHOD == 2) { ?>
		if(discount_type2 == 2){ pr_discount = discount2; }
		if(discount_type2 == 1){ pr_discount = ((parseFloat(item_price) + pr_tax_rate) * discount2 ) / 100; }
	<?php } ?>
		total_discount += pr_discount;
	<?php } ?> 
		
		gtotal = ((total + total_tax1 + total_tax2) - total_discount) + shipping;
		$('#total').val(total.toFixed(2));
		<?php if(DISCOUNT_OPTION == 1 || DISCOUNT_OPTION == 2) { ?>$('#tds').val(total_discount.toFixed(2));<?php } ?>
		<?php if(TAX1) { ?>$('#ttax1').val(total_tax1.toFixed(2));<?php } ?>
		<?php if(TAX2) { ?>$('#ttax2').val(total_tax2.toFixed(2));<?php } ?>
		$('#gtotal').val(gtotal.toFixed(2));
		
		$(this).val('');	
		e.preventDefault();
		return false;
		}
		
	});	

	$('#code').bind('keypress', function(e)	{
	   if(e.keyCode == 13) {
		  e.preventDefault();
		  return false;
	   }
	});	

	$("#dyTable").on("click", '.del', function() {
				 
			var delID=$(this).attr('id');
 			var rw_no = delID;
			var p1 = $('#price-'+rw_no);
			var q1 = $('#quantity-'+rw_no);
			
			<?php if(TAX1) { ?>
			var t1_val = $('#tax_rate-'+rw_no).val();		
			$.ajax({
				  type: "get",
				  async: false,
				  url: "<?php echo site_url('module=sales&view=tax_rates'); ?>",
				  data: { id: t1_val },
				  dataType: "json",
				  success: function(data) {
						 new_tax_rate = parseFloat(data.new_tax_rate);
						 new_tax_type = parseFloat(data.new_tax_type);
					},
				error: function(){
					bootbox.alert('<?php echo $this->lang->line('tax_request_failed'); ?>');
					return false;
				}
				  
			});
			<?php } else {?>
				new_pr_tax_rate = 0;
			<?php } ?>
			
			<?php if(DISCOUNT_OPTION == 2) { ?>
			var d1_val = $('#discount-'+rw_no).val();	
			$.ajax({
				type: "get",
				async: false,
				url: "<?php echo site_url('module=sales&view=discounts'); ?>",
				data: { id: d1_val },
				dataType: "json",
				success: function(data) {
					   new_discount_rate = parseFloat(data.new_discount);
					   new_discount_type = parseFloat(data.new_discount_type);
				  },
			  error: function(){
				  bootbox.alert('<?php echo $this->lang->line('discount_request_failed'); ?>');
				  return false;
			  }
			});
		<?php } ?> 
	
		 var price = parseFloat(p1.val());
		 var quantity = parseInt(q1.val());
		 var row_price = price * quantity;
		 total = total - row_price;
		 
		 <?php if(TAX1) { ?>
		 if(new_tax_type == 2){ new_pr_tax_rate = new_tax_rate; }
		 if(new_tax_type == 1){ new_pr_tax_rate = (row_price*new_tax_rate)/100; }
		 total_tax1 = total_tax1 - new_pr_tax_rate;
		 <?php } ?>
		 
		 <?php if(DISCOUNT_OPTION == 2) { ?>

		<?php if(DISCOUNT_METHOD == 1) { ?>
			if(new_discount_type == 2){ new_pr_discount = new_discount_rate; }
			if(new_discount_type == 1){ new_pr_discount = (row_price*new_discount_rate)/100; }
		<?php } elseif(DISCOUNT_METHOD == 2) { ?>
			if(new_discount_type == 2){ new_pr_discount = new_discount_rate; }
			if(new_discount_type == 1){ new_pr_discount = ((row_price + new_pr_tax_rate) * new_discount_rate)/100; }
		<?php } ?>
		total_discount -= new_pr_discount;	
		<?php } ?> 
		
		<?php if(TAX2) { ?>
		 	if(tax_type2 == 2){ total_tax2 = tax_rate2; }
			if(tax_type2 == 1){ total_tax2 = (total*tax_rate2)/100; }
		<?php } ?>
		
		<?php if(DISCOUNT_METHOD == 1 && DISCOUNT_OPTION == 1) { ?>
			if(discount_type == 2){ new_discount_value = discount; }
			if(discount_type == 1){ new_discount_value = (total*discount)/100; }
			total_discount = new_discount_value;
		<?php } elseif(DISCOUNT_METHOD == 2 && DISCOUNT_OPTION == 1) { ?>
			if(discount_type == 2){ new_discount_value = discount; }
			if(discount_type == 1){ new_discount_value = ((total + total_tax1 + total_tax2) * discount)/100; }
			total_discount = new_discount_value;
		<?php } ?>
		 
		 gtotal = ((total + total_tax1 + total_tax2) - total_discount) + shipping;
		$('#total').val(total.toFixed(2));
		<?php if(DISCOUNT_OPTION == 1 || DISCOUNT_OPTION == 2) { ?>$('#tds').val(total_discount.toFixed(2));<?php } ?>
		<?php if(TAX1) { ?>$('#ttax1').val(total_tax1.toFixed(2));<?php } ?>
		<?php if(TAX2) { ?>$('#ttax2').val(total_tax2.toFixed(2));<?php } ?>
		$('#gtotal').val(gtotal.toFixed(2));		 
		 
		 row_id = $("#row_"+delID);
		 row_id.remove();
		 an--;
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
				 bootbox.alert("You have reached the max item limit.");
				 return false;
			}
			if(count>=200) {
				 bootbox.alert("You have reached the max item limit.");
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
       			bootbox.alert('<?php echo $this->lang->line('code_error'); ?>');
				$('.ui-autocomplete-loading').removeClass("ui-autocomplete-loading");
				item_name = false;
    		}
			  
			});
			
			if(item_name == false) { $(this).val(''); return false; }
			
			
			var newTr = $('<tr id="row_'+ count +'"></tr>');
			newTr.html('<td><input name="product'+ count +'" type="hidden" value="'+ item_code +'"><input class="span5 tran" style="text-align:left;" name="item'+ count +'" type="text" value="'+ item_name +' ('+ item_code +')"></td><td><input class="span2 tran" name="quantity'+ count +'" type="text" value="1" id="quantity-'+ count +'" onClick="this.select();"></td><td><input class="span2 tran" style="text-align:right;" name="unit_price'+ count +'" id="price-'+ count +'" type="text" value="'+ item_price +'"></td><td><i class="icon-trash tip del" id="'+ count +'" title="Remove this Item" style="cursor:pointer;" data-placement="right"></i></td>');
			newTr.prependTo("#dyTable"); 
	
		count++;
		an++;
		
		<?php if(TAX1) { ?>
		if(tax_type == 2){ pr_tax_rate = tax_rate; }
		if(tax_type == 1){ pr_tax_rate = (item_price*tax_rate)/100; }
		total_tax1 += pr_tax_rate;
	<?php } else { ?>
		pr_tax_rate = 0;
	<?php } ?>
	
	total += parseFloat(item_price);
		
	<?php if(TAX2) { ?>
		if(tax_type2 == 2){ total_tax2 = tax_rate2; }
		if(tax_type2 == 1){ total_tax2 = (total*tax_rate2)/100; }
	<?php } ?>
	<?php if(DISCOUNT_METHOD == 1 && DISCOUNT_OPTION == 1) { ?>
		if(discount_type == 2){ total_discount = discount; }
		if(discount_type == 1){ total_discount = (total*discount)/100; }
	<?php } elseif(DISCOUNT_METHOD == 2 && DISCOUNT_OPTION == 1) { ?>
		if(discount_type == 2){ total_discount = discount; }
		if(discount_type == 1){ total_discount = ((total + total_tax1 + total_tax2) * discount)/100; }
	<?php } ?>
		
	<?php if(DISCOUNT_OPTION == 2) { ?>
	
	<?php if(DISCOUNT_METHOD == 1) { ?>
		if(discount_type2 == 2){ pr_discount = discount2; }
		if(discount_type2 == 1){ pr_discount = (item_price*discount2)/100; }
	<?php } elseif(DISCOUNT_METHOD == 2) { ?>
		if(discount_type2 == 2){ pr_discount = discount2; }
		if(discount_type2 == 1){ pr_discount = ((parseFloat(item_price) + pr_tax_rate) * discount2 ) / 100; }
	<?php } ?>
		total_discount += pr_discount;
	<?php } ?> 
				
		gtotal = ((total + total_tax1 + total_tax2) - total_discount) + shipping;
		$('#total').val(total.toFixed(2));
		<?php if(DISCOUNT_OPTION == 1 || DISCOUNT_OPTION == 2) { ?>$('#tds').val(total_discount.toFixed(2));<?php } ?>
		<?php if(TAX1) { ?>$('#ttax1').val(total_tax1.toFixed(2));<?php } ?>
		<?php if(TAX2) { ?>$('#ttax2').val(total_tax2.toFixed(2));<?php } ?>
		$('#gtotal').val(gtotal.toFixed(2));
			
		
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
				bootbox.alert("<?php echo $this->lang->line('no_invoice_item'); ?>");
				return false;
			}
		});
		
		<?php if(TAX2) { ?>
		var old_val = $("#tax2_s").val();
		$("#tax2_s").change( function () {
				var new_val = $("#tax2_s").val();
				$.ajax({
			type: "get",
			async: false,
			url: "index.php?module=sales&view=tax_rates",
			data: { id: new_val, old_id: old_val },
			dataType: "json",
			success: function(data) {
				   new_tax_rate = parseFloat(data.new_tax_rate);
				   new_tax_type = parseFloat(data.new_tax_type);
				   old_tax_rate = parseFloat(data.old_tax_rate);
				   old_tax_type = parseFloat(data.old_tax_type);
			  },
			error: function(){
			  bootbox.alert('<?php echo $this->lang->line('tax_request_failed'); ?>');
			  return false;
			}
		});
		if(new_tax_type == 2){ new_tax_rate = new_tax_rate; }
		if(new_tax_type == 1){ new_tax_rate = (total*new_tax_rate)/100; }
		if(old_tax_type == 2){ old_tax_rate = old_tax_rate; }
		if(old_tax_type == 1){ old_tax_rate = (total*old_tax_rate)/100; }
		total_tax2 -= old_tax_rate;
		total_tax2 += new_tax_rate;
		
		<?php if(DISCOUNT_OPTION == 1 && DISCOUNT_METHOD == 2) { ?> total_discount =  ((total + total_tax1 + total_tax2) * discount)/100; $('#tds').val(total_discount.toFixed(2));<?php } ?>
		
		gtotal = ((total + total_tax1 + total_tax2) - total_discount) + shipping;
		$('#ttax2').val(total_tax2.toFixed(2));
		$('#gtotal').val(gtotal.toFixed(2));
		old_val = new_val;
		});
		<?php } ?>
		
		<?php if(DISCOUNT_OPTION == 1) { ?>
		var ods_val = $("#discount_s").val();
		$("#discount_s").change( function () {
				var nds_val = $("#discount_s").val();
				$.ajax({
			type: "get",
			async: false,
			url: "index.php?module=sales&view=discounts",
			data: { id: nds_val, old_id: ods_val },
			dataType: "json",
			success: function(data) {
				   new_discount_rate = parseFloat(data.new_discount);
				   new_discount_type = parseFloat(data.new_discount_type);
				   old_discount_rate = parseFloat(data.old_discount);
				   old_discount_type = parseFloat(data.old_discount_type);
			  },
			error: function(){
			  bootbox.alert('<?php echo $this->lang->line('discount_request_failed'); ?>');
			  return false;
			}
		});
	
		<?php if(DISCOUNT_METHOD == 1) { ?>
		if(new_discount_type == 2){ new_discount = new_discount_rate; }
		if(new_discount_type == 1){ new_discount = (total*new_discount_rate)/100; }
		if(old_discount_type == 2){ old_discount = old_discount_rate; }
		if(old_discount_type == 1){ old_discount = (total*old_discount_rate)/100; }
		<?php } elseif(DISCOUNT_METHOD == 2) { ?>
		if(new_discount_type == 2){ new_discount = new_discount_rate; }
		if(new_discount_type == 1){ new_discount = ((total + total_tax1 + total_tax2)*new_discount_rate)/100; }
		if(old_discount_type == 2){ old_discount = old_discount_rate; }
		if(old_discount_type == 1){ old_discount = ((total + total_tax1 + total_tax2)*old_discount_rate)/100; }
		<?php } ?>	
		
		total_discount -= old_discount;
		total_discount += new_discount;
			
		gtotal = ((total + total_tax1 + total_tax2) - total_discount) + shipping;
		$('#tds').val(total_discount.toFixed(2));
		$('#gtotal').val(gtotal.toFixed(2));
		ods_val = nds_val;
		});
		<?php } ?>
		
		<?php if(TAX1) { ?>
	
		$("#dyTable").on("focus", 'select[id^="tax_rate-"]', function() {
			otval = $(this).val();
		});
		 
		$("#dyTable").on("change", 'select[id^="tax_rate-"]', function() {
			var selID=$(this).attr('id');
			var sl_id = selID.split("-");
 			var rw_no = sl_id[1];
			var ntval = $(this).val();
			var p1 = $('#price-'+rw_no);
			var q1 = $('#quantity-'+rw_no);
				
		 	var price = parseFloat(p1.val());
		 	var quantity = parseInt(q1.val());
		 	var row_price = price * quantity;
		 
			$.ajax({
				type: "get",
				async: false,
				url: "index.php?module=sales&view=tax_rates",
				data: { id: ntval, old_id: otval },
				dataType: "json",
				success: function(data) {
					   new_tax_rate = parseFloat(data.new_tax_rate);
					   new_tax_type = parseFloat(data.new_tax_type);
					   old_tax_rate = parseFloat(data.old_tax_rate);
					   old_tax_type = parseFloat(data.old_tax_type);
				  },
				error: function(){
				  bootbox.alert('<?php echo $this->lang->line('tax_request_failed'); ?>');
				  return false;
				}
			});
		if(new_tax_type == 2){ new_pr_tax_rate = new_tax_rate; }
		if(new_tax_type == 1){ new_pr_tax_rate = (row_price*new_tax_rate)/100; }
		if(old_tax_type == 2){ old_pr_tax_rate = old_tax_rate; }
		if(old_tax_type == 1){ old_pr_tax_rate = (row_price*old_tax_rate)/100; }
		total_tax1 -= old_pr_tax_rate;
		total_tax1 += new_pr_tax_rate;
				
		
		<?php if(DISCOUNT_OPTION == 1 && DISCOUNT_METHOD == 2) { ?> 
		var d1 = $('#discount_s').val();
		$.ajax({
				type: "get",
				async: false,
				url: "index.php?module=sales&view=discounts",
				data: { id: d1 },
				dataType: "json",
				success: function(data) {
					   new_discount_rate = parseFloat(data.new_discount);
				   	   new_discount_type = parseFloat(data.new_discount_type);
				  },
				error: function(){
				  bootbox.alert('<?php echo $this->lang->line('discount_request_failed'); ?>');
				  return false;
				}
		});
		total_discount =  ((total + total_tax1 + total_tax2) * new_discount_rate)/100; $('#tds').val(total_discount.toFixed(2));<?php } ?>
		<?php if(DISCOUNT_OPTION == 2 && DISCOUNT_METHOD == 2) { ?> 
		var d1 = $('#discount-'+rw_no).val();
		$.ajax({
				type: "get",
				async: false,
				url: "index.php?module=sales&view=discounts",
				data: { id: d1 },
				dataType: "json",
				success: function(data) {
					   new_discount_rate = parseFloat(data.new_discount);
				   	   new_discount_type = parseFloat(data.new_discount_type);
				  },
				error: function(){
				  bootbox.alert('<?php echo $this->lang->line('discount_request_failed'); ?>');
				  return false;
				}
		});
		
		if(new_discount_type == 2){ 
			o_discount =  new_discount_rate * quantity;
			n_discount =  new_discount_rate * quantity;
		}
		if(new_discount_type == 1){ 
			o_discount =  ((row_price + old_pr_tax_rate) * new_discount_rate)/100;
			n_discount =  ((row_price + new_pr_tax_rate) * new_discount_rate)/100;
		}
		total_discount -= o_discount;
		total_discount += n_discount;
		$('#tds').val(total_discount.toFixed(2));
		
		<?php } ?>
		
		gtotal = ((total + total_tax1 + total_tax2) - total_discount) + shipping;
		$('#ttax1').val(Math.abs(total_tax1).toFixed(2));
		$('#gtotal').val(gtotal.toFixed(2));
		otval = ntval;
		
		});
		<?php } ?>
		
		$("#dyTable").on("focus", 'input[id^="quantity-"]', function() {
			oqty = $(this).val();
		});
		$("#dyTable").on("blur", 'input[id^="quantity-"]', function() {
			var rID=$(this).attr('id');
			var r_id = rID.split("-");
 			var rw_no = r_id[1];
			var nqty = $(this).val();
			var rprice = $('#price-'+rw_no).val();
			
			var oldrowtotal = oqty * rprice;
			var newrowtotal = nqty * rprice;
			
			total -= oldrowtotal;
			total += newrowtotal;
			
			<?php if(TAX1) { ?>
			var rtax = $('#tax_rate-'+rw_no).val();
			$.ajax({
				type: "get",
				async: false,
				url: "index.php?module=sales&view=tax_rates",
				data: { id: rtax },
				dataType: "json",
				success: function(data) {
					   new_tax_rate = parseFloat(data.new_tax_rate);
					   new_tax_type = parseFloat(data.new_tax_type);
				  },
				error: function(){
				  bootbox.alert('<?php echo $this->lang->line('tax_request_failed'); ?>');
				  return false;
				}
			});
		if(new_tax_type == 2){ opr_tax_rate = new_tax_rate; }
		if(new_tax_type == 1){ opr_tax_rate = (oldrowtotal*new_tax_rate)/100; }
		if(new_tax_type == 2){ npr_tax_rate = new_tax_rate; }
		if(new_tax_type == 1){ npr_tax_rate = (newrowtotal*new_tax_rate)/100; }

		total_tax1 -= opr_tax_rate;
		total_tax1 += npr_tax_rate;
		<?php } ?>
		
			
		<?php if(TAX2) { ?>
		
		 var inds = $("#tax2_s").val();
		 $.ajax({
			type: "get",
			async: false,
			url: "index.php?module=sales&view=tax_rates",
			data: { id: inds },
			dataType: "json",
			success: function(data) {
				   new_tax_rate = parseFloat(data.new_tax_rate);
				   new_tax_type = parseFloat(data.new_tax_type);
			  },
			error: function(){
			  bootbox.alert('<?php echo $this->lang->line('tax_request_failed'); ?>');
			  return false;
			}
		});
		if(new_tax_type == 2){ new_tax_rate = new_tax_rate; }
		if(new_tax_type == 1){ new_tax_rate = (total*new_tax_rate)/100; }
		total_tax2 = new_tax_rate;

		<?php } ?>
		
		<?php if(DISCOUNT_OPTION == 2) { ?>
			var rtax = $('#discount-'+rw_no).val();
			$.ajax({
				type: "get",
				async: false,
				url: "index.php?module=sales&view=discounts",
				data: { id: rtax },
				dataType: "json",
				success: function(data) {
					   new_discount_rate = parseFloat(data.new_discount);
					   new_discount_type = parseFloat(data.new_discount_type);
				  },
				error: function(){
				  bootbox.alert('<?php echo $this->lang->line('discount_request_failed'); ?>');
				  return false;
				}
			});
		if(new_discount_type == 2){ opr_discount_rate = new_discount_rate * oqty;; }
		<?php if(DISCOUNT_METHOD == 1) { ?> 
		if(new_discount_type == 1){ opr_discount_rate = (oldrowtotal*new_discount_rate)/100; }
		<?php } ?>
		<?php if(DISCOUNT_METHOD == 2) { ?> 
		if(new_discount_type == 1){ opr_discount_rate = ((oldrowtotal+opr_tax_rate)*new_discount_rate)/100; }
		<?php } ?>
		
		if(new_discount_type == 2){ npr_discount_rate = new_discount_rate * nqty;; }
		<?php if(DISCOUNT_METHOD == 1) { ?> 
		if(new_discount_type == 1){ npr_discount_rate = (newrowtotal*new_discount_rate)/100; }
		<?php } ?>
		<?php if(DISCOUNT_METHOD == 2) { ?> 
		if(new_discount_type == 1){ npr_discount_rate = ((newrowtotal+npr_tax_rate)*new_discount_rate)/100; }
		<?php } ?>

		total_discount -= opr_discount_rate;
		total_discount += npr_discount_rate;
		<?php } ?>
			
		<?php if(DISCOUNT_OPTION == 1) { ?>
		
		 var ids = $("#discount_s").val();
		 $.ajax({
			type: "get",
			async: false,
			url: "index.php?module=sales&view=discounts",
			data: { id: ids },
			dataType: "json",
			success: function(data) {
				   new_discount_rate = parseFloat(data.new_discount);
				   new_discount_type = parseFloat(data.new_discount_type);
			  },
			error: function(){
			  bootbox.alert('<?php echo $this->lang->line('discount_request_failed'); ?>');
			  return false;
			}
		});
		if(new_discount_type == 2){ new_discount_rate = new_discount_rate; }
		<?php if(DISCOUNT_METHOD == 1) { ?> 
		if(new_discount_type == 1){ new_discount_rate = (total*new_discount_rate)/100; }
		<?php } ?>
		<?php if(DISCOUNT_METHOD == 2) { ?> 
		if(new_discount_type == 1){ new_discount_rate = ((total+total_tax1+total_tax2)*new_discount_rate)/100; }
		<?php } ?>
		total_discount = new_discount_rate;

		<?php } ?>
		
			
		gtotal = ((total + total_tax1 + total_tax2) - total_discount) + shipping;
		$('#total').val(total.toFixed(2));
		$('#tds').val(total_discount.toFixed(2));
		$('#ttax1').val(total_tax1.toFixed(2));
		$('#ttax2').val(total_tax2.toFixed(2));
		$('#gtotal').val(gtotal.toFixed(2));
			
		});
		
		<?php if(DISCOUNT_OPTION == 2) { ?>
	
		$("#dyTable").on("focus", 'select[id^="discount-"]', function() {
			odsval = $(this).val();
		});
		 
		$("#dyTable").on("change", 'select[id^="discount-"]', function() {
			var selID=$(this).attr('id');
			var sl_id = selID.split("-");
 			var rw_no = sl_id[1];
			var ntval = $(this).val();
			var p1 = $('#price-'+rw_no);
			var q1 = $('#quantity-'+rw_no);
				
		 	var price = parseFloat(p1.val());
		 	var quantity = parseInt(q1.val());
		 	var row_price = price * quantity;
			
		var ndsval = $(this).val();
		$.ajax({
				type: "get",
				async: false,
				url: "index.php?module=sales&view=discounts",
				data: { id: ndsval, old_id: odsval },
				dataType: "json",
				success: function(data) {
					   new_discount_rate = parseFloat(data.new_discount);
				   	   new_discount_type = parseFloat(data.new_discount_type);
					   old_discount_rate = parseFloat(data.old_discount);
				   	   old_discount_type = parseFloat(data.old_discount_type);
				  },
				error: function(){
				  bootbox.alert('<?php echo $this->lang->line('discount_request_failed'); ?>');
				  return false;
				}
		});	
		
		<?php if(DISCOUNT_METHOD == 1) { ?> 
		if(old_discount_type == 2) { opr_discount =  old_discount_rate * quantity; }
		if(old_discount_type == 1) { opr_discount =  (row_price * old_discount_rate)/100; }  
		if(new_discount_type == 2) { npr_discount =  new_discount_rate * quantity; }
		if(new_discount_type == 1) { npr_discount =  (row_price * new_discount_rate)/100; }
		<?php } ?>
		
		<?php if(DISCOUNT_METHOD == 2) { ?> 
		var nt = $('#tax_rate-'+rw_no).val();
		$.ajax({
				type: "get",
				async: false,
				url: "index.php?module=sales&view=tax_rates",
				data: { id: nt },
				dataType: "json",
				success: function(data) {
					   new_tax_rate = parseFloat(data.new_tax_rate);
				   	   new_tax_type = parseFloat(data.new_tax_type);
				  },
				error: function(){
				  bootbox.alert('<?php echo $this->lang->line('tax_request_failed'); ?>');
				  return false;
				}
		});
		
		if(new_tax_type == 2){ pr_tax = new_tax_rate; }
		if(new_tax_type == 1){ pr_tax = (row_price*new_tax_rate)/100; }
		
		if(old_discount_type == 2) { opr_discount =  old_discount_rate * quantity; }
		if(old_discount_type == 1) { opr_discount =  ((row_price + pr_tax) * old_discount_rate)/100; }  
		if(new_discount_type == 2) { npr_discount =  new_discount_rate * quantity; }
		if(new_discount_type == 1) { npr_discount =  ((row_price + pr_tax) * new_discount_rate)/100; }
			
		<?php } ?>
		
		total_discount -= opr_discount;
		total_discount += npr_discount;
		
		gtotal = ((total + total_tax1 + total_tax2) - total_discount) + shipping;
		$('#tds').val(total_discount.toFixed(2));
		$('#gtotal').val(gtotal.toFixed(2));
		odsval = ndsval;
		
		});
		<?php } ?>
		$('#shipping').change( function() {
			shipping =parseFloat($(this).val());
			gtotal = ((total + total_tax1 + total_tax2) - total_discount) + shipping;
			$('this').val(shipping.toFixed(2));
			$('#gtotal').val(gtotal.toFixed(2));
		});
		$('#customer_l').on('click', function(){ setTimeout(function(){ $('#customer_s').trigger('liszt:open');	}, 0); });
		$('#biller_l').on('click', function(){ setTimeout(function(){ $('#biller_s').trigger('liszt:open'); }, 0); });
		$('#warehouse_l').on('click', function(){ setTimeout(function(){ $('#warehouse_s').trigger('liszt:open'); }, 0); });
		$('#discount_l').on('click', function(){ setTimeout(function(){ $('#discount_s').trigger('liszt:open'); }, 0); });
		$('#tax2_l').on('click', function(){ setTimeout(function(){ $('#tax2_s').trigger('liszt:open'); }, 0); });
		$('#code, #name').tooltip({ placement: "top", trigger: "focus" });
		$("#add_options").draggable({ refreshPositions: true });
		
		$('#byTab a, #noteTab a').click(function (e) {
    		e.preventDefault();
    		$(this).tab('show');
    	})
		
		//For Product Name
		$('#byTab a:last, #noteTab a:last').tab('show');
		
		//For Barcode Scanner Please uncommetn the below 3 lines just remove the // only
		//$('#byTab a:first, #noteTab a:last').tab('show');
		//$('#by_name').removeClass('active');
		//$('#by_code').addClass('active');

});
</script>

<?php if($message) { echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>"; } ?>

	<h3 class="title"><?php echo $page_title; ?></h3>
	<p><?php echo $this->lang->line("enter_info"); ?></p>
    
	<?php $attrib = array('class' => 'form-horizontal', 'id' => 'addSale_form'); echo form_open("module=itemkits&view=add", $attrib); ?>
<div class="control-group">
  <label class="control-label" for="date"><?php echo $this->lang->line("date"); ?></label>
  <div class="controls"> <?php echo form_input($date, (isset($_POST['date']) ? $_POST['date'] : ""), 'class="span4" id="date" required="required" data-error="'.$this->lang->line("date").' '.$this->lang->line("is_required").'"');?></div>
</div>
<div class="control-group">
  <label class="control-label" for="itemkit_no"><?php echo $this->lang->line("itemkit_no"); ?></label>
  <div class="controls"> <?php echo form_input('itemkit_no', (isset($_POST['itemkit_no']) ? $_POST['itemkit_no'] : $rnumber), 'class="span4 tip" id="itemkit_no" required="required" data-error="'.$this->lang->line("itemkit_no").' '.$this->lang->line("is_required").'"'); ?> </div>
</div>
<div class="control-group">
  <label class="control-label" for="itemkit_name"><?php echo $this->lang->line("itemkit_name"); ?></label>
  <div class="controls"> <?php echo form_input($itemkit_name, (isset($_POST['itemkit_name']) ? $_POST['itemkit_name'] : ""), 'class="span4" id="itemkit_name" required="required" data-error="'.$this->lang->line("itemkit_name").' '.$this->lang->line("is_required").'"');?></div>
</div>
<!-- Issue #1 - Mone hide sa parski pas bizin sa zistoir la lr form la - Hyder - 17 June 2014 - START -->
<div class="control-group" style="display: none;">
  <label class="control-label" for="itemkit_unit"><?php echo $this->lang->line("itemkit_unit"); ?></label>
  <div class="controls">
      <input type="text" data-error="Itemkit Unit is required or need attention." required="required" class="span4" id="itemkit_unit" value="0" name="itemkit_unit">
  </div>
</div>
<!-- Issue #1 - Mone hide sa parski pas bizin sa zistoir la lr form la - Hyder - 17 June 2014 -END -->


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
            <div class="tab-pane tab-bg" id="by_code" > <?php echo form_input('code', '', 'class="input-block-level" id="code" placeholder="'.$this->lang->line("barcode_scanner").'" title="'. $this->lang->line("use_barcode_scanner_tip") .'"');?> </div>
            <div class="tab-pane tab-bg active" id="by_name"> <?php echo form_input('name', '', 'class="input-block-level" id="name" placeholder="'.$this->lang->line("product_name").'" title="'. $this->lang->line("au_pr_name_tip") .'"');?> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<div class="control-group table-group">
<label class="control-label table-label"><?php echo $this->lang->line("items"); ?></label>
  <div class="controls table-controls">
<table id="dyTable" class="table items table-striped table-bordered table-condensed table-hover">
  <thead>
      <th class="span5"><?php echo $this->lang->line("product_name")." (".$this->lang->line("product_code").")"; ?></th>

      <!-- Issue #1 - Mone hide sa parski pas bizin sa zistoir la lr form la - Hyder - 17 June 2014 - START -->
   <!--  <?php if(DISCOUNT_OPTION == 2) { echo '<th class="span2">'.$this->lang->line("discount").'</th>'; } ?>
  <?php if(TAX1) { echo '<th class="span2">'.$this->lang->line("tax_rate").'</th>'; } ?> -->
      <!-- Issue #1 - Mone hide sa parski pas bizin sa zistoir la lr form la - Hyder - 17 June 2014 - END -->


      <th class="span2"><?php echo $this->lang->line("quantity"); ?></th>
      <th class="span2"><?php echo $this->lang->line("unit_price"); ?></th>
    <th style="width: 20px;"><i class="icon-trash" style="opacity:0.5; filter:alpha(opacity=50);"></i></th>
      </thead>
  <tbody></tbody>
</table>
	</div>
</div>  
<div class="row-fluid"> 
<div class="span7">
<div class="control-group">
</div>
<div class="control-group">
</div>

<div class="control-group">
  <label class="control-label" id="gift_one_l"><?php echo $this->lang->line("gift_one"); ?></label>
  <div class="controls"> 
  <?php 
  
	 $whx1[''] = '';


	  foreach($products as $product_name){
 		   $whx1[$product_name->id] = $product_name->name; // Issue #1 - Hyder - 18 June 2014 - Mone ajoute productid ladans
		}
		echo form_dropdown('gift_one', $whx1, (isset($_POST['gift_one']) ? $_POST['gift_one'] : DEFAULT_GIFT_ONE), 'id="gift_one_s" data-placeholder="'.$this->lang->line("select").' '.$this->lang->line("gifts").'" "'); 
  ?> 
</div>
</div>

<div class="control-group">
  <label class="control-label" id="gift_two_l"><?php echo $this->lang->line("gift_two"); ?></label>
  <div class="controls"> 
  <?php 
  
	 $whx2[''] = '';
	  foreach($products as $product_name){
 		   $whx2[$product_name->id] = $product_name->name;// Issue #1 - Hyder - 18 June 2014 - Mone ajoute productid ladans
		}
		echo form_dropdown('gift_two', $whx2, (isset($_POST['gift_two']) ? $_POST['gift_two'] : DEFAULT_GIFT_TWO), 'id="gift_two_s" data-placeholder="'.$this->lang->line("select").' '.$this->lang->line("gifts").'" "'); 
  ?> 
</div>
</div>

<div class="control-group">
  <label class="control-label" id="gift_three_l"><?php echo $this->lang->line("gift_three"); ?></label>
  <div class="controls"> 
  <?php 
  
	 $whx3[''] = '';
	  foreach($products as $product_name){
 		   $whx3[$product_name->id] = $product_name->name; // Issue #1 - Hyder - 18 June 2014 - Mone ajoute productid ladans
		}
		echo form_dropdown('gift_three', $whx3, (isset($_POST['gift_three']) ? $_POST['gift_three'] : DEFAULT_GIFT_THREE), 'id="gift_three_s" data-placeholder="'.$this->lang->line("select").' '.$this->lang->line("gifts").'" "'); 
  ?> 
</div>
</div>


<!-- 21 June 2014 - Hyder - Added two more field for gifts -  START -->
    <div class="control-group">
        <label class="control-label" id="gift_four_l">Gift-No. Four</label>
        <div class="controls">
            <?php

            $whx3[''] = '';
            foreach($products as $product_name){
                $whx3[$product_name->id] = $product_name->name; // Issue #1 - Hyder - 18 June 2014 - Mone ajoute productid ladans
            }
            echo form_dropdown('gift_four', $whx3, (isset($_POST['gift_four']) ? $_POST['gift_four'] : DEFAULT_GIFT_THREE), 'id="gift_four_s" data-placeholder="'.$this->lang->line("select").' '.$this->lang->line("gifts").'" "');
            ?>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" id="gift_five_l">Gift-No. Five</label>
        <div class="controls">
            <?php

            $whx3[''] = '';
            foreach($products as $product_name){
                $whx3[$product_name->id] = $product_name->name; // Issue #1 - Hyder - 18 June 2014 - Mone ajoute productid ladans
            }
            echo form_dropdown('gift_five', $whx3, (isset($_POST['gift_five']) ? $_POST['gift_five'] : DEFAULT_GIFT_THREE), 'id="gift_five_s" data-placeholder="'.$this->lang->line("select").' '.$this->lang->line("gifts").'" "');
            ?>
        </div>
    </div>
    <!-- 21 June 2014 - Hyder - Added two more field for gifts -  END -->


    <!-- Issue #1 - Mone hide sa parski pas bizin sa zistoir la lr form la - Hyder - 17 June 2014 - START -->
<div class="control-group" style="display: none;">
  <label class="control-label" for="start_date"><?php echo $this->lang->line("start_date"); ?></label>
  <div class="controls"> <?php echo form_input($start_date, (isset($_POST['start_date']) ? $_POST['start_date'] : ""), 'class="span4" id="start_date" required="required" data-error="'.$this->lang->line("start_date").' '.$this->lang->line("is_required").'"');?></div>
</div>
<div class="control-group" style="display: none;">
  <label class="control-label" for="end_date"><?php echo $this->lang->line("end_date"); ?></label>
  <div class="controls"> <?php echo form_input($end_date, (isset($_POST['end_date']) ? $_POST['end_date'] : ""), 'class="span4" id="end_date" required="required" data-error="'.$this->lang->line("end_date").' '.$this->lang->line("is_required").'"');?></div>
</div>
    <!-- Issue #1 - Mone hide sa parski pas bizin sa zistoir la lr form la - Hyder - 17 June 2014 - END  -->
<div class="control-group">
<label class="control-label"><?php echo $this->lang->line("note"); ?></label>
  <div class="controls fancy-tab-container">

<ul class="nav nav-tabs two-tabs fancy" id="noteTab">
<li class="active"><a href="#internal"><?php echo $this->lang->line('internal_note'); ?></a></li>
<li><a href="#onitemkit"><?php echo $this->lang->line('on_item_note'); ?></a></li>
</ul>
 
<div class="tab-content">

<div class="tab-pane active" id="internal">
<?php echo form_textarea('internal_note', (isset($_POST['internal_note']) ? $_POST['internal_note'] : ""), 'class="input-block-level" id="internal_note" style="margin-top: 10px; height: 100px;"');?>
 <div class="clearfix"></div>
</div>
<div class="tab-pane" id="onitemkit">
 <?php echo form_textarea('note', (isset($_POST['note']) ? $_POST['note'] : ""), 'class="input-block-level" id="note" style="margin-top: 10px; height: 100px;"');?> 
 <div class="clearfix"></div>
 </div>
</div>
</div>
<div class="clearfix"></div>
</div>

</div>
<div class="span5">

<div class="control-group inverse" style="margin-bottom:5px; cursor: default;">
  <label class="control-label" style="cursor: default;"><?php echo $this->lang->line("total"); ?></label>
  <div class="controls"> <?php echo form_input('dummy_sales', '', 'class="input-block-level text-right" id="total" disabled');?>
  </div>
</div> 
<div class="control-group inverse" style="margin-bottom:5px;">
  <label class="control-label" for="new_price"><?php echo $this->lang->line("new_price"); ?></label>
  <div class="controls"> <?php echo form_input($new_price, (isset($_POST['new_price']) ? $_POST['new_price'] : ""), 'class="input-block-level text-right" id="new_price" required="required" data-error="'.$this->lang->line("new_price").' '.$this->lang->line("is_required").'"');?></div>
</div>

 

</div>
</div>

<div class="control-group"><div class="controls"><?php echo form_submit('submit', $this->lang->line("submit"), 'class="btn btn-primary" style="padding: 6px 15px;"');?></div></div>
<?php echo form_close();?> 
