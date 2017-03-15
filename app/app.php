<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Place.php";

    session_start();
    if (empty($_SESSION['places'])) {
        $_SESSION['places'] = array();
    }
    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('places.html.twig');
    });

    $app->post("/places", function() use ($app) {
        $place = new Place($_POST['places'], $_POST['time'], $_POST['activity']);
        $place->save();
        return $app['twig']->render('locations.html.twig', array('places' => Place::getAll()));
    });

    return $app;


?>
