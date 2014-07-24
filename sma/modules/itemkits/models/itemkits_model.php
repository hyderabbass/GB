<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

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
| MODULE: 			itemkits
| -----------------------------------------------------
| This is itemkits module's model file.
| -----------------------------------------------------
*/

class Itemkits_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function getProductsByCode($code)
    {
        $this->db->select('*')->from('products')->like('code', $code, 'both');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getNextAI()
    {
        $this->db->select_max('id');
        $q = $this->db->get('itemkits');
        if ($q->num_rows() > 0) {
            $row = $q->row();
            //return KIT."-".date('Y')."-".sprintf("%03s", $row->id+1);
            return KIT . "-" . sprintf("%04s", $row->id + 1);
        }

        return FALSE;

    }

    public function getProductByCode($code)
    {

        $q = $this->db->get_where('products', array('code' => $code), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }

        return FALSE;

    }

    public function getAllProducts()
    {
        $this->db->select('*')->from('products')->order_by('id', 'asc');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getProductByID($id)
    {

        $q = $this->db->get_where('products', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }

        return FALSE;

    }

    public function getAllTaxRates()
    {
        $q = $this->db->get('tax_rates');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getTaxRateByID($id)
    {

        $q = $this->db->get_where('tax_rates', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }

        return FALSE;

    }

    public function getAllDiscounts()
    {
        $q = $this->db->get('discounts');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getDiscountByID($id)
    {

        $q = $this->db->get_where('discounts', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }

        return FALSE;

    }

    public function getItemByID($id)
    {

        $q = $this->db->get_where('itemkit_items', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }

        return FALSE;

    }

    public function getAllItemkits()
    {
        $q = $this->db->get('itemkits');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getItemkitByID($id)
    {

        $q = $this->db->get_where('itemkits', array('id' => $id), 1);
        //  echo $this->db->last_query();
        if ($q->num_rows() > 0) {
            return $q->row();
        }

        return FALSE;

    }

    public function getAllItemkitItems($itemkit_id)
    {
        $q = $this->db->get_where('itemkit_items', array('itemkit_id' => $itemkit_id));

        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getAllProduct_names()
    {
        $this->db->select('id,name'); // Hyder - Issue #1 - 18 June 2014 - Mone ajoute column 'id' ladans
        $q = $this->db->get('products');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function addItemkit($itemkitDetails = array(), $items = array(), $kits = array())
    {
        $category_id = "100"; // yogesh in hardcode sa - Hyder - bizin investigate kifr - 22 July 2014
        // itemkit data
        $itemkitProduct = array(
            'code' => $itemkitDetails['itemkit_no'],
            'name' => $itemkitDetails['itemkit_name'],
            'unit' => $itemkitDetails['itemkit_unit'],
            'category_id' => $category_id,
            'price' => $itemkitDetails['new_price'],
        );

        // if($this->db->insert('products', $itemkitProduct))

        $itemkitData = array(
            'itemkit_no' => $itemkitDetails['itemkit_no'],
            'itemkit_name' => $itemkitDetails['itemkit_name'],
            'itemkit_unit' => $itemkitDetails['itemkit_unit'],
            'new_price' => $itemkitDetails['new_price'],
            'gift_one' => $itemkitDetails['gift_one'],
            'gift_two' => $itemkitDetails['gift_two'],
            'gift_three' => $itemkitDetails['gift_three'],
            #Issue #1 - 21 June 2014 - START
            'gift_four' => $itemkitDetails['gift_four'],
            'gift_five' => $itemkitDetails['gift_five'],
            #Issue #1 - 21 June 2014 - END
            'date' => $itemkitDetails['date'],
            'start_date' => $itemkitDetails['start_date'],
            'end_date' => $itemkitDetails['end_date'],
            'note' => $itemkitDetails['note'],
            'internal_note' => $itemkitDetails['internal_note'],
            'inv_total' => $itemkitDetails['inv_total'],
            'total_tax' => $itemkitDetails['total_tax'],
            'total' => $itemkitDetails['total'],
            'total_tax2' => $itemkitDetails['total_tax2'],
            'tax_rate2_id' => $itemkitDetails['tax_rate2_id'],
            'inv_discount' => $itemkitDetails['inv_discount'],
            'discount_id' => $itemkitDetails['discount_id'],
            'user' => $itemkitDetails['user'],
            'shipping' => $itemkitDetails['shipping']
        );

        if ($this->db->insert('itemkits', $itemkitData)) {
            $itemkit_id = $this->db->insert_id();

            $productkit_id = array('itemkit_id' => $itemkit_id);

            $arr3 = $itemkitProduct + $productkit_id;

            if ($this->db->insert('products', $arr3))

                $addOn = array('itemkit_id' => $itemkit_id);
            end($addOn);
            foreach ($items as &$var) {
                $var = array_merge($addOn, $var);
            }

            if ($this->db->insert_batch('itemkit_items', $items)) {
                return true;
            }
        }
        return false;
    }

    public function updateItemkit($id, $itemkitDetails, $items = array())
    {

        $itemkitProduct = array(
            'code' => $itemkitDetails['itemkit_no'],
            'name' => $itemkitDetails['itemkit_name'],
            'unit' => $itemkitDetails['itemkit_unit'],
            'price' => $itemkitDetails['new_price'],
        );
        $this->db->where('code', $itemkitDetails['itemkit_no']);
        if ($this->db->update('products', $itemkitProduct))

            // itemkit data
            $itemkitData = array(
                'itemkit_no' => $itemkitDetails['itemkit_no'],
                'itemkit_name' => $itemkitDetails['itemkit_name'],
                'itemkit_unit' => $itemkitDetails['itemkit_unit'],
                'new_price' => $itemkitDetails['new_price'],
                'gift_one' => $itemkitDetails['gift_one'],
                'gift_two' => $itemkitDetails['gift_two'],
                'gift_three' => $itemkitDetails['gift_three'],
                #Issue #1 - 21 June 2014 - START
                'gift_four' => $itemkitDetails['gift_four'],
                'gift_five' => $itemkitDetails['gift_five'],
                #Issue #1 - 21 June 2014 - END
                'date' => $itemkitDetails['date'],
                'start_date' => $itemkitDetails['start_date'],
                'end_date' => $itemkitDetails['end_date'],
                'note' => $itemkitDetails['note'],
                'internal_note' => $itemkitDetails['internal_note'],
                'inv_total' => $itemkitDetails['inv_total'],
                'total_tax' => $itemkitDetails['total_tax'],
                'total' => $itemkitDetails['total'],
                'total_tax2' => $itemkitDetails['total_tax2'],
                'tax_rate2_id' => $itemkitDetails['tax_rate2_id'],
                'inv_discount' => $itemkitDetails['inv_discount'],
                'discount_id' => $itemkitDetails['discount_id'],
                'updated_by' => $itemkitDetails['user'],
                'shipping' => $itemkitDetails['shipping']
            );

        $this->db->where('id', $id);
        if ($this->db->update('itemkits', $itemkitData) && $this->db->delete('itemkit_items', array('itemkit_id' => $id))) {

            $addOn = array('itemkit_id' => $id);
            end($addOn);
            foreach ($items as &$var) {
                $var = array_merge($addOn, $var);
            }

            if ($this->db->insert_batch('itemkit_items', $items)) {
                return true;
            }

        }

        return false;
    }

    public function deleteItemkit($id)
    {

        if ($this->db->delete('itemkit_items', array('itemkit_id' => $id)) && $this->db->delete('itemkits', array('id' => $id)) && $this->db->delete('products', array('itemkit_id' => $id))) {
            return true;
        }

        return FALSE;
    }

    public function getProductNames($term)
    {
        $this->db->select('name');
        $this->db->like('name', $term, 'both');
        $q = $this->db->get('products');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getProductByName($name)
    {

        $q = $this->db->get_where('products', array('name' => $name), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }

        return FALSE;

    }

    // Issue #1 - Hyder - 21 July 2014 - START - N nouvo fonction sa pu risse tou ban gifts by name pu met lr sa espece form ki ressembler n invoice la.
    function gifts($gifts_arr)
    {

        $gifts_filtered = array_filter($gifts_arr);

        $gifts_ids = implode(',', $gifts_filtered);
        $this->db->select("*");

        foreach ($gifts_filtered as $gift) {

            $this->db->where('id =', $gift);
            $q = $this->db->get('products');
            if ($q->num_rows() > 0) {
                foreach (($q->result()) as $row) {
                    $data[] = $row;
                }

            }
        }
     //   var_dump($data);

        return $data;

    }
    // Issue #1 - Hyder - 21 July 2014 - END

}
