<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/*
 *
 */
function createLogger() {
    // Create the logger
    $logger = new Logger('hello-world');
    // Now add some handlers
    $logger->pushHandler(new StreamHandler(__DIR__.'/hello-world.log'));
    // Add a processsor
    $logger->pushProcessor(new \Monolog\Processor\IntrospectionProcessor);

    return $logger;
}

$logger = createLogger();
// You can now use your logger
testLogger($logger);

$myarray = ["Test1", "Test2"];
hello($myarray);


/*
 *
 */
function testLogger($logger){
    $logger->addDebug('My logger is now ready', array('username' => 'Seldaek'));
    $logger->addWarning('My hello-world logger is now ready');
    $logger->addError('My hello-world logger is now ready');
    $logger->addCritical('My hello-world logger is now ready');
    $logger->addAlert('My hello-world logger is now ready');
}


function hello($myarray) {
    echo "hello world". PHP_EOL;
    foreach ($myarray as $elt) {
      echo "hello {$elt}\n";
    }
}
