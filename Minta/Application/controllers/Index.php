<?php
	import("minta.main.controller");
	class IndexController extends Minta_Main_Controller{
		public function controlIndex(){
			$this->getModel();
			$this->createView();
			$this->model->setId(0);
			$this->view->setData($this->model->getData());
			$this->view->render();
		}
		public function controlHome(){
			
		}
	}
?>