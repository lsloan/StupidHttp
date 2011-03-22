<?php

require '../lib/StupidHttp/StupidHttp_WebServer.php';
require '../lib/StupidHttp/StupidHttp_ConsoleLog.php';

date_default_timezone_set('America/Los_Angeles');

$server = new StupidHttp_WebServer();
$server->setLog(new StupidHttp_ConsoleLog());
$server->on('GET', '/')
       ->call(function($r) { echo 'Hello from StupidHttp!'; });
$server->onPattern('GET', '/hello/(.+)')
       ->call(function($r, $m) { echo 'Hello, ' . $m[1]; });
$server->run(array('run_browser' => true));
