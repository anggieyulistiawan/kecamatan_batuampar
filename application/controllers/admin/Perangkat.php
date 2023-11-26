<?php
class perangkat extends CI_Controller
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
    $data['title'] = "Perangkat";
    $data['perangkat'] = $this->M_perangkat->get_data('tb_perangkat')->result();
    $data['desa'] = $this->M_pendidikan->tampil_desa()->result();
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/data_perangkat/v_perangkat', $data);
    $this->load->view('admin/template/footer');
  }

  public function filter_perangkat()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    // var_dump($tahun, $bulan);
    // die;
    $data['desa'] = $this->M_jeniskelamin->tampil_desa()->result();
    $data['perangkat'] = $this->M_perangkat->filter_perangkat($bulan, $tahun);
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/data_perangkat/v_perangkat', $data);
    $this->load->view('admin/template/footer');
  }

  public function update_data($id)
  {
    $where = array('id_perangkat' => $id);
    $data['perangkat'] = $this->M_perangkat->detail_data_update($id);
    // var_dump($data['perangkat']);
    // die;
    $data['desa'] = $this->M_perangkat->tampil_desa()->result();
    $data['title'] = "Edit Data Perangkat Desa (Kepala Desa)";
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/data_perangkat/v_update_perangkat', $data);
    $this->load->view('admin/template/footer');
  }

  public function update_data_aksi()
  {
    $id = $this->input->post('id_perangkat');
    $nama_perangkat    = $this->input->post('nama_perangkat');
    $tgllahir_perangkat = $this->input->post('tgllahir_perangkat');
    $jabatan_perangkat = $this->input->post('jabatan_perangkat');
    $nosk_perangkat   = $this->input->post('nosk_perangkat');
    $periodeawal_perangkat = $this->input->post('periodeawal_perangkat');
    $periodeakhir_perangkat = $this->input->post('periodeakhir_perangkat');
    $telp_perangkat = $this->input->post('telp_perangkat');
    $tanggal_perangkat = $this->input->post('tanggal_perangkat');

    $data = array(
      'nama_perangkat'          => $nama_perangkat,
      'tgllahir_perangkat' => $tgllahir_perangkat,
      'jabatan_perangkat'       => $jabatan_perangkat,
      'nosk_perangkat'         => $nosk_perangkat,
      'periodeawal_perangkat'  => $periodeawal_perangkat,
      'periodeakhir_perangkat'  => $periodeakhir_perangkat,
      'telp_perangkat'       => $telp_perangkat,
      'tanggal_perangkat'       => $tanggal_perangkat,
    );

    $where = array(
      'id_perangkat' => $id
    );

    $this->M_perangkat->update_data('tb_perangkat', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil diupdate !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('admin/perangkat');
  }

  public function delete_data($id)
  {
    $where = array('id_perangkat' => $id);
    $this->M_perangkat->delete_data($where, 'tb_perangkat');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    redirect('admin/perangkat');
  }
}
