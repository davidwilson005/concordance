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

    /**
     * Test the testSplitWords() method will split words, confirm words that have a dot at the end like Mr..
     *
     * @return void
     */
    public function testSplitWords(): void
    {
        $words = 'This is words, with punctuation i.e. Mr. Smith and high-tech, high-rise and life-size Break words ' .
            'with "quotes" Different Capitalization, commas, etc.';

        $expectedResults = [
            'this',
            'is',
            'words',
            'with',
            'punctuation',
            'i.e.',
            'mr.',
            'smith',
            'and',
            'high-tech',
            'high-rise',
            'and',
            'life-size',
            'break',
            'words',
            'with',
            'quotes',
            'different',
            'capitalization',
            'commas',
            'etc.'
        ];

        // test getWords()
        $englishParser = new EnglishParser();
        $this->assertEquals($expectedResults, $englishParser->getWords($words));
    }
}
