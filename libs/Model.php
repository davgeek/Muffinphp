<?php
/*
* Model father class for the DB connection.
*/
class Model {

	protected $db;

	public function __construct()
	{

		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if($this->db->connect_errno ) {
			echo "MySQL Error NOT connected: ". $this->db->connect_errno;
			return;
		}

		$this->db->set_charset(DB_CHAR);
	}
}
