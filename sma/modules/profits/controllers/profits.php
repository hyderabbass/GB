<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profits extends MX_Controller {

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
| MODULE: 			Profits
| -----------------------------------------------------
| This is Profit and Loss module controller file.
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
		$this->load->model('profits_model');

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
       $data['products'] = $this->profits_model->getAllProduct_names();
        
      $meta['page_title'] = $this->lang->line("profit_and_loss");
	  $data['page_title'] = $this->lang->line("profit_and_loss");
      $this->load->view('commons/header', $meta);
      $this->load->view('profits', $data);
      $this->load->view('commons/footer');
   }
   
   function getprofits()
   {
 
	   $this->load->library('datatables');
	   $this->datatables
			->select("id, date, itemkit_no, itemkit_name, new_price, internal_note")
			->from('itemkits')
			->add_column("Actions", 
			"<center> </center>")
		->unset_column('id')
		->unset_column('internal_note');
		
		
	   echo $this->datatables->generate();

   }
   
   
/* -------------------------------------------------------------------------------------------------------------------------------- */
//view inventory as html page
   
   function view_itemkit()
   {
	   if($this->input->get('id')){ $id = $this->input->get('id'); } else { $id = NULL; }
	   
	   	   $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
		   
		   $data['rows'] = $this->profits_model->getAllItemkitItems($id);
		   
		   $inv = $this->profits_model->getItemkitByID($id);
		   $invoice_type_id = $inv->invoice_type;
		   
		   $data['inv'] = $inv;
		   $data['id'] = $id; 

	  $data['page_title'] = $this->lang->line("itemkit");
	
      $this->load->view('view_itemkit', $data);

   }

/* -------------------------------------------------------------------------------------------------------------------------------- */ 
	
}