<?
include_once "init.php";
include_once 'lib/CCFApi.php';

$request = Request::getInstance();
$response = Response::getInstance();

if ($request->uri() == '/mobile/' || $request->uri() == '/mobile') $response->redirect('/mobile/首页');
$path = $request->path();

if ($path[1] == 'search') {
	include 'search.php';
}
elseif($path[1] == 'autocomplete'){
	include 'autocomplete.php';
}else {
	include 'query.php';
}