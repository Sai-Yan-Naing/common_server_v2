<?php

$url = $_SERVER['REQUEST_URI'];
$request = parse_url($url);
// print_r($request);
// die($request);
switch ($request['path']) {
// login section
// views
    case '/' : require 'views/index.php';break;
        
    case '' :require 'views/index.php';break;
        
    case '/login' : require 'views/login.php';break; 

    case '/forgotpass' : require 'views/forgotpass.php'; break;

    case '/add_multi_domain' : require 'views/admin/add_domain/create.php'; break;

    //controller

    case '/login_confirm' : require 'controllers/accounts/login_confirm.php'; break;

    case '/pass_reset_confirm' : require 'controllers/accounts/pass_reset_confirm.php'; break;

    case '/new_password' : require 'controllers/accounts/new_password.php'; break;

    case '/add_multi_domain_confirm' : require 'controllers/accounts/add_multi_domain_confirm.php'; break;
    case '/site_onoff' : require 'controllers/sites/site_onoff.php'; break;

// share
// views
    case '/share' : require 'views/share/index.php'; break;


// admin section
// views
    case '/admin' : require 'views/admin/index.php'; break;
    case '/testing' : require 'views/testing.php'; break;
//default
    
    default: http_response_code(404); require'views/404.php'; break;
}