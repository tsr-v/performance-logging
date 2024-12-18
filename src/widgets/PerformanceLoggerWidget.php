<?php

namespace Welhof\PerformanceLogging\Widgets;

class PerformanceLoggerWidget
{
    public function render()
    {
        // Inject the JavaScript for logging performance data
        echo '<script src="assets/wbsModule.js"></script>';
    }
}
