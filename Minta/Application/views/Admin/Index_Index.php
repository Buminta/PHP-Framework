<?php
	import("minta.main.view");
	class Admin_IndexView extends Minta_Main_View{
		public function viewIndex(){	
			$this->view->title = "Admin";
			$this->view->getSkin();
		}
	}
?>