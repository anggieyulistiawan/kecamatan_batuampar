<?php
class Tani extends CI_Controller
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
    $data['title'] = "Tani";
    $data['tani'] = $this->M_tani->get_data_taniuser('tb_tani')->result();
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_pmd/v_tani', $data);
    $this->load->view('desa/template/footer');
  }

  public function detail_data($id_tani)
  {
    $data['title'] = "Detail Data tani Desa";
    $detail = $this->M_tani->detail_data($id_tani);
    $data['detail'] = $detail;
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_pmd/v_detail_tani', $data);
    $this->load->view('desa/template/footer');
  }

  public function tambah_data()
  {
    $data['desa'] = $this->M_tani->tampil_desa()->result();
    $data['title'] = "Tambah Data tani";
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_pmd/v_tambah_tani', $data);
    $this->load->view('desa/template/footer');
  }

  public function tambah_data_aksi()
  {
    $id_akun               = $this->session->userdata('id_akun');
    $nama_klmpok = $this->input->post('nama_klmpok');
    $jenis_usaha = $this->input->post('jenis_usaha');
    $alamat_tani = $this->input->post('alamat_tani');
    $tgl_berdiri = $this->input->post('tgl_berdiri');
    $ket = $this->input->post('ket');
    $tgl_tani = $this->input->post('tgl_tani');


    $data = array(
      'id_akun'    => $id_akun,
      'nama_klmpok'    => $nama_klmpok,
      'jenis_usaha'    => $jenis_usaha,
      'alamat_tani'    => $alamat_tani,
      'tgl_berdiri'    => $tgl_berdiri,
      'ket'    => $ket,
      'tgl_tani'    => $tgl_tani,

    );

    $this->M_tani->insert_data($data, 'tb_tani');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/tani');
  }

  public function update_data($id)
  {
    $where = array('id_tani' => $id);
    $data['tani'] = $this->db->query("SELECT * FROM tb_tani WHERE id_tani = '$id'")->result();
    $data['desa'] = $this->M_tani->tampil_desa()->result();
    $data['title'] = "Edit Data tani";
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_pmd/v_update_tani', $data);
    $this->load->view('desa/template/footer');
  }

  public function update_data_aksi()
  {
    $id = $this->input->post('id_tani');
    $id_akun               = $this->session->userdata('id_akun');
    $nama_klmpok = $this->input->post('nama_klmpok');
    $jenis_usaha = $this->input->post('jenis_usaha');
    $alamat_tani = $this->input->post('alamat_tani');
    $tgl_berdiri = $this->input->post('tgl_berdiri');
    $ket = $this->input->post('ket');
    $tgl_tani = $this->input->post('tgl_tani');

    $data = array(
      'id_akun'       => $id_akun,
      'nama_klmpok'    => $nama_klmpok,
      'jenis_usaha'    => $jenis_usaha,
      'alamat_tani'    => $alamat_tani,
      'tgl_berdiri'    => $tgl_berdiri,
      'ket'    => $ket,
      'tgl_tani'    => $tgl_tani,
    );

    $where = array(
      'id_tani' => $id
    );

    $this->M_tani->update_data('tb_tani', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil diupdate !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/tani');
  }


  public function delete_data($id)
  {
    $where = array('id_tani' => $id);
    $this->M_tani->delete_data($where, 'tb_tani');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/tani');
  }
}
