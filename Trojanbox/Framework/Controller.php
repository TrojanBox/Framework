<?php
namespace Trojanbox\Framework;

class Controller {
	
	protected $view;
	
	final public function __construct() {
		$this->_execView();
	}

	private function _execView() {
		$this->view = new View();
		return $this;
	}
	
	protected function display() {
		$this->view->display();
	}
}