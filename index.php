<?php
session_start();
$type = getQueryVal('type', '');
$module = getQueryVal('module', (empty($_SESSION['user']))?'login':'dashboard');
$action = getQueryVal('action', 'default');
include_once __DIR__.'/core/dbapi.php';
include_once __DIR__.'/core/Userdata.php';
if (!empty($type) && $type==='api'){
    include_once __DIR__.'/core/Auth.php';
    include_once __DIR__.'/api/'.$module.'/Controller.php';
    include_once __DIR__.'/api/'.$module.'/Model.php';
    include_once __DIR__.'/core/Responce.php';
    $controller = new Controller();
    $result;
    if (method_exists($controller, $action)){
        $controller->$action();
        
    } else {
        Responce::sendError(2, 'Wrong request');
    }
} else {
    include_once __DIR__.'/templates/main.tpl.php';
}


function getQueryVal($var, $default){
    $result = $default;
    if (!empty(filter_input(INPUT_GET, $var))){
        $result = filter_input(INPUT_GET, $var);
    } else if (!empty(filter_input(INPUT_POST, $var))) {
        $result = filter_input(INPUT_POST, $var);
    }
    return $result;
}

function lang($ro, $ru, $en){
    
}