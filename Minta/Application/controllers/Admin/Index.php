<?php
	import("minta.main.controller");
	class Admin_IndexController extends Minta_Main_Controller{
		public function controlIndex(){
			$this->getModel();
			$this->createView();
			$this->view->render();
		}
		public function controlLogin(){
			$this->getModel();
			$this->createView();
		}
	}
?>