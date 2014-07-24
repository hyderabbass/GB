<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
| -----------------------------------------------------
| PRODUCT NAME: 	STOCK MANAGER ADVANCE 
| -----------------------------------------------------
| AUTHER:			MIAN SALEEM 
| -----------------------------------------------------
| EMAIL:			quoteem@tecdiary.com 
| -----------------------------------------------------
| COPYRIGHTS:		RESERVED BY TECDIARY IT SOLUTIONS
| -----------------------------------------------------
| WEBSITE:			http://tecdiary.net
| -----------------------------------------------------
|
| MODULE: 			promotions
| -----------------------------------------------------
| This is promotions module's model file.
| -----------------------------------------------------
*/


class Promotions_model extends CI_Model
{
	
	
	public function __construct()
	{
		parent::__construct();

	}
	
	
	public function getProductsByCode($code) 
	{
		$this->db->select('*')->from('products')->like('code', $code, 'both');
		$q = $this->db->get();
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getNextAI() 
	{
		$this->db->select_max('id');
		$q = $this->db->get('promotions');
		if( $q->num_rows() > 0 )
		  {
			$row = $q->row();
			//return KIT."-".date('Y')."-".sprintf("%03s", $row->id+1);
			return KIT."-".sprintf("%04s", $row->id+1);
		  } 
				
			return FALSE;

	}
	

	
	public function getProductByCode($code) 
	{

		$q = $this->db->get_where('products', array('code' => $code), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}
	
	
	public function getAllProducts() 
	{
		$this->db->select('*')->from('products')->order_by('id', 'asc');
		$q = $this->db->get();
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getProductByID($id) 
	{

		$q = $this->db->get_where('products', array('id' => $id), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}
	
	public function getAllTaxRates() 
	{
		$q = $this->db->get('tax_rates');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getTaxRateByID($id) 
	{

		$q = $this->db->get_where('tax_rates', array('id' => $id), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}
	
	public function getAllDiscounts() 
	{
		$q = $this->db->get('discounts');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getDiscountByID($id) 
	{

		$q = $this->db->get_where('discounts', array('id' => $id), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}

	public function getItemByID($id)
	{

		$q = $this->db->get_where('promotion_items', array('id' => $id), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}
	
	public function getAllPromotions() 
	{
		$q = $this->db->get('promotions');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
		
	public function getPromotionByID($id)
	{

		$q = $this->db->get_where('promotions', array('id' => $id), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}

	public function getAllPromotionItems($promotion_id) 
	{
		$q = $this->db->get_where('promotion_items', array('promotion_id' => $promotion_id));
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	
	
	public function addPromotion($dataproducts = array(), $items = array())
	{
  	 
       
  
		foreach($dataproducts as $dataproduct){	
    		// promotion data
    		$promotionDataIns = array(
                'product_id'			=> $dataproduct['product_id'],
                'start_date'			=> $dataproduct['start_date'],
                'end_date'		       	=> $dataproduct['end_date'],
                'normal_price'		    => $dataproduct['normal_price'],
                'discount_price'		=> $dataproduct['discount_price']
    		);
    
    	   $ins_promotion = $this->db->insert('promotions', $promotionDataIns);
           $status = 'inactive';
           if($ins_promotion){
                //update starts
                
                $promotionDataUpd = array(
                    'price' => $dataproduct['discount_price'],
                    'status' => $status
                );
                $this->db->where('id', $dataproduct['product_id']);
                $upd_promotion = $this->db->update('products', $promotionDataUpd); 
                
                
           }
        }
        
        if($ins_promotion && $upd_promotion){
            return true;
        }else{
            return false;
        }
	}
	
	public function updatePromotion($id, $promotionDetails = array())
	{

			// promotion data
			$promotionData = array(
			'product_name'			=> $promotionDetails['product_name'],
            'start_date'			=> $promotionDetails['start_date'],
            'end_date'		       	=> $promotionDetails['end_date'],
            'normal_price'		    => $promotionDetails['normal_price'],
            'discount_price'		=> $promotionDetails['discount_price']
			);
			
			$this->db->where('id', $id);
		
		if($this->db->update('promotions', $promotionData)) {
			return true;
		} else {
			return false;
		}
	}
	
	

	public function deletePromotion($id)
	{
     
        $active = 'active';
        $query = $this->db->query("SELECT id, product_id, normal_price FROM promotions WHERE id ='$id'");
        $row = $query->result_array();          
            
            foreach($row as $rows){
            
            $dataproduct = array(
            'id' => $rows['product_id'],
            'price' => $rows['normal_price'],
            'status' => $active
            );    
            
            }
            
            $this->db->where('id', $rows['product_id']);
            $this->db->update('products', $dataproduct);

          
	  	if($this->db->delete('promotions', array('id' => $id))) {
			return true;
		}
			
	return FALSE;
	}   
    
	
	public function getProductNames($term)
    {
	   	$this->db->select('name');
	    $this->db->like('name', $term, 'both');
   		$q = $this->db->get('products');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data; 
		}
    }
    
        public function getAllProduct_names() 
	{
	   //$this->db->order_by('name', 'asc');
	   $this->db->select('id, name, price')->where('status','active');
		$q = $this->db->get('products');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}	
			return $data;
		}
	}
   
    
            public function getAllProduct_prices() 
	{
	   $this->db->select('price');
		$q = $this->db->get('products');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}	
			return $data;
		}
	}
    
    
    
	public function getProductByName($name)
	{

		$q = $this->db->get_where('products', array('name' => $name), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}
    
    	public function getProductByPrice($price)
	{

		$q = $this->db->get_where('products', array('price' => $price), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}
	
}
