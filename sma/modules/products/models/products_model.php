<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

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
| MODULE: 			Products
| -----------------------------------------------------
| This is products module model file.
| -----------------------------------------------------
*/

class Products_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function getAllProducts()
    {
        $q = $this->db->get('products');
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

    public function getProductByCategoryID($id)
    {

        $q = $this->db->get_where('products', array('category_id' => $id), 1);
        if ($q->num_rows() > 0) {
            return true;
        }

        return FALSE;

    }

    public function getProductsByCode($code)
    {
        $q = $this->db->query("SELECT * FROM products WHERE code LIKE '%{$code}%' ORDER BY code");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getProductQuantity($product_id, $warehouse = DEFAULT_WAREHOUSE)
    {
        $q = $this->db->get_where('warehouses_products', array('product_id' => $product_id, 'warehouse_id' => $warehouse), 1);

        if ($q->num_rows() > 0) {
            return $q->row_array(); //$q->row();
        }

        return FALSE;

    }

    public function getAllWarehouses()
    {
        $q = $this->db->get('warehouses');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getWarehouseByID($id)
    {

        $q = $this->db->get_where('warehouses', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
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

    public function addProduct($code, $name, $photo, $data = array())
    {

        /*#################################################################################*/
        /*#####################Abdallah - issue #28 - 08-07-2014  - START##################*/
        /*#################################################################################*/
        if ($photo == NULL) {
            // Product data
            $productData = array(
                'code' => $data['code'],
                'name' => $data['name'],
                'menu_id' => $data['category_id'],
                'category_id' => $data['subcategory_id'],
                'unit' => $data['unit'],
                'size' => $data['size'],
                'cost' => $data['cost'],
                'price' => $data['price'],
                'alert_quantity' => $data['alert_quantity']
            );
        } else {
            // Product data
            $productData = array(
                'code' => $data['code'],
                'name' => $data['name'],
                'menu_id' => $data['category_id'],
                'category_id' => $data['subcategory_id'],
                'unit' => $data['unit'],
                'size' => $data['size'],
                'cost' => $data['cost'],
                'price' => $data['price'],
                'alert_quantity' => $data['alert_quantity'],
                'image' => $photo
            );
        }
        /*#################################################################################*/
        /*#####################Abdallah - issue #28 - 08-07-2014  - END####################*/
        /*#################################################################################*/

        if ($this->db->insert('products', $productData)) {
            return true;
        } else {
            return false;
        }
    }

    public function add_products($data = array())
    {

        if ($this->db->insert_batch('products', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePrice($data = array())
    {

        if ($this->db->update_batch('products', $data, 'code')) {
            return true;
        } else {
            return false;
        }
    }

    /*#############################################################################*/
    /*#####################Abdallah - issue #11 - 10-07-2014  - START##############*/
    /*#############################################################################*/
    public function updateProduct ($id, $photo, $data = array())
    {
        if ($photo == NULL) {
            // Product data
            $productData = array(
                'code' => $data['code'],
                'name' => $data['name'],
                'menu_id' => $data['menu_id'],
                'category_id' => $data['category_id'],
                'unit' => $data['unit'],
                'size' => $data['size'],
                'cost' => $data['cost'],
                'price' => $data['price'],
                'alert_quantity' => $data['alert_quantity']
            );
        } else {
            // Product data
            $productData = array(
                'code' => $data['code'],
                'name' => $data['name'],
                'menu_id' => $data['menu_id'],
                'category_id' => $data['category_id'],
                'unit' => $data['unit'],
                'size' => $data['size'],
                'cost' => $data['cost'],
                'price' => $data['price'],
                'alert_quantity' => $data['alert_quantity'],
                'image' => $photo
            );
        }
        /*#############################################################################*/
        /*#####################Abdallah - issue #11 - 10-07-2014  - START##############*/
        /*#############################################################################*/
        $this->db->where ('id', $id);
        if ($this->db->update ('products', $productData)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduct($id)
    {
        if ($this->db->delete('products', array('id' => $id)) && $this->db->delete('warehouses_products', array('product_id' => $id))) {
            return true;
        }
        return FALSE;
    }

    public function getAllCategories()
    {
        $q = $this->db->get('categories');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function totalCategoryProducts($category_id)
    {
        $q = $this->db->get_where('products', array('category_id' => $category_id));

        return $q->num_rows();

    }

    public function getCategoryByID($id)
    {
        $q = $this->db->get_where('categories', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }

        return FALSE;

    }

    public function getCategoryByCode($code)
    {
        $q = $this->db->get_where('categories', array('code' => $code), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }

        return FALSE;

    }

    public function getSubCategoriesByCategoryID($category_id)
    {
        $q = $this->db->get_where("categories", array('category_id' => $category_id));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }

        return FALSE;
    }

    public function getDamagePdByID($id)
    {

        $q = $this->db->get_where('damage_products', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }

        return FALSE;

    }

    public function addDamage($product_id, $date, $quantity, $warehouse, $note)
    {

        if ($wh_qty_details = $this->getProductQuantity($product_id, $warehouse)) {
            $balance_qty = $wh_qty_details['quantity'] - $quantity;
            $this->updateQuantity($product_id, $warehouse, $balance_qty);
        } else {
            $balance_qty = 0 - $quantity;
            $this->insertQuantity($product_id, $warehouse, $balance_qty);
        }

        $data = array(
            'date' => $date,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'warehouse_id' => $warehouse,
            'note' => $note,
            'user' => USER_NAME
        );

        if ($this->db->insert('damage_products', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateDamage($id, $product_id, $date, $quantity, $warehouse, $note)
    {

        $wh_qty_details = $this->getProductQuantity($product_id, $warehouse);
        $dp_details = $this->getDamagePdByID($id);
        $old_quantity = $wh_qty_details['quantity'] + $dp_details->quantity;
        $balance_qty = $old_quantity - $quantity;

        $data = array(
            'date' => $date,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'warehouse_id' => $warehouse,
            'note' => $note,
            'user' => USER_NAME
        );

        if ($this->db->update('damage_products', $data, array('id' => $id)) && $this->updateQuantity($product_id, $warehouse, $balance_qty)) {
            return true;
        } else {
            return false;
        }
    }

    public function insertQuantity($product_id, $warehouse_id, $quantity)
    {

        // Product data
        $productData = array(
            'product_id' => $product_id,
            'warehouse_id' => $warehouse_id,
            'quantity' => $quantity
        );

        if ($this->db->insert('warehouses_products', $productData)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateQuantity($product_id, $warehouse_id, $quantity)
    {

        $productData = array(
            'quantity' => $quantity
        );

        if ($this->db->update('warehouses_products', $productData, array('product_id' => $product_id, 'warehouse_id' => $warehouse_id))) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteDamage($id)
    {

        if ($this->db->delete('damage_products', array('id' => $id))) {
            return true;
        }

        return false;
    }

    /*#################################################################################*/
    /*#####################Abdallah - issue #28 - 08-07-2014  - START##################*/
    /*#################################################################################*/
    public function getAllMenus()
    {
        $q = $this->db->get('menus');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getSubCategoriesByMenuId($menu_id)
    {
        $q = $this->db->get_where("categories", array('menu_id' => $menu_id));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }

        return FALSE;
    }
    /*#################################################################################*/
    /*#####################Abdallah - issue #28 - 08-07-2014  - END####################*/
    /*#################################################################################*/

    /*
      #############################################################################
      #####################Abdallah - issue #11 - 10-07-2014  - START##############
      #############################################################################
      */
    public function getProductInfoByID ($id)
    {
        $this->db->select ('categories.`name` AS cat_name,
                                    menus.`name` AS menu_name,
                                    products.id AS prod_id,
                                    products.`code`,
                                    products.`name` AS prod_name,
                                    products.price,
                                    products.`status`,
                                    products.alert_quantity,
                                    products.image,
                                    products.category_id,
                                    products.menu_id,
                                    products.unit,
                                    products.size,
                                    products.cost');
        $this->db->from ('products');
        $this->db->where ('products.id', $id);
        $this->db->join ('categories', 'categories.id = products.category_id');
        $this->db->join ('menus', 'menus.id = products.menu_id');
        $q = $this->db->get ();
        if ($q->num_rows () > 0) {
            return $q->row ();
        }
        return FALSE;
    }

    public function getAllSubBrand ()
    {
        $q = $this->db->get ('categories');
        if ($q->num_rows () > 0) {
            foreach (($q->result ()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    /*
   #############################################################################
   #####################Abdallah - issue #11 - 10-07-2014  - END##############
   #############################################################################
   */
}
