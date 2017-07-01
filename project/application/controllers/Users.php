<?php
class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['users'] = $this->users_model->get_users();
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Nom', 'required');
        $this->form_validation->set_rules('firstname', 'Prénom', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        $this->load->view('templates/header');

        if ($this->form_validation->run() === TRUE)
        {
            // is it an update ?
            if(!is_null($this->input->post('id')))
            {
                $update_user['name'] = $this->input->post('name');
                $update_user['firstname'] = $this->input->post('firstname');
                $update_user['email'] = $this->input->post('email');
                $update_user['id'] = $this->input->post('id');
                $this->users_model->update_user($update_user);
            }
            else
                $this->users_model->set_users();

            redirect('/');
        }

        // delete
        if ($this->input->get('delete'))
        {
            $id = intval($this->input->get('delete'));
            $this->users_model->delete_user($id);

            redirect('/');
        }

        //update
        $data_update = null;
        if ($this->input->get('update'))
        {
            $data_user = intval($this->input->get('update'));
            $data_user = $this->users_model->get_one_user($data_user);

            $data_update['user_update'] = $data_user;
        }
        $this->load->view('users/create', $data_update);


        $this->load->view('users/index', $data);
        $this->load->view('templates/footer');
    }
}