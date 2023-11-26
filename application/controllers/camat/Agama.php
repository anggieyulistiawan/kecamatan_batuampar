<?php
class Agama extends CI_Controller
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
    $data['title'] = "Agama";
    $data['agama'] = $this->M_agama->get_data('tb_agama')->result();
    $data['desa'] = $this->M_agama->tampil_desa()->result();
    $this->load->view('camat/template/header', $data);
    $this->load->view('camat/template/sidebar');
    $this->load->view('camat/data_penduduk/v_agama', $data);
    $this->load->view('camat/template/footer');
  }

  public function detail_data($id_agama)
  {
    $data['title'] = "Detail Data agama";
    $detail = $this->M_agama->detail_data($id_agama);
    $data['detail'] = $detail;
    $this->load->view('camat/template/header', $data);
    $this->load->view('camat/template/sidebar');
    $this->load->view('camat/data_penduduk/v_agama_detail', $data);
    $this->load->view('camat/template/footer');
  }

  public function filter_agama()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    // var_dump($tahun, $bulan);
    // die;
    $data['desa'] = $this->M_jeniskelamin->tampil_desa()->result();
    $data['agama'] = $this->M_agama->filter_agama($bulan, $tahun);
    $this->load->view('camat/template/header', $data);
    $this->load->view('camat/template/sidebar');
    $this->load->view('camat/data_penduduk/v_agama', $data);
    $this->load->view('camat/template/footer');
  }
}
