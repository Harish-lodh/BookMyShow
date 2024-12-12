<?php

use App\Controllers\HomeController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/',to: 'HomeController::index');
$routes->get('/home', 'HomeController::Home');
$routes->post('/store','HomeController::store');

$routes->get('/insert','HomeController::admin');

//get img
$routes->get('/getimg/(:segment)', 'HomeController::getimg/$1');
//admincard
$routes->get('/admincard','HomeController::admindata');



$routes->get('/delete/(:num)', 'HomeController::delete/$1');
$routes->get('/fetch/(:num)','HomeController::getUserById/$1');

$routes->post('/update/(:num)','HomeController::edit/$1');
$routes->get('/MovieDetail/(:num)','HomeController::movieDetail/$1');



$routes->post('/login', 'HomeController::login');
$routes->post('/user/register','HomeController::register');

$routes->get('/book_ticket/(:num)','HomeController::ticket_book/$1');
//show tkt
$routes->get(  '/Booked','HomeController::showBookedSeats');
//show slot view
$routes->get('/slot_view/(:num)','HomeController::slote/$1');
//booking tkt
$routes->post('/bookSeat','HomeController::bookSeat');



// generate ticket
$routes->get('/gen_ticket/(:any)', 'HomeController::viewTicket/$1');
$routes->get('/download_csv/(:any)', 'HomeController::downloadPdf/$1');
