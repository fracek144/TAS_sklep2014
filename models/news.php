<?php
class newsModel extends Model {
	public function __construct() {
		$this -> load('lib', 'base', false);
		$db = new Base;
                $this -> db = $db -> getdbConnection();
	}
 
	public function getNews() {
		$query = $this -> db -> query("SELECT * FROM news");
		while($row = $query -> fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
 
	public function getNewsById($id) {
		$query = $this -> db -> query("SELECT * FROM news WHERE id = '$id'");	
		return $query -> fetch_assoc();
	}
}
?>