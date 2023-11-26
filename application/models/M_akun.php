<?php
class M_akun extends CI_Model
{
    public function get_data()
    {
        return $this->db->query('SELECT*FROM tb_akun JOIN tb_level on tb_akun.id_level=tb_level.id_level
            JOIN tb_desa on tb_akun.id_desa=tb_desa.id_desa ORDER BY id_akun DESC');
    }

    public function tampil_level()
    {
        return $this->db->query("SELECT * FROM tb_level");
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

    public function detail_data($id_akun)
    {
        $query = $this->db->query("SELECT * FROM tb_akun JOIN tb_level on tb_akun.id_level=tb_level.id_level
                WHERE id_akun='$id_akun'")->row();
        return $query;
    }

    public function cek_login()
    {
        $username   = set_value('username');
        $password   = set_value('password');

        $result     = $this->db->where('username', $username)
            ->where('password', md5($password))
            ->join('tb_desa', 'tb_desa.id_desa=tb_akun.id_desa')
            ->limit(1)
            ->get('tb_akun');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }
}
