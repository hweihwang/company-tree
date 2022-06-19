<?php

use App\WebProviseProject\Transportation\Scripts\BuildCompanyTree;

require __DIR__ . '/vendor/autoload.php';

const OUTPUT_FILE = 'company_tree.json';

const LOG_FILE = 'company_tree.log';

Infras\Helper\Script::logScriptTime(function () {
    (new BuildCompanyTree())->execute(OUTPUT_FILE);
}, LOG_FILE);