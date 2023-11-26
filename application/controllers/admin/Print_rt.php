<?php

class Print_rt extends CI_Controller
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
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/data_perangkat/print/v_rt_filter');
        $this->load->view('admin/template/footer');
    }


    public function cetaklaporanrt()
    {
        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $data['print_rt'] = $this->M_rt->filter_print($tanggal_awal, $tanggal_akhir);
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/data_perangkat/print/v_rt_cetak');
        $this->load->view('admin/template/footer');
    }
}
