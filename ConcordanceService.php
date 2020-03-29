<?php

require_once('ConcordanceServiceInterface.php');

/**
 * Class ConcordanceService
 *
 * The service takes reads input as a string, parses the concordance, and writes the results.
 */
class ConcordanceService implements ConcordanceServiceInterface
{
    /**
     * @var ConcordanceParserInterface
     */
    protected $parser;

    /**
     * @var ConcordanceReaderInterface
     */
    protected $reader;

    /**
     * @var ConcordanceWriterInterface
     */
    protected $writer;

    /**
     * ConcordanceService constructor to inject dependencies.
     *
     * @param ConcordanceParserInterface $parser
     * @param ConcordanceReaderInterface $reader
     * @param ConcordanceWriterInterface $writer
     */
    public function __construct(
        ConcordanceParserInterface $parser,
        ConcordanceReaderInterface $reader,
        ConcordanceWriterInterface $writer
    ) {
        $this->parser = $parser;
        $this->reader = $reader;
        $this->writer = $writer;
    }

    /**
     * Generate concordance.
     *
     * @return void
     */
    public function generate(): void
    {
        // get contents from the reader
        $contents = $this->reader->getContents();

        // break the contents into sentences with the parser
        $sentences = $this->parser->splitSentences($contents);

        // loop through sentences, keep track of the line number and concordance
        $lineNumber = 1;
        $concordance = [];
        foreach ($sentences as $sentence) {

            // get the words in a sentence
            $words = $this->parser->getWords($sentence);

            // loop through words
            foreach ($words as $word) {

                // if the word exists, add to the count and line number
                if (isset($concordance[$word])) {
                    $concordance[$word]['count']++;
                    $concordance[$word]['lines'][] = $lineNumber;

                    continue;
                }

                // add a new word with the count and line number
                $concordance[$word] = [
                    'count' => 1,
                    'lines' => [$lineNumber]
                ];
            }

            $lineNumber++;
        }

        // sort the concordance
        $this->parser->sortWords($concordance);

        // write the concordance
        $this->writer->writeOutput($concordance);
    }
}
