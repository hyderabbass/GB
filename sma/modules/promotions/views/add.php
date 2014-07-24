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
<script src="<?php echo $this->config->base_url(); ?>assets/media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
<style type="text/css">
.text_filter { width: 100% !important; border: 0 !important; box-shadow: none !important;  border-radius: 0 !important;  padding:0 !important; margin:0 !important; }
.select_filter { width: 100% !important; padding:0 !important; height: auto !important; margin:0 !important;}
</style>
<script src="<?php echo $this->config->base_url(); ?>assets/js/jquery-ui.js"></script>
<script src="<?php echo $this->config->base_url(); ?>assets/js/validation.js"></script>
<script type="text/javascript">
$(document).ready(function(){
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
    
    $('#product_name_l').on('click', function(){ setTimeout(function(){ $('#product_name_s').trigger('liszt:open'); }, 0); });

    $('#productChkBox').change(function(){
     if($(this).attr('checked')){
          $(this).val('TRUE');
     }else{
          $(this).val('FALSE');
     }
   });

$('#fileData').dataTable( {
					"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "aaSorting": [[ 0, "desc" ]],
                    "iDisplayLength": <?php echo ROWS_PER_PAGE; ?>,
					'bProcessing'    : true,
					'bServerSide'    : true,
					'sAjaxSource'    : '<?php echo base_url(); ?>index.php?module=promotions&view=getdatatableajax',
					'fnServerData': function(sSource, aoData, fnCallback)
					{
						aoData.push( { "name": "<?php echo $this->security->get_csrf_token_name(); ?>", "value": "<?php echo $this->security->get_csrf_hash() ?>" } );
					  $.ajax
					  ({
						'dataType': 'json',
						'type'    : 'POST',
						'url'     : sSource,
						'data'    : aoData,
						'success' : fnCallback
					  });
					},	
					"oTableTools": {
						"sSwfPath": "assets/media/swf/copy_csv_xls_pdf.swf",
						"aButtons": [
								// "copy",
								"csv",
								"xls",
								{
									"sExtends": "pdf",
									"sPdfOrientation": "landscape",
									"sPdfMessage": ""
								},
								"print"
						]
					},
					"oLanguage": {
					  "sSearch": "Filter: "
					},
					"aoColumns": [ 
                        null,
                        { "mRender": currencyFormate }, 
                        { "mRender": currencyFormate }

					]
					
                } )


});
</script>
<?php if($success_message) { echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $success_message . "</div>"; } ?>
<?php if($message) { echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>"; } ?>


	<h3 class="title"><?php echo $page_title; ?></h3>
    
	<?php $attrib = array('class' => 'form-horizontal', 'id' => 'addSale_form'); echo form_open("module=promotions&view=add", $attrib); ?>


	<p class="introtext"><?php echo $this->lang->line("enter_info"); ?></p>
    
    <div class="control-group">
  <label class="control-label" for="start_date"><?php echo $this->lang->line("start_date"); ?></label>
  <div class="controls"> <?php echo form_input($start_date, (isset($_POST['start_date']) ? $_POST['start_date'] : $rnumber), 'class="span4 tip" id="start_date" required="required" data-error="'.$this->lang->line("start_date").' '.$this->lang->line("is_required").'"'); ?> </div>
</div>
<div class="control-group">
  <label class="control-label" for="end_date"><?php echo $this->lang->line("end_date"); ?></label>
  <div class="controls"> <?php echo form_input($end_date, (isset($_POST['end_date']) ? $_POST['end_date'] : ""), 'class="span4" id="end_date" required="required" data-error="'.$this->lang->line("end_date").' '.$this->lang->line("is_required").'"');?></div>
</div>    
	
	<table id="fileData" cellpadding=0 cellspacing=10 class="table table-bordered table-hover table-striped">
		<thead>
        <tr>
            <th><?php echo $this->lang->line("product_id"); ?></th>
            <th><?php echo $this->lang->line("product_name"); ?></th>
            <th><?php echo $this->lang->line("normal_price"); ?></th>
			<th><?php echo $this->lang->line("discount_price"); ?></th>
		</tr>
        </thead>
		<tbody>
            

<?php

 $whx[''] = '';
	  foreach($products as $product_name) {
     
?>
             
    <tr>
    
            <td>
                <div class="control-group">
                    <div class="controls">
                     <?php echo form_hidden('product_id', $product_name->id , 'class="span11" id="product_id" "'); ?>
                     <?php echo $product_name->id;?>
                    </div>
                </div>
              </td>
    
  	          <td>
                <div class="control-group">
                    <div class="controls">
                     <?php echo form_hidden('product_name', $product_name->name , 'class="span11" id="product_name" "'); ?>
                     <?php echo $product_name->name;?>
                    </div>
                </div>
              </td>
                
              <td>
                 <div class="control-group">
                    <div class="controls">
                    <?php echo form_hidden('normal_price', $product_name->price); ?>
                    <?php echo $product_name->price;?>
                    </div>
                 </div>
              </td>
              
              <td>
              
                 <?php  $data = array(
              'name'        => 'discount_price_'.$product_name->id.'_'. $product_name->price,
              'id'          => 'discount_price_'.$product_name->id.'_'. $product_name->price
              );

                echo form_input($data);
               
             
               
               


                
                
              // var_dump(explode(',', $data));
               // echo $pieces[0]; // piece1
               // echo $pieces[1]; // piece2
               // echo $pieces[2]; // piece3
                ?>
              </td>
    
    </tr>
            
	
	
        </tbody>
        <!--<tfoot>
        <tr>
            <th>[<?php echo $this->lang->line("product_id"); ?>]</th>
			<th>[<?php echo $this->lang->line("product_name"); ?>]</th>
            <th>[<?php echo $this->lang->line("normal_price"); ?>]</th>
			<th>[<?php echo $this->lang->line("discount_price"); ?>]</th>
		</tr>   
        </tfoot>-->
        <?php 	}?>   
	</table>
    
    



<?php if(DISCOUNT_OPTION == 1) { ?>
<div class="control-group">
  <label class="control-label" id="discount_l"><?php echo $this->lang->line("discount"); ?></label>
  <div class="controls">  <?php 
	  $ds[""] = "";
	   		foreach($discounts as $discount){
				$ds[$discount->id] = $discount->name;
			}
		echo form_dropdown('inv_discount', $ds, (isset($_POST['inv_discount']) ? $_POST['inv_discount'] : DEFAULT_DISCOUNT), 'id="discount_s" data-placeholder="'.$this->lang->line("select").' '.$this->lang->line("discount").'" required="required" data-error="'.$this->lang->line("discount").' '.$this->lang->line("is_required").'"'); ?> </div>
</div>
<?php } ?>


<div class="clearfix"></div>

<div class="row-fluid"> 
<div class="span7">
<div class="control-group">
</div>
<div class="control-group">
</div>



</div>
<div class="span5">

 

</div>
</div>

<div class="control-group"><div class="controls"><?php echo form_submit('submit', $this->lang->line("submit"), 'class="btn btn-primary" style="padding: 6px 15px;"');?></div></div>
<?php echo form_close();?> 
