<?php
class Pendidikan extends CI_Controller
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
    $data['title'] = "Pendidikan";
    $data['pendidikan'] = $this->M_pendidikan->get_data('tb_pendidikan')->result();
    $data['desa'] = $this->M_pendidikan->tampil_desa()->result();
    $this->load->view('camat/template/header', $data);
    $this->load->view('camat/template/sidebar');
    $this->load->view('camat/data_penduduk/v_pendidikan', $data);
    $this->load->view('camat/template/footer');
  }

  public function detail_data($id_pendidikan)
  {
    $data['title'] = "Detail Data Pendidikan";
    $detail = $this->M_pendidikan->detail_data($id_pendidikan);
    $data['detail'] = $detail;
    $this->load->view('camat/template/header', $data);
    $this->load->view('camat/template/sidebar');
    $this->load->view('camat/data_penduduk/v_pendidikan_detail', $data);
    $this->load->view('camat/template/footer');
  }

  public function filter_pendidikan()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    // var_dump($tahun, $bulan);
    // die;
    $data['desa'] = $this->M_jeniskelamin->tampil_desa()->result();
    $data['pendidikan'] = $this->M_pendidikan->filter_pendidikan($bulan, $tahun);
    $this->load->view('camat/template/header', $data);
    $this->load->view('camat/template/sidebar');
    $this->load->view('camat/data_penduduk/v_pendidikan', $data);
    $this->load->view('camat/template/footer');
  }
}
