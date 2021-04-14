<?php declare(strict_types=1);

use RefactorExercise\FileReader;
use RefactorExercise\FullfillableOrdersService;
use RefactorExercise\JsonParser;
use RefactorExercise\OrderSorter;
use RefactorExercise\ScreenWriter;

require __DIR__ . '/vendor/autoload.php';

if ($argc != 2) {
    echo 'Ambiguous number of parameters!';
    exit(1);
}

try {
    $jsonParser = new JsonParser($argv[1]);
} catch (JsonException $e) {
    echo 'Invalid json!';
    exit(1);
}
$fileReader = new FileReader('orders.csv');
$orderSorter = new OrderSorter($fileReader->readCSV()->getRows());
$fulfillableService = new FullfillableOrdersService($jsonParser, $fileReader, $orderSorter);
$fulfillableService->writeOrders();
