<?php

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../app/autoload.php';
//require_once __DIR__.'/../app/AppKernel.php';
require_once __DIR__.'/../app/AppCache.php';

$kernel = new AppKernel('dev', true);
$kernel = new AppCache($kernel);

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
