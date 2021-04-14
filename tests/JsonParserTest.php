<?php declare(strict_types=1);
namespace RefactorExercise\Tests;

use JsonException;
use PHPUnit\Framework\TestCase;
use RefactorExercise\JsonParser;


final class JsonParserTest extends TestCase
{
    /**
     * @dataProvider jsonDataProvider
     * @param string $json
     * @throws JsonException
     */
    public function testValidJson(string $json): void {
        $validator = new JsonParser();
        $validator->parseJson($json);
        $this->assertEquals($validator->getJsonParameter(), json_decode($json));
    }

    public function testInvalidJson(): void {
        $validator = new JsonParser();
        $this->expectException(JsonException::class);

        $validator->parseJson("test");
    }

    public function jsonDataProvider(): array {
        return [
            ["{\"1\":8,\"2\":4,\"3\":5}"]
        ];
    }
}