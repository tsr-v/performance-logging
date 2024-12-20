<?php

require_once '../vendor/autoload.php';

use Welhof\PerformanceLogging\PerformanceLogger;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (!is_array($data)) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid data format']);
        exit;
    }

    $logger = new PerformanceLogger();
    $logger->logPerformanceData($data);

    echo json_encode(['status' => 'success', 'message' => 'Data logged successfully']);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $file = __DIR__ . '/index.html';
    if (file_exists($file)) {
        header('Content-Type: text/html');
        readfile($file);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'index.html not found']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
