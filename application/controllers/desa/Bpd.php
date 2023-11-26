<?php
class Bpd extends CI_Controller
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
    $data['title'] = "bpd";
    $data['bpd'] = $this->M_bpd->get_data_bpduser('tb_bpd')->result();
    $data['desa'] = $this->M_pendidikan->tampil_desa()->result();
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_perangkat/v_bpd', $data);
    $this->load->view('desa/template/footer');
  }

  public function tambah_data()
  {
    $data['desa'] = $this->M_bpd->tampil_desa()->result();
    $data['title'] = "Tambah Data Perangkat Desa (BPD)";
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_perangkat/v_tambah_bpd', $data);
    $this->load->view('desa/template/footer');
  }


  public function tambah_data_aksi()
  {
    $id_akun               = $this->session->userdata('id_akun');
    $nama_bpd = $this->input->post('nama_bpd');
    $tgllahir_bpd = $this->input->post('tgllahir_bpd');
    $jabatan_bpd = $this->input->post('jabatan_bpd');
    $nosk_bpd = $this->input->post('nosk_bpd');
    $periodeawal_bpd = $this->input->post('periodeawal_bpd');
    $periodeakhir_bpd = $this->input->post('periodeakhir_bpd');
    $telp_bpd = $this->input->post('telp_bpd');
    $tanggal_bpd = $this->input->post('tanggal_bpd');


    $data = array(
      'id_akun'    => $id_akun,
      'nama_bpd'    => $nama_bpd,
      'tgllahir_bpd'    => $tgllahir_bpd,
      'jabatan_bpd'    => $jabatan_bpd,
      'nosk_bpd'    => $nosk_bpd,
      'periodeawal_bpd'    => $periodeawal_bpd,
      'periodeakhir_bpd'    => $periodeakhir_bpd,
      'telp_bpd'    => $telp_bpd,
      'tanggal_bpd'    => $tanggal_bpd,

    );

    $this->M_bpd->insert_data($data, 'tb_bpd');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/bpd');
  }

  public function update_data($id)
  {
    $where = array('id_bpd' => $id);
    $data['bpd'] = $this->db->query("SELECT * FROM tb_bpd WHERE id_bpd = '$id'")->result();
    $data['desa'] = $this->M_bpd->tampil_desa()->result();
    $data['title'] = "Edit Data Perangkat Desa (BPD)";
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_perangkat/v_update_bpd', $data);
    $this->load->view('desa/template/footer');
  }

  public function update_data_aksi()
  {
    $id = $this->input->post('id_bpd');
    $id_akun               = $this->session->userdata('id_akun');
    $nama_bpd    = $this->input->post('nama_bpd');
    $tgllahir_bpd = $this->input->post('tgllahir_bpd');
    $jabatan_bpd = $this->input->post('jabatan_bpd');
    $nosk_bpd   = $this->input->post('nosk_bpd');
    $periodeawal_bpd = $this->input->post('periodeawal_bpd');
    $periodeakhir_bpd = $this->input->post('periodeakhir_bpd');
    $telp_bpd = $this->input->post('telp_bpd');
    $tanggal_bpd = $this->input->post('tanggal_bpd');

    $data = array(
      'id_akun'       => $id_akun,
      'nama_bpd'          => $nama_bpd,
      'tgllahir_bpd' => $tgllahir_bpd,
      'jabatan_bpd'       => $jabatan_bpd,
      'nosk_bpd'         => $nosk_bpd,
      'periodeawal_bpd'  => $periodeawal_bpd,
      'periodeakhir_bpd'  => $periodeakhir_bpd,
      'telp_bpd'       => $telp_bpd,
      'tanggal_bpd'       => $tanggal_bpd,
    );

    $where = array(
      'id_bpd' => $id
    );

    $this->M_bpd->update_data('tb_bpd', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil diupdate !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/bpd');
  }

  public function delete_data($id)
  {
    $where = array('id_bpd' => $id);
    $this->M_bpd->delete_data($where, 'tb_bpd');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    redirect('desa/bpd');
  }
}
