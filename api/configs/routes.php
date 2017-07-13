<?php

$routes["/accounts/create"] = ["class"=>"Accounts","method"=>"signUp"];
$routes["/applications/create"] = ["class" => "Applications", "method" => "create"];
$routes["/applications"] = ["class" => "Applications", "method" => "getAll"];
$routes["/applications/delete"] = ["class" => "Applications", "method" => "deleteApplication"];
?>