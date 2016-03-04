<?php
function connectBd(){

	try{
		require_once("infoCo.php");
		$dsn="mysql:dbname=".BASE.";host=".SERVER;
		$connexion=new PDO($dsn,USER,PASSWD,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
		return $connexion;
	}catch(PDOException $e){
		printf("Échec de la connexion : %s\n", $e->getMessage());
		exit();
	}
}