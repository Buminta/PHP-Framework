<?php
	import("minta.main.class");
	class Minta_Main_Model extends Minta_Main_Class{
		public function __construct($var = ""){
			$this->var = $var;
			$this->id = "";
		}
		public function setId($id = ""){
			$this->id = $id;
		}
		public function setData($data = ""){
			$this->data = $data;
		}
		public function getData($type=""){
			$m = "model".$type;
			if(method_exists($this, $m)){
				$this->$m();
			}
			else{
				$this->modelIndex();
			}
			return $this->data;
		}
		public function toString(){
			$this->text = "Model Class";
			return $this->text;
		}
	}
?>