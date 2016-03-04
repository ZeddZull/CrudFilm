<?php

use Csanquer\Silex\PdoServiceProvider\Provider\PdoServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

require_once '../vendor/autoload.php';
require_once "../modele/fonctionsUtilitaires.php";

$app = new Application();

$app['debug'] = true;

ini_set('display_errors', 1);
error_reporting(-1);

$app->register(new Silex\Provider\TwigServiceProvider(),array(
	'twig.path' => '../views/'));

$app->get('/',function() use($app){
	return $app['twig']->render('film.twig',array("lesFilms"=>getAllFilms(),"lesGenres"=>getGenres(),"lesReals"=>getAllRea()));
});

$app->post("/ajouter",function(Request $request) use($app){
	ajouter($request->get("titreO"),$request->get("titreF"),$request->get("pays"),$request->get("date"),$request->get("duree"),$request->get("couleur"));
	return true;
});

$app->post("/modifier",function(Request $request) use($app){
	modifier($request->get("code"),$request->get("titreo"),$request->get("titref"),$request->get("pays"),$request->get("dates"),$request->get("duree"),$request->get("couleur"));
	return true;
});

$app->get('/modifier',function() use($app){
	return true;
});

$app->get('/info/{code}',function($code) use($app){
	return $app->json(getFilm($code));
});

$app->get('/delete/{code}',function($code) use($app){
	supprimerFilm($code);
	return true;;
});

$app->get('/genres/{code}',function($code) use($app){
	return $app->json(getFilmsGenre($code));
});

$app->run();

