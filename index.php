<?php
/*
    Names: Aaron Utterback, Ruslan Bessarab
    Date: January 29th, 2021
    File: index.php
*/

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start a session
session_start();
//Require the autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');

//Create an instance of the Base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

//Define a default route (home page)
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});

//order1 page
$f3->route('GET /order', function ($f3) {
    // Check if the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // validate
        if(empty($_POST['pet'])){

        } else{

        }
    }

    $colors = getColors();
    $f3->set('colors', $colors);

    $view = new Template();
    echo $view->render('views/pet-order.html');
});

//order2 page
$f3->route('POST /order2', function () {
    if(isset($_POST['type'])){
        $_SESSION['type'] = $_POST['type'];
    }


    $_SESSION['colors'] = $_POST['colors'];

    $view = new Template();
    echo $view->render('views/pet-order2.html');
});

//summary page
$f3->route('POST /summary', function () {

    if(isset($_POST['name'])){
        $_SESSION['name'] = $_POST['name'];
    }

    $view = new Template();
    echo $view->render('views/order-summary.html');
});

$f3->run();
