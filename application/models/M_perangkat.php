<?php
class M_perangkat extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('tb_perangkat');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_perangkat.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tanggal_perangkat)', date('Y'));
        $this->db->where('MONTH(tanggal_perangkat)', date('m'));
        $this->db->order_by('id_perangkat', 'DESC');
        return $this->db->get();
    }

    public function get_data_perangkatuser()
    {
        // return $this->db->get($table);
        $id_akun = $this->session->userdata('id_akun');
        $this->db->select('*');
        $this->db->from('tb_perangkat');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_perangkat.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tb_perangkat.id_akun', $id_akun);
        $this->db->order_by('id_perangkat', 'DESC');
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

    public function detail_data_update($id_perangkat)
    {
        $this->db->select('*');
        $this->db->from('tb_perangkat');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_perangkat.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('id_perangkat', $id_perangkat);
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
        $this->db->from('tb_perangkat');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_perangkat.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tanggal_perangkat >=', $tanggal_awal);
        $this->db->where('tanggal_perangkat <=', $tanggal_akhir);
        $query = $this->db->get();
        return $query->result();
    }

    public function filter_perangkat($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tb_perangkat');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_perangkat.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tanggal_perangkat)', $tahun);
        $this->db->where('MONTH(tanggal_perangkat)', $bulan);
        $query = $this->db->get();
        return $query->result();
    }
}
