<?php

class drex_AfterSetupTheme{
	
	
	static function return_thme_option($string,$str=null){
		global $drex;
		if($str!=null)
		return isset($drex[''.$string.''][''.$str.'']) ? $drex[''.$string.''][''.$str.''] : null;
		else
		return isset($drex[''.$string.'']) ? $drex[''.$string.''] : null;
	}
	
	
}
?>