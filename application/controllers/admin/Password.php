<?php

class Password extends CI_Controller
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
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/v_ganti_password');
        $this->load->view('admin/template/footer');
    }

    public function gantipassword_aksi()
    {
        $passbaru = $this->input->post('passbaru');
        $passulang = $this->input->post('passulang');

        $this->form_validation->set_rules('passbaru', 'password baru', 'required|matches[passulang]');
        $this->form_validation->set_rules('passulang', 'ulangi password', 'required');
        if ($this->form_validation->run() != FALSE) {
            $data = array('password' => md5($passbaru));
            $id = array('id_akun' => $this->session->userdata('id_akun'));
            $this->M_akun->update_data('tb_akun', $data, $id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Password berhasil di ubah !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
            redirect('login');
        } else {
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/template/v_ganti_password');
            $this->load->view('admin/template/footer');
        }
    }
}
