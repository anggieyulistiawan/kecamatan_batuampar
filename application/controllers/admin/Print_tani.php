<?php

class Print_tani extends CI_Controller
{
    public function index()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/data_pmd/print/v_tani_filter');
        $this->load->view('admin/template/footer');
    }


    public function cetaklaporantani()
    {
        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $data['print_tani'] = $this->M_tani->filter_print($tanggal_awal, $tanggal_akhir);
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/data_pmd/print/v_tani_cetak');
        $this->load->view('admin/template/footer');
    }
}
