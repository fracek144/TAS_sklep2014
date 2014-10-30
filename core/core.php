<?php
class Core {
 
	public function __construct() {
		$this -> config = $this -> load('lib', 'config');
	}
 
	public function load($type, $name, $mode = true) {
		if($type == 'lib') {
			require_once 'library/'.$name.'.php';
			if($mode)
				return new $name;
		}
		if($type == 'core') {
			require_once 'core/'.$name.'.php';
			if($mode)
				return new $name;
		}	
		if($type == 'controller') {
				preg_match('/^[a-z]+/', $name, $controller);
			if(file_exists('controllers/'.$controller[0].'.php')) {
				require_once 'controllers/'.$controller[0].'.php';
			} else {
				require_once 'controllers/error.php';
				$name = 'errorController';
				}
			if($mode)
				return new $name;
		}
		if($type == 'model') {
			preg_match('/^[a-z]+/', $name, $model);
			require_once 'models/'.$model[0].'.php';
			if($mode)
				return new $name;
		}		
	}
 
	public function getBaseUrl() {
		return $this -> config -> getOption('base_url');
	}
 
	public function getSiteUrl() {
		return $this -> config -> getOption('site_url');
	}
}
?>