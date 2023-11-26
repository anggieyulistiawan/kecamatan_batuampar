<?php
class M_desa extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('tb_desa');
        $this->db->order_by('id_desa', 'DESC');
        return $this->db->get();
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
}
