<?php
	function import($import) {
		$package = ROOT_PATH;
	    $import = explode(".", $import);
		$_flagAllFile = false;
		foreach ($import as $key => $value) {
			$package .="/".$value;
			if($value=="*"){
				$_flagAllFile = true;
			}
		}
		if($_flagAllFile){
			foreach (glob($package.".php") as $filename)
			{
				require_once $filename;
			}
		}
		else{
			require_once $package.'.php';
		}
	}
?>