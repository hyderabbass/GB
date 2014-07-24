<script src="<?php echo $this->config->base_url(); ?>assets/media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
<style type="text/css">
.text_filter { width: 100% !important; border: 0 !important; box-shadow: none !important;  border-radius: 0 !important;  padding:0 !important; margin:0 !important; }
.select_filter { width: 100% !important; padding:0 !important; height: auto !important; margin:0 !important;}
</style>
<script>
             $(document).ready(function() {
                function format_date(oObj, type, full) {
					//var sValue = oObj.aData[oObj.iDataColumn]; 
					var aDate = oObj.split('-');
					<?php if(JS_DATE == 'dd-mm-yyyy') { ?>
					return aDate[2] + "-" + aDate[1] + "-" + aDate[0];
					<?php } elseif(JS_DATE == 'dd/mm/yyyy') { ?>
					return aDate[2] + "/" + aDate[1] + "/" + aDate[0];
					<?php } elseif(JS_DATE == 'mm/dd/yyyy') { ?>
					return aDate[1] + "/" + aDate[2] + "/" + aDate[0];
					<?php } elseif(JS_DATE == 'mm-dd-yyyy') { ?>
					return aDate[1] + "-" + aDate[2] + "-" + aDate[0];
					<?php } else { ?>
					return sValue;
					<?php } ?>
				}
    
				function currencyFormate(x) {
					var parts = x.split(".");
				   return  parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",")+(parts[1] ? "." + parts[1] : ".00");
					 
				}
                $('#fileData').dataTable( {
					"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "aaSorting": [[ 0, "desc" ]],
                    "iDisplayLength": <?php echo ROWS_PER_PAGE; ?>,
					'bProcessing'    : true,
					'bServerSide'    : true,
					'sAjaxSource'    : '<?php echo base_url(); ?>index.php?module=reports&view=getPromotions',
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
			            { "mRender": format_date },
                        { "mRender": format_date }, 
                        { "mRender": currencyFormate }, 
                        { "mRender": currencyFormate },
                        
					  { "bSortable": false }

					]
					
                } )
				
            } );
                    
</script>

<?php if($success_message) { echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $success_message . "</div>"; } ?>
<?php if($message) { echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>"; } ?>


	<h3 class="title"><?php echo $page_title; ?></h3>
	<p class="introtext"><?php echo $this->lang->line("list_results"); ?></p>
	
	<table id="fileData" cellpadding=0 cellspacing=10 class="table table-bordered table-hover table-striped">
		<thead>
        <tr>
            <th><?php echo $this->lang->line("product_name"); ?></th>
			<th><?php echo $this->lang->line("start_date"); ?></th>
            <th><?php echo $this->lang->line("end_date"); ?></th>
            <th><?php echo $this->lang->line("normal_price"); ?></th>
			<th><?php echo $this->lang->line("discount_price"); ?></th>
            <th style="width:135px; text-align:center;"><?php echo $this->lang->line("actions"); ?></th>
		</tr>
        </thead>
		<tbody>
			<tr>
            	<td colspan="7" class="dataTables_empty">Loading data from server</td>
			</tr>
        </tbody>
        <tfoot>
        <tr>
			<th>[<?php echo $this->lang->line("product_name"); ?>]</th>
			<th>[<?php echo $this->lang->line("start_date"); ?>]</th>
            <th>[<?php echo $this->lang->line("end_date"); ?>]</th>
            <th>[<?php echo $this->lang->line("normal_price"); ?>]</th>
			<th>[<?php echo $this->lang->line("discount_price"); ?>]</th>
            <th style="width:135px; text-align:center;"><?php echo $this->lang->line("actions"); ?></th>
		</tr>
        </tfoot>
	</table>
	
	<p><a href="<?php echo site_url('module=promotions&view=add');?>" class="btn btn-primary"><?php echo $this->lang->line("add_promotion"); ?></a></p>
