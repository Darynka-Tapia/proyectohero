<?php
	try{
		$base=new PDO('mysql:host=localhost; dbname=socialhero', 'root', '');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec('SET CHARACTER SET utf8');
	}catch(Exception $e){
		die('Error: '.$e->GetMessage()) ;
	}
	//coordin9_base
?>  