<?php

/**
 * Interface ConcordanceParserInterface
 *
 * Implement the parser interface to parse input from the concordance service.
 */
interface ConcordanceParserInterface
{
    /**
     * Split a string into sentences, return each sentence as as an array item.
     *
     * @param string $sentences
     *
     * @return array
     */
    public function splitSentences(string $sentences): array;

    /**
     * Split a sentence into words, return each word as an array item.
     *
     * @param string $sentence
     *
     * @return array
     */
    public function getWords(string $sentence): array;

    /**
     * Sort the words according to the language being used.  The array of words is passed by
     * reference and sorted to keep memory usage low by not making a copy of the array.
     *
     * @param array $words
     *
     * @return void
     */
    public function sortWords(array &$words): void;
}
