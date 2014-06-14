<?php
	import("minta.main.class");
	class Minta_Main_SqlData extends Minta_Main_Class{
		public function __construct($config = array("localhost","root","1234")){
			$this->server = $config[0];
			$this->user = $config[1];
			$this->pass = $config[2];
		}
		public function connect(){
			$this->con = mysql_connect($this->server,$this->user,$this->pass);
			return $this->con;
		}
		public function setDBName($db){
			return mysql_select_db($db,$this->con);
			mysql_query("SET NAMES utf8");
		}
		public function close(){
			return mysql_close($this->con);
		}
		public function selectTable($tb = ""){
			$sql = "select * from ".$tb;
			return $this->query($sql,"array");
		}
		public function query($sql = "", $type = ""){
			$array = array();
			$result = mysql_query($sql,$this->con);
			if($result){
				if($type=="array"){
					while($row = mysql_fetch_assoc($result)){
						array_push($array,$row);
					}
					return $array;
				}
				else{
					return true;
				}
			}
			return false;
		}
		public function insert($table = "", $arr = array()){
			$names = "";
			$values = "";
			foreach ($arr as $key => $value) {
				$names .= $key.",";
				$values .= "'".$value."',";
			}
			$names = substr($names, 0, strlen($names)-1);
			$values = substr($values, 0, strlen($values)-1);
			
			$sql = "insert into ".$table."(".$names.") values(".$values.")";
			
			return $this->query($sql);
		}
		public function toString(){
			$this->text = "SqlData Class";
			return $this->text;
		}
	}
?>