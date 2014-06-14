<?php
	import("minta.main.class");
	import("minta.main.baseurl");
	import("minta.main.error");
	
	class Minta_Main_Controller extends Minta_Main_Class{
		protected $urlView = "";
		public $model = "";
		public $view = "";
		public function __construct($i=0, $module="", $control=""){
			$url = new Minta_Main_BaseURL();
			$this->urlView = $url->getBaseViewUrl($i);
			$this->module = $module;
			$this->control = $control;
			$this->actionname = "";
			$this->run();
		}
		public function run(){
			if($this->urlView[0]!=""){
				$ctr = "control".$this->urlView[0];
				if(method_exists ($this,$ctr)){
					$this->actionname = $this->urlView[0];
					$this->urlView = array_slice($this->urlView,1);
					$this->$ctr();
				}
				else{
					$this->controlIndex();
				}
			}
			else{
				$this->controlIndex();
			}
		}
		public function getModel(){
			if($this->module==""){
				import("application.models.index.*");
				if($this->actionname!=""){
					$mod = $this->actionname."Model";
					if(class_exists($mod)){
						$this->model = new $mod();
					}
					else{
						$err = new Minta_Main_Error("Class",$mod);
					}
				}
				else{
					if(class_exists("IndexModel")){
						$this->model = new IndexModel();
					}
					else{
						$err = new Minta_Main_Error("Class","IndexModel");
					}
				}
			}
			else{
				import("application.models.".$this->module.".*");
				if($this->actionname!=""){
					$class = $this->control==""?$this->module."_".$this->actionname."Model":$this->module."_".$this->control."_".$this->actionname."Model";
					if(class_exists($class)){
						$this->model = new $class();
					}
					else{
						$err = new Minta_Main_Error("Class",$class);
					}
				}
				else{
					$class = $this->control==""?$this->module."_IndexModel":$this->module."_".$this->control."_IndexModel";
					if(class_exists($class)){
						$this->model = new $class();
					}
					else{
						$err = new Minta_Main_Error("Class",$class);
					}
				}
			}
		}
		public function createView(){
			if($this->module==""){
				import("application.views.index.*");
				if($this->actionname!=""){
					$mod = $this->actionname."View";
					if(class_exists($mod)){
						$this->view = new $mod();
					}
					else{
						$err = new Minta_Main_Error("Class",$mod);
					}
				}
				else{
					if(class_exists("IndexView")){
						$this->view = new IndexView();
					}
					else{
						$err = new Minta_Main_Error("Class","IndexView");
					}
				}
			}
			else{
				import("application.views.".$this->module.".*");
				if($this->actionname!=""){
					$class = $this->control==""?$this->module."_".$this->actionname."View":$this->module."_".$this->control."_".$this->actionname."View";
					if(class_exists($class)){
						$this->view = new $class();
					}
					else{
						$err = new Minta_Main_Error("Class",$class);
					}
				}
				else{
					$class = $this->control==""?$this->module."_IndexView":$this->module."_".$this->control."_IndexView";
					if(class_exists($class)){
						$this->view = new $class();
					}
					else{
						$err = new Minta_Main_Error("Class",$class);
					}
				}
			}
		}
		public function toString(){
			$this->text = "Controller Class";
			return $this->text;
		}
	}
?>