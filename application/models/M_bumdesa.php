<?php
class M_bumdesa extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('tb_bumdesa');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_bumdesa.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tgl_bumdesa)', date('Y'));
        $this->db->where('MONTH(tgl_bumdesa)', date('m'));
        $this->db->order_by('id_bumdesa', 'DESC');
        return $this->db->get();
        // return $this->db->query('SELECT*FROM tb_bumdesa JOIN tb_desa on tb_bumdesa.id_desa=tb_desa.id_desa ORDER BY id_bumdesa DESC');
    }

    public function get_data_bumdesauser()
    {
        // return $this->db->get($table);
        $id_akun = $this->session->userdata('id_akun');
        $this->db->select('*');
        $this->db->from('tb_bumdesa');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_bumdesa.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tb_bumdesa.id_akun', $id_akun);
        $this->db->order_by('id_bumdesa', 'DESC');
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

    public function detail_data_update($id_bumdesa)
    {
        $this->db->select('*');
        $this->db->from('tb_bumdesa');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_bumdesa.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('id_bumdesa', $id_bumdesa);
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
        $this->db->from('tb_bumdesa');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_bumdesa.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tgl_bumdesa >=', $tanggal_awal);
        $this->db->where('tgl_bumdesa <=', $tanggal_akhir);
        $query = $this->db->get();
        return $query->result();
    }

    public function filter_bumdesa($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tb_bumdesa');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_bumdesa.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tgl_bumdesa)', $tahun);
        $this->db->where('MONTH(tgl_bumdesa)', $bulan);
        $query = $this->db->get();
        return $query->result();
    }
}
