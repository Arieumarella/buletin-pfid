<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dinamis extends CI_Model {

    public function add_all($tabel, $select, $order, $urut)
    {
        $this->db->from($tabel);
        $this->db->select($select);
        $this->db->order_by($order, $urut);
        return $this->db->get()->result();
    }

    public function add_in($tabel, $select, $order, $urut, $where)
    {
        $this->db->from($tabel);
        $this->db->select($select);
        $this->db->where_in('id_slug', $where);
        $this->db->order_by($order, $urut);
        return $this->db->get()->result();
    }

    public function update($tabel, $dataUbah, $where){
        $this->db->where($where);
        return $this->db->update($tabel, $dataUbah);
    }

    public function slug_id($tabel, $select, $order, $urut)
    {
        $this->db->from($tabel);
        $this->db->select($select);
        $this->db->order_by($order, $urut);
        return $this->db->get()->result_array();
    }

    public function max_value($tabel, $select)
    {
        $this->db->select_max($select);
        $this->db->from($tabel);
        return $this->db->get()->row();
    }

    public function getByRow($tabel, $select)
    {
        $this->db->select($select);
        $this->db->from($tabel);
        return $this->db->get()->row();
    }

    public function save($tabel, $data){
        return $this->db->insert($tabel, $data);
    }

    public function countDataById($tabel, $data)
    {
        return $this->db->get_where($tabel, $data)->num_rows();
    }

    public function getCountAll($tabel)
    {
        return $this->db->get($tabel)->num_rows();
    }

    public function getResult($tabel, $data)
    {
        return $this->db->get_where($tabel, $data)->result();
    }

    public function getResult2($tabel, $data)
    {
        return $this->db->get_where($tabel, $data)->result_array();
    }

    public function getById($tabel, $data)
    {
        return $this->db->get_where($tabel, $data)->row();
    }

    public function delete($tabel, $data){
        $this->db->where($data);
        return $this->db->delete($tabel);
    }

    public function count_all($tabel)
    {
        $this->db->from($tabel);
        return $this->db->count_all_results();
    }

    public function getUser()
    {
        $qry = "SELECT t_users.*, t_role.name AS rollNamae FROM t_users
        INNER JOIN 
        t_role ON t_users.user_roll=t_role.id";

        return $this->db->query($qry)->result();
    }

    public function getPaginateion($table,$number,$offset){
        return $this->db->get($table,$number,$offset)->result();       
    }

    public function getByLimit($table, $limit, $order, $urut)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order, $urut);
        $this->db->limit($limit);
        return $this->db->get()->result();
    }


}

/* End of file M_dinamis.php */
/* Location: ./application/models/M_dinamis.php */