<?php
class Request extends Core {
 
	public $aPOST = array();
	public $aGET = array();
	private $tab = array();
	private $file;
 
	public function __construct() {
		parent::__construct();
		$this -> file = $this -> config -> GetOption('file');
		$this -> file2 = $this -> config -> GetOption('file2');
		$this -> aPOST = $_POST;
		$this -> aGET = $_GET;
		$this -> parse();
	}
 
	public function parse() {
		if(stristr($_SERVER['REQUEST_URI'], $this -> file)) {
			$tab = explode($this -> file.'/',$_SERVER['REQUEST_URI']);
		}
		else 
			$tab = explode($this->file2.'/',$_SERVER['REQUEST_URI']);
			
		return $this -> elements = explode('/', $tab[1]);
	}
 
	public function getParams() {
		array_shift($this -> elements);
		array_shift($this -> elements);
		foreach($this -> aPOST as $key => $value) {
			$this -> elements[$key] .= $value;
		}
		foreach($this -> aGET as $key => $value) {
			$this -> elements[$key] .= $value;
		}
		return $this -> elements;
	}
 
	public function getController() {
		if($this -> elements[0])
			return $this -> elements[0];
		 else
			return $this -> config -> GetOption('defaultController');
	}
 
	public function getAction() {
		if($this -> elements[1])
			return $this -> elements[1];
		 else
			return $this -> config -> GetOption('defaultAction');
	}
}