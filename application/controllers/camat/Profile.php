<?php

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('id_level') != '2') {
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
        $id = $this->session->userdata('id_akun');
        $data['desa'] = $this->M_akun->tampil_desa()->result();
        $data['akun'] = $this->db->query("SELECT * FROM tb_akun WHERE id_akun = '$id'")->row();
        $this->load->view('camat/template/header');
        $this->load->view('camat/template/sidebar');
        $this->load->view('camat/template/v_profile', $data);
        $this->load->view('camat/template/footer');
    }

    public function update_data_aksi()
    {
        $id               = $this->input->post('id_akun');
        $nip               = $this->input->post('nip');
        $id_desa           = $this->input->post('id_desa');
        $nama_pengguna             = $this->input->post('nama_pengguna');
        $jenis_kelamin           = $this->input->post('jenis_kelamin');
        $no_telp           = $this->input->post('no_telp');
        $alamat           = $this->input->post('alamat');
        $username             = $this->input->post('username');
        $foto                  = $_FILES['foto']['name'];
        if ($foto = '') {
        } else {
            $config['upload_path']        = './assets/foto';
            $config['allowed_types']        = 'jpg|jpeg|png|tiff';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $data = array(
                    'nip'       => $nip,
                    'id_desa'        => $id_desa,
                    'nama_pengguna'       => $nama_pengguna,
                    'jenis_kelamin'           => $jenis_kelamin,
                    'no_telp'         => $no_telp,
                    'alamat'        => $alamat,
                    'username'        => $username,
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
                redirect('camat/profile');
            } else {
                $foto = $this->upload->data('file_name');
                $data = array(
                    'nip'       => $nip,
                    'id_desa'        => $id_desa,
                    'nama_pengguna'       => $nama_pengguna,
                    'jenis_kelamin'           => $jenis_kelamin,
                    'no_telp'         => $no_telp,
                    'alamat'        => $alamat,
                    'username'        => $username,
                    'foto'            => $foto,
                );

                $where = array(
                    'id_akun' => $id
                );

                $this->session->set_userdata($data);

                $this->M_akun->update_data('tb_akun', $data, $where);
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Data berhasil diupdate !</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>');
                redirect('camat/profile');
            }
        }
    }
}
