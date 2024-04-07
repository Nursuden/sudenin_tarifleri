<?php
// header("Content-type: application/json; charset=utf-8");
	

	$Server  = "localhost";           	
	$DataBase   = "sudenin_tarifleri";
	$User = "root";
	$Password = "";
	if (extension_loaded("PDO")) {
		try {
			$pdoCon = array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_CASE => PDO::CASE_NATURAL,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
			);
			$Connection = new PDO("mysql:host=".$Server.";dbname=".$DataBase."", $User, $Password, $pdoCon);	
           // echo "Bağlandı...";	
		} catch (PDOException $ex) {
			die($ex->getMessage());
		}
	} else {
        echo "PDO kurulu değil.";
    }
    ?>	