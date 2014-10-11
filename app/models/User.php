<?php 

require_once '../libs/Model.php';

/**
 * User Model, demostrative example.
 */
class User extends Model{
	
	// table name
	protected $table = 'users';

	public function __construct() {
		parent::__construct();
	}

	// Method for add user.
	public function addUser($name,$email) {

		$stmt = $this->db->prepare('INSERT INTO '.$this->table.'(name, email) VALUES (?, ?)');
		$stmt->bind_param('ss', $name ,$email);
		$stmt->execute();

	}
}