<?php
class userController extends Controller {
 
	public function __construct() {
		$this -> userModel = $this -> load('model', 'userModel');
		$this -> tpl = $this -> load('core', 'template');
	}
 
	public function index() {
		return false;
	}
 
	public function getUsers() {
		$this -> tpl -> SetTemplate('users');
		$this -> tpl -> SetVars(array('userdata' => $this -> userModel -> getUsers()));
		return $this -> tpl -> Render(false);
	}
 
	public function getUserById($id) {
		$this -> tpl -> SetTemplate('user');
		$this -> tpl -> SetVars(array('userdata' => $this -> userModel -> getUserById($id[0])));
		return $this -> tpl -> Render(false);
	}
 
	public function loginForm() {
		$this -> tpl -> SetTemplate('loginForm');
		$this -> tpl -> SetVars();
		return $this -> tpl -> Render(false);
	}
 
	public function login($data) {
		$this -> tpl -> SetTemplate('loginForm');
		$this -> tpl -> SetVars(array('message' => $this -> userModel -> login($data['username'], sha1($data['password']))));
		return $this -> tpl -> Render(false);
	}
}
?>