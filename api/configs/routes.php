<?php

$routes['/users/update'] = ["class" => "Users", "method" => "update"];
$routes["/accounts/create"] = ["class"=>"Accounts","method"=>"signUp"];
$routes["/offers"] = ["class"=>"Offers","method"=>"getAll"];
$routes["/applications/create"] = ["class" => "Applications", "method" => "createApplication"];
$routes["/offers/create"] = ["class"=>"Offers","method"=>"addOffer"];
$routes["/users"] = ["class" => "Users", "method" => "getAll"];
$routes["/users/last3"] = ["class" => "Users", "method" => "getLast3"];


