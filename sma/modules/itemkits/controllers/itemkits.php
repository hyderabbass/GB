<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Itemkits extends MX_Controller
{

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
    | MODULE: 			Itemkits
    | -----------------------------------------------------
    | This is itemkits module controller file.
    | -----------------------------------------------------
    */

    function __construct()
    {
        parent::__construct();

        // check if user logged in
        if (!$this->ion_auth->logged_in()) {
            redirect('module=auth&view=login');
        }
        $this->load->library('form_validation');
        $this->load->model('itemkits_model');

    }
    /* -------------------------------------------------------------------------------------------------------------------------------- */
//index or inventories page

    function index()
    {

        if ($this->ion_auth->in_group('purchaser')) {
            $this->session->set_flashdata('message', $this->lang->line("access_denied"));
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            redirect('module=home', 'refresh');
        }

        $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
        $data['success_message'] = $this->session->flashdata('success_message');
        $data['products'] = $this->itemkits_model->getAllProduct_names();

        $meta['page_title'] = $this->lang->line("itemkits");
        $data['page_title'] = $this->lang->line("itemkits");
        $this->load->view('commons/header', $meta);
        $this->load->view('itemkits', $data);
        $this->load->view('commons/footer');
    }

    function getitemkits()
    {

        $this->load->library('datatables');
        $this->datatables
            ->select("id, date, itemkit_no, itemkit_name, new_price, internal_note")
            ->from('itemkits')
            ->add_column("Actions",
                "<center><a href='#' title='$2' class='tip' data-html='true'><i class='icon-folder-close'></i></a> <a href='#' onClick=\"MyWindow=window.open('index.php?module=itemkits&view=view_itemkit&id=$1', 'MyWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1000,height=600'); return false;\" title='" . $this->lang->line("view_itemkit") . "' class='tip'><i class='icon-fullscreen'></i></a>
								<a href='index.php?module=itemkits&amp;view=edit&amp;id=$1' title='" . $this->lang->line("edit_itemkit") . "' class='tip'><i class='icon-edit'></i></a>
							    <a href='index.php?module=itemkits&amp;view=delete&amp;id=$1' onClick=\"return confirm('" . $this->lang->line('alert_x_itemkit') . "')\" title='" . $this->lang->line("delete_itemkit") . "' class='tip'><i class='icon-trash'></i></a></center>", "id, internal_note")
            ->unset_column('id')
            ->unset_column('internal_note');

        echo $this->datatables->generate();

    }


    /* -------------------------------------------------------------------------------------------------------------------------------- */
//view inventory as html page

    function view_itemkit()
    {
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        } else {
            $id = NULL;
        }

        $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

        $data['rows'] = $this->itemkits_model->getAllItemkitItems($id);

        $inv = $this->itemkits_model->getItemkitByID($id);
        // #Issue 1 - 21 June 2014 - HYDER - START
        $gifts_arr = array(
            $inv->gift_one,
            $inv->gift_two,
            $inv->gift_three,
            $inv->gift_four,
            $inv->gift_five
        );


        $gifts_details = $this->itemkits_model->gifts($gifts_arr);

        // #Issue 1 - 21 June 2014 - HYDER - END

        $invoice_type_id = $inv->invoice_type;

        $data['inv'] = $inv;
        $data['id'] = $id;
        $data['gifts'] = $gifts_details;

        $data['page_title'] = $this->lang->line("itemkit");

        $this->load->view('view_itemkit', $data);

    }

    /* -------------------------------------------------------------------------------------------------------------------------------- */
