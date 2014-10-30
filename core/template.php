<?php
class Template extends Core {
 
	protected $vars;
 
	public function SetVars(array $vars = array()) {
		$this -> vars = $vars;
	}
 
	public function SetTemplate($tpl) {
		$this -> tpl = $tpl;
	}
 
	public function Render($mode) {
		if($mode) {
			extract($this -> vars);
			require 'templates/'.$this -> tpl.'.php'; 		
		} else {
			ob_start();
			extract($this -> vars);
			require 'templates/'.$this -> tpl.'.php'; 
			return ob_get_clean();	
		}
 
	}
}
?>