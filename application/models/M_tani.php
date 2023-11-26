<?php
class M_tani extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('tb_tani');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_tani.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tgl_tani)', date('Y'));
        $this->db->where('MONTH(tgl_tani)', date('m'));
        $this->db->order_by('id_tani', 'DESC');
        return $this->db->get();
        // return $this->db->query('SELECT*FROM tb_tani JOIN tb_desa on tb_tani.id_desa=tb_desa.id_desa ORDER BY id_tani DESC');
    }

    public function get_data_taniuser()
    {
        // return $this->db->get($table);
        $id_akun = $this->session->userdata('id_akun');
        $this->db->select('*');
        $this->db->from('tb_tani');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_tani.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tb_tani.id_akun', $id_akun);
        $this->db->order_by('id_tani', 'DESC');
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

    public function detail_data_update($id_tani)
    {
        $this->db->select('*');
        $this->db->from('tb_tani');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_tani.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('id_tani', $id_tani);
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
        $this->db->from('tb_tani');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_tani.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tgl_tani >=', $tanggal_awal);
        $this->db->where('tgl_tani <=', $tanggal_akhir);
        $query = $this->db->get();
        return $query->result();
    }

    public function filter_tani($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tb_tani');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_tani.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tgl_tani)', $tahun);
        $this->db->where('MONTH(tgl_tani)', $bulan);
        $query = $this->db->get();
        return $query->result();
    }
}
