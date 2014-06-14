<?php
	import("minta.main.class");
	import("minta.main.baseurl");
	class Script extends Minta_Main_Class{
		public function __construct(){
			
		}
		public function getScript($name){
			$baseurl = new Minta_Main_BaseURL();
			return $baseurl->getROOT().str_replace(str_replace("\\","/",ROOT_PATH), "", str_replace("\\","/",dirname(__FILE__)."/".$name.".js"));
		}
		public function toString(){
			$this->text = "Script CLass";
			return $this->text;
		}
	}
?>