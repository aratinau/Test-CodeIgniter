<?php
class Users_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_users()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function set_users()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'firstname' => $this->input->post('firstname'),
            'email' => $this->input->post('email')
        );

        return $this->db->insert('users', $data);
    }

    public function get_one_user($id)
    {
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function update_user($update_user)
    {
        $this->db->set('name', $update_user['name']);
        $this->db->set('firstname', $update_user['firstname']);
        $this->db->set('email', $update_user['email']);
        $id = intval($update_user['id']);
        $this->db->where('id', $id);
        $this->db->update('users');
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }
}