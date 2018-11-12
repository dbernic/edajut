<?php
session_start();
$type = getQueryVal('type', '');
$module = getQueryVal('module', (empty($_SESSION['user']))?'login':'dashboard');
$action = getQueryVal('action', 'default');
if (!empty($type) && $type==='api'){
    include_once __DIR__.'/api/'.$module.'/Controller.php';
    include_once __DIR__.'/core/Responce.php';
    $controller = new Controller();
    $result;
    if (method_exists($controller, $action)){
        $result = $controller->$action();
        
    } else {
        $result = new Responce();
        $result->error = 2;
        $result->errorTxt = "Wrong request";
    }
    echo json_encode($result);
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