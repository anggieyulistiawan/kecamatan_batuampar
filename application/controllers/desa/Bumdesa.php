<?php
class Bumdesa extends CI_Controller
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
    $data['title'] = "Bumdesa";
    $data['bumdesa'] = $this->M_bumdesa->get_data_bumdesauser('tb_bumdesa')->result();
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_pmd/v_bumdesa', $data);
    $this->load->view('desa/template/footer');
  }

  public function tambah_data()
  {
    $data['desa'] = $this->M_bumdesa->tampil_desa()->result();
    $data['title'] = "Tambah Data bumdesa";
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_pmd/v_tambah_bumdesa', $data);
    $this->load->view('desa/template/footer');
  }

  public function tambah_data_aksi()
  {
    $id_akun               = $this->session->userdata('id_akun');
    $nama_bumdesa = $this->input->post('nama_bumdesa');
    $alamat_bumdes = $this->input->post('alamat_bumdes');
    $tgl_berdiri = $this->input->post('tgl_berdiri');
    $modal_awal = $this->input->post('modal_awal');
    $jenis_usaha = $this->input->post('jenis_usaha');
    $tgl_bumdesa = $this->input->post('tgl_bumdesa');
    // $bpom = $this->input->post('bpom');
    $bpom                  = $_FILES['bpom']['name']; {
      $config['upload_path']        = './assets/bpom';
      $config['allowed_types']        = 'pdf|docx';
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('bpom')) {
        echo "Surat BPOM Gagal diupload !!!";
      } else {
        $bpom = $this->upload->data('file_name');
      }
    }

    $data = array(
      'id_akun'    => $id_akun,
      'nama_bumdesa'    => $nama_bumdesa,
      'alamat_bumdes'    => $alamat_bumdes,
      'tgl_berdiri'    => $tgl_berdiri,
      'modal_awal'    => $modal_awal,
      'jenis_usaha'    => $jenis_usaha,
      'tgl_bumdesa'    => $tgl_bumdesa,
      'bpom'    => $bpom,

    );

    $this->M_bumdesa->insert_data($data, 'tb_bumdesa');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/bumdesa');
  }

  public function update_data($id)
  {
    $where = array('id_bumdesa' => $id);
    $data['bumdesa'] = $this->db->query("SELECT * FROM tb_bumdesa WHERE id_bumdesa = '$id'")->result();
    $data['desa'] = $this->M_bumdesa->tampil_desa()->result();
    $data['title'] = "Edit Data bumdesa";
    $this->load->view('desa/template/header', $data);
    $this->load->view('desa/template/sidebar');
    $this->load->view('desa/data_pmd/v_update_bumdesa', $data);
    $this->load->view('desa/template/footer');
  }

  public function update_data_aksi()
  {
    $id = $this->input->post('id_bumdesa');
    $id_akun = $this->session->userdata('id_akun');
    $nama_bumdesa = $this->input->post('nama_bumdesa');
    $alamat_bumdes = $this->input->post('alamat_bumdes');
    $tgl_berdiri = $this->input->post('tgl_berdiri');
    $modal_awal = $this->input->post('modal_awal');
    $jenis_usaha = $this->input->post('jenis_usaha');
    $tgl_bumdesa = $this->input->post('tgl_bumdesa');

    $bpom                  = $_FILES['bpom']['name']; {
      $config['upload_path']        = './assets/bpom';
      $config['allowed_types']        = 'pdf|docx';
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('bpom')) {
        $bpom = $this->input->post('bpom_data');
      } else {
        $bpom = $this->upload->data('file_name');
      }
    }
    $data = array(
      'id_akun' => $id_akun,
      'nama_bumdesa' => $nama_bumdesa,
      'alamat_bumdes' => $alamat_bumdes,
      'tgl_berdiri' => $tgl_berdiri,
      'modal_awal' => $modal_awal,
      'jenis_usaha' => $jenis_usaha,
      'tgl_bumdesa' => $tgl_bumdesa,
      'bpom' => $bpom,
    );

    $where = array(
      'id_bumdesa' => $id
    );

    $this->M_bumdesa->update_data('tb_bumdesa', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil diupdate!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
    redirect('desa/bumdesa');
  }


  public function delete_data($id)
  {
    $where = array('id_bumdesa' => $id);
    $this->M_bumdesa->delete_data($where, 'tb_bumdesa');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('desa/bumdesa');
  }

  public function detail_views($id)
  {
    $data['bumdesa'] = $this->M_bumdesa->detail_data_update($id);
    $this->load->view('desa/data_pmd/v_views_bumdesa', $data);
  }
}
