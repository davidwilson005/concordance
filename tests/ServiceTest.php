<?php

use DaveWilson\Concordance\EnglishParser;
use DaveWilson\Concordance\ReaderInterface;
use DaveWilson\Concordance\Service;
use DaveWilson\Concordance\WriterInterface;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    /**
     * Test generate() with sample text.
     */
    public function testGenerate()
    {
        // create a mock reader with example.txt
        $reader = $this->createMock(ReaderInterface::class);
        $reader->method('getContents')->willReturn(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'example.txt'));

        // expected results of concordance
        $expectedResults = [
            'a'            => ['count' => 2, 'lines' => [1, 1]],
            'all'          => ['count' => 1, 'lines' => [1]],
            'alphabetical' => ['count' => 1, 'lines' => [1]],
            'an'           => ['count' => 2, 'lines' => [1, 1]],
            'appeared'     => ['count' => 1, 'lines' => [2]],
            'arbitrary'    => ['count' => 1, 'lines' => [1]],
            'bonus'        => ['count' => 1, 'lines' => [2]],
            'concordance'  => ['count' => 1, 'lines' => [1]],
            'document'     => ['count' => 1, 'lines' => [1]],
            'each'         => ['count' => 2, 'lines' => [2, 2]],
            'english'      => ['count' => 1, 'lines' => [1]],
            'frequencies'  => ['count' => 1, 'lines' => [1]],
            'generate'     => ['count' => 1, 'lines' => [1]],
            'given'        => ['count' => 1, 'lines' => [1]],
            'i.e.'         => ['count' => 1, 'lines' => [1]],
            'in'           => ['count' => 2, 'lines' => [1, 2]],
            'label'        => ['count' => 1, 'lines' => [2]],
            'labeled'      => ['count' => 1, 'lines' => [1]],
            'list'         => ['count' => 1, 'lines' => [1]],
            'numbers'      => ['count' => 1, 'lines' => [2]],
            'occurrence'   => ['count' => 1, 'lines' => [2]],
            'occurrences'  => ['count' => 1, 'lines' => [1]],
            'of'           => ['count' => 1, 'lines' => [1]],
            'program'      => ['count' => 1, 'lines' => [1]],
            'sentence'     => ['count' => 1, 'lines' => [2]],
            'text'         => ['count' => 1, 'lines' => [1]],
            'that'         => ['count' => 1, 'lines' => [1]],
            'the'          => ['count' => 1, 'lines' => [2]],
            'which'        => ['count' => 1, 'lines' => [2]],
            'will'         => ['count' => 1, 'lines' => [1]],
            'with'         => ['count' => 2, 'lines' => [1, 2]],
            'word'         => ['count' => 3, 'lines' => [1, 1, 2]],
            'write'        => ['count' => 1, 'lines' => [1]],
            'written'      => ['count' => 1, 'lines' => [1]],
        ];

        // create a mock writer to verify results
        $writer = $this->createMock(WriterInterface::class);
        $writer->method('writeOutput')->with($this->equalTo($expectedResults));

        $this->assertNull((new Service(new EnglishParser(), $reader, $writer))->generate());
    }

}
