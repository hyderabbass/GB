<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promotions extends MX_Controller {

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
| MODULE: 			promotions
| -----------------------------------------------------
| This is promotions module controller file.
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
		$this->load->library('form_validation');
		$this->load->model('promotions_model');

	}
/* -------------------------------------------------------------------------------------------------------------------------------- */
//index or inventories page
	
     
   function index()
   {
	  
		if ($this->ion_auth->in_group('purchaser'))
		{
			$this->session->set_flashdata('message', $this->lang->line("access_denied"));
			$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			redirect('module=home', 'refresh');
		}
		
	   $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
	   $data['success_message'] = $this->session->flashdata('success_message');
       $data['products'] = $this->promotions_model->getAllProduct_names();
       $data['products_prices'] = $this->promotions_model->getAllProduct_prices();
	   
      $meta['page_title'] = $this->lang->line("promotions");
	  $data['page_title'] = $this->lang->line("promotions");
      $this->load->view('commons/header', $meta);
      $this->load->view('promotions', $data);
      $this->load->view('commons/footer');
   }
   
    function getdatatableajax()
   {
             
	   $this->load->library('datatables');
       
        $where = "products.id = promotions.product_id
                  AND 
                  promotions.status = 'active'";
	   $this->datatables
	       
           
           ->select("promotions.id,
                     products.name,
                     promotions.start_date,
                     promotions.end_date,
                     promotions.normal_price,
                     promotions.discount_price")
           ->from("products,promotions")
           ->where($where);
           
             
			
			$this->datatables->add_column("Actions", 
			"<center>			
							    <a class=\"tip\" title='".$this->lang->line("delete_promotion")."' href='index.php?module=promotions&amp;view=delete&amp;id=$1' onClick=\"return confirm('". $this->lang->line('alert_x_promotion') ."')\"><i class=\"icon-trash\"></i></a></center>", "promotions.id")
			->unset_column('promotions.id');
		
		
	   echo $this->datatables->generate();

   }
   
   
    function getdatatablepro()
   {
 
       // $start_date = date('y-m-d');      
          
	   $this->load->library('datatables');
	   $this->datatables
			->select("id, name, price")
			->from("products"); 
            
           // ->where('start_date', $start_date);            
				$this->datatables->add_column("Promo-Price", 
			"<center>
            <input  />
           
            </center>", "id")
			
            
			->add_column("Actions", 
			"<center>			<a class=\"tip\" title='".$this->lang->line("edit_promotion")."' href='index.php?module=promotions&amp;view=edit&amp;id=$1'><i class=\"icon-edit\"></i></a>
							    <a class=\"tip\" title='".$this->lang->line("delete_promotion")."' href='index.php?module=promotions&amp;view=delete&amp;id=$1' onClick=\"return confirm('". $this->lang->line('alert_x_promotion') ."')\"><i class=\"icon-trash\"></i></a></center>", "id")
			->unset_column('id');
		
		
	   echo $this->datatables->generate();

   }
   
/* -------------------------------------------------------------------------------------------------------------------------------- */
//view inventory as html page
   
   function view_promotion()
   {
	   if($this->input->get('id')){ $id = $this->input->get('id'); } else { $id = NULL; }
	   
	   	   $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
		   
		   $data['rows'] = $this->promotions_model->getAllPromotionItems($id);
		   
		   $inv = $this->promotions_model->getPromotionByID($id);
		   $invoice_type_id = $inv->invoice_type;
		   
		   $data['inv'] = $inv;
		   $data['id'] = $id; 

	  $data['page_title'] = $this->lang->line("promotion");
	
      $this->load->view('view_promotion', $data);

   }

/* -------------------------------------------------------------------------------------------------------------------------------- */ 
//Add new inventory

   function add()
   {
	   $groups = array('purchaser', 'viewer');
		if ($this->ion_auth->in_group($groups))
		{
			$this->session->set_flashdata('message', $this->lang->line("access_denied"));
			$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			redirect('module=promotions', 'refresh');
		}
		
		$this->form_validation->set_message('is_natural_no_zero', $this->lang->line("no_zero_required"));
		//validate form input
		$this->form_validation->set_rules('product_name', $this->lang->line("product_name"), 'xss_clean');
        $this->form_validation->set_rules('start_date', $this->lang->line("start_date"), 'required|xss_clean');
        $this->form_validation->set_rules('end_date', $this->lang->line("end_date"), 'required|xss_clean');
        $this->form_validation->set_rules('normal_price', $this->lang->line("normal_price"), 'xss_clean');
        $this->form_validation->set_rules('discount_price', $this->lang->line("discount_price"), 'xss_clean');
		
			
		if ($this->form_validation->run() == true)
		{
            $inv_start_date = trim($this->input->post('start_date'));
            $inv_end_date = trim($this->input->post('end_date'));
			if(JS_DATE == 'dd-mm-yyyy' || JS_DATE == 'dd/mm/yyyy') {
                $start_date = substr($inv_start_date, -4)."-".substr($inv_start_date, 3, 2)."-".substr($inv_start_date, 0, 2);
		      	$end_date = substr($inv_end_date, -4)."-".substr($inv_end_date, 3, 2)."-".substr($inv_end_date, 0, 2);
            } else {
                $start_date = substr($inv_start_date, -4)."-".substr($inv_start_date, 0, 2)."-".substr($inv_start_date, 3, 2);
                $end_date = substr($inv_end_date, -4)."-".substr($inv_end_date, 0, 2)."-".substr($inv_end_date, 3, 2);
            }
            
            $product_id = $this->input->post('product_id');
			$product_name = $this->input->post('product_name');
            $normal_price = $this->input->post('normal_price');
            $discount_price = $this->input->post('discount_price');
            
            
            //$data_product = array(
//                'product_id' =>$product_id,
//                'start_date' =>$inv_start_date,
//                'end_date' => $inv_end_date,
//                'product_name' => $product_name,
//                'normal_price' => $normal_price,
//                'discount_price' => $discount_price
//            );
          
          
           $data_promotion = array();
           $data_promotion = $_POST;
           $data_promotion = array_slice($data_promotion, 6); 
            
            
          foreach($data_promotion as $key=>$data){
            
            if($data != '' && $key != 'submit'){
               $data_prom = array();
                $data_prom = $key.'_value_'.$data.'_startdate_'.$start_date.'_enddate_'.$end_date;
                $pieces = explode("_", $data_prom);
               // var_dump($pieces);
               
                $dataproduct[] = array(
                'product_id' =>$pieces[2],
                'start_date' =>$pieces[8],
                'end_date' => $pieces[10],
                'normal_price' => $pieces[3],
                'discount_price' => $pieces[6]
            );
                                 
            }
          
            
          }
        
           
  
       
		

		}



       	if ( $this->form_validation->run() == true && $this->promotions_model->addPromotion($dataproduct))
		{ //check to see if we are creating the promotion
			//redirect them back to the admin page
			$this->session->set_flashdata('success_message', $this->lang->line("promotion_added"));
			redirect("module=promotions", 'refresh');
		}
		else
		
		{  
			$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			
			$data['product_name'] = array('name' => 'product_name',
				'id' => 'product_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('product_name'),
			);
            $data['start_date'] = array('name' => 'start_date',
				'id' => 'start_date',
				'type' => 'text',
				'value' => $this->form_validation->set_value('start_date'),
			);
            $data['end_date'] = array('name' => 'end_date',
				'id' => 'end_date',
				'type' => 'text',
				'value' => $this->form_validation->set_value('end_date'),
			);
            $data['normal_price'] = array('name' => 'normal_price',
				'id' => 'normal_price',
				'type' => 'text',
				'value' => $this->form_validation->set_value('normal_price'),
			);
            $data['discount_price'] = array('name' => 'discount_price',
				'id' => 'discount_price',
				'type' => 'text',
				'value' => $this->form_validation->set_value('discount_price'),
			);
	   
      $meta['page_title'] = $this->lang->line("add_promotion");
      $data['products'] = $this->promotions_model->getAllProduct_names();
      $data['products_prices'] = $this->promotions_model->getAllProduct_prices();
	  $data['page_title'] = $this->lang->line("add_promotion");
      $this->load->view('commons/header', $meta);
      $this->load->view('add', $data);
      $this->load->view('commons/footer');
	  
		}
   }


/* -------------------------------------------------------------------------------------------------------------------------------- */ 
//Edit inventory

   function edit($id = NULL)
	{
		if($this->input->get('id')) { $id = $this->input->get('id'); }
		$groups = array('owner', 'admin', 'salesman');
        

		if (!$this->ion_auth->in_group($groups))
		{
			$this->session->set_flashdata('message', $this->lang->line("access_denied"));
			$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			redirect('module=home', 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('product_name', $this->lang->line("product_name"), 'required|xss_clean');
		$this->form_validation->set_rules('start_date', $this->lang->line("start_date"), 'required|xss_clean');
		$this->form_validation->set_rules('end_date', $this->lang->line("end_date"), 'required|xss_clean');
        $this->form_validation->set_rules('normal_price', $this->lang->line("normal_price"), 'required|xss_clean');
        $this->form_validation->set_rules('discount_price', $this->lang->line("discount_price"), 'required|xss_clean');
        
        

        
		if ($this->form_validation->run() == true)
		{
		  $inv_start_date = trim($this->input->post('start_date'));
            $inv_end_date = trim($this->input->post('end_date'));
			if(JS_DATE == 'dd-mm-yyyy' || JS_DATE == 'dd/mm/yyyy') {
                $start_date = substr($inv_start_date, -4)."-".substr($inv_start_date, 3, 2)."-".substr($inv_start_date, 0, 2);
		      	$end_date = substr($inv_end_date, -4)."-".substr($inv_end_date, 3, 2)."-".substr($inv_end_date, 0, 2);
            } else {
                $start_date = substr($inv_start_date, -4)."-".substr($inv_start_date, 0, 2)."-".substr($inv_start_date, 3, 2);
                $end_date = substr($inv_end_date, -4)."-".substr($inv_end_date, 0, 2)."-".substr($inv_end_date, 3, 2);
            }

            //$product_name_id = $this->input->post('product_name');
			$data = array(
                'product_name' => $this->input->post('product_name'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'normal_price' => $this->input->post('normal_price'),
                'discount_price' => $this->input->post('discount_price')
			);
     }
		

        
        
		if ( $this->form_validation->run() == true && $this->promotions_model->updatePromotion($id, $data))
		{ 
		  
			$this->session->set_flashdata('success_message', $this->lang->line("promotion_updated"));
			redirect("module=promotions", 'refresh');
		}
		else
		{ 
			$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

		$data['promotion'] = $this->promotions_model->getPromotionByID($id);
        $data['promotions'] = $this->promotions_model->getAllPromotions();
        $data['products'] = $this->promotions_model->getAllProduct_names();
		$meta['page_title'] = $this->lang->line("update_promotion");
		$data['id'] = $id;
		$data['page_title'] = $this->lang->line("update_promotion");
		$this->load->view('commons/header', $meta);
		$this->load->view('edit', $data);
		$this->load->view('commons/footer');
		
		}
	} 
/*-------------------------------*/
function delete($id = NULL)
    {
		
        if (!$this->ion_auth->in_group('owner'))
        {
            $this->session->set_flashdata('message', $this->lang->line("access_denied"));
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            redirect('module=promotions', 'refresh');
        }
		
        if($this->input->get('id')){ $id = $this->input->get('id'); } else { $id = NULL; }
		
			if ( $this->promotions_model->deletePromotion($id) )
			{ 
				$this->session->set_flashdata('message', $this->lang->line("promotion_deleted"));
				redirect('module=promotions&view=promotions', 'refresh');
			}

       
    }   
/* -------------------------------------------------------------------------------------------------------------------------------- */

	function scan_item()
   {
	   if($this->input->get('code')) { $code = $this->input->get('code'); }
	   
	   if($item = $this->promotions_model->getProductByCode($code)) {
	   		
			$product_name = $item->name;
			$product_price = $item->price;
			
			$product = array('name' => $product_name, 'price' => $product_price);	
		
	   }
	   
	  echo json_encode($product);

   }
  
 
    function add_item()
   {
	   if($this->input->get('name')) { $name = $this->input->get('name'); }
	   
	   if($item = $this->promotions_model->getProductByName($name)) {
	   		
			$code = $item->code;
			$price = $item->price;
			
			$product = array('code' => $code, 'price' => $price);	
		
	   }
	   
	  echo json_encode($product);

   }
   
   function suggestions()
	{
		$term = $this->input->get('term',TRUE);
	
		if (strlen($term) < 2) break;
	
		$rows = $this->promotions_model->getProductNames($term);
	
		$json_array = array();
		foreach ($rows as $row)
			 array_push($json_array, $row->name);
	
		echo json_encode($json_array); 
	}
	
}