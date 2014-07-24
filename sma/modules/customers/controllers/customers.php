<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends MX_Controller
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
    | MODULE: 			Customers
    | -----------------------------------------------------
    | This is customers module controller file.
    | -----------------------------------------------------
    */

    function __construct()
    {
        parent::__construct();

        // check if user logged in
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

        $this->load->library('form_validation');
        $this->load->model('customers_model');

    }

    function index()
    {

        $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $data['success_message'] = $this->session->flashdata('success_message');
        $data['payment_types'] = $this->customers_model->getAllPayment_types();
        $data['credit_allowances'] = $this->customers_model->getAllCredit_allowances();
        $data['region_days'] = $this->customers_model->getAllRegion_days();

        $meta['page_title'] = $this->lang->line("customers");
        $data['page_title'] = $this->lang->line("customers");
        $this->load->view('commons/header', $meta);
        $this->load->view('content', $data);
        $this->load->view('commons/footer');
    }

    function getdatatableajax()
    {

        $this->load->library('datatables');
        $this->datatables
            ->select("id, surname, name, home_number, email,region,type,blue,status")
            ->from("customers")

            ->add_column("Actions",
                "<center>
                <a class=\"tip\" title='" . $this->lang->line("edit_customer") . "' href='index.php?module=customers&amp;view=edit&amp;id=$1'><i class=\"icon-edit\"></i></a>
				<a class=\"tip\" title='" . $this->lang->line("delete_customer") . "' href='index.php?module=customers&amp;view=delete&amp;id=$1' onClick=\"return confirm('" . $this->lang->line('alert_x_customer') . "')\"><i class=\"icon-remove\"></i></a>
				<a class=\"tip approve\" title='approve' id=\"$1\" href='#'><i id=\"approval_icon\" class=\"icon-thumbs-up\"></i><span class=\"thumb_status\" style=\"display:none;\">$2</span></a>
				 </center>", "id,status")
            ->unset_column('id')
            ->unset_column('status');

        echo $this->datatables->generate();

    }

    function add()
    {

        $groups = array('owner', 'admin', 'salesman');
        if (!$this->ion_auth->in_group($groups)) {
            $this->session->set_flashdata('message', $this->lang->line("access_denied"));
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            redirect('module=home', 'refresh');
        }

        //validate form input

        $this->form_validation->set_rules('surname', $this->lang->line("surname"), 'required|xss_clean');
        $this->form_validation->set_rules('name', $this->lang->line("name"), 'required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line("email_address"), 'valid_email');
        $this->form_validation->set_rules('company', $this->lang->line("company"), 'xss_clean');
        $this->form_validation->set_rules('id_number', $this->lang->line("id_number"), 'required|xss_clean');
        $this->form_validation->set_rules('dob', $this->lang->line("dob"), 'required|xss_clean');
        $this->form_validation->set_rules('training_date', $this->lang->line("training_date"), 'required|xss_clean');
        $this->form_validation->set_rules('religion', $this->lang->line("religion"), 'xss_clean');
        $this->form_validation->set_rules('work_number', $this->lang->line("work_number"), 'xss_clean');
        //    $this->form_validation->set_rules('coordinator_name', $this->lang->line("coordinator_name"), 'required|xss_clean'); // Hyder - issue #31 - 4 June 2014 - comment on purpose - optional field
        $this->form_validation->set_rules('credit_allowance', $this->lang->line("credit_allowance"), 'required|xss_clean');
        $this->form_validation->set_rules('place_of_work', $this->lang->line("place_of_work"), 'xss_clean');
        $this->form_validation->set_rules('no_of_work', $this->lang->line("no_of_work"), 'xss_clean');
        $this->form_validation->set_rules('payment_type', $this->lang->line("payment_type"), 'required|xss_clean');
        $this->form_validation->set_rules('proof_of_address', $this->lang->line("proof_of_address"), 'xss_clean');
        $this->form_validation->set_rules('authorization_letter', $this->lang->line("authorization_letter"), 'xss_clean');
        $this->form_validation->set_rules('cf4', $this->lang->line("ccf4"), 'xss_clean');
        $this->form_validation->set_rules('cf5', $this->lang->line("ccf5"), 'xss_clean');
        $this->form_validation->set_rules('cf6', $this->lang->line("ccf6"), 'xss_clean');
        $this->form_validation->set_rules('address', $this->lang->line("address"), 'required|xss_clean');
        $this->form_validation->set_rules('region', $this->lang->line("region"), 'required|xss_clean');
        $this->form_validation->set_rules('alternative_address', $this->lang->line("alternative_address"), 'xss_clean');
        //	$this->form_validation->set_rules('postal_code', $this->lang->line("postal_code"), 'required|xss_clean'); // Hyder - issue #31 - 4 June 2014 - comment on purpose - optional field
        //	$this->form_validation->set_rules('country', $this->lang->line("country"), 'required|xss_clean');
        $this->form_validation->set_rules('home_number', $this->lang->line("home_number"), 'xss_clean|min_length[7]|max_length[16]');
        $this->form_validation->set_rules('mobile_number', $this->lang->line("mobile_number"), 'required|xss_clean|min_length[7]|max_length[16]');
        $this->form_validation->set_rules('emergency_number', $this->lang->line("emergency_number"), 'xss_clean|min_length[7]|max_length[16]');

        if ($this->form_validation->run() == true) {
            //$payment_type_id = $this->input->post('payment_type');
            //$region_id = $this->input->post('region');

            $inv_dob = trim($this->input->post('dob'));
            $inv_training_date = trim($this->input->post('training_date'));
            if (JS_DATE == 'dd-mm-yyyy' || JS_DATE == 'dd/mm/yyyy') {
                $dob = substr($inv_dob, -4) . "-" . substr($inv_dob, 3, 2) . "-" . substr($inv_dob, 0, 2);
                $training_date = substr($inv_training_date, -4) . "-" . substr($inv_training_date, 3, 2) . "-" . substr($inv_training_date, 0, 2);
            } else {
                $dob = substr($inv_dob, -4) . "-" . substr($inv_dob, 0, 2) . "-" . substr($inv_dob, 3, 2);
                $training_date = substr($inv_training_date, -4) . "-" . substr($inv_training_date, 0, 2) . "-" . substr($inv_training_date, 3, 2);
            }

            // Hyder - issue #31 - 4 June 2014 - START

            if ($this->input->post('team_leader') == '0') {
                $type = 'teamleader';
                $teamleaderid = 0;

            } else {
                $type = 'consultant';
                $teamleaderid = $this->input->post('team_leader');
            }

            // Hyder - issue #31 - 4 June 2014 - END

            $data = array('surname' => $this->input->post('surname'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'company' => $this->input->post('company'),
                'id_number' => $this->input->post('id_number'),
                'dob' => $dob,
                'training_date' => $training_date,
                'religion' => $this->input->post('religion'),
                'work_number' => $this->input->post('work_number'),
                'coordinator_name' => $this->input->post('coordinator_name'),
                'credit_allowance' => $this->input->post('credit_allowance'),
                'place_of_work' => $this->input->post('place_of_work'),
                'no_of_work' => $this->input->post('no_of_work'),
                'payment_type' => $this->input->post('payment_type'),
                'proof_of_address' => $this->input->post('proof_of_address'),
                'authorization_letter' => $this->input->post('authorization_letter'),
                'cf4' => $this->input->post('cf4'),
                'cf5' => $this->input->post('cf5'),
                'cf6' => $this->input->post('cf6'),
                'address' => $this->input->post('address'),
                'region' => $this->input->post('region'),
                'alternative_address' => $this->input->post('alternative_address'),
                'postal_code' => $this->input->post('postal_code'),
                //	'country' => $this->input->post('country'),
                'home_number' => $this->input->post('home_number'),
                'mobile_number' => $this->input->post('mobile_number'),
                'emergency_number' => $this->input->post('emergency_number'),
                'type' => $type,
                'status' => 'pending',
                'teamleaderid' => $teamleaderid,
                'blue' => $this->input->post('blue'), // Hyder - issue #29 - 8 June 2014

            );

        }

        if ($this->form_validation->run() == true && $this->customers_model->addCustomer($data)) { //check to see if we are creating the customer

            //redirect them back to the admin page
            $this->session->set_flashdata('success_message', $this->lang->line("customer_added"));
            redirect("module=customers", 'refresh');
        } else { //display the create customer form
            //set the flash data error message if there is one

            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

            $data['surname'] = array('name' => 'surname',
                'id' => 'surname',
                'type' => 'text',
                'value' => $this->form_validation->set_value('surname'),
            );
            $data['name'] = array('name' => 'name',
                'id' => 'name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('name'),
            );
            $data['email'] = array('name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $data['company'] = array('name' => 'company',
                'id' => 'company',
                'type' => 'text',
                'value' => $this->form_validation->set_value('company'),
            );
            $data['cui'] = array('name' => 'cui',
                'id' => 'cui',
                'type' => 'text',
                'value' => $this->form_validation->set_value('cui', '-'),
            );
            $data['reg'] = array('name' => 'reg',
                'id' => 'reg',
                'type' => 'text',
                'value' => $this->form_validation->set_value('reg', '-'),
            );
            $data['cnp'] = array('name' => 'cnp',
                'id' => 'cnp',
                'type' => 'text',
                'value' => $this->form_validation->set_value('cnp', '-'),
            );
            $data['serie'] = array('name' => 'serie',
                'id' => 'serie',
                'type' => 'text',
                'value' => $this->form_validation->set_value('serie', '-'),
            );
            $data['account_no'] = array('name' => 'account_no',
                'id' => 'account_no',
                'type' => 'text',
                'value' => $this->form_validation->set_value('account_no', '-'),
            );
            $data['bank'] = array('name' => 'bank',
                'id' => 'bank',
                'type' => 'text',
                'value' => $this->form_validation->set_value('bank', '-'),
            );
            $data['address'] = array('name' => 'address',
                'id' => 'address',
                'type' => 'text',
                'value' => $this->form_validation->set_value('address'),
            );
            $data['region'] = array('name' => 'region',
                'id' => 'region',
                'type' => 'text',
                'value' => $this->form_validation->set_value('region'),
            );
            $data['alternative_address'] = array('name' => 'alternative_address',
                'id' => 'alternative_address',
                'type' => 'text',
                'value' => $this->form_validation->set_value('alternative_address'),
            );
            $data['postal_code'] = array('name' => 'postal_code',
                'id' => 'postal_code',
                'type' => 'text',
                'value' => $this->form_validation->set_value('postal_code'),
            );
            /*	$data['country'] = array('name' => 'country',
                    'id' => 'country',
                    'type' => 'text',
                    'value' => $this->form_validation->set_value('country'),
                );*/
            $data['home_number'] = array('name' => 'home_number',
                'id' => 'home_number',
                'type' => 'text',
                'value' => $this->form_validation->set_value('home_number'),
            );
            $data['mobile_number'] = array('name' => 'mobile_number',
                'id' => 'mobile_number',
                'type' => 'text',
                'value' => $this->form_validation->set_value('mobile_number'),
            );
            $data['emergency_number'] = array('name' => 'emergency_number',
                'id' => 'emergency_number',
                'type' => 'text',
                'value' => $this->form_validation->set_value('emergency_number'),
            );
            $data['dob'] = array('name' => 'dob',
                'id' => 'dob',
                'type' => 'text',
                'value' => $this->form_validation->set_value('dob'),
            );
            $data['training_date'] = array('name' => 'training_date',
                'id' => 'training_date',
                'type' => 'text',
                'value' => $this->form_validation->set_value('training_date'),
            );
            $data['id_number'] = array('name' => 'id_number',
                'id' => 'id_number',
                'type' => 'text',
                'value' => $this->form_validation->set_value('id_number'),
            );
            $data['religion'] = array('name' => 'religion',
                'id' => 'religion',
                'type' => 'text',
                'value' => $this->form_validation->set_value('religion'),
            );
            $data['work_number'] = array('name' => 'work_number',
                'id' => 'work_number',
                'type' => 'text',
                'value' => $this->form_validation->set_value('work_number'),
            );
            $data['coordinator_name'] = array('name' => 'coordinator_name',
                'id' => 'coordinator_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('coordinator_name'),
            );
            $data['credit_allowance'] = array('name' => 'credit_allowance',
                'id' => 'credit_allowance',
                'type' => 'text',
                'value' => $this->form_validation->set_value('credit_allowance'),
            );
            $data['place_of_work'] = array('name' => 'place_of_work',
                'id' => 'place_of_work',
                'type' => 'text',
                'value' => $this->form_validation->set_value('place_of_work'),
            );
            $data['no_of_work'] = array('name' => 'no_of_work',
                'id' => 'no_of_work',
                'type' => 'text',
                'value' => $this->form_validation->set_value('no_of_work'),
            );
            $data['payment_type'] = array('name' => 'payment_type',
                'id' => 'payment_type',
                'type' => 'text',
                'value' => $this->form_validation->set_value('payment_type'),
            );
            $data['proof_of_address'] = array('name' => 'proof_of_address',
                'id' => 'proof_of_address',
                'type' => 'text',
                'value' => $this->form_validation->set_value('proof_of_address'),
            );
            $data['authorization_letter'] = array('name' => 'authorization_letter',
                'id' => 'authorization_letter',
                'type' => 'text',
                'value' => $this->form_validation->set_value('authorization_letter'),
            );

            $data['teamleaders'] = $this->customers_model->get_teamleaders(); // Hyder - issue #31 - 4 June 2014
            $data['payment_types'] = $this->customers_model->getAllPayment_types();
            $data['credit_allowances'] = $this->customers_model->getAllCredit_allowances();
            $meta['page_title'] = $this->lang->line("new_customer");
            $data['region_days'] = $this->customers_model->getAllRegion_days();
            $data['page_title'] = $this->lang->line("new_customer");

            $this->load->view('commons/header', $meta);
            $this->load->view('add', $data);
            $this->load->view('commons/footer');

        }
    }

    function edit($id = NULL)
    {
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }
        $groups = array('owner', 'admin', 'salesman');
        if (!$this->ion_auth->in_group($groups)) {
            $this->session->set_flashdata('message', $this->lang->line("access_denied"));
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            redirect('module=home', 'refresh');
        }

        //validate form input
        $this->form_validation->set_rules('surname', $this->lang->line("surname"), 'required|xss_clean');
        $this->form_validation->set_rules('name', $this->lang->line("name"), 'required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line("email_address"), 'valid_email');
        $this->form_validation->set_rules('company', $this->lang->line("company"), 'xss_clean');
        $this->form_validation->set_rules('id_number', $this->lang->line("id_number"), 'required|xss_clean');
        $this->form_validation->set_rules('dob', $this->lang->line("dob"), 'required|xss_clean');
        $this->form_validation->set_rules('training_date', $this->lang->line("training_date"), 'required|xss_clean');
        //	$this->form_validation->set_rules('religion', $this->lang->line("religion"), 'xss_clean'); // Hyder - issue #31 - 4 June 2014 - comment on purpose - optional field
        $this->form_validation->set_rules('work_number', $this->lang->line("work_number"), 'xss_clean'); // Hyder - issue #31 - 4 June 2014
        //  $this->form_validation->set_rules('coordinator_name', $this->lang->line("coordinator_name"), 'required|xss_clean');
        $this->form_validation->set_rules('credit_allowance', $this->lang->line("credit_allowance"), 'required|xss_clean');
        $this->form_validation->set_rules('place_of_work', $this->lang->line("place_of_work"), 'xss_clean');
        $this->form_validation->set_rules('no_of_work', $this->lang->line("no_of_work"), 'xss_clean');
        $this->form_validation->set_rules('payment_type', $this->lang->line("payment_type"), 'required|xss_clean');
        $this->form_validation->set_rules('proof_of_address', $this->lang->line("proof_of_address"), 'xss_clean');
        $this->form_validation->set_rules('authorization_letter', $this->lang->line("authorization_letter"), 'xss_clean');
        $this->form_validation->set_rules('cf4', $this->lang->line("ccf4"), 'xss_clean');
        $this->form_validation->set_rules('cf5', $this->lang->line("ccf5"), 'xss_clean');
        $this->form_validation->set_rules('cf6', $this->lang->line("ccf6"), 'xss_clean');
        $this->form_validation->set_rules('address', $this->lang->line("address"), 'required|xss_clean');
        $this->form_validation->set_rules('region', $this->lang->line("region"), 'required|xss_clean');
        //	$this->form_validation->set_rules('alternative_address', $this->lang->line("alternative_address"), 'xss_clean'); // Hyder - issue #31 - 4 June 2014 - comment on purpose - optional field
        $this->form_validation->set_rules('postal_code', $this->lang->line("postal_code"), 'required|xss_clean');
        //	$this->form_validation->set_rules('country', $this->lang->line("country"), 'xss_clean');
        $this->form_validation->set_rules('home_number', $this->lang->line("home_number"), 'xss_clean|min_length[7]|max_length[16]');
        $this->form_validation->set_rules('mobile_number', $this->lang->line("mobile_number"), 'required|xss_clean|min_length[7]|max_length[16]');
        $this->form_validation->set_rules('emergency_number', $this->lang->line("emergency_number"), 'xss_clean|min_length[7]|max_length[16]');

        if ($this->form_validation->run() == true) {

            // Hyder - issue #31 - 4 June 2014 - START

            if ($this->input->post('team_leader') == '0') {
                $type = 'teamleader';
                $teamleaderid = 0;

            } else {
                $type = 'consultant';
                $teamleaderid = $this->input->post('team_leader');
            }
            // Hyder - issue #31 - 4 June 2014 - END

            $payment_type_id = $this->input->post('payment_type');
            $credit_allowance_id = $this->input->post('credit_allowance');
            $region_id = $this->input->post('region');
            $data = array('surname' => $this->input->post('surname'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'company' => $this->input->post('company'),
                'id_number' => $this->input->post('id_number'),
                'dob' => $this->input->post('dob'),
                'training_date' => $this->input->post('training_date'),
                'religion' => $this->input->post('religion'),
                'work_number' => $this->input->post('work_number'),
                //  'coordinator_name' => $this->input->post('coordinator_name'), ; // Hyder - issue #31 - 4 June 2014 - comment on purpose - optional field
                'credit_allowance' => $this->input->post('credit_allowance'),
                'place_of_work' => $this->input->post('place_of_work'),
                'no_of_work' => $this->input->post('no_of_work'),
                'payment_type' => $this->input->post('payment_type'),
                'proof_of_address' => $this->input->post('proof_of_address'),
                'authorization_letter' => $this->input->post('authorization_letter'),
                'cf4' => $this->input->post('cf4'),
                'cf5' => $this->input->post('cf5'),
                'cf6' => $this->input->post('cf6'),
                'address' => $this->input->post('address'),
                'region' => $this->input->post('region'),
                'alternative_address' => $this->input->post('alternative_address'),
                'postal_code' => $this->input->post('postal_code'),
                //	'country' => $this->input->post('country'),
                'home_number' => $this->input->post('home_number'),
                'mobile_number' => $this->input->post('mobile_number'),
                'emergency_number' => $this->input->post('emergency_number'),
                'type' => $type,
                'blue' => $this->input->post('blue'),
                'teamleaderid' => $teamleaderid
            );

        }

        if ($this->form_validation->run() == true && $this->customers_model->updateCustomer($id, $data)) {
            $this->session->set_flashdata('success_message', $this->lang->line("customer_updated"));
            redirect("module=customers", 'refresh');
        } else {
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            $data['teamleaders'] = $this->customers_model->get_teamleaders(); // Hyder - issue #31 - 4 June 2014
            $data['customer'] = $this->customers_model->getCustomerByID($id);
            $data['payment_types'] = $this->customers_model->getAllPayment_types();
            $data['credit_allowances'] = $this->customers_model->getAllCredit_allowances();
            $data['region_days'] = $this->customers_model->getAllRegion_days();
            $meta['page_title'] = $this->lang->line("update_customer");
            $data['id'] = $id;
            $data['page_title'] = $this->lang->line("update_customer");
            $this->load->view('commons/header', $meta);
            $this->load->view('edit', $data);
            $this->load->view('commons/footer');

        }
    }

    function add_by_csv()
    {

        $groups = array('owner', 'admin');
        if (!$this->ion_auth->in_group($groups)) {
            $this->session->set_flashdata('message', $this->lang->line("access_denied"));
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            redirect('module=products', 'refresh');
        }

        $this->form_validation->set_rules('userfile', $this->lang->line("upload_file"), 'xss_clean');

        if ($this->form_validation->run() == true) {

            if (DEMO) {
                $this->session->set_flashdata('message', $this->lang->line("disabled_in_demo"));
                redirect('module=home', 'refresh');
            }

            if (isset($_FILES["userfile"])) /*if($_FILES['userfile']['size'] > 0)*/ {

                $this->load->library('upload');

                $config['upload_path'] = 'assets/uploads/csv/';
                $config['allowed_types'] = 'csv';
                $config['max_size'] = '200';
                $config['overwrite'] = TRUE;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload()) {

                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', $error);
                    redirect("module=suppliers&view=add_by_csv", 'refresh');
                }

                $csv = $this->upload->file_name;

                $arrResult = array();
                $handle = fopen("assets/uploads/csv/" . $csv, "r");
                if ($handle) {
                    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $arrResult[] = $row;
                    }
                    fclose($handle);
                }
                $titles = array_shift($arrResult);

                $keys = array('name', 'email', 'home_number', 'mobile_number', 'emergency_number', 'dob', 'training_date', 'company', 'address', 'region', 'alternative_address', 'postal_code', 'country', 'id_number', 'religion', 'work_number', 'coordinator_name', 'credit_allowance', 'place_of_work', 'no_of_work', 'payment_type', 'proof_of_address', 'authorization_letter');

                $final = array();

                foreach ($arrResult as $key => $value) {
                    $final[] = array_combine($keys, $value);
                }
                $rw = 2;
                foreach ($final as $csv) {
                    if ($this->customers_model->getCustomerByEmail($csv['email'])) {
                        $this->session->set_flashdata('message', $this->lang->line("check_customer_email") . " (" . $csv['email'] . "). " . $this->lang->line("customer_already_exist") . " " . $this->lang->line("line_no") . " " . $rw);
                        redirect("module=customers&view=add_by_csv", 'refresh');
                    }
                    $rw++;
                }
            }

            $final = $this->mres($final);
            //$data['final'] = $final;
        }

        if ($this->form_validation->run() == true && $this->customers_model->add_customers($final)) {
            $this->session->set_flashdata('success_message', $this->lang->line("customers_added"));
            redirect('module=customers', 'refresh');
        } else {

            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

            $data['userfile'] = array('name' => 'userfile',
                'id' => 'userfile',
                'type' => 'text',
                'value' => $this->form_validation->set_value('userfile')
            );

            $meta['page_title'] = $this->lang->line("add_customers_by_csv");
            $data['page_title'] = $this->lang->line("add_customers_by_csv");
            $this->load->view('commons/header', $meta);
            $this->load->view('add_by_csv', $data);
            $this->load->view('commons/footer');

        }

    }

    function delete($id = NULL)
    {
        if (DEMO) {
            $this->session->set_flashdata('message', $this->lang->line("disabled_in_demo"));
            redirect('module=home', 'refresh');
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }
        if (!$this->ion_auth->in_group('owner')) {
            $this->session->set_flashdata('message', $this->lang->line("access_denied"));
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            redirect('module=home', 'refresh');
        }

        if ($this->customers_model->deleteCustomer($id)) {
            $this->session->set_flashdata('success_message', $this->lang->line("customer_deleted"));
            redirect("module=customers", 'refresh');
        }

    }

    function mres($q)
    {
        if (is_array($q))
            foreach ($q as $k => $v)
                $q[$k] = $this->mres($v); //recursive
        elseif (is_string($q))
            $q = mysql_real_escape_string($q);
        return $q;
    }

    function suggestions()
    {
        $term = $this->input->get('term', TRUE);

        if (strlen($term) < 2) break;

        $rows = $this->customers_model->getCustomerNames($term);

        $json_array = array();
        foreach ($rows as $row)
            array_push($json_array, $row->name);

        echo json_encode($json_array);
    }

    // issue #29 - Hyder - 9 June 2014 - START - Approval by admin - fonction la em nouvo!
    function approve_customer()
    {
        $id = $_GET['id'];
        $status = $_GET['status'];

        if ($status != 'icon-thumbs-up') {
            $data = array(
                'status' => 'approved'
            );
            $flag = 'approved';
        } else {
            $data = array(
                'status' => 'pending'
            );
            $flag = 'pending';
        }

        echo $flag;
        $this->db->where('id', $id);
        $this->db->update('customers', $data);
        //  echo $this->db->last_query();

    }

    // issue #29 - Hyder - 9 June 2014 - START - Approval by admin
}