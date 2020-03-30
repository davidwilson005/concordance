<?php

namespace DaveWilson\Concordance;

/**
 * Class EnglishParser
 *
 * Parse sentences and words from the english language.
 */
class EnglishParser implements ParserInterface
{
    // hold the string literals of the regex patterns
    const SPLIT_SENTENCE_REGEX = '/(?<!\w\.\w.)(?<![A-Z][a-z]\.)(?<=\.|\?|\!|\")\s/m';
    const SPLIT_WORD_REGEX     = '/[^\w]*([\s]+[^\w]*|$)/';

    /**
     * @inheritDoc
     */
    public function splitSentences(string $sentences): array
    {
        return preg_split(static::SPLIT_SENTENCE_REGEX, $sentences);
    }

    /**
     * @inheritDoc
     */
    public function getWords(string $sentence): array
    {
        // unique words are case insensitive in english
        $sentence = strtolower($sentence);

        return preg_split(static::SPLIT_WORD_REGEX, $sentence, -1, PREG_SPLIT_NO_EMPTY);
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
