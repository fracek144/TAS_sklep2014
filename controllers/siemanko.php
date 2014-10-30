<?php
class siemankoController extends Controller {
 
	public function __construct() {
		$this -> tpl = $this -> load('core', 'template');
	}
 
	public function index() {
		return false;
	}
}
?>