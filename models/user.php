<?php
class userModel extends Model {
	public function __construct() {
		parent::__construct();
		$this -> load('lib', 'base', false);
		$db = new Base;
                $this -> db = $db -> getdbConnection();
	}
 
	public function getUsers() {
		$query = $this -> db -> query("SELECT * FROM users");
		while($row = $query -> fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
 
	public function getUserById($id) {
		$query = $this -> db -> query("SELECT * FROM users WHERE id = '$id'");	
		return $query -> fetch_assoc();
	}
 
	public function login($username, $password) {
		$query = $this -> db -> query("SELECT * FROM users WHERE username = '$username' and password = '$password'");
		if($query) {
			if($query -> num_rows > 0) {
				header("location: ".$this -> getBaseUrl()."");
			} else {
				return $this -> message = 'Niepoprawne dane!';
			}
		}
	}
}
?>