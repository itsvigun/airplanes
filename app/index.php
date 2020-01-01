<?php

use Aircrafts\Application;

require_once ('config.php');
require_once ('vendor/autoload.php');

$app = new Application();
$app->run();