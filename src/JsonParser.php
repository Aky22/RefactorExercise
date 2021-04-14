<?php declare(strict_types=1);


namespace RefactorExercise;


use JsonException;
use stdClass;

class JsonParser
{

    private stdClass $jsonParameter;

    /**
     * InputValidator constructor.
     * @param string $json
     * @throws JsonException
     */
    public function __construct(string $json = "{}") {
        $this->parseJson($json);
    }


    /**
     * @param string $json
     * @return void
     * @throws JsonException
     */
    public function parseJson(string $json): void {
        $this->jsonParameter = json_decode($json, false, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @return stdClass
     */
    public function getJsonParameter(): stdClass
    {
        return $this->jsonParameter;
    }

}