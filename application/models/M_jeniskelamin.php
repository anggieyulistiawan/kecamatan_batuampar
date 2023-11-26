<?php
class M_jeniskelamin extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('tb_jeniskelamin');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_jeniskelamin.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tanggal_jeniskelamin)', date('Y'));
        $this->db->where('MONTH(tanggal_jeniskelamin)', date('m'));
        $this->db->order_by('id_jeniskelamin', 'DESC');
        return $this->db->get();
        // return $this->db->query('SELECT*FROM tb_jeniskelamin JOIN tb_desa on tb_jeniskelamin.id_desa=tb_desa.id_desa ORDER BY id_jeniskelamin DESC');
    }

    public function get_data_jeniskelaminuser()
    {
        // return $this->db->get($table);
        $id_akun = $this->session->userdata('id_akun');
        $this->db->select('*');
        $this->db->from('tb_jeniskelamin');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_jeniskelamin.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tb_jeniskelamin.id_akun', $id_akun);
        $this->db->order_by('id_jeniskelamin', 'DESC');
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

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function detail_data($id_jeniskelamin)
    {
        $query = $this->db->query("SELECT * FROM tb_jeniskelamin 
        JOIN tb_akun on tb_jeniskelamin.id_akun=tb_akun.id_akun
        JOIN tb_desa on tb_akun.id_desa=tb_desa.id_desa
        WHERE id_jeniskelamin='$id_jeniskelamin'")->row();
        return $query;
    }

    public function filter_print($tanggal_awal, $tanggal_akhir)
    {
        $this->db->select('*');
        $this->db->from('tb_jeniskelamin');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_jeniskelamin.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tanggal_jeniskelamin >=', $tanggal_awal);
        $this->db->where('tanggal_jeniskelamin <=', $tanggal_akhir);
        $query = $this->db->get();
        return $query->result();
    }

    public function filter_jeniskelamin($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tb_jeniskelamin');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_jeniskelamin.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tanggal_jeniskelamin)', $tahun);
        $this->db->where('MONTH(tanggal_jeniskelamin)', $bulan);
        $query = $this->db->get();
        return $query->result();
    }
}
