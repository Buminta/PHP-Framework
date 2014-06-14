<?php
	import("minta.main.view");
	class Error_Index_IndexView extends Minta_Main_View{
		public function viewIndex(){
			echo "Error: ".$this->var;
		}
		public function view404(){
			echo "Error 404: ".$this->var;
		}
		public function viewClass(){
			echo "Class {".$this->var."} do not exist";
		}
	}
?>