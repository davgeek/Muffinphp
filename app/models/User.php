<?php 

require_once '../libs/Model.php';

/**
 * User Model, demostrative example.
 */
class User extends Model {
	
	// table name
	protected $table = 'users';

	public function __construct() 
	{
		parent::__construct();
	}

	// Method for add user.
	public function addUser($name,$email) 
	{
		$this->db->query("INSERT INTO $this->table (name, email) VALUES ('".$name."','".$email."')");
	}
	
}