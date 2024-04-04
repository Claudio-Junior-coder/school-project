<?php
class Auth_model extends CI_Model {

    # VALIDA USUÁRIO
    function validate() {
        $query = $this->db->get_where('users', 
        ['email' => $this->input->post('email'), 'password' => md5($this->input->post('password')) ])->row();

        if ($query) { 
            return $query; // RETORNA VERDADEIRO
        }

        return false;
    }

    # VERIFICA SE O USUÁRIO ESTÁ LOGADO
    function logged() {
        $logged = $this->session->userdata('logged');

        if (!isset($logged) || $logged != true) {
            redirect('login');
        }

        return true;
    }

    function logout() {
        $logged = $this->session->userdata('logged');

        if (isset($logged) || $logged == true) {
            $this->session->unset_userdata('data');   
            $this->session->unset_userdata('logged');   
            redirect('login');
        }
    }
}