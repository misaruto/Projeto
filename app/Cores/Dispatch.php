<?php 
require_once 'app/Cores/Routes.php';
require_once 'app/Cores/UrlTrait.php';
class Dispatch extends Routes 
{
	private $method;
	private $param=[];
	private $obj;

	function __construct()
	{
		$this->method = "";
		self::addController();
	}
	public function setMethod($method)
	{
		$this->method = $method;
	}
	protected function getMethod()
	{
		return $this->method;
	}
	public function setParam($param)
	{
		$this->param = $param;
	}
	protected function getParam()
	{
		return $this->param;
	}
	private function addController()
	{
		$route = $this->getRoute();
		$require = "app/Controller/".$route.".php";
		require_once $require;
		$this->obj = new $route;
		if ($this->getMethodRoute()!=NULL) {
			self::addMethod();
		}
	}
	private function addMethod(){
		if (method_exists($this->obj,$this->getMethodRoute())) {
			$this->setMethod($this->getMethodRoute());
			self::addParam();
			call_user_func([$this->obj,$this->getMethod()],$this->getParam());
		}
	}
	private function addParam(){
		$countArray = count($this->getParamRoute()); 
		if ($countArray >2) {
			foreach ($this->getParamRoute() as $key => $value) {
				if ($key >1) {
					$this->setParam($this->param += [$key => $value]);
				}
			}
		}
	}

}
?>