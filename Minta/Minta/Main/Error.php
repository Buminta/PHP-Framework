<?php
	import("minta.main.class");
	import("application.views.error.*");
	class Minta_Main_Error extends Minta_Main_Class{
		public function __construct($err="",$var=""){
			$err = "view".$err;
			$this->err = new Error_Index_IndexView($var);
			if(method_exists($this->err, $err)){
				$this->err->$err();
			}
			else{
				$this->err->viewIndex();
			}
		}
		public function toString(){
			$this->text = "Error Class";
			return $this->text;
		}
	}
?>