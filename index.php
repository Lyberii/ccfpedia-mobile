<?
include_once "init.php";
include_once 'lib/CCFApi.php';

$request = Request::getInstance();
$response = Response::getInstance();

$path = $request->path();

CCFApi::search('计',0);
exit();

$response->renderAndSend('index.php');
