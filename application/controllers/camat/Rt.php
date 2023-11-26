<?php
class Rt extends CI_Controller
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
    $data['title'] = "rt";
    $data['rt'] = $this->M_rt->get_data('tb_rt')->result();
    $data['desa'] = $this->M_pendidikan->tampil_desa()->result();
    $this->load->view('camat/template/header', $data);
    $this->load->view('camat/template/sidebar');
    $this->load->view('camat/data_perangkat/v_rt', $data);
    $this->load->view('camat/template/footer');
  }

  public function filter_rt()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    // var_dump($tahun, $bulan);
    // die;
    $data['desa'] = $this->M_jeniskelamin->tampil_desa()->result();
    $data['rt'] = $this->M_rt->filter_rt($bulan, $tahun);
    $this->load->view('camat/template/header', $data);
    $this->load->view('camat/template/sidebar');
    $this->load->view('camat/data_perangkat/v_rt', $data);
    $this->load->view('camat/template/footer');
  }
}
