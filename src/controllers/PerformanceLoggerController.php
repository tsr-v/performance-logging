<?php

namespace Welhof\PerformanceLogging\Controllers;

use Welhof\PerformanceLogging\Models\PerformanceLog;

class PerformanceLoggerController
{
    public function logPerformanceData($data)
    {
        $logModel = new PerformanceLog();
        $logModel->saveLog($data);
    }
}
