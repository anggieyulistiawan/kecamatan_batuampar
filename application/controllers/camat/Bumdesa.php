<?php
class Bumdesa extends CI_Controller
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
    $data['title'] = "Bumdesa";
    $data['bumdesa'] = $this->M_bumdesa->get_data('tb_bumdesa')->result();
    $this->load->view('camat/template/header', $data);
    $this->load->view('camat/template/sidebar');
    $this->load->view('camat/data_pmd/v_bumdesa', $data);
    $this->load->view('camat/template/footer');
  }

  public function filter_bumdesa()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    // var_dump($tahun, $bulan);
    // die;
    $data['desa'] = $this->M_jeniskelamin->tampil_desa()->result();
    $data['bumdesa'] = $this->M_bumdesa->filter_bumdesa($bulan, $tahun);
    $this->load->view('camat/template/header', $data);
    $this->load->view('camat/template/sidebar');
    $this->load->view('camat/data_pmd/v_bumdesa', $data);
    $this->load->view('camat/template/footer');
  }

  public function detail_views($id)
  {
    $data['bumdesa'] = $this->M_bumdesa->detail_data_update($id);
    $this->load->view('camat/data_pmd/v_views_bumdesa', $data);
  }
}
