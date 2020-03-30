<?php

namespace DaveWilson\Concordance;

/**
 * Class Service
 *
 * Concrete concordance service that reads input, parses the concordance, and writes the results.
 */
class Service implements ServiceInterface
{
    /**
     * @var ParserInterface
     */
    protected $parser;

    /**
     * @var ReaderInterface
     */
    protected $reader;

    /**
     * @var WriterInterface
     */
    protected $writer;

    /**
     * ConcordanceService constructor to inject dependencies.
     *
     * @param ParserInterface $parser
     * @param ReaderInterface $reader
     * @param WriterInterface $writer
     */
    public function __construct(ParserInterface $parser, ReaderInterface $reader, WriterInterface $writer)
    {
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

            // remove ending punctuation of sentences, this is needed to distinguish between words with periods
            // at the end like i.e or just the end of a sentence
            $sentence = $this->parser->removeSentenceEndings($sentence);

            // get the words in a sentence
            $words = $this->parser->getWords($sentence);

            // loop through the words
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
