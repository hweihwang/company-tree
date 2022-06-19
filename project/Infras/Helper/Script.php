<?php

namespace Infras\Helper;

class Script
{
    public static function logScriptTime(callable $script, string $file): void
    {
        ob_start();

        echo "Start script\n";

        $start = microtime(true);

        $script();

        echo 'Total time: ' . (microtime(true) - $start);

        $contents = ob_get_contents();

        ob_end_clean();

        file_put_contents($file, $contents);
    }
}