<?php 

	/**
	 * 
	 */
	class ErrorController
	{
		function __construct()
		{
			self::index();
		}
		public function index()
		{
			require_once 'app/View/error.html';
		}	
	}

	?>