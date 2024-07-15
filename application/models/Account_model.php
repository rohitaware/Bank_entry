<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function process_multiple_transfers($accounts) {
        $this->db->trans_start();

        foreach ($accounts as $account) {
            $this->db->insert('transfers', $account);
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
    }
}
?>
