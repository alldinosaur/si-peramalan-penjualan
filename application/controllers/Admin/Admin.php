<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        // $tanggal = date('Y-m-d');
        // $data['transaksi'] = $this->db
        //     ->query(
        //         "SELECT sum(transaksi_nominal) AS total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and transaksi_tanggal='$tanggal'"
        //     )
        //     ->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function insert(){
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $bulan = $this->db->query("SELECT bulan FROM pendapatan")->row_array();

        $this->form_validation->set_rules('bulan', 'bulan', 'required');
        $this->form_validation->set_rules('nilai', 'nilai', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        } elseif (in_array($this->input->post("bulan"), $bulan)) {
            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">Pendapatan gagal ditambahkan, bulan tidak boleh sama.</div>'
            );
            redirect('Admin/admin/index');
        } 
        else {
            $this->db->insert('pendapatan', [
                'bulan' => $this->input->post('bulan'),
                'nilai' => $this->input->post('nilai'),
            ]);

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-danger" role="alert">Bulan baru berhasil ditambahkan.</div>'
            );
            redirect('Admin/admin/index');
        }
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleaccess($role_id)
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['role'] = $this->db
            ->get_where('user_role', ['id' => $role_id])
            ->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }
    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id,
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Access Change!</div>'
        );
    }
}
