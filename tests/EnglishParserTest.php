<?php

use DaveWilson\Concordance\EnglishParser;
use PHPUnit\Framework\TestCase;

class EnglishParserTest extends TestCase
{
    /**
     * Test the splitSentences() method will sentences that have different beginnings and endings.
     *
     * @return void
     */
    public function testSplitSentences(): void
    {
        // try every combination of ways to start and end a sentence
        $sentences = 'This is a test. This is a test? This is a test! This is a test?! He said, "this is a test?" ' .
            'He said, "yes, this is a test." I said, "wow, this is a test!" This i.e. is a test. This is-a test. ' .
            'This is, a test. "Great Scott!", I said. "Testing multiple types of quotes", he said. "I see", I said. ' .
            'Finally!!! Did this all work?';

        $expectedResults = [
            'This is a test.',
            'This is a test?',
            'This is a test!',
            'This is a test?!',
            'He said, "this is a test?"',
            'He said, "yes, this is a test."',
            'I said, "wow, this is a test!"',
            'This i.e. is a test.',
            'This is-a test.',
            'This is, a test.',
            '"Great Scott!", I said.',
            '"Testing multiple types of quotes", he said.',
            '"I see", I said.',
            'Finally!!!',
            'Did this all work?'
        ];

        // test splitSentences()
        $englishParser = new EnglishParser();
        $this->assertEquals($expectedResults, $englishParser->splitSentences($sentences));
    }


}
