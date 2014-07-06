<?php
$autoloader = require 'vendor/autoload.php';
$app = new Silex\Application;

$app->mount('/containerdoc', new iakio\containerdoc\ContainerDocProvider);
$app->run();
