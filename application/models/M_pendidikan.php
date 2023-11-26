<?php
class M_pendidikan extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('tb_pendidikan');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_pendidikan.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tanggal_pendidikan)', date('Y'));
        $this->db->where('MONTH(tanggal_pendidikan)', date('m'));
        $this->db->order_by('id_pendidikan', 'DESC');
        return $this->db->get();
        // return $this->db->query('SELECT*FROM tb_pendidikan JOIN tb_desa on tb_pendidikan.id_desa=tb_desa.id_desa ORDER BY id_pendidikan DESC');
    }

    public function get_data_pendidikanuser()
    {
        // return $this->db->get($table);
        $id_akun = $this->session->userdata('id_akun');
        $this->db->select('*');
        $this->db->from('tb_pendidikan');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_pendidikan.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tb_pendidikan.id_akun', $id_akun);
        $this->db->order_by('id_pendidikan', 'DESC');
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

    public function detail_data($id_pendidikan)
    {
        $query = $this->db->query("SELECT * FROM tb_pendidikan 
        JOIN tb_akun on tb_pendidikan.id_akun=tb_akun.id_akun
        JOIN tb_desa on tb_akun.id_desa=tb_desa.id_desa
        WHERE id_pendidikan='$id_pendidikan'")->row();
        return $query;
    }

    public function filter_print($tanggal_awal, $tanggal_akhir)
    {
        $this->db->select('*');
        $this->db->from('tb_pendidikan');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_pendidikan.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tanggal_pendidikan >=', $tanggal_awal);
        $this->db->where('tanggal_pendidikan <=', $tanggal_akhir);
        $query = $this->db->get();
        return $query->result();
    }

    public function filter_pendidikan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tb_pendidikan');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_pendidikan.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tanggal_pendidikan)', $tahun);
        $this->db->where('MONTH(tanggal_pendidikan)', $bulan);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_data_selesih($tahun, $bulan)
    {
        $id_akun = $this->session->userdata('id_akun');
        $this->db->select('*');
        $this->db->from('tb_jumlah');
        $this->db->where('id_akun', $id_akun);
        $this->db->where('YEAR(tanggal_jumlah)', $tahun);
        $this->db->where('MONTH(tanggal_jumlah)', $bulan);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_data_selesihi($tahun, $bulan, $id_akun)
    {
        $this->db->select('*');
        $this->db->from('tb_jumlah');
        $this->db->where('YEAR(tanggal_jumlah)', $tahun);
        $this->db->where('MONTH(tanggal_jumlah)', $bulan);
        $this->db->where('id_akun', $id_akun);
        $query = $this->db->get();
        return $query->row();
    }
}
