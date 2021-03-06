<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
| -----------------------------------------------------
| PRODUCT NAME: 	SCHOOL MANAGER 
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
| MODULE: 			Reports
| -----------------------------------------------------
| This is reports module model file.
| -----------------------------------------------------
*/


class Reports_model extends CI_Model
{
	
	
	public function __construct()
	{
		parent::__construct();

	}
	
	public function getAllSales()
    {
        	$q = $this->db->get('sales');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
    }
    	
	public function getAllProducts() 
	{
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
	   $this->db->select('name');
		$q = $this->db->get('products');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}	
			return $data;
		}
	}
    
    public function getSaleItems() 
	{
	   $this->db->select('product_name');
		$q = $this->db->get('sale_items');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;  
			}	
			return $data;
            
		}
	}
    
    
    public function getBestConsultant() 
	{
	   $this->db->select('user');
		$q = $this->db->get('sales');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;  
			}	
			return $data;
            
		}
	}
    
    
    public function getBestCustomer() 
	{
	   $this->db->select('customer_name');
		$q = $this->db->get('sales');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;  
			}	
			return $data;
            
		}
	}
    
    
        public function getProductName() 
	{
	   $this->db->select('id, name');
		$q = $this->db->get('products');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;  
			}	
			return $data;
            
		}
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
    
	public function getAllUsers() 
	{
		$q = $this->db->get('users');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getAllCategories() 
	{
		$q = $this->db->get('categories');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getStockValue() 
	{
		$this->db->select('sum(warehouses_products.quantity)*price as stock_by_price, sum(warehouses_products.quantity)*cost as stock_by_cost');
		$this->db->from('products');
		 $this->db->join('warehouses_products', 'warehouses_products.product_id=products.id');
		$q = $this->db->get();
		 if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;
	}
	
	public function getWarehouseStockValue($id) 
	{
		$this->db->select('sum(warehouses_products.quantity)*price as stock_by_price, sum(warehouses_products.quantity)*cost as stock_by_cost');
		$this->db->from('products');
		 $this->db->join('warehouses_products', 'warehouses_products.product_id=products.id');
		 $this->db->where('warehouses_products.warehouse_id', $id);
		$q = $this->db->get();
		 if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;
	}
	
	public function getmonthlyPurchases() 
	{
		$myQuery = "SELECT (CASE WHEN date_format( date, '%b' ) Is Null THEN 0 ELSE date_format( date, '%b' ) END) as month, SUM( COALESCE( total, 0 ) ) AS purchases FROM purchases WHERE date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( date, '%b' ) ORDER BY date_format( date, '%m' ) ASC";
		$q = $this->db->query($myQuery);
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getChartData() 
	{
		$myQuery = "SELECT S.month,
					   S.sales,
					   COALESCE( P.purchases, 0 ) as purchases,
					   S.tax1,
					   S.tax2
					FROM (	SELECT	date_format(date, '%Y-%m') Month,
								SUM(total) Sales,
								SUM(total_tax) tax1,
								SUM(total_tax2) tax2
						FROM sales
						WHERE sales.date >= date_sub( now( ) , INTERVAL 12 MONTH )
						GROUP BY date_format(date, '%Y-%m')) S
					LEFT JOIN (	SELECT	date_format(date, '%Y-%m') Month,
									SUM(total) purchases
							FROM purchases
							GROUP BY date_format(date, '%Y-%m')) P
					ON S.Month = P.Month
					GROUP BY S.Month
					ORDER BY S.Month";
		$q = $this->db->query($myQuery);
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	/*public function getDailySales() 
	{
		$year = '2013'; $month = '3';
		$myQuery = "SELECT DATE_FORMAT( date,  '%e' ) AS date, SUM( COALESCE( total, 0 ) ) AS sales, SUM( COALESCE( total_tax, 0 ) ) as tax1, SUM( COALESCE( total_tax2, 0 ) ) as tax2
			FROM sales
			WHERE DATE_FORMAT( date,  '%Y-%m' ) =  '2013-4'
			GROUP BY DATE_FORMAT( date,  '%e' )";
		$q = $this->db->query($myQuery);
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}*/
	
	
	public function getAllWarehouses() 
	{
		$q = $this->db->get('warehouses');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getAllCustomers() 
	{
		$q = $this->db->get('customers');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getAllBillers() 
	{
		$q = $this->db->get('billers');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getAllSuppliers() 
	{
		$q = $this->db->get('suppliers');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getDailySales($year, $month) 
	{
		
		$myQuery = "SELECT DATE_FORMAT( date,  '%e' ) AS date, SUM( COALESCE( total_tax, 0 ) ) AS tax1, SUM( COALESCE( total_tax2, 0 ) ) AS tax2, SUM( COALESCE( total, 0 ) ) AS total, SUM( COALESCE( inv_discount, 0 ) ) AS discount
			FROM sales
			WHERE DATE_FORMAT( date,  '%Y-%m' ) =  '{$year}-{$month}'
			GROUP BY DATE_FORMAT( date,  '%e' )";
		$q = $this->db->query($myQuery, false);
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getMonthlySales($year) 
	{
		
		$myQuery = "SELECT DATE_FORMAT( date,  '%c' ) AS date, SUM( COALESCE( total_tax, 0 ) ) AS tax1, SUM( COALESCE( total_tax2, 0 ) ) AS tax2, SUM( COALESCE( total, 0 ) ) AS total
			FROM sales
			WHERE DATE_FORMAT( date,  '%Y' ) =  '{$year}' 
			GROUP BY date_format( date, '%c' ) ORDER BY date_format( date, '%c' ) ASC";
		$q = $this->db->query($myQuery, false);
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
    
    public function deletePendingCustomer($id)
	    {
	       
	        if($this->db->delete('customers', array('id' => $id))) {
	            return true;
	        }
			
	    return FALSE;
	    }  
        
        
    public function editPendingCustomer($id)
	    {
	       
           $approved = 'approved';
           $this->db->where('id', $id);
	        if($this->db->update('customers', array('status' => $approved))) {
	            return true;
	        }
			
	    return FALSE;
	    }  
        
        
        
	
	
}
