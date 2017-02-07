<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application;

/*
//=========================================================================
// Definición Original
//=========================================================================

$env = $app->detectEnvironment(array(

	'local' => array('homestead'),

));
*/

$env = $app->detectEnvironment(function(){

  $haystack = __DIR__; // Catch the directory path
  // Set the booleans (remove the first '/', else strpos() will return 0)
  $isLocal       = preg_match("/Users\/macuser\/Proyectos\/hr\-cube\-summation\//", $haystack);
  $isDevelopment = preg_match("/var\/www\/hr-cube-summation\//", $haystack);
  $isTest        = preg_match("/var\/www\/hr-cube-summation\//", $haystack);
  $isProduction  = preg_match("/var\/www\/hr-cube-summation\//", $haystack);
  
  // Set the environments
  $environment = "/";
  if ($isLocal)       $environment = "local";
  if ($isDevelopment) $environment = "dev";
  if ($isTest)        $environment = "test";
  if ($isProduction)  $environment = "/";

  //echo $environment;
  // Return the appropriate environment
  return $environment;
  
});

/*
|--------------------------------------------------------------------------
| Bind Paths
|--------------------------------------------------------------------------
|
| Here we are binding the paths configured in paths.php to the app. You
| should not be changing these here. If you need to change these you
| may do so within the paths.php file and they will be bound here.
|
*/

$app->bindInstallPaths(require __DIR__.'/paths.php');

/*
|--------------------------------------------------------------------------
| Load The Application
|--------------------------------------------------------------------------
|
| Here we will load this Illuminate application. We will keep this in a
| separate location so we can isolate the creation of an application
| from the actual running of the application with a given request.
|
*/

$framework = $app['path.base'].
                 '/vendor/laravel/framework/src';

require $framework.'/Illuminate/Foundation/start.php';

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
