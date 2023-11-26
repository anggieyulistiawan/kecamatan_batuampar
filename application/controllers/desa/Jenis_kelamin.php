<?php
class Jenis_kelamin extends CI_Controller
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
    $data['title'] = "Jenis Kelamin";
    $data['jeniskelamin'] = $this->M_jeniskelamin->get_data_jeniskelaminuser('tb_jeniskelamin')->result();
    $data['desa'] = $this->M_jeniskelamin->tampil_desa()->result();
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_penduduk/v_jeniskelamin', $data);
    $this->load->view('desa/template/footer');
  }

  public function tambah_data_aksi()
  {
    $id_akun               = $this->session->userdata('id_akun');
    $jeniskelamin_l = $this->input->post('jeniskelamin_l');
    $jeniskelamin_p = $this->input->post('jeniskelamin_p');
    $tanggal_jeniskelamin = $this->input->post('tanggal_jeniskelamin');

    $data = array(
      'id_akun'    => $id_akun,
      'jeniskelamin_l'    => $jeniskelamin_l,
      'jeniskelamin_p'    => $jeniskelamin_p,
      'tanggal_jeniskelamin'    => $tanggal_jeniskelamin,
    );

    $this->M_jeniskelamin->insert_data($data, 'tb_jeniskelamin');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/jenis_kelamin');
  }

  public function update_data_aksi()
  {
    $id = $this->input->post('id_jeniskelamin');
    $id_akun               = $this->session->userdata('id_akun');
    $jeniskelamin_l = $this->input->post('jeniskelamin_l');
    $jeniskelamin_p = $this->input->post('jeniskelamin_p');
    $tanggal_jeniskelamin = $this->input->post('tanggal_jeniskelamin');

    $data = array(
      'id_akun'    => $id_akun,
      'jeniskelamin_l'    => $jeniskelamin_l,
      'jeniskelamin_p'    => $jeniskelamin_p,
      'tanggal_jeniskelamin'    => $tanggal_jeniskelamin,
    );

    $where = array(
      'id_jeniskelamin' => $id
    );


    $this->M_jeniskelamin->update_data('tb_jeniskelamin', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil diupdate !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/jenis_kelamin');
  }

  public function delete_data($id)
  {
    $where = array('id_jeniskelamin' => $id);
    $this->M_jeniskelamin->delete_data($where, 'tb_jeniskelamin');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/jenis_kelamin');
  }

  public function filter_jeniskelamin()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    // var_dump($tahun, $bulan);
    // die;
    $data['desa'] = $this->M_jeniskelamin->tampil_desa()->result();
    $data['jeniskelamin'] = $this->M_jeniskelamin->filter_jeniskelamin($bulan, $tahun);
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_penduduk/v_jeniskelamin', $data);
    $this->load->view('desa/template/footer');
  }
}
