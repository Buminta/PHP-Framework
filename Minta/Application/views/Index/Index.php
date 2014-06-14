<?php
	import("minta.main.view");
	class IndexView extends Minta_Main_View{
		public function viewIndex(){
			$this->addScript("jquery-1.9.1");
			$this->view->title = "Trang chủ";
			$this->view->content = $this->data;
			$this->view->getSkin("index");
		}
	}
?>