<?php
class Bpd extends CI_Controller
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
    $data['title'] = "bpd";
    $data['bpd'] = $this->M_bpd->get_data('tb_bpd')->result();
    $data['desa'] = $this->M_pendidikan->tampil_desa()->result();
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/data_perangkat/v_bpd', $data);
    $this->load->view('admin/template/footer');
  }

  public function filter_bpd()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    // var_dump($tahun, $bulan);
    // die;
    $data['desa'] = $this->M_jeniskelamin->tampil_desa()->result();
    $data['bpd'] = $this->M_bpd->filter_bpd($bulan, $tahun);
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/data_perangkat/v_bpd', $data);
    $this->load->view('admin/template/footer');
  }

  public function update_data($id)
  {
    $where = array('id_bpd' => $id);
    $data['bpd'] = $this->M_bpd->detail_data_update($id);
    $data['title'] = "Edit Data Perangkat Desa (BPD)";
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/data_perangkat/v_update_bpd', $data);
    $this->load->view('admin/template/footer');
  }

  public function update_data_aksi()
  {
    $id = $this->input->post('id_bpd');
    $nama_bpd    = $this->input->post('nama_bpd');
    $tgllahir_bpd = $this->input->post('tgllahir_bpd');
    $jabatan_bpd = $this->input->post('jabatan_bpd');
    $nosk_bpd   = $this->input->post('nosk_bpd');
    $periodeawal_bpd = $this->input->post('periodeawal_bpd');
    $periodeakhir_bpd = $this->input->post('periodeakhir_bpd');
    $telp_bpd = $this->input->post('telp_bpd');
    $tanggal_bpd = $this->input->post('tanggal_bpd');

    $data = array(
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
    redirect('admin/bpd');
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
    redirect('admin/bpd');
  }
}
