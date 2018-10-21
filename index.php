<?php

//use SilverStripe\Control\HTTPApplication;
//use SilverStripe\Control\HTTPRequestBuilder;
//use SilverStripe\Core\CoreKernel;
//use SilverStripe\Core\Startup\ErrorControlChainMiddleware;
//
//// Find autoload.php
//if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
//    require __DIR__ . '/../vendor/autoload.php';
//} elseif (file_exists(__DIR__ . '/vendor/autoload.php')) {
//    require __DIR__ . '/vendor/autoload.php';
//} else {
//    header('HTTP/1.1 500 Internal Server Error');
//    echo "autoload.php not found";
//    exit(1);
//}
//
//// Build request and detect flush
//try {
//    $request = HTTPRequestBuilder::createFromEnvironment();
//} catch (\SilverStripe\Control\HTTPResponse_Exception $e) {
//}
//
//// Default application
//$kernel = new CoreKernel(BASE_PATH);
//$app = new HTTPApplication($kernel);
//$app->addMiddleware(new ErrorControlChainMiddleware($app));
//$response = $app->handle($request);
//$response->output();


use SilverStripe\Control\HTTPApplication;
use SilverStripe\Control\HTTPRequestBuilder;
use SilverStripe\Core\CoreKernel;
use SilverStripe\Core\Startup\ErrorControlChainMiddleware;
require __DIR__ . '/vendor/autoload.php';
// Build request and detect flush
try {
    $request = HTTPRequestBuilder::createFromEnvironment();
} catch (\SilverStripe\Control\HTTPResponse_Exception $e) {
}
// Default application
$kernel = new CoreKernel(BASE_PATH);
$app = new HTTPApplication($kernel);
$app->addMiddleware(new ErrorControlChainMiddleware($app));
$response = $app->handle($request);
$response->output();