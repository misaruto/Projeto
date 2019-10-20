<?php 

	/**
	 * 
	 */
	class Core
	{
		
		public function start($urlGet,$post){
			if ((isset($urlGet["action"]))&&($urlGet['action'] != NULL)) {
				$action = $urlGet["action"];
			}
			else{
				$action = "index";
			}
			if (isset($urlGet["page"])&& $urlGet["page"] != NULL) {
				$controller = ucfirst($urlGet["page"].'Controller');
			}
			else{
				$controller = 'Login'.'Controller';
			}
			if (!class_exists($controller)) {
				$controller = "ErrorController";
			}

			call_user_func(array(new $controller,$action),$post);
		}
	}
  ?>