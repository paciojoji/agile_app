<?php

class Agile_model extends CI_Model
{

  public function getAllAgileData()
  {
    $this->db->select('*');
    $this->db->from("tbl_agile a");
    $this->db->where("a.removed", 0);

    $query = $this->db->get();

    return ($query->num_rows() > 0) ? $query->result_array() : [];
  }

  public function addAgileData($data)
  {
    return $this->db->insert("tbl_agile", $data);
  }

  public function updateAgileData($data, $condition)
  {
    $this->db->where($condition);
    return $this->db->update("tbl_agile", $data);
  }

  public function removeAgileData($agile_id)
  {
    $this->db->where(['agile_id' => $agile_id]);
    return $this->db->update("tbl_agile", ['removed' => 1]);
  }
}