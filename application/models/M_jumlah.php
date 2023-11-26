<?php
class M_jumlah extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('tb_jumlah');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_jumlah.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tanggal_jumlah)', date('Y'));
        $this->db->where('MONTH(tanggal_jumlah)', date('m'));
        $this->db->order_by('id_jumlah', 'DESC');
        return $this->db->get();
        // return $this->db->query('SELECT*FROM tb_jumlah JOIN tb_desa on tb_jumlah.id_desa=tb_desa.id_desa ORDER BY id_jumlah DESC');
    }

    public function get_data_jumlahuser()
    {
        // return $this->db->get($table);
        $id_akun = $this->session->userdata('id_akun');
        $this->db->select('*');
        $this->db->from('tb_jumlah');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_jumlah.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tb_jumlah.id_akun', $id_akun);
        // $this->db->where('YEAR(tanggal_jumlah)', date('Y'));
        // $this->db->where('MONTH(tanggal_jumlah)', date('m'));
        $this->db->order_by('id_jumlah', 'DESC');
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

    public function detail_data($id_jumlah)
    {
        $query = $this->db->query("SELECT * FROM tb_jumlah 
        JOIN tb_akun on tb_jumlah.id_akun=tb_akun.id_akun
        JOIN tb_desa on tb_akun.id_desa=tb_desa.id_desa
        WHERE id_jumlah='$id_jumlah'")->row();
        return $query;
    }

    public function filter_print($tanggal_awal, $tanggal_akhir)
    {
        $this->db->select('*');
        $this->db->from('tb_jumlah');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_jumlah.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tanggal_jumlah >=', $tanggal_awal);
        $this->db->where('tanggal_jumlah <=', $tanggal_akhir);
        $query = $this->db->get();
        return $query->result();
    }

    public function filter_jumlah($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tb_jumlah');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_jumlah.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tanggal_jumlah)', $tahun);
        $this->db->where('MONTH(tanggal_jumlah)', $bulan);
        $query = $this->db->get();
        return $query->result();
    }
}
