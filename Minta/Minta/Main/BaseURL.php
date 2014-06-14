<?php
	import("minta.main.class");
	class Minta_Main_BaseURL extends Minta_Main_Class{
		public function __construct(){
			parent::__construct();
		}
		public function toString(){
			$this->text = "BaseURL Class";
			return $this->text;
		}
		public function getROOT(){
			$str = str_replace("mintaframework.php", "", $_SERVER["PHP_SELF"]);
			return $str;
		}
		public function getURL(){
			$str = str_replace($this->getROOT(), "", $_SERVER["REQUEST_URI"]);
			$str = explode("/",$str);
			return $str;
		}
		public function getBaseModuleUrl(){
			$url = $this->getURL();
			if(isset($url[0])){
				return $url[0];
			}
			return false;
		}
		public function getBaseControlUrl(){
			$url = $this->getURL();
			if(isset($url[1])){
				return $url[1];
			}
			return false;
		}
		public function getBaseViewUrl($i){
			$url = $this->getURL();
			$url = array_slice($url,$i);
			if(count($url)<=0){
				return false;
			}
			return $url;
		}
	}
?>