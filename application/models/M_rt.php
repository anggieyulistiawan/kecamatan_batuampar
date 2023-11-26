<?php
class M_rt extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('tb_rt');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_rt.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tanggal_rt)', date('Y'));
        $this->db->where('MONTH(tanggal_rt)', date('m'));
        $this->db->order_by('id_rt', 'DESC');
        return $this->db->get();
    }

    public function get_data_rtuser()
    {
        // return $this->db->get($table);
        $id_akun = $this->session->userdata('id_akun');
        $this->db->select('*');
        $this->db->from('tb_rt');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_rt.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tb_rt.id_akun', $id_akun);
        $this->db->order_by('id_rt', 'DESC');
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

    public function detail_data_update($id_rt)
    {
        $this->db->select('*');
        $this->db->from('tb_rt');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_rt.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('id_rt', $id_rt);
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
        $this->db->from('tb_rt');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_rt.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tanggal_rt >=', $tanggal_awal);
        $this->db->where('tanggal_rt <=', $tanggal_akhir);
        $query = $this->db->get();
        return $query->result();
    }

    public function filter_rt($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tb_rt');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_rt.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tanggal_rt)', $tahun);
        $this->db->where('MONTH(tanggal_rt)', $bulan);
        $query = $this->db->get();
        return $query->result();
    }
}
