<?php declare(strict_types=1);
namespace RefactorExercise\Tests;

use PHPUnit\Framework\TestCase;
use RefactorExercise\FileReader;


class FileReaderTest extends TestCase
{
    public function testReadCSV() {
        $fileReader = new FileReader('./tests/test.csv');
        $fileReader->readCSV();
        $this->assertEquals(['id', 'testColumn'], $fileReader->getHeaders());
        $this->assertEquals([
            0 => ['id' => 1, 'testColumn' => 'test'],
            1 => ['id' => 2, 'testColumn' => 'test2']], $fileReader->getRows());
    }
}