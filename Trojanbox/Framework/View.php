<?php
namespace Trojanbox\Framework;

use Trojanbox\Globals\Globals;
use Trojanbox\Framework\Exception\ViewException;

class View {
	
	protected $globals;
	
	public function __construct() {
		
	}
	
	public function display() {
		
		$httpRequestArgs = Globals::getInstance()->HttpRequestArgs;
		$view = $httpRequestArgs['directory'] . ucfirst($httpRequestArgs['controller']) . DS . $httpRequestArgs['action'] . '.html';
		$viewDirectory = APP_APPLICATION_VIEW . $view;
		
		if (!is_file($viewDirectory)) {
			throw new ViewException('没有找到视图路径 VIEW: ' . $view);
		}
		include $viewDirectory;
	}
}