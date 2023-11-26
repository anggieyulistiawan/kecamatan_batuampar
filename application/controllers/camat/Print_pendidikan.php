<?php

class Print_pendidikan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('id_level') != '2') {
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
        $this->load->view('camat/template/header');
        $this->load->view('camat/template/sidebar');
        $this->load->view('camat/data_penduduk/print/v_pendidikan_filter');
        $this->load->view('camat/template/footer');
    }


    public function cetaklaporanpendidikan()
    {
        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $data['print_pendidikan'] = $this->M_pendidikan->filter_print($tanggal_awal, $tanggal_akhir);
        $this->load->view('camat/template/header', $data);
        $this->load->view('camat/data_penduduk/print/v_pendidikan_cetak');
        $this->load->view('camat/template/footer');
    }
}
