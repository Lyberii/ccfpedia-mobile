<?
include_once "init.php";
include_once 'lib/CCFApi.php';

$request = Request::getInstance();
$response = Response::getInstance();

if ($request->uri() == '/mobile/' || $request->uri() == '/mobile') $response->redirect('/mobile/首页');
$path = $request->path();

switch ($path[1]) {
	case 'search':
		include 'search.php';
		break;
	case 'ajax_search':
		include 'ajax_search.php';
		break;
	default:
		include 'query.php';
}