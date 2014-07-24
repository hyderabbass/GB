<script src="<?php echo base_url(); ?>assets/media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
<style type="text/css">
#wrapper{ 
    float: left;
    margin: 26px 0;
    padding: 10px;
    width: 940px;
    height: 100px;
    border: 0px solid #FFA93C; 
    font-size:12px;  
}

.content1{
	background:#5CBAF0;
    padding-top: 8px; 
    border-radius:5px;
}

.content2{
	background:#7FD0FF;
    padding-top: 8px;
    border-radius:5px;
}


h2{
	color:#ffffff;
    padding-left: 5px;
}

</style>

<script>
             $(document).ready(function() {
                $('#fileData').dataTable( {
					'bProcessing'    : true,
					'bServerSide'    : true,
					'sAjaxSource'    : '<?php echo base_url(); ?>index.php?module=reports&view=bestresult',
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
					}
					
					}
					
                } ));
                    
</script>
<?php if($message) { echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>"; } ?>
<?php if($success_message) { echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $success_message . "</div>"; } ?>


<h3 class="title"><?php echo $page_title; ?></h3>


  <div id="wrapper">
  
  <div class="content1">
   <h2><?php echo $this->lang->line("best_item").' '.$best_item;?></h2> 
  </div>

 <div class="content2">
   <h2><?php echo $this->lang->line("best_consultant").' '.$best_consultant;?></h2> 
  </div>

<div class="content1">
   <h2><?php echo $this->lang->line("best_seller_by_brand");?></h2> 
  </div>

<div class="content2">
   <h2><?php echo $this->lang->line("best_seller_by_catalogue");?></h2> 
  </div>
  
  <div class="content1">
   <h2><?php echo $this->lang->line("best_customer").' '.$best_customer;?></h2> 
  </div>
  
</div>

