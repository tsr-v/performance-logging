<?php

namespace Welhof\PerformanceLogging;

class PerformanceLogger
{
    private string $logFile = '../public/logs/full-log.json';
    private string $summaryLogFile = '../public/logs/summary-log.json';

    public function logPerformanceData(array $data): void
    {
        $summaryData = [
            'user_id' => $data['user_id'] ?? 'unknown',
            'url' => $data['url'] ?? ($_SERVER['HTTP_REFERER'] ?? 'unknown'),
            'timestamp' => $data['timestamp'] ?? date('Y-m-d H:i:s'),
            'total_time' => $data['data']['loadEventEnd'] - $data['data']['loadEventStart'],
        ];

        $this->appendToJsonArray($this->summaryLogFile, $summaryData);
        $this->appendToJsonArray($this->logFile, array_merge($summaryData, $data['data']));
    }

    private function appendToJsonArray(string $filePath, array $data): void
    {
        $content = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];
        $content[] = $data;

        file_put_contents($filePath, json_encode($content, JSON_PRETTY_PRINT));
    }
}
