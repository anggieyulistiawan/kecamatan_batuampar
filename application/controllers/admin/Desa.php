<?php
class Desa extends CI_Controller
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
    $data['title'] = "Desa";
    $data['desa'] = $this->M_desa->get_data('tb_desa')->result();
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/master_data/v_desa', $data);
    $this->load->view('admin/template/footer');
  }

  public function tambah_data_aksi()
  {
    $nama_desa = $this->input->post('nama_desa');

    $data = array(
      'nama_desa'    => $nama_desa,
    );

    $this->M_desa->insert_data($data, 'tb_desa');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('admin/desa');
  }

  public function update_data_aksi()
  {
    $id              = $this->input->post('id_desa');
    $nama_desa = $this->input->post('nama_desa');


    $data = array(
      'nama_desa'    => $nama_desa,

    );

    $where = array(
      'id_desa' => $id
    );

    $this->M_desa->update_data('tb_desa', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil diupdate !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('admin/desa');
  }

  public function delete_data($id)
  {
    $where = array('id_desa' => $id);
    $this->M_desa->delete_data($where, 'tb_desa');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('admin/desa');
  }
}
