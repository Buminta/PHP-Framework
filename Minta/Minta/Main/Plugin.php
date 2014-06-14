<?php
	import("minta.main.class");
	class Minta_Main_Plugin extends Minta_Main_Class{
		public function __construct(){
			parent::__construct();
		}
		public function toString(){
			$this->text = "Plugin Class";
			return $this->text;
		}
	}
?>