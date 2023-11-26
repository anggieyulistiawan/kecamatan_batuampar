<?php
class Jumlah extends CI_Controller
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
    $data['title'] = "jumlah";
    $data['jumlah'] = $this->M_jumlah->get_data_jumlahuser('tb_jumlah')->result();
    $data['desa'] = $this->M_jumlah->tampil_desa()->result();
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_penduduk/v_jumlah', $data);
    $this->load->view('desa/template/footer');
  }

  public function detail_data($id_jumlah)
  {
    $data['title'] = "Detail Data jumlah";
    $detail = $this->M_jumlah->detail_data($id_jumlah);
    $data['detail'] = $detail;
    // var_dump($data['detail']);
    // die;
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_penduduk/v_jumlah_detail', $data);
    $this->load->view('desa/template/footer');
  }

  public function tambah_data_aksi()
  {
    $id_akun               = $this->session->userdata('id_akun');
    $penduduk_awal_l = $this->input->post('penduduk_awal_l');
    $penduduk_awal_p = $this->input->post('penduduk_awal_p');
    $kelahiran_l = $this->input->post('kelahiran_l');
    $kelahiran_p = $this->input->post('kelahiran_p');
    $kematian_l = $this->input->post('kematian_l');
    $kematian_p = $this->input->post('kematian_p');
    $pendatang_l = $this->input->post('pendatang_l');
    $pendatang_p = $this->input->post('pendatang_p');
    $pindah_l = $this->input->post('pindah_l');
    $pindah_p = $this->input->post('pindah_p');
    $tanggal_jumlah = $this->input->post('tanggal_jumlah');

    $data = array(
      'id_akun'    => $id_akun,
      'penduduk_awal_l'    => $penduduk_awal_l,
      'penduduk_awal_p'    => $penduduk_awal_p,
      'kelahiran_l'    => $kelahiran_l,
      'kelahiran_p'    => $kelahiran_p,
      'kematian_l'    => $kematian_l,
      'kematian_p'    => $kematian_p,
      'pendatang_l'    => $pendatang_l,
      'pendatang_p'    => $pendatang_p,
      'pindah_l'    => $pindah_l,
      'pindah_p'    => $pindah_p,
      'tanggal_jumlah'    => $tanggal_jumlah,
    );

    $this->M_jumlah->insert_data($data, 'tb_jumlah');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/jumlah');
  }

  public function update_data_aksi()
  {
    $id = $this->input->post('id_jumlah');
    $id_akun               = $this->session->userdata('id_akun');
    $penduduk_awal_l = $this->input->post('penduduk_awal_l');
    $penduduk_awal_p = $this->input->post('penduduk_awal_p');
    $kelahiran_l = $this->input->post('kelahiran_l');
    $kelahiran_p = $this->input->post('kelahiran_p');
    $kematian_l = $this->input->post('kematian_l');
    $kematian_p = $this->input->post('kematian_p');
    $pendatang_l = $this->input->post('pendatang_l');
    $pendatang_p = $this->input->post('pendatang_p');
    $pindah_l = $this->input->post('pindah_l');
    $pindah_p = $this->input->post('pindah_p');
    $tanggal_jumlah = $this->input->post('tanggal_jumlah');

    $data = array(
      'id_akun'    => $id_akun,
      'penduduk_awal_l'    => $penduduk_awal_l,
      'penduduk_awal_p'    => $penduduk_awal_p,
      'kelahiran_l'    => $kelahiran_l,
      'kelahiran_p'    => $kelahiran_p,
      'kematian_l'    => $kematian_l,
      'kematian_p'    => $kematian_p,
      'pendatang_l'    => $pendatang_l,
      'pendatang_p'    => $pendatang_p,
      'pindah_l'    => $pindah_l,
      'pindah_p'    => $pindah_p,
      'tanggal_jumlah'    => $tanggal_jumlah,
    );

    $where = array(
      'id_jumlah' => $id,
    );

    $this->M_jumlah->update_data('tb_jumlah', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil diupdate !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/jumlah');
  }

  public function delete_data($id)
  {
    $where = array('id_jumlah' => $id);
    $this->M_jumlah->delete_data($where, 'tb_jumlah');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/jumlah');
  }
}
