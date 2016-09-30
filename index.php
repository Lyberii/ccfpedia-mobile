<?
include_once "init.php";
include_once 'lib/CCFApi.php';

$request = Request::getInstance();
$response = Response::getInstance();

$path = $request->path();

if ($path[0] == 'search') {
	include 'search.php';
} else {
	include 'query.php';
}