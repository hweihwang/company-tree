<?php

use App\WebProviseProject\Transportation\Scripts\BuildCompanyTree;

require __DIR__ . '/vendor/autoload.php';

echo "Start script\n";

$start = microtime(true);

(new BuildCompanyTree())->execute();

echo 'Total time: ' . (microtime(true) - $start);