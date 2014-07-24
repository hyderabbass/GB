<script src="<?php echo base_url(); ?>assets/media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
<style type="text/css">
#wrapper { width: 250px; margin: 0 auto; text-align:center; color:#000; font-family: Arial, Helvetica, sans-serif; font-size:12px; height: 80%; }

.text_filter {
	width: 100% !important;
	font-weight: normal !important;
	border: 0 !important;
	box-shadow: none !important;
	border-radius: 0 !important;
	padding:0 !important;
	margin:0 !important;
	font-size: 1em !important;
}
.select_filter {
	width: 100% !important;
	padding:0 !important;
	height: auto !important;
	margin:0 !important;
}
.table td {
	width: 12.5%;
	display: table-cell;
}
.table th {
	text-align: center;
}
.table td:nth-child(5), .table tfoot th:nth-child(5), .table td:nth-child(6), .table tfoot th:nth-child(6), .table td:nth-child(7), .table tfoot th:nth-child(7) {
	text-align:right;
}
</style>

<style type="text/css" media="print">
#buttons { display: none; }
</style>
<script>
             $(document).ready(function() {
                $('#fileData').dataTable( {
					"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "aaSorting": [[ 0, "desc" ]],
                    "iDisplayLength": <?php echo ROWS_PER_PAGE; ?>,
					'bProcessing'    : true,
					'bServerSide'    : true,
					'sAjaxSource'    : '<?php echo base_url(); ?>index.php?module=reports&view=getpendingcustomer',
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
					  null,
					  null,
					  null,
					  null,
					  null,
                      null, 

					  { "bSortable": false }
					]
					
                } ).columnFilter({ aoColumns: [
                                                            //{ type: "text", bRegex:true },
															//null, null, null, null, null, null, null, null,
															{ type: "text", bRegex:true },
															{ type: "text", bRegex:true },
															{ type: "text", bRegex:true },
															{ type: "text", bRegex:true },
															{ type: "text", bRegex:true },
															{ type: "text", bRegex:true },
                                                            { type: "text", bRegex:true },
															null
                                                            
                                                        ]});
				
            } );
                    
</script>

<?php if($success_message) { echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $success_message . "</div>"; } ?>
<?php if($message) { echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>"; } ?>


	<h3 class="title"><?php echo $page_title; ?></h3>
	<p class="introtext"><?php echo $this->lang->line("list_results"); ?></p>
	
	<table id="fileData" cellpadding=0 cellspacing=10 class="table table-bordered table-hover table-striped">
		<thead>
        <tr>
			<th><?php echo $this->lang->line("name"); ?></th>
			<th><?php echo $this->lang->line("company"); ?></th>
            <th><?php echo $this->lang->line("home_number"); ?></th>
            <th><?php echo $this->lang->line("mobile_number"); ?></th>
			<th><?php echo $this->lang->line("email_address"); ?></th>
            <th><?php echo $this->lang->line("coordinator_name"); ?></th>
            <th><?php echo $this->lang->line("status"); ?></th>
            <th style="width:45px;"><?php echo $this->lang->line("actions"); ?></th>
		</tr>
        </thead>
		<tbody>
			<tr>
            	<td colspan="8" class="dataTables_empty">Loading data from server</td>
			</tr>
        </tbody>
        <tfoot>
        <tr>
			<th>[<?php echo $this->lang->line("name"); ?>]</th>
			<th>[<?php echo $this->lang->line("company"); ?>]</th>
            <th>[<?php echo $this->lang->line("home_number"); ?>]</th>
            <th>[<?php echo $this->lang->line("mobile_number"); ?>]</th>
			<th>[<?php echo $this->lang->line("email_address"); ?>]</th>
            <th>[<?php echo $this->lang->line("coordinator_name"); ?>]</th>
            <th>[<?php echo $this->lang->line("status"); ?>]</th>
            <th style="width:45px;"><?php echo $this->lang->line("actions"); ?></th>
		</tr>
        </tfoot>
	</table>


