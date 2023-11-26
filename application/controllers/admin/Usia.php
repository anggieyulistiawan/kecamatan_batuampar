<?php
class Usia extends CI_Controller
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
        $data['title'] = "Usia";
        $data['usia'] = $this->M_usia->get_data('tb_usia')->result();
        $data['desa'] = $this->M_usia->tampil_desa()->result();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/data_penduduk/v_usia', $data);
        $this->load->view('admin/template/footer');
    }

    public function detail_data($id_usia)
    {
        $data['title'] = "Detail Data Usia";
        $detail = $this->M_usia->detail_data($id_usia);
        $tanggal_usia = $detail->tanggal_usia;
        list($tahun, $bulan, $tanggal) = explode('-', $tanggal_usia);
        $id_akun = $detail->id_akun;
        $data['jumlah'] = $this->M_pendidikan->get_data_selesihi($tahun, $bulan, $id_akun);
        $data['detail'] = $detail;
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/data_penduduk/v_usia_detail', $data);
        $this->load->view('admin/template/footer');
    }

    public function update_data_aksi()
    {
        $id = $this->input->post('id_usia');
        $u5_l = $this->input->post('u5_l');
        $u5_p = $this->input->post('u5_p');
        $u10_l = $this->input->post('u10_l');
        $u10_p = $this->input->post('u10_p');
        $u15_l = $this->input->post('u15_l');
        $u15_p = $this->input->post('u15_p');
        $u20_l = $this->input->post('u20_l');
        $u20_p = $this->input->post('u20_p');
        $u30_l = $this->input->post('u30_l');
        $u30_p = $this->input->post('u30_p');
        $u40_l = $this->input->post('u40_l');
        $u40_p = $this->input->post('u40_p');
        $u50_l = $this->input->post('u50_l');
        $u50_p = $this->input->post('u50_p');
        $u60_l = $this->input->post('u60_l');
        $u60_p = $this->input->post('u60_p');
        $u70_l = $this->input->post('u70_l');
        $u70_p = $this->input->post('u70_p');
        $u70_lebih_l = $this->input->post('u70_lebih_l');
        $u70_lebih_p = $this->input->post('u70_lebih_p');
        $tanggal_usia = $this->input->post('tanggal_usia');

        $data = array(
            'u5_l'    => $u5_l,
            'u5_p'    => $u5_p,
            'u10_l'    => $u10_l,
            'u10_p'    => $u10_p,
            'u15_l'    => $u15_l,
            'u15_p'    => $u15_p,
            'u20_l'    => $u20_l,
            'u20_p'    => $u20_p,
            'u30_l'    => $u30_l,
            'u30_p'    => $u30_p,
            'u40_l'    => $u40_l,
            'u40_p'    => $u40_p,
            'u50_l'    => $u50_l,
            'u50_p'    => $u50_p,
            'u60_l'    => $u60_l,
            'u60_p'    => $u60_p,
            'u70_l'    => $u70_l,
            'u70_p'    => $u70_p,
            'u70_lebih_l'    => $u70_lebih_l,
            'u70_lebih_p'    => $u70_lebih_p,
            'tanggal_usia'    => $tanggal_usia,
        );

        $where = array(
            'id_usia' => $id,
        );

        $this->M_usia->update_data('tb_usia', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil diupdate !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
        redirect('admin/usia');
    }

    public function delete_data($id)
    {
        $where = array('id_usia' => $id);
        $this->M_usia->delete_data($where, 'tb_usia');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
        redirect('admin/usia');
    }

    public function filter_usia()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        // var_dump($tahun, $bulan);
        // die;
        $data['desa'] = $this->M_jeniskelamin->tampil_desa()->result();
        $data['usia'] = $this->M_usia->filter_usia($bulan, $tahun);
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/data_penduduk/v_usia', $data);
        $this->load->view('admin/template/footer');
    }
}
