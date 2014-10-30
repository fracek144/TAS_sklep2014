<?php
class Base {
 
	private $host;
	private $username;
	private $password;
	private $basename;
 
	public function getdbConnection() {
		$config = new Config;
		$host = $config -> getOption('hostname');
		$username = $config -> getOption('username');
		$password = $config -> getOption('password');
		$basename = $config -> getOption('name');
		try {
			$db = new mysqli($host, $username, $password, $basename);
			$db -> query("SET NAMES UTF8");
		} catch(Exception $e) {
			echo 'Brak połączenia';
		}
		return $db;
	}
}
?>