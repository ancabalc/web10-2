<?php

$routes['/users/update'] = ["class" => "Users", "method" => "update"];
$routes["/applications/create"] = ["class" => "Applications", "method" => "create"];
$routes["/applications"] = ["class" => "Applications", "method" => "getAll"];
$routes["/applications/delete"] = ["class" => "Applications", "method" => "deleteApplication"];
$routes["/accounts/login"] = ["class" => "Accounts" , "method" => "login"];
$routes["/accounts/reset_password"] = ["class" => "Accounts" , "method" => "reset_password"];
$routes["/offers"] = ["class"=>"Offers","method"=>"getAll"];
$routes["/applications/create"] = ["class" => "Applications", "method" => "createApplication"];
$routes["/offers/create"] = ["class"=>"Offers","method"=>"addOffer"];
$routes["/offers/delete"] = ["class" => "Offers", "method" => "deleteOffer"];
$routes["/users"] = ["class" => "Users", "method" => "getAll"];
$routes["/users/last3"] = ["class" => "Users", "method" => "getLast3"];
