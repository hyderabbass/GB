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
.table td:nth-child(1), .table tfoot th:nth-child(1), .table td:nth-child(2), .table tfoot th:nth-child(2), .table td:nth-child(3), .table tfoot th:nth-child(3) {
	text-align:right;
}
</style>

<style type="text/css" media="print">
#buttons { display: none; }
</style>
<script>
             $(document).ready(function() {
	
				function currencyFormate(x) {
					var parts = x.toString().split(".");
				   return  parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",")+(parts[1] ? "." + parts[1] : ".00");
					 
				}
                $('#fileData').dataTable( {
					"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "aaSorting": [[ 1, "desc" ]],
                    "iDisplayLength": <?php echo ROWS_PER_PAGE; ?>,
					'bProcessing'    : true,
					'bServerSide'    : true,
					'sAjaxSource'    : '<?php echo base_url(); ?>index.php?module=reports&view=getconsultants',
					'fnServerData': function(sSource, aoData, fnCallback, fnFooterCallback)
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
								{
									"sExtends": "csv",
									"sFileName": "<?php echo $this->lang->line("sales"); ?>.csv",
                   		 			"mColumns": [ 0, 1, 2, 3, 4, 5, 6 ]
								},
								{
									"sExtends": "pdf",
									"sFileName": "<?php echo $this->lang->line("sales"); ?>.pdf",
									"sPdfOrientation": "landscape",
                   		 			"mColumns": [ 0, 1, 2, 3, 4, 5, 6 ]
								},
								"print"
						]
					},
					"aoColumns": [ 
					   null, null, { "mRender": currencyFormate }
					],
					
					"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
						var row_total = 0; tax_total =0; tax2_total = 0;
						for ( var i=0 ; i<aaData.length ; i++ )
						{
							//tax_total += parseFloat(aaData[ aiDisplay[i] ][4]);
							tax2_total += parseFloat(aaData[ aiDisplay[i] ][1]);
							row_total += parseFloat(aaData[ aiDisplay[i] ][2]);
						}
						
						var nCells = nRow.getElementsByTagName('th');
					//	nCells[4].innerHTML = currencyFormate(parseFloat(tax_total).toFixed(2));
					//	nCells[5].innerHTML = currencyFormate(parseFloat(tax2_total).toFixed(2));
						nCells[2].innerHTML = currencyFormate(parseFloat(row_total).toFixed(2));
					}
					
                } ).columnFilter({ aoColumns: [

						{ type: "text", bRegex:true },
						{ type: "text", bRegex:true },
						{ type: "text", bRegex:true },
						{ type: "text", bRegex:true },
						null, null, null, null
                     ]});
				
            } );
                    
</script>
<?php if($message) { echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>"; } ?>
<?php if($success_message) { echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $success_message . "</div>"; } ?>


<h3 class="title"><?php echo $page_title; ?></h3>
<p class="introtext"><?php echo $this->lang->line("list_results"); ?></p>

  <div id="wrapper">
    <div id="buttons" style="padding-top:10px; text-transform:uppercase;">
        <span class="right"><button type="button" onClick="window.print();return false;" style="width:80%; cursor:pointer; font-size:12px; background-color:#91B5FF; color:#000; text-align: center; border:0px solid #FFA93C; padding: 10px 1px; border-radius:5px;">Click Here to Print Report</button></span>
        <div style="clear:both;"></div>
    </div>    
  </div>
  <br />

<table id="fileData" class="table table-bordered table-hover table-striped table-condensed" style="margin-bottom: 5px;">
  <thead>
    <tr>
      <th><?php echo $this->lang->line("teamleader"); ?></th>
      <th><?php echo $this->lang->line("customer"); ?></th>
      <th><?php echo $this->lang->line("total"); ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="4" class="dataTables_empty"><?php echo $this->lang->line("loading_data"); ?></td>
    </tr>
  </tbody>
  <tfoot>
    <tr> 
      <th><?php echo $this->lang->line("teamleader"); ?></th>        
      <th>[<?php echo $this->lang->line("customer"); ?>]</th>
      <th><?php echo $this->lang->line("total"); ?></th>
    </tr>
  </tfoot>
</table>


