<?php

$routes["/accounts/create"] = ["class"=>"Accounts","method"=>"signUp"];
$routes["/applications/create"] = ["class" => "Applications", "method" => "create"];
$routes["/offers/create"] = ["class"=>"Offers","method"=>"addOffer"];
$routes["/offers/delete"] = ["class" => "Offers", "method" => "deleteOffer"];
$routes["/users"] = ["class" => "Users", "method" => "getAll"];
$routes["/users/last3"] = ["class" => "Users", "method" => "getLast3"];
?>