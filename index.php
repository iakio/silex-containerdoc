<?php
$autoloader = require 'vendor/autoload.php';
$app = new Silex\Application;

$app->register(new iakio\containerdoc\ContainerDocProvider);
$app->run();
