<?php
class M_bpd extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('tb_bpd');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_bpd.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tanggal_bpd)', date('Y'));
        $this->db->where('MONTH(tanggal_bpd)', date('m'));
        $this->db->order_by('id_bpd', 'DESC');
        return $this->db->get();
    }

    public function get_data_bpduser()
    {
        // return $this->db->get($table);
        $id_akun = $this->session->userdata('id_akun');
        $this->db->select('*');
        $this->db->from('tb_bpd');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_bpd.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tb_bpd.id_akun', $id_akun);
        $this->db->order_by('id_bpd', 'DESC');
        return $this->db->get();
    }

    public function tampil_desa()
    {
        return $this->db->query("SELECT * FROM tb_desa");
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function detail_data_update($id_bpd)
    {
        $this->db->select('*');
        $this->db->from('tb_bpd');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_bpd.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('id_bpd', $id_bpd);
        $query = $this->db->get();
        return $query->row();
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function filter_print($tanggal_awal, $tanggal_akhir)
    {
        $this->db->select('*');
        $this->db->from('tb_bpd');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_bpd.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tanggal_bpd >=', $tanggal_awal);
        $this->db->where('tanggal_bpd <=', $tanggal_akhir);
        $query = $this->db->get();
        return $query->result();
    }

    public function filter_bpd($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tb_bpd');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_bpd.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tanggal_bpd)', $tahun);
        $this->db->where('MONTH(tanggal_bpd)', $bulan);
        $query = $this->db->get();
        return $query->result();
    }
}
