<?php
class errorController extends Controller {
 
	public function __construct() {
		$this -> tpl = $this -> load('core', 'template');
	}
 
	public function index() {
		$this -> tpl -> SetTemplate('error');
		$this -> tpl -> SetVars(array('error' => ''));
		return $this -> tpl -> Render(false);
	}
	
}
?>