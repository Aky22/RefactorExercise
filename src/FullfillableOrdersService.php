<?php declare(strict_types=1);


namespace RefactorExercise;

class FullfillableOrdersService
{

    private JsonParser $jsonParser;
    private FileReader $fileReader;
    private OrderSorter $orderSorter;

    public function __construct(JsonParser $inputValidator, FileReader $fileReader, OrderSorter $orderSorter)
    {
        $this->jsonParser = $inputValidator;
        $this->fileReader = $fileReader;
        $this->orderSorter = $orderSorter;
    }

    public function writeOrders() {
        $this->orderSorter->sortOrders();
        $screenWriter = new ScreenWriter($this->fileReader->getHeaders(), $this->orderSorter->getOrders(), $this->jsonParser->getJsonParameter());
        $screenWriter->writeHeader();
        $screenWriter->writeData();
    }



}