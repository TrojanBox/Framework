<?php
namespace Trojanbox\Di;

use Trojanbox\Di\Exception\DiException;

class Di
{

    private static $self = null;
    
    private $dependencyContainer = null;
    
    private $instanceContainer = null;
    
    public function __construct()
    {
    	$this->dependencyContainer = new DependencyContainer($this);
    	$this->instanceContainer = new InstanceContainer($this);
    }

    /**
     * 取得依赖容器
     * 
     * @return \Trojanbox\Di\DependencyContainer
     */
    public function getDependencyContainer() {
        return $this->dependencyContainer;
    }
    
    /**
     * 取得实例容器
     * 
     * @return \Trojanbox\Di\InstanceContainer
     */
    public function getInstanceContainer() {
        return $this->instanceContainer;
    }
    
    /**
     * 设置对象
     * 
     * @param string $alias 别名
     * @param string $className 类名
     * @param string $params 参数
     * @throws DiException
     */
    public function set($alias, $className, array $params = null)
    {
        if (! is_string($className)) {
            throw new DiException('Initialization errors, invalid class name.', E_WARNING);
        }
    	
    	$container[$alias] = array(
    		'class' => $className,
    	    'params' => null == $params ? array() : $params
    	);
    	
    	$this->dependencyContainer->setContainer($container);
    }
    
    /**
     * 获取对象
     * 
     * @param unknown $alias
     */
    public function get($alias) {
        return $this->dependencyContainer->getContainerInstance($alias);
    }
}