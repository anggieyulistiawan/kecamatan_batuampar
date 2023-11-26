<?php

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('id_level') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    		<strong>Harap untuk login terlebih dahulu !</strong>
    		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		  <span aria-hidden="true">&times;</span>
    		</button>
    	  </div>');
            redirect('login');
        }
    }

    public function index()
    {
        $akun = $this->db->query("SELECT * FROM tb_akun");
        $data['akun'] = $akun->num_rows();

        $desa = $this->db->query("SELECT * FROM tb_desa");
        $data['desa'] = $desa->num_rows();

        $bumdesa = $this->db->query("SELECT * FROM tb_bumdesa");
        $data['bumdesa'] = $bumdesa->num_rows();

        $tani = $this->db->query("SELECT * FROM tb_tani");
        $data['tani'] = $tani->num_rows();

        $id = $this->session->userdata('id_akun');
        $data['aakun'] = $this->db->query("SELECT * FROM tb_akun 
        JOIN tb_desa on tb_akun.id_desa=tb_desa.id_desa
        JOIN tb_level on tb_akun.id_level=tb_level.id_level WHERE id_akun='$id'")->result();
        // var_dump($data);
        // die;

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/v_dashboard', $data);
        $this->load->view('admin/template/footer');
    }
}
