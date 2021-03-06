<?php

namespace DaveWilson\Concordance;

/**
 * Interface ParserInterface
 *
 * Implement the parser interface to parse input from the concordance service.
 */
interface ParserInterface
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
     * Remove the punctuation from sentence endings.
     *
     * @param string $sentence
     *
     * @return string
     */
    public function removeSentenceEndings(string $sentence): string;

    /**
     * Get individual words, return each word as an array item.  This method does break words with sentences, use
     * splitSentences() first.
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
