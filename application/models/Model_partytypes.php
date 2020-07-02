<?php 

class Model_partytypes extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get active brand infromation */
	public function getActivePartyTypes()
	{
		$sql = "SELECT * FROM partytypes WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	/* get the brand data */
	public function getPartyTypesData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM partytypes WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM partytypes";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('partytypes', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('partytypes', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('partytypes');
			return ($delete == true) ? true : false;
		}
	}

}