<?php

// Namespaces
use SilverStripe\Control\HTTPApplication;
use SilverStripe\Control\HTTPRequestBuilder;
use SilverStripe\Core\CoreKernel;
use SilverStripe\Core\Startup\ErrorControlChainMiddleware;

// Composer Autoloader
require __DIR__ . '/vendor/autoload.php';

// SilverStripe initialization
$request = HTTPRequestBuilder::createFromEnvironment();
$kernel = new CoreKernel(BASE_PATH);
$app = new HTTPApplication($kernel);
$app->addMiddleware(new ErrorControlChainMiddleware($app));
$response = $app->handle($request);
$response->output();