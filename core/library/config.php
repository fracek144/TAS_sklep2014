<?php
class Config {
 
	public function getOption($option) {
		require 'core/config/config.php';
		return $config[$option];
	}
}
?>