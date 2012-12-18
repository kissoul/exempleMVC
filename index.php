<?php
define('WEBROOT', $_SERVER['SERVER_NAME'].'/');
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

require (ROOT.'core/controller.php');
require (ROOT.'exception/MethodNotFoundException.php');

mysql_connect('localhost', 'root');
mysql_select_db('festival');

$params = explode('/', $_SERVER['REQUEST_URI']);
$controller = '' != ($params[1]) ? $params[1] : 'tutoriels';
$action = isset($params[2]) ? $params[2] : 'index';

require ('controllers/'.$controller.'.php');
$controller = new $controller();
if(method_exists($controller, $action)){
    unset($params[0]);
    unset($params[1]);
    unset($params[2]);
    call_user_func_array(array($controller, $action), $params);
   //$controller->$action();
}else{
    throw new MethodNotFoundException("");
}