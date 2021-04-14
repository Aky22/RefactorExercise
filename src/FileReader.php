<?php declare(strict_types=1);
namespace RefactorExercise;


class FileReader
{

    private string $filename;
    private $file;
    private $headers;
    private $rows;

    public function __construct(string $filename) {
        $this->filename = $filename;
    }

    private function openFile() {
        $this->file = fopen($this->filename, 'r');
        return $this->file;
    }

    private function closeFile() {
        fclose($this->file);
    }

    public function readCSV() {
        $row = 1;
        if($this->openFile() !== false) {
            while(($data = fgetcsv($this->file)) !== false) {
                if ($row == 1) {
                    $this->headers = $data;
                } else {
                    $o = [];
                    for ($i = 0; $i < count($this->headers); $i++) {
                        $o[$this->headers[$i]] = $data[$i];
                    }
                    $this->rows[] = $o;
                }
                $row++;
            }
            $this->closeFile();
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return mixed
     */
    public function getRows()
    {
        return $this->rows;
    }

}