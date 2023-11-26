<?php
class Pendidikan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('id_level') != '3') {
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
    $data['pendidikan'] = $this->M_pendidikan->get_data_pendidikanuser('tb_pendidikan')->result();
    $data['desa'] = $this->M_pendidikan->tampil_desa()->result();
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_penduduk/v_pendidikan', $data);
    $this->load->view('desa/template/footer');
  }

  public function detail_data($id_pendidikan)
  {
    $data['title'] = "Detail Data Pendidikan";
    $detail = $this->M_pendidikan->detail_data($id_pendidikan);
    $tanggal_pendidikan = $detail->tanggal_pendidikan;
    list($tahun, $bulan, $tanggal) = explode('-', $tanggal_pendidikan);

    $data['jumlah'] = $this->M_pendidikan->get_data_selesih($tahun, $bulan);
    // var_dump($data['jumlah']);
    // die;

    $data['detail'] = $detail;
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_penduduk/v_pendidikan_detail', $data);
    $this->load->view('desa/template/footer');
  }

  public function tambah_data_aksi()
  {
    $id_akun               = $this->session->userdata('id_akun');
    $tidak_sekolah_l = $this->input->post('tidak_sekolah_l');
    $tidak_sekolah_p = $this->input->post('tidak_sekolah_p');
    $tidak_sd_l = $this->input->post('tidak_sd_l');
    $tidak_sd_p = $this->input->post('tidak_sd_p');
    $tamatsd_l = $this->input->post('tamatsd_l');
    $tamatsd_p = $this->input->post('tamatsd_p');
    $sltp_l = $this->input->post('sltp_l');
    $sltp_p = $this->input->post('sltp_p');
    $slta_l = $this->input->post('slta_l');
    $slta_p = $this->input->post('slta_p');
    $diploma12_l = $this->input->post('diploma12_l');
    $diploma12_p = $this->input->post('diploma12_p');
    $diploma3_l = $this->input->post('diploma3_l');
    $diploma3_p = $this->input->post('diploma3_p');
    $strata1_l = $this->input->post('strata1_l');
    $strata1_p = $this->input->post('strata1_p');
    $strata2_l = $this->input->post('strata2_l');
    $strata2_p = $this->input->post('strata2_p');
    $strata3_l = $this->input->post('strata3_l');
    $strata3_p = $this->input->post('strata3_p');
    $tanggal_pendidikan = $this->input->post('tanggal_pendidikan');

    $data = array(
      'id_akun'    => $id_akun,
      'tidak_sekolah_l'    => $tidak_sekolah_l,
      'tidak_sekolah_p'    => $tidak_sekolah_p,
      'tidak_sd_l'    => $tidak_sd_l,
      'tidak_sd_p'    => $tidak_sd_p,
      'tamatsd_l'    => $tamatsd_l,
      'tamatsd_p'    => $tamatsd_p,
      'sltp_l'    => $sltp_l,
      'sltp_p'    => $sltp_p,
      'slta_l'    => $slta_l,
      'slta_p'    => $slta_p,
      'diploma12_l'    => $diploma12_l,
      'diploma12_p'    => $diploma12_p,
      'diploma3_l'    => $diploma3_l,
      'diploma3_p'    => $diploma3_p,
      'strata1_l'    => $strata1_l,
      'strata1_p'    => $strata1_p,
      'strata2_l'    => $strata2_l,
      'strata2_p'    => $strata2_p,
      'strata3_l'    => $strata3_l,
      'strata3_p'    => $strata3_p,
      'tanggal_pendidikan'    => $tanggal_pendidikan,
    );

    $this->M_pendidikan->insert_data($data, 'tb_pendidikan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/pendidikan');
  }

  public function update_data_aksi()
  {
    $id = $this->input->post('id_pendidikan');
    $id_akun               = $this->session->userdata('id_akun');
    $tidak_sekolah_l = $this->input->post('tidak_sekolah_l');
    $tidak_sekolah_p = $this->input->post('tidak_sekolah_p');
    $tidak_sd_l = $this->input->post('tidak_sd_l');
    $tidak_sd_p = $this->input->post('tidak_sd_p');
    $tamatsd_l = $this->input->post('tamatsd_l');
    $tamatsd_p = $this->input->post('tamatsd_p');
    $sltp_l = $this->input->post('sltp_l');
    $sltp_p = $this->input->post('sltp_p');
    $slta_l = $this->input->post('slta_l');
    $slta_p = $this->input->post('slta_p');
    $diploma12_l = $this->input->post('diploma12_l');
    $diploma12_p = $this->input->post('diploma12_p');
    $diploma3_l = $this->input->post('diploma3_l');
    $diploma3_p = $this->input->post('diploma3_p');
    $strata1_l = $this->input->post('strata1_l');
    $strata1_p = $this->input->post('strata1_p');
    $strata2_l = $this->input->post('strata2_l');
    $strata2_p = $this->input->post('strata2_p');
    $strata3_l = $this->input->post('strata3_l');
    $strata3_p = $this->input->post('strata3_p');
    $tanggal_pendidikan = $this->input->post('tanggal_pendidikan');

    $data = array(
      'id_akun'    => $id_akun,
      'tidak_sekolah_l'    => $tidak_sekolah_l,
      'tidak_sekolah_p'    => $tidak_sekolah_p,
      'tidak_sd_l'    => $tidak_sd_l,
      'tidak_sd_p'    => $tidak_sd_p,
      'tamatsd_l'    => $tamatsd_l,
      'tamatsd_p'    => $tamatsd_p,
      'sltp_l'    => $sltp_l,
      'sltp_p'    => $sltp_p,
      'slta_l'    => $slta_l,
      'slta_p'    => $slta_p,
      'diploma12_l'    => $diploma12_l,
      'diploma12_p'    => $diploma12_p,
      'diploma3_l'    => $diploma3_l,
      'diploma3_p'    => $diploma3_p,
      'strata1_l'    => $strata1_l,
      'strata1_p'    => $strata1_p,
      'strata2_l'    => $strata2_l,
      'strata2_p'    => $strata2_p,
      'strata3_l'    => $strata3_l,
      'strata3_p'    => $strata3_p,
      'tanggal_pendidikan'    => $tanggal_pendidikan,
    );

    $where = array(
      'id_pendidikan' => $id,
    );

    $this->M_pendidikan->update_data('tb_pendidikan', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil diupdate !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/pendidikan');
  }

  public function delete_data($id)
  {
    $where = array('id_pendidikan' => $id);
    $this->M_pendidikan->delete_data($where, 'tb_pendidikan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/pendidikan');
  }
}
