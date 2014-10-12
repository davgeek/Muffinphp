<?php

/*
* Model father class for the DB connection.
*/
class Model {

	protected $db;

	/**
	 * Constructor for Model
	 * set the conection to DB whit mysqli driver.
	 */
	public function __construct()
	{

		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if($this->db->connect_errno ) {
			trigger_error("MySQL Error NOT connected: ". $this->db->connect_errno, E_USER_WARNING);
			return;
		}

		$this->db->set_charset(DB_CHAR);

	}
}
