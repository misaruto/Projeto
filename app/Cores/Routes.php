<?php 
	/**
	 * 
	 */
	require_once 'app/Cores/UrlTrait.php';
	class Routes
	{
//		use app\Cores\UrlTrait;
		private $url;
		private $routes;

		public function getMethodRoute()
		{
			$this->url = new UrlTrait();
			$index = $this->url->traitUrl();
			if (isset($index[1])) {
				return $index[1];
			}
			else{
				return "";
			}
		}
		public function getParamRoute()
		{
			$this->url = new UrlTrait();
			$index = $this->url->traitUrl();
			return $index;
		}
		public function getRoute()
		{
			$this->routes = array("" => "LoginController",
				"login"=>"LoginController","home"=>"HomeController","public"=>"PublicController");
			$this->url = new UrlTrait();
			$index = $this->url->traitUrl();
			$aux = $index[0];

			if (array_key_exists($aux, $this->routes)) {
				if (file_exists("app/Controller/".$this->routes[$aux].".php")) {
					return $this->routes[$aux];
				}	
				else{
					return "ErrorController";
				}
			}
			else{
				return "ErrorController";
			}
		}
	}
	?>