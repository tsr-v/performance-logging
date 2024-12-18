<?php

namespace Welhof\PerformanceLogging\Models;

class PerformanceLog
{
    private $logPath;

    public function __construct()
    {
        $this->logPath = require __DIR__ . '/../config/config.php';
    }

    public function saveLog($data)
    {
        $filePath = $this->logPath['log_path'] . 'full_logs.json';
        file_put_contents($filePath, json_encode($data) . PHP_EOL, FILE_APPEND);
    }
}
