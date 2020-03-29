<?php

require_once('ConcordanceReaderInterface.php');

/**
 * Class ConcordanceFileReader
 *
 * Concrete concordance reader to send text to the concordance service from a file.
 */
class ConcordanceFileReader implements ConcordanceReaderInterface
{
    /**
     * @var string
     */
    protected $filepath;

    /**
     * ConcordanceFileReader constructor.
     *
     * @param string $filepath
     */
    public function __construct(string $filepath)
    {
        if ( ! file_exists($filepath)) {
            throw new \InvalidArgumentException('Cannot read the file: ' . $filepath);
        }

        $this->filepath = $filepath;
    }

    /**
     * @inheritDoc
     */
    public function getContents(): string
    {
        return file_get_contents($this->filepath);

        //return "Given an arbitrary text document written in English, write a program that will generate a concordance, i.e. an alphabetical list of all word occurrences, labeled with word frequencies. Bonus: label each word with the sentence numbers in which each occurrence appeared.";
    }
}
