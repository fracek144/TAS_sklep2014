<?php
class newsController extends Controller {
 
	public function __construct() {
		$this -> newsModel = $this -> load('model', 'newsModel');
		$this -> tpl = $this -> load('core', 'template');
	}
 
	public function index() {
		return $this -> getNews();
	}
 
	public function getNews() {
		$this -> tpl -> SetTemplate('news');
		$this -> tpl -> SetVars(array('newsdata' => $this -> newsModel -> getNews()));
		return $this -> tpl -> Render(false);
	}
 
	public function getNewsById($data) {
		$this -> tpl -> SetTemplate('news_one');
		$this -> tpl -> SetVars(array('newsdata' => $this -> newsModel -> getNewsById($data[0])));
		return $this -> tpl -> Render(false);
	}
}
?>