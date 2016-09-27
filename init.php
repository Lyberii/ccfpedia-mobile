<?php
define('ROOT', __DIR__);
define('IS_CLI', PHP_SAPI == 'cli');

include_once 'lib\Request.php';
include_once 'lib\Response.php';
include_once 'lib\Util.php';