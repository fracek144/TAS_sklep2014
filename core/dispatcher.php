<?php
class Dispatcher extends Core {
 
	public function __construct() {
		parent::__construct();
		$this -> controller = $this -> load('core', 'controller', false);
		$this -> model = $this -> load('core', 'model', false);
		$this -> request = $this -> load('core', 'request');
		$this -> view = $this -> load('core', 'template');
	}
 
	public function run() {
		$strController = $this -> request -> getController()."Controller";
		$controller = $this -> load('controller', $strController);
		$strAction = $this -> request -> getAction();
		$this -> view -> SetTemplate($this -> config -> getOption('index'));
		$this -> view -> SetVars(array('content' => $controller -> $strAction($this -> request -> getParams())));
		$this -> view -> Render(true);
	}
}
?>