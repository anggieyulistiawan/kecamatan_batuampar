<?php
class Wajibktp extends CI_Controller
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
    $data['title'] = "Wajib KTP";
    $data['wajibktp'] = $this->M_wajibktp->get_data('tb_wajibktp')->result();
    $data['desa'] = $this->M_wajibktp->tampil_desa()->result();
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/data_penduduk/v_wajibktp', $data);
    $this->load->view('admin/template/footer');
  }

  public function detail_data($id_wajibktp)
  {
    $data['title'] = "Detail Data Wajib KTP-EL";
    $detail = $this->M_wajibktp->detail_data($id_wajibktp);
    $tanggal_wajibktp = $detail->tanggal_wajibktp;
    list($tahun, $bulan, $tanggal) = explode('-', $tanggal_wajibktp);
    $id_akun = $detail->id_akun;
    $data['jumlah'] = $this->M_pendidikan->get_data_selesihi($tahun, $bulan, $id_akun);
    $data['detail'] = $detail;
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/data_penduduk/v_wajibktp_detail', $data);
    $this->load->view('admin/template/footer');
  }

  public function update_data_aksi()
  {
    $id = $this->input->post('id_wajibktp');
    $jumlahkk_l = $this->input->post('jumlahkk_l');
    $jumlahkk_p = $this->input->post('jumlahkk_p');
    $belumktpel_l = $this->input->post('belumktpel_l');
    $belumktpel_p = $this->input->post('belumktpel_p');
    $sudahktpel_l = $this->input->post('sudahktpel_l');
    $sudahktpel_p = $this->input->post('sudahktpel_p');
    $tanggal_wajibktp = $this->input->post('tanggal_wajibktp');


    $data = array(
      'jumlahkk_l'    => $jumlahkk_l,
      'jumlahkk_p'    => $jumlahkk_p,
      'belumktpel_l'    => $belumktpel_l,
      'belumktpel_p'    => $belumktpel_p,
      'sudahktpel_l'    => $sudahktpel_l,
      'sudahktpel_p'    => $sudahktpel_p,
      'tanggal_wajibktp'    => $tanggal_wajibktp,
    );

    $where = array(
      'id_wajibktp' => $id,
    );

    $this->M_wajibktp->update_data('tb_wajibktp', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil diupdate !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('admin/wajibktp');
  }


  public function delete_data($id)
  {
    $where = array('id_wajibktp' => $id);
    $this->M_wajibktp->delete_data($where, 'tb_wajibktp');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
    redirect('admin/wajibktp');
  }

  public function filter_wajibktp()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    // var_dump($tahun, $bulan);
    // die;
    $data['desa'] = $this->M_jeniskelamin->tampil_desa()->result();
    $data['wajibktp'] = $this->M_wajibktp->filter_wajibktp($bulan, $tahun);
    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/data_penduduk/v_wajibktp', $data);
    $this->load->view('admin/template/footer');
  }
}
