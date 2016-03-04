<?php 
require_once("connection.php");

function getAllFilms(){
	$bdd = connectBd();
	$req = $bdd->prepare('SELECT * FROM films f1,individus i1 WHERE f1.realisateur = i1.code_indiv');
	$req->execute();
	return $req->fetchAll();
}

function ajouter($titreO,$titreF,$pays,$dates,$duree,$couleur){
	$bdd = connectBd();
	$req = $bdd->prepare('INSERT INTO films(titre_original,titre_francais,pays,dates,duree,couleur) VALUES (:titreO,:titreF,:pays,:dates,:duree,:couleur)');
	$req->execute(array(
		"titreO"=>$titreO,
		"titreF"=>$titreF,
		"pays"=>$pays,
		"dates"=>$dates,
		"duree"=>$duree,
		"couleur"=>$couleur
		));
}

function getFilm($codeFilm){
	$bdd = connectBd();
	$req = $bdd->prepare('SELECT * FROM films WHERE code_film=:codeFilm');
	$req->bindParam(':codeFilm',$codeFilm);
	$req->execute();
	return $req->fetch();
}

function supprimerFilm($codeFilm){
	$bdd = connectBd();
	$req = $bdd->prepare('DELETE FROM films WHERE code_film=:codeFilm');
	$req->bindParam(':codeFilm',$codeFilm);
	$req->execute();
}

function modifier($codeFilm,$titreO,$titreF,$pays,$dates,$duree,$couleur){
	$bdd = connectBd();
	$req = $bdd->prepare('UPDATE films SET titre_original=:titreO,titre_francais=:titreF,pays=:pays,dates=:dates,duree=:duree,couleur=:couleur WHERE code_film=:codeFilm');
	$req->bindParam(":codeFilm",$codeFilm);
	$req->bindParam(":titreO",$titreO);
	$req->bindParam(":titreF",$titreF);
	$req->bindParam(":pays",$pays);
	$req->bindParam(":dates",$dates);
	$req->bindParam(":duree",$duree);
	$req->bindParam(":couleur",$couleur);
	$req->execute();
}

function getGenres(){
	$bdd = connectBd();
	$req = $bdd->prepare('SELECT * FROM genres');
	$req->execute();
	return $req->fetchAll();
}

function getFilmsGenre($codeGenre){
	$bdd = connectBd();
	$req = $bdd->prepare('SELECT ref_code_film FROM classification WHERE ref_code_genre=:codeGenre');
	$req->bindParam(":codeGenre",$codeGenre);
	$req->execute();
	$tab = $req->fetchAll();
	$res = array();
	foreach ($tab as $value) {
		$res[] = $value["ref_code_film"];
	}
	return $res;
}

function getAllRea(){
	$bdd=connectBd();
	$req=$bdd->prepare('SELECT DISTINCT i1.code_indiv,i1.nom,i1.prenom FROM films f1,individus i1 WHERE f1.realisateur = i1.code_indiv ORDER BY i1.nom');
	$req->execute();
	return $req->fetchAll();
}