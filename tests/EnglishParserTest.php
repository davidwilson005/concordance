<?php

use DaveWilson\Concordance\EnglishParser;
use PHPUnit\Framework\TestCase;

class EnglishParserTest extends TestCase
{
    /**
     * Test the splitSentences() method will split sentences that have different beginnings and endings.
     *
     * @return void
     */
    public function testSplitSentenceAtEndings(): void
    {
        // try every combination of ways to start and end a sentence
        $sentences = 'This is a test. This is a test? This is a test! This is a test?! He said, "this is a test?" ' .
            'She said, "yes, this is a test." I said, "wow, this is a test!" "Great Scott!", I said. "Testing ' .
            'multiple types of quotes", he said. "I see", I said. Finally!!! Did this all work? Test quotes, "in the ' .
            'middle", she said.';

        $expectedResults = [
            'This is a test.',
            'This is a test?',
            'This is a test!',
            'This is a test?!',
            'He said, "this is a test?"',
            'She said, "yes, this is a test."',
            'I said, "wow, this is a test!"',
            '"Great Scott!", I said.',
            '"Testing multiple types of quotes", he said.',
            '"I see", I said.',
            'Finally!!!',
            'Did this all work?',
            'Test quotes, "in the middle", she said.'
        ];

        // test splitSentences()
        $englishParser = new EnglishParser();
        $this->assertEquals($expectedResults, $englishParser->splitSentences($sentences));
    }

    /**
     * Test splitSentences() with special characters in the middle of a sentence like '.' or quotes.
     *
     * @return void
     */
    public function testSplitSentenceMiddleSpecial(): void
    {
        $sentences = 'Mr. Smith bought cheapsite.com for "1.5 million dollars", i.e. he paid a lot for it. Adam ' .
            'Jones Jr. thinks he didn\'t. In any case, this isn\'t true... Well, with a probability of .9 ' .
            'it isn\'t.  There can also be abbreviations like etc. and alt. in a sentence.  People used to double ' .
            'space sentences. Checking for Mr., Mr., Dr. and that it does not split.';

        $expectedResults = [
            'Mr. Smith bought cheapsite.com for "1.5 million dollars", i.e. he paid a lot for it.',
            'Adam Jones Jr. thinks he didn\'t.',
            'In any case, this isn\'t true...',
            'Well, with a probability of .9 it isn\'t.',
            'There can also be abbreviations like etc. and alt. in a sentence.',
            'People used to double space sentences.',
            'Checking for Mr., Mr., Dr. and that it does not split.'
        ];

        // test splitSentences()
        $englishParser = new EnglishParser();
        $this->assertEquals($expectedResults, $englishParser->splitSentences($sentences));
    }

    /**
     * Test the removeSentenceEndings() will remove all different types of ending.
     *
     * @return void
     */
    public function testRemoveSentenceEndings(): void
    {
        // array of sentences to test, the expected will be the same
        $sentences = [
            'This is a test.',
            'This is a test?',
            'This is a test!',
            'This is a test?!',
            'This is a test?"',
            'This is a test!"',
            'This is a test."',
            'This is a test!!!'
        ];

        $englishParser = new EnglishParser();

        // loop through sentences, test removeSentenceEndings()
        foreach ($sentences as $sentence) {
            $this->assertEquals('This is a test', $englishParser->removeSentenceEndings($sentence));
        }
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
