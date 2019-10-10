<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('url');
    }
    public function index()
    {
        if ($this->session->userdata('statusadmin') != "login") {
            redirect(base_url('Login'));
        } else {
            $data['username'] = $this->session->userdata('username');
            $data['totaluser'] = $this->admin_model->getUser();
            $data['totalbuku'] = $this->admin_model->getBuku();
            $this->load->view('admin/dashboard', $data);
        }
    }
    public function Daftarpengguna()
    {
        if ($this->session->userdata('statusadmin') != "login") {
            redirect(base_url('Login'));
        } else {
            $data['username'] = $this->session->userdata('username');
            $data['listuser'] = $this->admin_model->getUser();

            $this->load->view('admin/daftarpengguna', $data);
        }
    }
    public function Daftarbuku()
    {
        if ($this->session->userdata('statusadmin') != "login") {
            redirect(base_url('Login'));
        } else {
            $data['username'] = $this->session->userdata('username');
            $data['listbuku'] = $this->admin_model->getBuku();

            $this->load->view('admin/daftarbuku', $data);
        }
    }
    public function Saveedit()
    {
        $editid = $this->input->post('editid');
        $editusername = $this->input->post('editusername');
        $editemail = $this->input->post('editemail');

        $this->admin_model->saveEditUser($editid, $editusername, $editemail);
        redirect(base_url('Admin/Daftarpengguna'));
    }
    public function SaveeditBuku()
    {

        redirect(base_url('Admin/Daftarpengguna'));
    }
    public function Adduser()
    {
        $tambahusername = $this->input->post('tambahusername');
        $tambahemail = $this->input->post('tambahemail');
        $tambahpassword = $this->input->post('tambahpassword');
        if ($this->input->post('tambahstatus') == "User") {
            $tambahstatus = -1;
        }
        $this->admin_model->addUser($tambahusername, $tambahemail, $tambahstatus, $tambahpassword);
        redirect(base_url('Admin/Daftarpengguna'));
    }
    public function Addbuku()
    {
        $tambahjudul = $this->input->post('tambahjudul');
        $tambahtipe = $this->input->post('tambahtipe');
        $tambahpenulis = $this->input->post('tambahpenulis');
        $tambahpenerbit = $this->input->post('tambahpenerbit');
        $tambahisbn = $this->input->post('tambahisbn');
        $tambahketerangan = $this->input->post('tambahketerangan');
        $tambahgambar = $this->input->post('tambahgambar');
        $tambahtahun = $this->input->post('tambahtahun');
        echo $tambahgambar;
        // redirect(base_url('Admin/Daftarbuku'));
    }
    public function Deleteuser()
    {
        $id = $this->uri->segment(3);
        $this->admin_model->Deleteuser($id);
        redirect(base_url('Admin/Daftarpengguna'));
    }
}
