<?php

	require_once 'Main/Package.php';
	
	import("minta.main.class");
	import("minta.main.robot");
	import("minta.extra.functions");
	
	class Minta_Application extends Minta_Main_Class{
		protected $config = "";
		public function __construct($config){
			parent::__construct();
			$this->config = xmlToArray(simplexml_load_file($config));
			$this->robot = new Minta_Main_Robot($this->config["config"]);
		}
		public function toString(){
			$this->text = "Application Class";
			return $this->text;
		}
	}
?>