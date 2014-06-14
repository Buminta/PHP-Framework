<?php
	import('minta.main.class');
	import('minta.main.baseurl');
	class Skin extends Minta_Main_Class{
		public function __construct($name="default"){
			$this->skinname = $name;
			$this->script = array();
			$baseurl = new Minta_Main_BaseURL();
			$this->rootURL = $baseurl->getROOT().str_replace(str_replace("\\","/",ROOT_PATH), "", str_replace("\\","/",dirname(__FILE__)))."/".$this->skinname;
			$this->logo = $this->rootURL."/images/logo.png";
			$this->title = "Default Theme";
			$this->favicon = $this->rootURL."/images/favicon.ico";
			$this->content = "";
			$this->footer = "";
			$this->plugin = array();
		}
		public function getSkin($name="index"){
			require (dirname(__FILE__)."/".$this->skinname."/".LANGUAGE."/".$name.".php");
		}
		public function toString(){
			$this->text = "Skin CLass";
			return $this->text;
		}
	}
?>