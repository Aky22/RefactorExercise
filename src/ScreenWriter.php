<?php declare(strict_types=1);


namespace RefactorExercise;


class ScreenWriter
{

    private $headerData;
    private $data;
    private $inputData;

    public function __construct($headerData, $data, $inputData) {
        $this->headerData = $headerData;
        $this->data = $data;
        $this->inputData = $inputData;
    }

    public function writeHeader() {
        foreach ($this->headerData as $h) {
            echo str_pad($h, 20);
        }
        echo "\n";
        foreach ($this->headerData as $h) {
            echo str_repeat('=', 20);
        }
        echo "\n";
    }

    public function writeData() {
        foreach ($this->data as $item) {
            if ($this->inputData->{$item['product_id']} >= $item['quantity']) {
                foreach ($this->headerData as $h) {
                    if ($h == 'priority') {
                        if ($item['priority'] == 1) {
                            $text = 'low';
                        } else {
                            if ($item['priority'] == 2) {
                                $text = 'medium';
                            } else {
                                $text = 'high';
                            }
                        }
                        echo str_pad($text, 20);
                    } else {
                        echo str_pad($item[$h], 20);
                    }
                }
                echo "\n";
            }
        }
    }
}