<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


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
| MODULE: 			Customers
| -----------------------------------------------------
| This is customers module's model file.
| -----------------------------------------------------
*/


class Customers_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();

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

    public function customers_count() {
        return $this->db->count_all("customers");
    }

    public function fetch_customers($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->get("customers");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function getCustomerByID($id)
    {

        $q = $this->db->get_where('customers', array('id' => $id), 1);
        if( $q->num_rows() > 0 )
        {
            return $q->row();
        }

        return FALSE;

    }

    public function getCustomerByEmail($email)
    {

        $q = $this->db->get_where('customers', array('email' => $email), 1);
        if( $q->num_rows() > 0 )
        {
            return $q->row();
        }

        return FALSE;

    }

    public function addCustomer($data = array())
    {

        // Customer data
        $customerData = array(
            'surname'	        => $data['surname'],
            'name'	     	    => $data['name'],
            'email'   		   	=> $data['email'],
            'company'      		=> $data['company'],
            'address' 			=> $data['address'],
            'region'	     	=> $data['region'],
            'alternative_address'   => $data['alternative_address'],
            'postal_code'   	=> $data['postal_code'],
            //'country' 			=> $data['country'],
            'home_number'	    => $data['home_number'],
            'mobile_number'	    => $data['mobile_number'],
            'emergency_number'	=> $data['emergency_number'],
            'dob'	     	    => $data['dob'],
            'training_date'	    => $data['training_date'],
            'id_number'      	=> $data['id_number'],
            'religion'      	=> $data['religion'],
            'work_number'      	=> $data['work_number'],
            'coordinator_name'  => $data['coordinator_name'],
            'credit_allowance'  => $data['credit_allowance'],
            'place_of_work'     => $data['place_of_work'],
            'no_of_work'        => $data['no_of_work'],
            'payment_type'      => $data['payment_type'],
            'proof_of_address'  => $data['proof_of_address'],
            'authorization_letter'  => $data['authorization_letter'],
            'cf4'      			=> $data['cf4'],
            'cf5'      			=> $data['cf5'],
            'cf6'      			=> $data['cf6'],
            'type'=> $data['type'],  // Hyder - issue #31 - 4 June 2014
            'status'=> $data['status'],  // Hyder - issue #31 - 4 June 2014
            'teamleaderid'=> $data['teamleaderid'],  // Hyder - issue #31 - 4 June 2014
            'blue'=> $data['blue'],// Hyder - issue #29 - 8 June 2014
        );

        if($this->db->insert('customers', $customerData)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCustomer($id, $data = array())
    {

        // Customer data
        $customerData = array(
            'surname'	     	=> $data['surname'],
            'name'	     	    => $data['name'],
            'email'   			=> $data['email'],
            'company'      		=> $data['company'],
            'address' 			=> $data['address'],
            'region'	        => $data['region'],
            'alternative_address'   => $data['alternative_address'],
            'postal_code'       => $data['postal_code'],
            //'country' 			=> $data['country'],
            'home_number'   	=> $data['home_number'],
            'mobile_number'	    => $data['mobile_number'],
            'emergency_number'	=> $data['emergency_number'],
            'dob'	     	    => $data['dob'],
            'training_date'	    => $data['training_date'],
            'id_number'      	=> $data['id_number'],
            'religion'      	=> $data['religion'],
            'work_number'      	=> $data['work_number'],
            'coordinator_name'  => $data['coordinator_name'],
            'credit_allowance'  => $data['credit_allowance'],
            'place_of_work'     => $data['place_of_work'],
            'no_of_work'        => $data['no_of_work'],
            'payment_type'      => $data['payment_type'],
            'proof_of_address'  => $data['proof_of_address'],
            'authorization_letter'  => $data['authorization_letter'],
            'cf4'      			=> $data['cf4'],
            'cf5'      			=> $data['cf5'],
            'cf6'      			=> $data['cf6'],
            'type'=> $data['type'],  // Hyder - issue #31 - 4 June 2014
         //   'status'=> $data['status'],  // Hyder - issue #31 - 4 June 2014 - status field pareil . mne comment sa.
            'teamleaderid'=> $data['teamleaderid'],  // Hyder - issue #31 - 4 June 2014
            'blue'=> $data['blue'],  // Hyder - issue #31 - 4 June 2014


        );

        $this->db->where('id', $id);
        if($this->db->update('customers', $customerData)) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllPayment_types()
    {
        $q = $this->db->get('payment_types');
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getAllCredit_allowances()
    {
        $q = $this->db->get('credit_allowances');
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }


    public function add_customers($data = array())
    {

        if($this->db->insert_batch('customers', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllRegion_days()
    {
        $q = $this->db->get('region_days');
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }
    public function deleteCustomer($id)
    {
        if($this->db->delete('customers', array('id' => $id))) {
            return true;
        }
        return FALSE;
    }

    public function getCustomerNames($term)
    {
        $this->db->select('name');

        $this->db->like('name', $term, 'both');
        $this->db->where('status', 'approved'); // issue #31 - Hyder- 7 June 2014

        $q = $this->db->get('customers');

        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {

                $data[] = $row;
            }

            return $data;
        }
    }


    // Hyder - 4 June 2014 - issue#31
    public function get_teamleaders(){



        $query = $this->db->get_where('customers',array('type'=>'teamleader') );

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }
        return false;

    }

}
