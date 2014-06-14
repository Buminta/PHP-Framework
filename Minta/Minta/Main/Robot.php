<?php
	import("minta.main.class");
	import("minta.main.baseurl");
	
	class Minta_Main_Robot extends Minta_Main_Class{
		public function __construct($config){
			parent::__construct();
			$this->baseUrl = new Minta_Main_BaseURL();
			$this->_modules = $config["modules"];
			$this->_plugins = $config["plugins"];
		}
		public function toString(){
			$this->text = "Robot Class";
			return $this->text;
		}
		public function run(){
			$this->toModule();
		}
		public function toModule(){
			$str = $this->baseUrl->getBaseModuleUrl();
			if(($str&&!isset($this->_modules[$str]))||!$str){
				require_once APPLICATION_PATH.'/controllers/Index.php';
				$ctrl = new IndexController(0);
			}
			else{
				$this->toControl($str);
			}
		}
		public function toControl($str){
			$control = $this->baseUrl->getBaseControlUrl();
			if($control){
				$result = false;
				foreach ($this->_modules[$str] as $key => $value) {
					if($key=="control"&&$value==$control){
						$result = true;
						require_once APPLICATION_PATH.'/controllers/'.$str."/".$control.".php";
						$class = $str."_".$control."Controller";
						$ctrl = new $class(2,$str,$control);
					}
				}
				if(!$result){
					require_once APPLICATION_PATH.'/controllers/'.$str."/"."Index.php";
					$class = $str."_"."IndexController";
					$ctrl = new $class(1,$str);
				}
			}
			else{
				require_once APPLICATION_PATH.'/controllers/'.$str."/"."Index.php";
				$class = $str."_"."IndexController";
				$ctrl = new $class(1,$str);
			}
		}
	}
?>