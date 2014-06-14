<?php
	import("minta.main.class");
	require_once SKIN_PATH."/index.php";
	require_once SCRIPT_PATH."/index.php";
	class Minta_Main_View extends Minta_Main_Class{
		public function __construct($var=""){
			$this->var = $var;
			$this->data = "";
			$this->view = new Skin();
		}
		public function addScript($name){
			$script = new Script();
			array_push($this->view->script,$script->getScript($name));
		}
		public function setData($data=""){
			$this->data = $data;
		}
		public function render($type=""){
			$v = "view".$type;
			if(method_exists($this, $v)){
				$this->$v();
			}
			else{
				$this->viewIndex();
			}
		}
		public function toString(){
			$this->text = "View Class";
			return $this->text;
		}
	}
?>