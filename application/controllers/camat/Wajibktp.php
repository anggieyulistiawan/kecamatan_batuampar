<?php
class Wajibktp extends CI_Controller
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
    $data['title'] = "Wajib KTP";
    $data['wajibktp'] = $this->M_wajibktp->get_data('tb_wajibktp')->result();
    $data['desa'] = $this->M_wajibktp->tampil_desa()->result();
    $this->load->view('camat/template/header', $data);
    $this->load->view('camat/template/sidebar');
    $this->load->view('camat/data_penduduk/v_wajibktp', $data);
    $this->load->view('camat/template/footer');
  }

  public function detail_data($id_wajibktp)
  {
    $data['title'] = "Detail Data Wajib KTP-EL";
    $detail = $this->M_wajibktp->detail_data($id_wajibktp);
    $data['detail'] = $detail;
    $this->load->view('camat/template/header', $data);
    $this->load->view('camat/template/sidebar');
    $this->load->view('camat/data_penduduk/v_wajibktp_detail', $data);
    $this->load->view('camat/template/footer');
  }

  public function filter_wajibktp()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    // var_dump($tahun, $bulan);
    // die;
    $data['desa'] = $this->M_jeniskelamin->tampil_desa()->result();
    $data['wajibktp'] = $this->M_wajibktp->filter_wajibktp($bulan, $tahun);
    $this->load->view('camat/template/header', $data);
    $this->load->view('camat/template/sidebar');
    $this->load->view('camat/data_penduduk/v_wajibktp', $data);
    $this->load->view('camat/template/footer');
  }
}
