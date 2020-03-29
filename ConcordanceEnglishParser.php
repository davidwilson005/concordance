<?php

require_once('ConcordanceParserInterface.php');

/**
 * Class ConcordanceEnglishParser
 */
class ConcordanceEnglishParser implements ConcordanceParserInterface
{
    /**
     * @inheritDoc
     */
    public function splitSentences(string $sentences): array
    {
        return preg_split('/(?<!\w\.\w.)(?<![A-Z][a-z]\.)(?<=\.|\?)\s/m', $sentences);
    }

    /**
     * @inheritDoc
     */
    public function getWords(string $sentence): array
    {
        // unique words are case insensitive in english
        $sentence = strtolower($sentence);

        return preg_split('/[^\w]*([\s]+[^\w]*|$)/', $sentence, -1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * @inheritDoc
     */
    public function sortWords(array &$words): void
    {
        // alphabetize the list ascending
        ksort($words);
    }
}
