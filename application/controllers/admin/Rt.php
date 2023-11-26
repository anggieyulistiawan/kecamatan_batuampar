<?php
class Rt extends CI_Controller
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
    $data['title'] = "rt";
    $data['rt'] = $this->M_rt->get_data('tb_rt')->result();
    $data['desa'] = $this->M_pendidikan->tampil_desa()->result();
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/data_perangkat/v_rt', $data);
    $this->load->view('admin/template/footer');
  }

  public function filter_rt()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    // var_dump($tahun, $bulan);
    // die;
    $data['desa'] = $this->M_jeniskelamin->tampil_desa()->result();
    $data['rt'] = $this->M_rt->filter_rt($bulan, $tahun);
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/data_perangkat/v_rt', $data);
    $this->load->view('admin/template/footer');
  }

  public function update_data($id)
  {
    $where = array('id_rt' => $id);
    $data['rt'] = $this->M_rt->detail_data_update($id);
    $data['desa'] = $this->M_rt->tampil_desa()->result();
    $data['title'] = "Edit Data Perangkat Desa (RT)";
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/data_perangkat/v_update_rt', $data);
    $this->load->view('admin/template/footer');
  }

  public function update_data_aksi()
  {
    $id = $this->input->post('id_rt');
    $nama_rt    = $this->input->post('nama_rt');
    $tgllahir_rt = $this->input->post('tgllahir_rt');
    $dusun_rt = $this->input->post('dusun_rt');
    $jabatan_rt = $this->input->post('jabatan_rt');
    $nosk_rt   = $this->input->post('nosk_rt');
    $periodeawal_rt = $this->input->post('periodeawal_rt');
    $periodeakhir_rt = $this->input->post('periodeakhir_rt');
    $telp_rt = $this->input->post('telp_rt');
    $tanggal_rt = $this->input->post('tanggal_rt');

    $data = array(
      'nama_rt'          => $nama_rt,
      'tgllahir_rt' => $tgllahir_rt,
      'dusun_rt' => $dusun_rt,
      'jabatan_rt'       => $jabatan_rt,
      'nosk_rt'         => $nosk_rt,
      'periodeawal_rt'  => $periodeawal_rt,
      'periodeakhir_rt'  => $periodeakhir_rt,
      'telp_rt'       => $telp_rt,
      'tanggal_rt'       => $tanggal_rt,
    );

    $where = array(
      'id_rt' => $id
    );

    $this->M_rt->update_data('tb_rt', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil diupdate !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('admin/rt');
  }

  public function delete_data($id)
  {
    $where = array('id_rt' => $id);
    $this->M_rt->delete_data($where, 'tb_rt');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    redirect('admin/rt');
  }
}
