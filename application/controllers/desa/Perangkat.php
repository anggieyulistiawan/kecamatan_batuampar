<?php
class perangkat extends CI_Controller
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
    $data['title'] = "Perangkat";
    $data['perangkat'] = $this->M_perangkat->get_data_perangkatuser('tb_perangkat')->result();
    $data['desa'] = $this->M_pendidikan->tampil_desa()->result();
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_perangkat/v_perangkat', $data);
    $this->load->view('desa/template/footer');
  }

  public function tambah_data()
  {
    $data['desa'] = $this->M_perangkat->tampil_desa()->result();
    $data['title'] = "Tambah Data Perangkat Desa (Kepala Desa)";
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_perangkat/v_tambah_perangkat', $data);
    $this->load->view('desa/template/footer');
  }


  public function tambah_data_aksi()
  {
    $id_akun               = $this->session->userdata('id_akun');
    $nama_perangkat = $this->input->post('nama_perangkat');
    $tgllahir_perangkat = $this->input->post('tgllahir_perangkat');
    $jabatan_perangkat = $this->input->post('jabatan_perangkat');
    $nosk_perangkat = $this->input->post('nosk_perangkat');
    $periodeawal_perangkat = $this->input->post('periodeawal_perangkat');
    $periodeakhir_perangkat = $this->input->post('periodeakhir_perangkat');
    $telp_perangkat = $this->input->post('telp_perangkat');
    $tanggal_perangkat = $this->input->post('tanggal_perangkat');


    $data = array(
      'id_akun'    => $id_akun,
      'nama_perangkat'    => $nama_perangkat,
      'tgllahir_perangkat'    => $tgllahir_perangkat,
      'jabatan_perangkat'    => $jabatan_perangkat,
      'nosk_perangkat'    => $nosk_perangkat,
      'periodeawal_perangkat'    => $periodeawal_perangkat,
      'periodeakhir_perangkat'    => $periodeakhir_perangkat,
      'telp_perangkat'    => $telp_perangkat,
      'tanggal_perangkat'    => $tanggal_perangkat,

    );

    $this->M_perangkat->insert_data($data, 'tb_perangkat');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/perangkat');
  }

  public function update_data($id)
  {
    $where = array('id_perangkat' => $id);
    $data['perangkat'] = $this->db->query("SELECT * FROM tb_perangkat WHERE id_perangkat = '$id'")->result();
    $data['desa'] = $this->M_perangkat->tampil_desa()->result();
    $data['title'] = "Edit Data Perangkat Desa ";
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_perangkat/v_update_perangkat', $data);
    $this->load->view('desa/template/footer');
  }

  public function update_data_aksi()
  {
    $id = $this->input->post('id_perangkat');
    $id_akun               = $this->session->userdata('id_akun');
    $nama_perangkat    = $this->input->post('nama_perangkat');
    $tgllahir_perangkat = $this->input->post('tgllahir_perangkat');
    $jabatan_perangkat = $this->input->post('jabatan_perangkat');
    $nosk_perangkat   = $this->input->post('nosk_perangkat');
    $periodeawal_perangkat = $this->input->post('periodeawal_perangkat');
    $periodeakhir_perangkat = $this->input->post('periodeakhir_perangkat');
    $telp_perangkat = $this->input->post('telp_perangkat');
    $tanggal_perangkat = $this->input->post('tanggal_perangkat');

    $data = array(
      'id_akun'       => $id_akun,
      'nama_perangkat'          => $nama_perangkat,
      'tgllahir_perangkat' => $tgllahir_perangkat,
      'jabatan_perangkat'       => $jabatan_perangkat,
      'nosk_perangkat'         => $nosk_perangkat,
      'periodeawal_perangkat'  => $periodeawal_perangkat,
      'periodeakhir_perangkat'  => $periodeakhir_perangkat,
      'telp_perangkat'       => $telp_perangkat,
      'tanggal_perangkat'       => $tanggal_perangkat,
    );

    $where = array(
      'id_perangkat' => $id
    );

    $this->M_perangkat->update_data('tb_perangkat', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil diupdate !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/perangkat');
  }

  public function delete_data($id)
  {
    $where = array('id_perangkat' => $id);
    $this->M_perangkat->delete_data($where, 'tb_perangkat');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    redirect('desa/perangkat');
  }
}
