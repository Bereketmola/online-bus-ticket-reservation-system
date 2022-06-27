<?php
//session_start();
	
	if(isset($_GET['lang'])){
		if($_GET['lang']=="am"){
			$_SESSION['lang'] = "am";	
		}
		
		elseif($_GET['lang']=="eng"){
			$_SESSION['lang'] = "eng";	
		}
			else{
			$_SESSION['lang'] = "oro";	
		}
	}
	
	if(!isset($_SESSION['lang'])){
		$s = include_once("eng.php");	
		$_SESSION['lang']="eng";
	}
	else if($_SESSION['lang']=="am"){
		include_once("am.php");
	}else if($_SESSION['lang']=="eng"){
		include_once("eng.php");
	}else if($_SESSION['lang']=="oro"){
		include_once("oro.php");
	}
?>