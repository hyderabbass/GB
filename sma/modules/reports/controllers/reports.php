<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends MX_Controller {

/*
| -----------------------------------------------------
| PRODUCT NAME: 	STOCK MANAGER ADVANCE 
| -----------------------------------------------------
| AUTHER:			MIAN SALEEM 
| -----------------------------------------------------
| EMAIL:			saleem@tecdiary.com 
| -----------------------------------------------------
| COPYRIGHTS:		RESERVED BY TECDIARY IT SOLUTIONS
| -----------------------------------------------------
| WEBSITE:			http://tecdiary.net
| -----------------------------------------------------
|
| MODULE: 			REPORTS
| -----------------------------------------------------
| This is reports module controller file.
| -----------------------------------------------------
*/

	 
	function __construct()
	{
		parent::__construct();
		
		// check if user logged in 
		if (!$this->ion_auth->logged_in())
	  	{
			redirect('module=auth&view=login');
	  	}
		
		$this->load->model('reports_model');

	}
	
   function index()
   {
	   
	   $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
	   
      $meta['page_title'] = $this->lang->line("reports");
	  $data['page_title'] = $this->lang->line("reports");
      $this->load->view('commons/header', $meta);
      $this->load->view('content', $data);
      $this->load->view('commons/footer');
   }

    
   function dailysalesreport(){
      //$data['salesreports'] = $this->reports_model->getAllSales();
      $meta['page_title'] = $this->lang->line("daily_sales_report");
	  $data['page_title'] = $this->lang->line("daily_sales_report");
      $this->load->view('commons/header', $meta);
      $this->load->view('dailysalesreport', $data);
      $this->load->view('commons/footer');
   } 
    
    
    function getdatatableajax()
   {
 		if($this->input->get('search_term')) { $search_term = $this->input->get('search_term'); } else { $search_term = false;}
        $this->load->helper('date');
        $date = date("Y-m-d", strtotime("Today"));
       // echo 'DATE:XXXXXX:'.$date;
      //  die();
        $data = array(
            'status' => 'active',
            'date' => $date
           );

       /*#################################################################################*/
       /*#####################Abdallah - issue #10 - 07-07-2014  - START##################*/
       /*#################################################################################*/

       $this->load->library('datatables');
       $this->datatables
           ->select("sales.id as sid, date, paid_by, reference_no, customer_name, user, total_tax2, total, internal_note")
           ->from('sales')
           ->where($data);
       $this->datatables->add_column("Actions, sid, internal_note")
           ->unset_column('sid')
           ->unset_column('Actions')
           ->unset_column('internal_note');
       /*#################################################################################*/
       /*#####################Abdallah - issue #10 - 07-07-2014  - END####################*/
       /*#################################################################################*/
		
	   echo $this->datatables->generate();

   }
   
   function creditcustomer(){
      $meta['page_title'] = $this->lang->line("debtor_report");
	  $data['page_title'] = $this->lang->line("debtor_report");
      $this->load->view('commons/header', $meta);
      $this->load->view('creditcustomer', $data);
      $this->load->view('commons/footer');
   }
   
   function getcreditcustomer()
   {
  //   $this->output->enable_profiler(TRUE);
 		if($this->input->get('search_term')) { $search_term = $this->input->get('search_term'); } else { $search_term = false;}
        
        $where = "customers.id = sales.customer_id
                  AND 
                  sales.status = 'active'
                  AND
                  sales.paid_by = 'Credit'";
                  
           
	   $this->load->library('datatables');
	   $this->datatables
			->select("sales.id as sid, sales.date, sales.paid_by, sales.reference_no, sales.customer_name, customers.email, user, total, internal_note,blue")/* Hyder - mone ajoute blue - issue #29 */
			->from('sales ,customers')
            ->where($where);

       /*#################################################################################*/
       /*#####################Abdallah - issue #10 - 07-07-2014  - START##################*/
       /*#################################################################################*/

       $this->datatables->add_column("Actions",
           "<!--<center>
           <a href='#' title='$2' class='tip' data-html='true'><i class='icon-folder-close'></i></a> <a href='#' onClick=\"MyWindow=window.open('index.php?module=sales&view=view_invoice&id=$1', 'MyWindow','toolbar=0,location=0,directories=0,status=0,menubar=yes,scrollbars=yes,resizable=yes,width=1000,height=600'); return false;\" title='".$this->lang->line("view_invoice")."' class='tip'><i class='icon-fullscreen'></i></a>
			<a href='index.php?module=sales&view=add_delivery&id=$1' title='".$this->lang->line("add_delivery_order")."' class='tip'><i class='icon-road'></i></a>
			<a href='index.php?module=sales&view=pdf&id=$1' title='".$this->lang->line("download_pdf")."' class='tip'><i class='icon-file'></i></a>
			<a href='index.php?module=sales&view=email_invoice&id=$1' title='".$this->lang->line("email_invoice")."' class='tip'><i class='icon-envelope'></i></a>
			<a href='index.php?module=sales&amp;view=edit&amp;id=$1' title='".$this->lang->line("edit_invoice")."' class='tip'><i class='icon-edit'></i></a>
			<a href='index.php?module=sales&amp;view=delete&amp;id=$1' onClick=\"return confirm('". $this->lang->line('alert_x_invoice') ."')\" title='".$this->lang->line("delete_invoice")."' class='tip'><i class='icon-trash'></i></a>
			</center>-->",
           "sid, internal_note")
           /*#################################################################################*/
           /*#####################Abdallah - issue #10 - 07-07-2014  - END####################*/
           /*#################################################################################*/
		->unset_column('sid')
		->unset_column('internal_note');
		
	   echo $this->datatables->generate();
   //    echo $this->db->last_query();

   }
   
   
   function consultant(){
      $meta['page_title'] = $this->lang->line("consultant_report");
	  $data['page_title'] = $this->lang->line("consultant_report");
      $this->load->view('commons/header', $meta);
      $this->load->view('consultant', $data);
      $this->load->view('commons/footer');
   }
   
   function getconsultants()
   {
 		if($this->input->get('search_term')) { $search_term = $this->input->get('search_term'); } else { $search_term = false;}
        
        $where = "customers.id = sales.customer_id";
                  
           
	   $this->load->library('datatables');
	   $this->datatables
			->select("customers.id as sid, customers.coordinator_name, customers.name, sales.total, internal_note")
			->from('sales ,customers')
            ->where($where);
			$this->datatables->unset_column('sid')
            ->unset_column('internal_note');
		
	   echo $this->datatables->generate();

   }
   
      function pendingcustomer(){
      $meta['page_title'] = $this->lang->line("list_of_pending_customer");
	  $data['page_title'] = $this->lang->line("list_of_pending_customer");
      $this->load->view('commons/header', $meta);
      $this->load->view('pendingcustomer', $data);
      $this->load->view('commons/footer');
   }
   
   function getpendingcustomer()
   {
 		if($this->input->get('search_term')) { $search_term = $this->input->get('search_term'); } else { $search_term = false;}
        
        $where = 'pending';
                  
           
	   $this->load->library('datatables');
	   $this->datatables
			->select("id, name, company, home_number, mobile_number, email, coordinator_name, status")
			->from("customers")
            ->where('status',$where);
			$this->datatables->add_column("Actions", 
			"<center> 
			<a href='index.php?module=reports&amp;view=editpendingcustomer&amp;id=$1' title='".$this->lang->line("approve_customer")."' class='tip'><i class='icon-edit'></i></a>
			<a href='index.php?module=reports&amp;view=deletependingcustomer&amp;id=$1' title='".$this->lang->line("delete_pending_customer")."' class='tip'><i class='icon-trash'></i></a></center>", "id")
		
		->unset_column('id');
		
	   echo $this->datatables->generate();

   }
   
   
    
    function bestresult()
    {
     $data['sale_item'] = $this->reports_model->getSaleItems();
     $saleitems = $data['sale_item'];
     
     $data['consultant'] = $this->reports_model->getBestConsultant();
     $best_consultant = $data['consultant'];
     
     $data['customer'] = $this->reports_model->getBestCustomer();
     $best_customer = $data['customer'];
     
    // var_dump($best_consultant);
   //  die();

     /* Best Item sold*/
     $arr = (array) $saleitems;
     $result_count = count($arr);
     $sale_item_data_array = array();
     for($i=0;$i<=$result_count;$i++){
        $sale_item_data_array[] = $arr[$i]->product_name;
     }
     $count=array_count_values($sale_item_data_array);//Counts the values in the array, returns associatve array
     arsort($count);//Sort it from highest to lowest
     $keys=array_keys($count);//Split the array so we can find the most occuring key
     //echo "The most occuring value is $keys[0][1] with $keys[0][0] occurences.";
     //die(); 
     $data['best_item'] = $keys[0];
   
   
     /* Best Consultant/Cashier*/
     $consultantarr = (array) $best_consultant;
     $consultant_result_count = count($consultantarr);
     $consultant_data_array = array();
     for($i=0;$i<=$consultant_result_count;$i++){
        $consultant_data_array[] = $consultantarr[$i]->user;
     }
    $consultant_count=array_count_values($consultant_data_array);
    arsort($consultant_count);
    $consultant_keys=array_keys($consultant_count);
    $data['best_consultant'] = $consultant_keys[0];


     /* Best Customer*/
     $customerarr = (array) $best_customer;
     $customer_result_count = count($customerarr);
     $customer_data_array = array();
     for($i=0;$i<=$customer_result_count;$i++){
        $customer_data_array[] = $customerarr[$i]->customer_name;
     }
    $customer_count=array_count_values($customer_data_array);
    arsort($customer_count);
    $customer_keys=array_keys($customer_count);
    $data['best_customer'] = $customer_keys[0];

            
      $meta['page_title'] = $this->lang->line("best_result");
	  $data['page_title'] = $this->lang->line("best_result");
      $this->load->view('commons/header', $meta);
      $this->load->view('bestresult', $data);
      $this->load->view('commons/footer');
   }

   
   function products($alerts = "alerts")
   {
	   

	//$data['n'] = $this->reports_model->get_total_alerts();
	  $meta['page_title'] = $this->lang->line("product_reports");
	  $data['page_title'] = $this->lang->line("product_reports");
      $this->load->view('commons/header', $meta);
      $this->load->view('products', $data);
      $this->load->view('commons/footer');
   }
   
    function getProductAlerts()
   {
 
	   $this->load->library('alerts');

	   $this->alerts
			->select('products.id as productid, products.image as image, products.code as code, products.name as name, products.unit, products.price, (CASE WHEN sum(warehouses_products.quantity) Is Null THEN 0 ELSE sum(warehouses_products.quantity) END) as totalQuantity, products.alert_quantity as alertQty', FALSE)
			->from('products')
			->join('warehouses_products', 'products.id = warehouses_products.product_id', 'left outer')
			->group_by("products.id")
			->having('products.alert_quantity >= COALESCE( sum(warehouses_products.quantity), 0)', NULL, FALSE);

			$this->alerts->add_column("Actions", 
			"<center><a id='$4 - $3' href='index.php?module=products&view=gen_barcode&code=$3&height=200' title='".$this->lang->line("view_barcode")."' class='barcode tip'><i class='icon-barcode'></i></a>
			<a href='#' onClick=\"MyWindow=window.open('index.php?module=products&view=product_details&id=$1', 'MyWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=500'); return false;\" class='tip' title='".$this->lang->line("product_details")."'><i class='icon-fullscreen'></i></a>
			<a class='image tip' id='$4 - $3' href='".$this->config->base_url()."uploads/$2' title='".$this->lang->line("view_image")."'><i class='icon-picture'></i></a>
			<a href='index.php?module=products&amp;view=edit&amp;id=$1' class='tip' title='".$this->lang->line("edit_product")."'><i class='icon-edit'></i></a>
			<a href='index.php?module=products&amp;view=delete&amp;id=$1' onClick=\"return confirm('". $this->lang->line('alert_x_product') ."')\" class='tip' title='".$this->lang->line("delete_product")."'><i class='icon-trash'></i></a></center>", "productid, image, code, name");
		
		$this->alerts->unset_column('productid');
		$this->alerts->unset_column('image');
				
	    echo $this->alerts->generate();

   }
   
   
   function overview()
   {
	   
	  $data['monthly_sales'] = $this->reports_model->getChartData();
	  $data['stock'] = $this->reports_model->getStockValue();
	  $meta['page_title'] = $this->lang->line("stock_chart");
	  $data['page_title'] = $this->lang->line("stock_chart");
      $this->load->view('commons/header', $meta);
      $this->load->view('chart', $data);
      $this->load->view('commons/footer');
   }
   
   function warehouse_stock()
   {
	   if($this->input->get('warehouse')){ $warehouse = $this->input->get('warehouse'); } else { $warehouse = DEFAULT_WAREHOUSE; }
	   
	  $data['stock'] = $this->reports_model->getWarehouseStockValue($warehouse);
	  $data['warehouses'] = $this->reports_model->getAllWarehouses();
	  $data['warehouse_id'] = $warehouse;
	  $meta['page_title'] = $this->lang->line("warehouse_stock_value");
	  $data['page_title'] = $this->lang->line("stock_value");
      $this->load->view('commons/header', $meta);
      $this->load->view('stock', $data);
      $this->load->view('commons/footer');
   }
   
   
   
   function sales()
   {
	  $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');	   
	  $data['users'] = $this->reports_model->getAllUsers();
	  $data['warehouses'] = $this->reports_model->getAllWarehouses();
	  $data['customers'] = $this->reports_model->getAllCustomers();
	  $data['billers'] = $this->reports_model->getAllBillers();
	   
      $meta['page_title'] = $this->lang->line("sale_reports");
	  $data['page_title'] = $this->lang->line("sale_reports");
      $this->load->view('commons/header', $meta);
      $this->load->view('sales', $data);
      $this->load->view('commons/footer');
   }
   
   function getSales()
   {
 		//if($this->input->get('name')){ $name = $this->input->get('name'); } else { $name = NULL; }
		if($this->input->get('user')){ $user = $this->input->get('user'); } else { $user = NULL; }
		if($this->input->get('customer')){ $customer = $this->input->get('customer'); } else { $customer = NULL; }
		if($this->input->get('biller')){ $biller = $this->input->get('biller'); } else { $biller = NULL; }
		if($this->input->get('warehouse')){ $warehouse = $this->input->get('warehouse'); } else { $warehouse = NULL; }
		if($this->input->get('reference_no')){ $reference_no = $this->input->get('reference_no'); } else { $reference_no = NULL; }
		if($this->input->get('start_date')){ $start_date = $this->input->get('start_date'); } else { $start_date = NULL; }
		if($this->input->get('end_date')){ $end_date = $this->input->get('end_date'); } else { $end_date = NULL; }
		if($start_date) {
			if(JS_DATE == 'dd-mm-yyyy' || JS_DATE == 'dd/mm/yyyy') {
				$inv_date = trim($this->input->post('date'));
				$start_date = substr($start_date, -4)."-".substr($start_date, 3, 2)."-".substr($start_date, 0, 2); 
				$end_date = substr($end_date, -4)."-".substr($end_date, 3, 2)."-".substr($end_date, 0, 2); 
			} else {
				$start_date = substr($start_date, -4)."-".substr($start_date, 0, 2)."-".substr($start_date, 3, 2);
				$end_date = substr($end_date, -4)."-".substr($end_date, 0, 2)."-".substr($end_date, 3, 2);
			}
		}
	   $this->load->library('datatables');
	   $this->datatables
			->select("sales.id as sid,date, reference_no, biller_name, customer_name, total_tax, total_tax2, total")
			->from('sales')
			//->join('sale_items', 'sale_items.sale_id=sales.id', 'left')
			->join('warehouses', 'warehouses.id=sales.warehouse_id', 'left')
			->group_by('sales.id');
			
			
			if($user) { $this->datatables->like('sales.user', $user); }
			//if($name) { $this->datatables->like('sale_items.product_name', $name, 'both'); }
			if($biller) { $this->datatables->like('sales.biller_id', $biller); }
			if($customer) { $this->datatables->like('sales.customer_id', $customer); }
			if($warehouse) { $this->datatables->like('sales.warehouse_id', $warehouse); }
			if($reference_no) { $this->datatables->like('sales.reference_no', $reference_no, 'both'); }
			if($start_date) { $this->datatables->where('sales.date BETWEEN "'. $start_date. '" and "'.$end_date.'"'); }
			
		$this->datatables->add_column("Actions", 
			"<center><a href='#' onClick=\"MyWindow=window.open('index.php?module=sales&view=view_invoice&id=$1', 'MyWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1000,height=600'); return false;\" title='".$this->lang->line("view_invoice")."' class='tip'><i class='icon-fullscreen'></i></a> 
			<a href='index.php?module=sales&view=pdf&id=$1' title='".$this->lang->line("download_pdf")."' class='tip'><i class='icon-file'></i></a> 
			<a href='index.php?module=sales&view=email_invoice&id=$1' title='".$this->lang->line("email_invoice")."' class='tip'><i class='icon-envelope'></i></a>
			<a href='index.php?module=sales&amp;view=edit&amp;id=$1' title='".$this->lang->line("edit_invoice")."' class='tip'><i class='icon-edit'></i></a>
			<a href='index.php?module=sales&amp;view=delete&amp;id=$1' onClick=\"return confirm('". $this->lang->line('alert_x_invoice') ."')\" title='".$this->lang->line("delete_invoice")."' class='tip'><i class='icon-trash'></i></a></center>", "sid")
		
		->unset_column('sid');
		
		
	   echo $this->datatables->generate();
   }
   
   function purchases()
   {
	  $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');	   
	  $data['users'] = $this->reports_model->getAllUsers();
	  $data['warehouses'] = $this->reports_model->getAllWarehouses();
	  $data['suppliers'] = $this->reports_model->getAllSuppliers();
	   
      $meta['page_title'] = $this->lang->line("purchase_reports");
	  $data['page_title'] = $this->lang->line("purchase_reports");
      $this->load->view('commons/header', $meta);
      $this->load->view('purchases', $data);
      $this->load->view('commons/footer');
   }
   
   function getPurchases()
   {
 		//if($this->input->get('name')){ $name = $this->input->get('name'); } else { $name = NULL; }
		if($this->input->get('user')){ $user = $this->input->get('user'); } else { $user = NULL; }
		if($this->input->get('supplier')){ $supplier = $this->input->get('supplier'); } else { $supplier = NULL; }
		if($this->input->get('warehouse')){ $warehouse = $this->input->get('warehouse'); } else { $warehouse = NULL; }
		if($this->input->get('reference_no')){ $reference_no = $this->input->get('reference_no'); } else { $reference_no = NULL; }
		if($this->input->get('start_date')){ $start_date = $this->input->get('start_date'); } else { $start_date = NULL; }
		if($this->input->get('end_date')){ $end_date = $this->input->get('end_date'); } else { $end_date = NULL; }
		if($start_date) {
			if(JS_DATE == 'dd-mm-yyyy' || JS_DATE == 'dd/mm/yyyy') {
				$inv_date = trim($this->input->post('date'));
				$start_date = substr($start_date, -4)."-".substr($start_date, 3, 2)."-".substr($start_date, 0, 2); 
				$end_date = substr($end_date, -4)."-".substr($end_date, 3, 2)."-".substr($end_date, 0, 2); 
			} else {
				$start_date = substr($start_date, -4)."-".substr($start_date, 0, 2)."-".substr($start_date, 3, 2);
				$end_date = substr($end_date, -4)."-".substr($end_date, 0, 2)."-".substr($end_date, 3, 2);
			}
		}
	   $this->load->library('datatables');
	   $this->datatables
			->select("purchases.id as id, date, reference_no, warehouses.name as wname, supplier_name, total")
			->from('purchases')
			//->join('purchase_items', 'purchase_items.purchase_id=purchases.id', 'left')
			->join('warehouses', 'warehouses.id=purchases.warehouse_id', 'left')
			->group_by('purchases.id');
			
			if($user) { $this->datatables->like('purchases.user', $user); }
			//if($name) { $this->datatables->like('purchase_items.product_name', $name); }
			if($supplier) { $this->datatables->like('purchases.supplier_id', $supplier); }
			if($warehouse) { $this->datatables->like('purchases.warehouse_id', $warehouse); }
			if($reference_no) { $this->datatables->like('purchases.reference_no', $reference_no, 'both'); }
			if($start_date) { $this->datatables->where('purchases.date BETWEEN "'. $start_date. '" and "'.$end_date.'"'); }
			
		$this->datatables->add_column("Actions", 
			"<center><a href='#' onClick=\"MyWindow=window.open('index.php?module=inventories&view=view_inventory&id=$1', 'MyWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1000,height=600'); return false;\" title='".$this->lang->line("view_inventory")."' class='tip'><i class='icon-fullscreen'></i></a> <a href='index.php?module=inventories&view=pdf&id=$1' title='".$this->lang->line("download_pdf")."' class='tip'><i class='icon-file'></i></a> <a href='index.php?module=inventories&view=email_inventory&id=$1' title='".$this->lang->line("email_inventory")."' class='tip'><i class='icon-envelope'></i></a> <a href='index.php?module=inventories&amp;view=edit&amp;id=$1' title='".$this->lang->line("edit_inventory")."' class='tip'><i class='icon-edit'></i></a> <a href='index.php?module=inventories&amp;view=delete&amp;id=$1' onClick=\"return confirm('". $this->lang->line('alert_x_inventory') ."')\" title='".$this->lang->line("delete_inventory")."' class='tip'><i class='icon-trash'></i></a></center>", "id")
		->unset_column('id');
		
	   echo $this->datatables->generate();
   }
   
   function daily_sales()
   {
	   if($this->input->get('year')){ $year = $this->input->get('year'); } else { $year = date('Y'); }
	   if($this->input->get('month')){ $month = $this->input->get('month'); } else { $month = date('m'); }
	  
	   $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
	   	
		$config['translated_day_names'] = array($this->lang->line("sunday"), $this->lang->line("monday"), $this->lang->line("tuesday"), $this->lang->line("wednesday"), $this->lang->line("thursday"), $this->lang->line("friday"), $this->lang->line("saturday"));
		$config['translated_month_names'] = array('01' => $this->lang->line("january"), '02' => $this->lang->line("february"), '03' => $this->lang->line("march"), '04' => $this->lang->line("april"), '05' => $this->lang->line("may"), '06' => $this->lang->line("june"), '07' => $this->lang->line("july"), '08' => $this->lang->line("august"), '09' => $this->lang->line("september"), '10' => $this->lang->line("october"), '11' => $this->lang->line("november"), '12' => $this->lang->line("december"));

		$config['template'] = '

   			{table_open}<table border="0" cellpadding="0" cellspacing="0" class="table table-bordered">{/table_open}
			
			{heading_row_start}<tr>{/heading_row_start}
			
			{heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
			{heading_title_cell}<th colspan="{colspan}" id="month_year">{heading}</th>{/heading_title_cell}
			{heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
			
			{heading_row_end}</tr>{/heading_row_end}
			
			{week_row_start}<tr>{/week_row_start}
			{week_day_cell}<td class="cl_wday">{week_day}</td>{/week_day_cell}
			{week_row_end}</tr>{/week_row_end}
			
			{cal_row_start}<tr class="days">{/cal_row_start}
			{cal_cell_start}<td class="day">{/cal_cell_start}
			
			{cal_cell_content}
				<div class="day_num">{day}</div>
				<div class="content">{content}</div>
			{/cal_cell_content}
			{cal_cell_content_today}
				<div class="day_num highlight">{day}</div>
				<div class="content">{content}</div>
			{/cal_cell_content_today}
			
			{cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
			{cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}
			
			{cal_cell_blank}&nbsp;{/cal_cell_blank}
			
			{cal_cell_end}</td>{/cal_cell_end}
			{cal_row_end}</tr>{/cal_row_end}
			
			{table_close}</table>{/table_close}
';


		$this->load->library('daily_cal', $config);
				 
		$sales = $this->reports_model->getDailySales($year, $month);
		
		$num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		
		if(!empty($sales)) {
			foreach($sales as $sale){
				$daily_sale[$sale->date] = "<table class='table table-bordered table-hover table-striped table-condensed data' style='margin:0;'><tr><td>".$this->lang->line("discount")."</td><td>". $this->ion_auth->formatMoney($sale->discount) ."</td></tr><tr><td>".$this->lang->line("tax1")."</td><td>". $this->ion_auth->formatMoney($sale->tax1) ."</td></tr><tr><td>".$this->lang->line("tax2")."</td><td>". $this->ion_auth->formatMoney($sale->tax2) ."</td></tr><tr><td>".$this->lang->line("total")."</td><td>". $this->ion_auth->formatMoney($sale->total) ."</td></tr></table>";	
			}
			
		/*for ($i = 1; $i <= $num; $i++){
       		
       			if(isset($cal_data[$i])) {
        			$daily_sale[$i] = $cal_data[$i]; 
				} else { 
					$daily_sale[$i] = $this->lang->line('no_sale');
				}
        	
    	}
		
		
		} else {
			for($i=1; $i<=$num; $i++) {
			$daily_sale[$i] = $this->lang->line('no_sale');
		}*/
		} else { $daily_sale = array(); }
		
	   $data['calender'] = $this->daily_cal->generate($year, $month, $daily_sale);
	   
	   
	  $meta['page_title'] = $this->lang->line("daily_sales");
	  $data['page_title'] = $this->lang->line("daily_sales");
      $this->load->view('commons/header', $meta);
      $this->load->view('daily', $data);
	  $this->load->view('commons/footer');
   }
   
   function deletependingcustomer($id = NULL)
    {
		if (DEMO) {
			$this->session->set_flashdata('message', $this->lang->line("disabled_in_demo"));
			redirect('module=home', 'refresh');
		}
		
		$groups = array('admin', 'purchaser', 'salesman', 'viewer');
        if ($this->ion_auth->in_group($groups))
        {
            $this->session->set_flashdata('message', $this->lang->line("access_denied"));
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            redirect('module=reports&view=pendingcustomer', 'refresh');
        }
		
        if($this->input->get('id')){ $id = $this->input->get('id'); } else { $id = NULL; }
		

			if ( $this->reports_model->deletePendingCustomer($id) )
			{ 
				$this->session->set_flashdata('success_message', $this->lang->line("pending_customer_deleted"));
				redirect('module=reports&view=pendingcustomer', 'refresh');
			} 

       
    } 
    
    
    function editpendingcustomer($id = NULL)
    {
		if (DEMO) {
			$this->session->set_flashdata('message', $this->lang->line("disabled_in_demo"));
			redirect('module=home', 'refresh');
		}
		
		$groups = array('admin', 'purchaser', 'salesman', 'viewer');
        if ($this->ion_auth->in_group($groups))
        {
            $this->session->set_flashdata('message', $this->lang->line("access_denied"));
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            redirect('module=reports&view=pendingcustomer', 'refresh');
        }
		
        if($this->input->get('id')){ $id = $this->input->get('id'); } else { $id = NULL; }
		

			if ( $this->reports_model->editPendingCustomer($id) )
			{ 
				$this->session->set_flashdata('success_message', $this->lang->line("customer_approved"));
				redirect('module=reports&view=pendingcustomer', 'refresh');
			} 

       
    } 
    
    
  
   function monthly_sales()
   {
	   if($this->input->get('year')){ $year = $this->input->get('year'); } else { $year = date('Y'); }

	   $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
	   
		$data['year'] = $year;
		
	   $data['sales'] = $this->reports_model->getMonthlySales($year);
	   
      $meta['page_title'] = $this->lang->line("monthly_sales");
	  $data['page_title'] = $this->lang->line("monthly_sales");
      $this->load->view('commons/header', $meta);
	  $this->load->view('monthly', $data);
	  $this->load->view('commons/footer');
   }
   
   
	
   
}