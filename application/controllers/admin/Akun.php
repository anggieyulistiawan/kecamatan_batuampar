<?php
class Akun extends CI_Controller
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
    $data['title'] = "Akun";
    $data['akun'] = $this->M_akun->get_data('tb_akun')->result();
    $data['level'] = $this->M_akun->tampil_level()->result();
    $data['desa'] = $this->M_akun->tampil_desa()->result();
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/master_data/v_akun', $data);
    $this->load->view('admin/template/footer');
  }

  public function detail_data($id_akun)
  {
    $data['title'] = "Detail Data Akun";
    $detail = $this->M_akun->detail_data($id_akun);
    $data['detail'] = $detail;
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/v_akun_detail', $data);
    $this->load->view('admin/template/footer');
  }

  public function tambah_data_aksi()
  {
    $id_level = $this->input->post('id_level');
    $id_desa = $this->input->post('id_desa');
    $username = $this->input->post('username');

    $data = array(
      'id_level'    => $id_level,
      'id_desa'    => $id_desa,
      'username'    => $username,
      'password'    => md5('batu ampar'),
      'foto'        => 'default.png',

    );

    $this->M_akun->insert_data($data, 'tb_akun');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('admin/akun');
  }

  public function update_data($id)
  {
    $where = array('id_akun' => $id);
    $data['level'] = $this->M_akun->tampil_level()->result();
    $data['desa'] = $this->M_akun->tampil_desa()->result();
    $data['akun'] = $this->db->query("SELECT * FROM tb_akun WHERE id_akun = '$id'")->result();
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/master_data/v_akun_update', $data);
    $this->load->view('admin/template/footer');
  }

  public function update_data_aksi()
  {
    $id               = $this->input->post('id_akun');
    $nip               = $this->input->post('nip');
    $nama_pengguna             = $this->input->post('nama_pengguna');
    $id_desa           = $this->input->post('id_desa');
    $id_level             = $this->input->post('id_level');
    $jenis_kelamin           = $this->input->post('jenis_kelamin');
    $no_telp           = $this->input->post('no_telp');
    $username           = $this->input->post('username');
    $password           = $this->input->post('password');
    $alamat           = $this->input->post('alamat');
    $foto                  = $_FILES['foto']['name'];
    if ($password == NULL) {
      if ($foto = '') {
      } else {
        $config['upload_path']        = './assets/foto';
        $config['allowed_types']        = 'jpg|jpeg|png|tiff';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
          $data = array(
            'nip'         => $nip,
            'nama_pengguna'       => $nama_pengguna,
            'id_desa'        => $id_desa,
            'id_level'        => $id_level,
            'jenis_kelamin'           => $jenis_kelamin,
            'no_telp'         => $no_telp,
            'username'        => $username,
            'alamat'        => $alamat,
          );

          $where = array(
            'id_akun' => $id
          );

          $this->M_akun->update_data('tb_akun', $data, $where);
          $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Data berhasil diupdate !</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
          redirect('admin/akun');
        } else {
          $foto = $this->upload->data('file_name');
          $data = array(
            'nip'         => $nip,
            'nama_pengguna'       => $nama_pengguna,
            'id_desa'        => $id_desa,
            'id_level'        => $id_level,
            'jenis_kelamin'           => $jenis_kelamin,
            'no_telp'         => $no_telp,
            'username'        => $username,
            'alamat'        => $alamat,
            'foto'            => $foto,
          );

          $where = array(
            'id_akun' => $id
          );

          $this->M_akun->update_data('tb_akun', $data, $where);
          $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Data berhasil diupdate !</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>');
          redirect('admin/akun');
        }
      }
    } else {
      if ($foto = '') {
      } else {
        $config['upload_path']        = './assets/foto';
        $config['allowed_types']        = 'jpg|jpeg|png|tiff';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
          $data = array(
            'nip'         => $nip,
            'nama_pengguna'       => $nama_pengguna,
            'id_desa'        => $id_desa,
            'id_level'        => $id_level,
            'jenis_kelamin'           => $jenis_kelamin,
            'no_telp'         => $no_telp,
            'username'        => $username,
            'alamat'        => $alamat,
            'password'        => md5($password),
          );

          $where = array(
            'id_akun' => $id
          );

          $this->M_akun->update_data('tb_akun', $data, $where);
          $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Data berhasil diupdate !</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
          redirect('admin/akun');
        } else {
          $foto = $this->upload->data('file_name');
          $data = array(
            'nip'         => $nip,
            'nama_pengguna'       => $nama_pengguna,
            'id_desa'        => $id_desa,
            'id_level'        => $id_level,
            'jenis_kelamin'           => $jenis_kelamin,
            'no_telp'         => $no_telp,
            'username'        => $username,
            'alamat'        => $alamat,
            'password'        => md5($password),
            'foto'            => $foto,
          );

          $where = array(
            'id_akun' => $id
          );

          $this->M_akun->update_data('tb_akun', $data, $where);
          $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Data berhasil diupdate !</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>');
          redirect('admin/akun');
        }
      }
    }
  }

  public function delete_data($id)
  {
    $where = array('id_akun' => $id);
    $this->M_akun->delete_data($where, 'tb_akun');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('admin/akun');
  }
}
