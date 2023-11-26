<?php
class M_wajibktp extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('tb_wajibktp');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_wajibktp.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tanggal_wajibktp)', date('Y'));
        $this->db->where('MONTH(tanggal_wajibktp)', date('m'));
        $this->db->order_by('id_wajibktp', 'DESC');
        return $this->db->get();
        // return $this->db->query('SELECT*FROM tb_wajibktp JOIN tb_desa on tb_wajibktp.id_desa=tb_desa.id_desa ORDER BY id_wajibktp DESC');
    }

    public function get_data_wajibktpuser()
    {
        // return $this->db->get($table);
        $id_akun = $this->session->userdata('id_akun');
        $this->db->select('*');
        $this->db->from('tb_wajibktp');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_wajibktp.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tb_wajibktp.id_akun', $id_akun);
        $this->db->order_by('id_wajibktp', 'DESC');
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

    public function detail_data($id_wajibktp)
    {
        $query = $this->db->query("SELECT * FROM tb_wajibktp 
        JOIN tb_akun on tb_wajibktp.id_akun=tb_akun.id_akun
        JOIN tb_desa on tb_akun.id_desa=tb_desa.id_desa
        WHERE id_wajibktp='$id_wajibktp'")->row();
        return $query;
    }

    public function filter_print($tanggal_awal, $tanggal_akhir)
    {
        $this->db->select('*');
        $this->db->from('tb_wajibktp');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_wajibktp.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('tanggal_wajibktp >=', $tanggal_awal);
        $this->db->where('tanggal_wajibktp <=', $tanggal_akhir);
        $query = $this->db->get();
        return $query->result();
    }

    public function filter_wajibktp($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tb_wajibktp');
        $this->db->join('tb_akun', 'tb_akun.id_akun=tb_wajibktp.id_akun');
        $this->db->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa');
        $this->db->where('YEAR(tanggal_wajibktp)', $tahun);
        $this->db->where('MONTH(tanggal_wajibktp)', $bulan);
        $query = $this->db->get();
        return $query->result();
    }
}
