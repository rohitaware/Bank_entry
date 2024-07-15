<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Account_model');
        $this->load->helper('url');
    }

    public function create() {
        // Load the form view
        $this->load->view('dashboard');
    }

    public function multiple_transfer() {
        $account_holder_names = $this->input->post('account_holder_name');
        $ifsc_codes = $this->input->post('ifsc_code');
        $account_numbers = $this->input->post('account_number');
        $bank_names = $this->input->post('bank_name');
        $emails = $this->input->post('email');

        $data = [];
        for ($i = 0; $i < count($account_holder_names); $i++) {
            $data[] = [
                'account_holder_name' => $account_holder_names[$i],
                'ifsc_code' => $ifsc_codes[$i],
                'account_number' => $account_numbers[$i],
                'bank_name' => $bank_names[$i],
                'email' => $emails[$i]
            ];
        }

        $result = $this->Account_model->process_multiple_transfers($data);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Transfers completed successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to complete transfers.']);
        }
    }
}
?>