//Add new inventory

    function add()
    {
        $groups = array('purchaser', 'viewer');
        if ($this->ion_auth->in_group($groups)) {
            $this->session->set_flashdata('message', $this->lang->line("access_denied"));
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            redirect('module=itemkits', 'refresh');
        }
        //	var_dump($_POST['gift_one']);
        //   exit();
        $this->form_validation->set_message('is_natural_no_zero', $this->lang->line("no_zero_required"));
        //validate form input
        $this->form_validation->set_rules('itemkit_no', $this->lang->line("itemkit_no"), 'required|xss_clean');
        $this->form_validation->set_rules('itemkit_name', $this->lang->line("itemkit_name"), '|required|xss_clean');
        $this->form_validation->set_rules('itemkit_unit', $this->lang->line("itemkit_unit"), 'required|integer|xss_clean');
        $this->form_validation->set_rules('new_price', $this->lang->line("new_price"), 'required|integer|xss_clean');
        $this->form_validation->set_rules('gift_one', $this->lang->line("gift_one"), 'xss_clean');
        $this->form_validation->set_rules('gift_two', $this->lang->line("gift_two"), 'xss_clean');
        $this->form_validation->set_rules('gift_three', $this->lang->line("gift_three"), 'xss_clean');
        // Issue #1 - Add two more fields for gifts -  START
        $this->form_validation->set_rules('gift_four', 'Gift-No. Four', 'xss_clean');
        $this->form_validation->set_rules('gift_five', 'Gift-No. Five', 'xss_clean');
        // Issue #1 - Add two more fields for gifts -  END

        $this->form_validation->set_rules('date', $this->lang->line("date"), 'required|xss_clean');
        $this->form_validation->set_rules('start_date', $this->lang->line("start_date"), 'required|xss_clean');
        $this->form_validation->set_rules('end_date', $this->lang->line("end_date"), 'required|xss_clean');
        $this->form_validation->set_rules('note', $this->lang->line("note"), 'xss_clean');
        if (TAX2) {
            $this->form_validation->set_rules('tax2', $this->lang->line("tax2"), 'is_natural_no_zero|xss_clean');
        }
        if (DISCOUNT_OPTION == 1) {
            $this->form_validation->set_rules('inv_discount', $this->lang->line("discount"), 'required|is_natural_no_zero|xss_clean');
        }

        $quantity = "quantity";
        $product = "product";
        $unit_price = "unit_price";
        $tax_rate = "tax_rate";
        $dis = "discount";

        if ($this->form_validation->run() == true) {
            $inv_date = trim($this->input->post('date'));
            $inv_start_date = trim($this->input->post('start_date'));
            $inv_end_date = trim($this->input->post('end_date'));
            if (JS_DATE == 'dd-mm-yyyy' || JS_DATE == 'dd/mm/yyyy') {
                $date = substr($inv_date, -4) . "-" . substr($inv_date, 3, 2) . "-" . substr($inv_date, 0, 2);
                $start_date = substr($inv_start_date, -4) . "-" . substr($inv_start_date, 3, 2) . "-" . substr($inv_start_date, 0, 2);
                $end_date = substr($inv_end_date, -4) . "-" . substr($inv_end_date, 3, 2) . "-" . substr($inv_end_date, 0, 2);
            } else {
                $date = substr($inv_date, -4) . "-" . substr($inv_date, 0, 2) . "-" . substr($inv_date, 3, 2);
                $start_date = substr($inv_start_date, -4) . "-" . substr($inv_start_date, 0, 2) . "-" . substr($inv_start_date, 3, 2);
                $end_date = substr($inv_end_date, -4) . "-" . substr($inv_end_date, 0, 2) . "-" . substr($inv_end_date, 3, 2);
            }

            $itemkit_no = $this->input->post('itemkit_no');
            $itemkit_name = $this->input->post('itemkit_name');
            $itemkit_unit = $this->input->post('itemkit_unit');
            $new_price = $this->input->post('new_price');
            $gift_one = $this->input->post('gift_one');
            $gift_two = $this->input->post('gift_two');
            $gift_three = $this->input->post('gift_three');
            // Issue #1 - Add two more fields for gifts -  START
            $gift_four = $this->input->post('gift_four');
            $gift_five = $this->input->post('gift_five');
            // Issue #1 - Add two more fields for gifts -  END

            if (DISCOUNT_OPTION == 1) {
                $inv_discount = $this->input->post('inv_discount');
            }
            if (TAX2) {
                $tax_rate2 = $this->input->post('tax2');
            }
            $note = $this->ion_auth->clear_tags($this->input->post('note'));
            $internal_note = $this->ion_auth->clear_tags($this->input->post('internal_note'));

            $inv_total_no_tax = 0;

            for ($i = 1; $i <= 500; $i++) {
                if ($this->input->post($quantity . $i) && $this->input->post($product . $i) && $this->input->post($unit_price . $i)) {

                    if (TAX1) {
                        $tax_id = $this->input->post($tax_rate . $i);
                        $tax_details = $this->itemkits_model->getTaxRateByID($tax_id);
                        $taxRate = $tax_details->rate;
                        $taxType = $tax_details->type;
                        $tax_rate_id[] = $tax_id;

                        if ($taxType == 1 && $taxRate != 0) {
                            $item_tax = (($this->input->post($quantity . $i)) * ($this->input->post($unit_price . $i)) * $taxRate / 100);
                            $val_tax[] = $item_tax;
                        } else {
                            $item_tax = $taxRate;
                            $val_tax[] = $item_tax;
                        }

                        if ($taxType == 1) {
                            $tax[] = $taxRate . "%";
                        } else {
                            $tax[] = $taxRate;
                        }
                    } else {
                        $tax_rate_id[] = 0;
                        $val_tax[] = 0;
                        $tax[] = "";
                    }

                    if (DISCOUNT_METHOD == 1 && DISCOUNT_OPTION == 2) {

                        $discount_id = $this->input->post($dis . $i);
                        $ds_details = $this->itemkits_model->getDiscountByID($discount_id);
                        $ds = $ds_details->discount;
                        $dsType = $ds_details->type;
                        $dsID[] = $discount_id;

                        if ($dsType == 1) {
                            $val_ds[] = (($this->input->post($quantity . $i)) * ($this->input->post($unit_price . $i)) * $ds / 100);
                        } else {
                            $val_ds[] = $ds * ($this->input->post($quantity . $i));
                        }

                        if ($dsType == 1) {
                            $discount[] = $ds . "%";
                        } else {
                            $discount[] = $ds;
                        }

                    } elseif (DISCOUNT_METHOD == 2 && DISCOUNT_OPTION == 2) {

                        $discount_id = $this->input->post($dis . $i);
                        $ds_details = $this->itemkits_model->getDiscountByID($discount_id);
                        $ds = $ds_details->discount;
                        $dsType = $ds_details->type;
                        $dsID[] = $discount_id;

                        if ($dsType == 1) {
                            $val_ds[] = (((($this->input->post($quantity . $i)) * ($this->input->post($unit_price . $i)) + $item_tax) * $ds) / 100);
                        } else {
                            $val_ds[] = $ds * ($this->input->post($quantity . $i));
                        }

                        if ($dsType == 1) {
                            $discount[] = $ds . "%";
                        } else {
                            $discount[] = $ds;
                        }

                    } else {
                        $val_ds[] = 0;
                        $dsID[] = 0;
                        $discount[] = "";

                    }
                    $inv_quantity[] = $this->input->post($quantity . $i);
                    $inv_product_code[] = $this->input->post($product . $i);
                    $inv_unit_price[] = $this->input->post($unit_price . $i);
                    $inv_gross_total[] = (($this->input->post($quantity . $i)) * ($this->input->post($unit_price . $i)));

                    $inv_total_no_tax += (($this->input->post($quantity . $i)) * ($this->input->post($unit_price . $i)));

                }
            }

            if (DISCOUNT_OPTION == 2) {
                $total_ds = array_sum($val_ds);
            } else {
                $total_ds = 0;
            }

            if (TAX1) {
                $total_tax = array_sum($val_tax);
            } else {
                $total_tax = 0;
            }

            if (!empty($inv_product_code)) {
                foreach ($inv_product_code as $pr_code) {
                    $product_details = $this->itemkits_model->getProductByCode($pr_code);
                    $product_id[] = $product_details->id;
                    $product_name[] = $product_details->name;
                    $product_code[] = $product_details->code;
                    $product_unit[] = $product_details->unit;
                }
            }

            $kys = array("code", "name", "unit", "size", "um", "cost", "price", "alert_quantity", "image", "category_id", "subcategory_id", "gender_id");

            $kits = array();
            foreach (array_map(null, $code, $name, $unit, $size, $um, $cost, $price, $alert_quantity, $image, $category_id, $subcategory_id, $gender_id) as $ky => $val) {
                $kits[] = array_combine($kys, $val);
            }

            $keys = array("product_id", "product_code", "product_name", "product_unit", "tax_rate_id", "tax", "quantity", "unit_price", "gross_total", "val_tax", "discount_val", "discount", "discount_id");

            $items = array();
            foreach (array_map(null, $product_id, $product_code, $product_name, $product_unit, $tax_rate_id, $tax, $inv_quantity, $inv_unit_price, $inv_gross_total, $val_tax, $val_ds, $discount, $dsID) as $key => $value) {
                $items[] = array_combine($keys, $value);
            }

            if (TAX2) {
                $tax_dts = $this->itemkits_model->getTaxRateByID($tax_rate2);
                $taxRt = $tax_dts->rate;
                $taxTp = $tax_dts->type;

                if ($taxTp == 1 && $taxRt != 0) {
                    $val_tax2 = ($inv_total_no_tax * $taxRt / 100);
                } else {
                    $val_tax2 = $taxRt;
                }

            } else {
                $val_tax2 = 0;
                $tax_rate2 = 0;
            }

            if (DISCOUNT_METHOD == 1 && DISCOUNT_OPTION == 1) {

                $ds_dts = $this->itemkits_model->getDiscountByID($inv_discount);
                $ds = $ds_dts->discount;
                $dsTp = $ds_dts->type;

                if ($dsTp == 1 && $dsTp != 0) {
                    $val_discount = ($inv_total_no_tax * $ds / 100);
                } else {
                    $val_discount = $taxRt;
                }

            } elseif (DISCOUNT_METHOD == 2 && DISCOUNT_OPTION == 1) {

                $ds_dts = $this->itemkits_model->getDiscountByID($inv_discount);
                $ds = $ds_dts->discount;
                $dsTp = $ds_dts->type;

                if ($dsTp == 1 && $dsTp != 0) {
                    $val_discount = ((($inv_total_no_tax + $total_tax + $val_tax2) * $ds) / 100);
                } else {
                    $val_discount = $taxRt;
                }

            } else {
                $val_discount = $total_ds;
                $inv_discount = 0;
            }

            $gTotal = $inv_total_no_tax + $total_tax + $val_tax2 - $val_discount;

            $itemkitDetails = array('itemkit_no' => $itemkit_no,
                'itemkit_name' => $itemkit_name,
                'itemkit_unit' => $itemkit_unit,
                'new_price' => $new_price,
                'gift_one' => $gift_one,
                'gift_two' => $gift_two,
                'gift_three' => $gift_three,
                #Issue #1 - HYDER - START
                'gift_four' => $gift_four,
                'gift_five' => $gift_five,
                #Issue #1 - HYDER -  END
                'date' => $date,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'note' => $note,
                'internal_note' => $internal_note,
                'inv_total' => $inv_total_no_tax,
                'total_tax' => $total_tax,
                'total' => $gTotal,
                'total_tax2' => $val_tax2,
                'tax_rate2_id' => $tax_rate2,
                'inv_discount' => $val_discount,
                'discount_id' => $inv_discount,
                'user' => USER_NAME,
                'shipping' => $shipping
            );
        }

        if ($this->form_validation->run() == true && !empty($items)) {
            if ($this->itemkits_model->addItemkit($itemkitDetails, $items)) {
                $this->session->set_flashdata('success_message', $this->lang->line("itemkit_added"));
                redirect("module=itemkits", 'refresh');
            }

        } else {
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

            $data['date'] = array('name' => 'date',
                'id' => 'date',
                'type' => 'text',
                'value' => $this->form_validation->set_value('date'),
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
            $data['itemkit_name'] = array('name' => 'itemkit_name',
                'id' => 'itemkit_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('itemkit_name'),
            );
            $data['itemkit_unit'] = array('name' => 'itemkit_unit',
                'id' => 'itemkit_unit',
                'type' => 'text',
                'value' => $this->form_validation->set_value('itemkit_unit'),
            );
            $data['new_price'] = array('name' => 'new_price',
                'id' => 'new_price',
                'type' => 'text',
                'value' => $this->form_validation->set_value('new_price'),
            );
            $data['gift_one'] = array('name' => 'gift_one',
                'id' => 'gift_one',
                'type' => 'text',
                'value' => $this->form_validation->set_value('gift_one'),
            );
            $data['gift_two'] = array('name' => 'gift_two',
                'id' => 'gift_two',
                'type' => 'text',
                'value' => $this->form_validation->set_value('gift_two'),
            );
            $data['gift_three'] = array('name' => 'gift_three',
                'id' => 'gift_three',
                'type' => 'text',
                'value' => $this->form_validation->set_value('gift_three'),
            );
            # Issue #1 - 21 June 2014 - START
            $data['gift_four'] = array('name' => 'gift_four',
                'id' => 'gift_four',
                'type' => 'text',
                'value' => $this->form_validation->set_value('gift_four'),
            );
            $data['gift_five'] = array('name' => 'gift_five',
                'id' => 'gift_five',
                'type' => 'text',
                'value' => $this->form_validation->set_value('gift_five'),
            );

            # Issue #1 - 21 June 2014 - END
            $data['products'] = $this->itemkits_model->getAllProducts();
            $data['tax_rates'] = $this->itemkits_model->getAllTaxRates();
            $data['discounts'] = $this->itemkits_model->getAllDiscounts();
            $data['rnumber'] = $this->itemkits_model->getNextAI();
            if (DISCOUNT_OPTION == 1) {
                $discount_details = $this->itemkits_model->getDiscountByID(DEFAULT_DISCOUNT);

                $data['discount_rate'] = $discount_details->discount;
                $data['discount_type'] = $discount_details->type;
                $data['discount_name'] = $discount_details->name;
            }
            if (DISCOUNT_OPTION == 2) {
                $discount2_details = $this->itemkits_model->getDiscountByID(DEFAULT_DISCOUNT);
                $data['discount_rate2'] = $discount2_details->discount;
                $data['discount_type2'] = $discount2_details->type;
            }
            if (TAX1) {
                $tax_rate_details = $this->itemkits_model->getTaxRateByID(DEFAULT_TAX);
                $data['tax_rate'] = $tax_rate_details->rate;

                $data['tax_type'] = $tax_rate_details->type;
                $data['tax_name'] = $tax_rate_details->name;

            }
            if (TAX2) {
                $tax_rate2_details = $this->itemkits_model->getTaxRateByID(DEFAULT_TAX2);
                $data['tax_rate2'] = $tax_rate2_details->rate;
                $data['tax_name2'] = $tax_rate2_details->name;
                $data['tax_type2'] = $tax_rate2_details->type;
            }

            $data['products'] = $this->itemkits_model->getAllProduct_names();
            $meta['page_title'] = $this->lang->line("add_itemkit");
            $data['page_title'] = $this->lang->line("add_itemkit");
            $this->load->view('commons/header', $meta);
            $this->load->view('add', $data);
            $this->load->view('commons/footer');

        }
    }


    /* -------------------------------------------------------------------------------------------------------------------------------- */
//Edit inventory

    function edit()
    {
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        } else {
            $id = NULL;
        }

        $groups = array('purchaser', 'viewer');
        if ($this->ion_auth->in_group($groups)) {
            $this->session->set_flashdata('message', $this->lang->line("access_denied"));
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            redirect('module=itemkits', 'refresh');
        }

        $this->form_validation->set_message('is_natural_no_zero', $this->lang->line("no_zero_required"));
        //validate form input
        $this->form_validation->set_rules('itemkit_no', $this->lang->line("itemkit_no"), 'required|xss_clean');
        $this->form_validation->set_rules('itemkit_name', $this->lang->line("itemkit_name"), '|required|xss_clean');
        $this->form_validation->set_rules('itemkit_unit', $this->lang->line("itemkit_unit"), 'required|integer|xss_clean');
        $this->form_validation->set_rules('new_price', $this->lang->line("new_price"), 'required|decimal|xss_clean');
        $this->form_validation->set_rules('gift_one', $this->lang->line("gift_one"), 'xss_clean');
        $this->form_validation->set_rules('gift_two', $this->lang->line("gift_two"), 'xss_clean');
        $this->form_validation->set_rules('gift_three', $this->lang->line("gift_three"), 'xss_clean');
        # Issue #1 - Hyder - START
        $this->form_validation->set_rules('gift_four', $this->lang->line("gift_four"), 'xss_clean');
        $this->form_validation->set_rules('gift_five', $this->lang->line("gift_five"), 'xss_clean');
        # Issue #1 - Hyder - END
        $this->form_validation->set_rules('date', $this->lang->line("date"), 'required|xss_clean');
        $this->form_validation->set_rules('start_date', $this->lang->line("start_date"), 'required|xss_clean');
        $this->form_validation->set_rules('end_date', $this->lang->line("end_date"), 'required|xss_clean');
        $this->form_validation->set_rules('note', $this->lang->line("note"), 'xss_clean');
        if (TAX2) {
            $this->form_validation->set_rules('tax2', $this->lang->line("tax2"), 'is_natural_no_zero|xss_clean');
        }
        if (DISCOUNT_OPTION == 1) {
            $this->form_validation->set_rules('inv_discount', $this->lang->line("discount"), 'required|is_natural_no_zero|xss_clean');
        }

        $quantity = "quantity";
        $product = "product";
        $unit_price = "unit_price";
        $tax_rate = "tax_rate";
        $dis = "discount";

        if ($this->form_validation->run() == true) {

            $inv_date = trim($this->input->post('date'));
            if (JS_DATE == 'dd-mm-yyyy' || JS_DATE == 'dd/mm/yyyy') {
                $date = substr($inv_date, -4) . "-" . substr($inv_date, 3, 2) . "-" . substr($inv_date, 0, 2);
            } else {
                $date = substr($inv_date, -4) . "-" . substr($inv_date, 0, 2) . "-" . substr($inv_date, 3, 2);
            }

            $itemkit_no = $this->input->post('itemkit_no');
            $itemkit_name = $this->input->post('itemkit_name');
            $itemkit_unit = $this->input->post('itemkit_unit');
            $new_price = $this->input->post('new_price');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $gift_one = $this->input->post('gift_one');
            $gift_two = $this->input->post('gift_two');
            $gift_three = $this->input->post('gift_three');
            // Issue #1 - Add two more fields for gifts -  START
            $gift_four = $this->input->post('gift_four');
            $gift_five = $this->input->post('gift_five');
            // Issue #1 - Add two more fields for gifts -  END
            if (DISCOUNT_OPTION == 1) {
                $inv_discount = $this->input->post('inv_discount');
            }
            if (TAX2) {
                $tax_rate2 = $this->input->post('tax2');
            }
            $note = $this->ion_auth->clear_tags($this->input->post('note'));
            $internal_note = $this->ion_auth->clear_tags($this->input->post('internal_note'));
            $in_voice = $this->itemkits_model->getItemkitByID($id);
            $shipping = $this->input->post('shipping');

            $inv_total_no_tax = 0;

            for ($i = 1; $i <= 500; $i++) {
                if ($this->input->post($quantity . $i) && $this->input->post($product . $i) && $this->input->post($unit_price . $i)) {

                    if (TAX1) {
                        $tax_id = $this->input->post($tax_rate . $i);
                        $tax_details = $this->itemkits_model->getTaxRateByID($tax_id);
                        $taxRate = $tax_details->rate;
                        $taxType = $tax_details->type;
                        $tax_rate_id[] = $tax_id;

                        if ($taxType == 1 && $taxRate != 0) {
                            $item_tax = (($this->input->post($quantity . $i)) * ($this->input->post($unit_price . $i)) * $taxRate / 100);
                            $val_tax[] = $item_tax;
                        } else {
                            $item_tax = $taxRate;
                            $val_tax[] = $item_tax;
                        }

                        if ($taxType == 1) {
                            $tax[] = $taxRate . "%";
                        } else {
                            $tax[] = $taxRate;
                        }
                    } else {
                        $tax_rate_id[] = 0;
                        $val_tax[] = 0;
                        $tax[] = "";
                    }

                    if (DISCOUNT_METHOD == 1 && DISCOUNT_OPTION == 2) {

                        $discount_id = $this->input->post($dis . $i);
                        $ds_details = $this->itemkits_model->getDiscountByID($discount_id);
                        $ds = $ds_details->discount;
                        $dsType = $ds_details->type;
                        $dsID[] = $discount_id;

                        if ($dsType == 1) {
                            $val_ds[] = (($this->input->post($quantity . $i)) * ($this->input->post($unit_price . $i)) * $ds / 100);
                        } else {
                            $val_ds[] = $ds * ($this->input->post($quantity . $i));
                        }

                        if ($dsType == 1) {
                            $discount[] = $ds . "%";
                        } else {
                            $discount[] = $ds;
                        }

                    } elseif (DISCOUNT_METHOD == 2 && DISCOUNT_OPTION == 2) {

                        $discount_id = $this->input->post($dis . $i);
                        $ds_details = $this->itemkits_model->getDiscountByID($discount_id);
                        $ds = $ds_details->discount;
                        $dsType = $ds_details->type;
                        $dsID[] = $discount_id;

                        if ($dsType == 1) {
                            $val_ds[] = (((($this->input->post($quantity . $i)) * ($this->input->post($unit_price . $i)) + $item_tax) * $ds) / 100);
                        } else {
                            $val_ds[] = $ds * ($this->input->post($quantity . $i));
                        }

                        if ($dsType == 1) {
                            $discount[] = $ds . "%";
                        } else {
                            $discount[] = $ds;
                        }

                    } else {
                        $val_ds[] = 0;
                        $dsID[] = 0;
                        $discount[] = "";

                    }
                    $inv_quantity[] = $this->input->post($quantity . $i);
                    $inv_product_code[] = $this->input->post($product . $i);
                    $inv_unit_price[] = $this->input->post($unit_price . $i);
                    $inv_gross_total[] = (($this->input->post($quantity . $i)) * ($this->input->post($unit_price . $i)));

                    $inv_total_no_tax += (($this->input->post($quantity . $i)) * ($this->input->post($unit_price . $i)));

                }
            }

            if (DISCOUNT_OPTION == 2) {
                $total_ds = array_sum($val_ds);
            } else {
                $total_ds = 0;
            }

            if (TAX1) {
                $total_tax = array_sum($val_tax);
            } else {
                $total_tax = 0;
            }

            if (!empty($inv_product_code)) {
                foreach ($inv_product_code as $pr_code) {
                    $product_details = $this->itemkits_model->getProductByCode($pr_code);
                    $product_id[] = $product_details->id;
                    $product_name[] = $product_details->name;
                    $product_code[] = $product_details->code;
                    $product_unit[] = $product_details->unit;
                }
            }

            $keys = array("product_id", "product_code", "product_name", "product_unit", "tax_rate_id", "tax", "quantity", "unit_price", "gross_total", "val_tax", "discount_val", "discount", "discount_id");

            $items = array();
            foreach (array_map(null, $product_id, $product_code, $product_name, $product_unit, $tax_rate_id, $tax, $inv_quantity, $inv_unit_price, $inv_gross_total, $val_tax, $val_ds, $discount, $dsID) as $key => $value) {
                $items[] = array_combine($keys, $value);
            }

            if (TAX2) {
                $tax_dts = $this->itemkits_model->getTaxRateByID($tax_rate2);
                $taxRt = $tax_dts->rate;
                $taxTp = $tax_dts->type;

                if ($taxTp == 1 && $taxRt != 0) {
                    $val_tax2 = ($inv_total_no_tax * $taxRt / 100);
                } else {
                    $val_tax2 = $taxRt;
                }

            } else {
                $val_tax2 = 0;
                $tax_rate2 = 0;
            }

            if (DISCOUNT_METHOD == 1 && DISCOUNT_OPTION == 1) {

                $ds_dts = $this->itemkits_model->getDiscountByID($inv_discount);
                $ds = $ds_dts->discount;
                $dsTp = $ds_dts->type;

                if ($dsTp == 1 && $dsTp != 0) {
                    $val_discount = ($inv_total_no_tax * $ds / 100);
                } else {
                    $val_discount = $taxRt;
                }

            } elseif (DISCOUNT_METHOD == 2 && DISCOUNT_OPTION == 1) {

                $ds_dts = $this->itemkits_model->getDiscountByID($inv_discount);
                $ds = $ds_dts->discount;
                $dsTp = $ds_dts->type;

                if ($dsTp == 1 && $dsTp != 0) {
                    $val_discount = ((($inv_total_no_tax + $total_tax + $val_tax2) * $ds) / 100);
                } else {
                    $val_discount = $taxRt;
                }

            } else {
                $val_discount = $total_ds;
                $inv_discount = 0;
            }

            $gTotal = $inv_total_no_tax + $total_tax + $val_tax2 - $val_discount;

            $itemkitDetails = array('itemkit_no' => $itemkit_no,
                'itemkit_name' => $itemkit_name,
                'itemkit_unit' => $itemkit_unit,
                'new_price' => $new_price,
                'gift_one' => $gift_one,
                'gift_two' => $gift_two,
                'gift_three' => $gift_three,
# Issue #1 - Hyder - 21 June 2014 - START
                'gift_four' => $gift_four,
                'gift_five' => $gift_five,
# Issue #1 - Hyder - 21 June 2014 - START
                'date' => $date,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'note' => $note,
                'internal_note' => $internal_note,
                'inv_total' => $inv_total_no_tax,
                'total_tax' => $total_tax,
                'total' => $gTotal,
                'total_tax2' => $val_tax2,
                'tax_rate2_id' => $tax_rate2,
                'inv_discount' => $val_discount,
                'discount_id' => $inv_discount,
                'user' => USER_NAME,
                'shipping' => $shipping
            );

            //var_dump($itemkitDetails);die();
        }

        if ($this->form_validation->run() == true && !empty($items)) {
            if ($this->itemkits_model->updateItemkit($id, $itemkitDetails, $items)) {
                $this->session->set_flashdata('success_message', $this->lang->line("itemkit_updated"));
                redirect("module=itemkits", 'refresh');
            }

        } else { //display the create biller form
            //set the flash data error message if there is one

            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

            $data['tax_rates'] = $this->itemkits_model->getAllTaxRates();
            $data['discounts'] = $this->itemkits_model->getAllDiscounts();
            $data['inv'] = $this->itemkits_model->getItemkitByID($id);
            // #Issue 1 - 21 June 2014 - HYDER - START
            $data['products'] = $this->itemkits_model->getAllProducts(); // bizin sa pu met dan DDL
            $gifts_arr = array(
                $data['inv']->gift_one,
                $data['inv']->gift_two,
                $data['inv']->gift_three,
                $data['inv']->gift_four,
                $data['inv']->gift_five
            );

          //  $gifts_details = $this->itemkits_model->gifts($gifts_arr);
        //    $data['tawfa'] = $gifts_details;
//var_dump($data['tawfa']);

            // #Issue 1 - 21 June 2014 - HYDER - END

            $data['inv_products'] = $this->itemkits_model->getAllItemkitItems($id);
            $data['id'] = $id;
            $meta['page_title'] = $this->lang->line("update_itemkit");
            $data['page_title'] = $this->lang->line("update_itemkit");

            $this->load->view('commons/header', $meta);
            $this->load->view('edit', $data);
            $this->load->view('commons/footer');

        }
    }

    /*-------------------------------*/
    function delete($id = NULL)
    {

        if (!$this->ion_auth->in_group('owner')) {
            $this->session->set_flashdata('message', $this->lang->line("access_denied"));
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            redirect('module=itemkits', 'refresh');
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        } else {
            $id = NULL;
        }

        if ($this->itemkits_model->deleteItemkit($id)) {
            $this->session->set_flashdata('message', $this->lang->line("itemkit_deleted"));
            redirect('module=itemkits&view=itemkits', 'refresh');
        }

    }

    /* -------------------------------------------------------------------------------------------------------------------------------- */

    function scan_item()
    {
        if ($this->input->get('code')) {
            $code = $this->input->get('code');
        }

        if ($item = $this->itemkits_model->getProductByCode($code)) {

            $product_name = $item->name;
            $product_price = $item->price;

            $product = array('name' => $product_name, 'price' => $product_price);

        }

        echo json_encode($product);

    }

    function add_item()
    {
        if ($this->input->get('name')) {
            $name = $this->input->get('name');
        }

        if ($item = $this->itemkits_model->getProductByName($name)) {

            $code = $item->code;
            $price = $item->price;

            $product = array('code' => $code, 'price' => $price);

        }

        echo json_encode($product);

    }

    function suggestions()
    {
        $term = $this->input->get('term', TRUE);

        if (strlen($term) < 2) break;

        $rows = $this->itemkits_model->getProductNames($term);

        $json_array = array();
        foreach ($rows as $row)
            array_push($json_array, $row->name);

        echo json_encode($json_array);
    }

}