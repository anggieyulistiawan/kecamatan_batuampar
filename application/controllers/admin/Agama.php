<?php
class Agama extends CI_Controller
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
    $data['title'] = "Agama";
    $data['agama'] = $this->M_agama->get_data('tb_agama')->result();
    $data['desa'] = $this->M_agama->tampil_desa()->result();
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/data_penduduk/v_agama', $data);
    $this->load->view('admin/template/footer');
  }

  public function detail_data($id_agama)
  {
    $data['title'] = "Detail Data agama";
    $detail = $this->M_agama->detail_data($id_agama);
    $tanggal_agama = $detail->tanggal_agama;
    list($tahun, $bulan, $tanggal) = explode('-', $tanggal_agama);
    $id_akun = $detail->id_akun;
    $data['jumlah'] = $this->M_pendidikan->get_data_selesihi($tahun, $bulan, $id_akun);
    $data['detail'] = $detail;
    // var_dump($data['jumlah']);
    // die;
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/data_penduduk/v_agama_detail', $data);
    $this->load->view('admin/template/footer');
  }

  public function update_data_aksi()
  {
    $id = $this->input->post('id_agama');
    $islam_l = $this->input->post('islam_l');
    $islam_p = $this->input->post('islam_p');
    $katholik_l = $this->input->post('katholik_l');
    $katholik_p = $this->input->post('katholik_p');
    $kristen_l = $this->input->post('kristen_l');
    $kristen_p = $this->input->post('kristen_p');
    $hindu_l = $this->input->post('hindu_l');
    $hindu_p = $this->input->post('hindu_p');
    $budha_l = $this->input->post('budha_l');
    $budha_p = $this->input->post('budha_p');
    $kepercayaan_l = $this->input->post('kepercayaan_l');
    $kepercayaan_p = $this->input->post('kepercayaan_p');


    $data = array(
      'islam_l'    => $islam_l,
      'islam_p'    => $islam_p,
      'katholik_l'    => $katholik_l,
      'katholik_p'    => $katholik_p,
      'kristen_l'    => $kristen_l,
      'kristen_p'    => $kristen_p,
      'hindu_l'    => $hindu_l,
      'hindu_p'    => $hindu_p,
      'budha_l'    => $budha_l,
      'budha_p'    => $budha_p,
      'kepercayaan_l'    => $kepercayaan_l,
      'kepercayaan_p'    => $kepercayaan_p,
    );

    $where = array(
      'id_agama' => $id,
    );


    $this->M_agama->update_data('tb_agama', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil diupdate !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('admin/agama');
  }

  public function delete_data($id)
  {
    $where = array('id_agama' => $id);
    $this->M_agama->delete_data($where, 'tb_agama');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('admin/agama');
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
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/data_penduduk/v_agama', $data);
    $this->load->view('admin/template/footer');
  }
}
