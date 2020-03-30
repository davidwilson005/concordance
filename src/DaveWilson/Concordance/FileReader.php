<?php

namespace DaveWilson\Concordance;

/**
 * Class FileReader
 *
 * Concrete concordance reader to send text to the concordance service from a file.
 */
class FileReader implements ReaderInterface
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
    }
}
