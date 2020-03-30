<?php

namespace DaveWilson\Concordance;

/**
 * Interface ReaderInterface
 *
 * Implement the reader interface to send text to the concordance service.
 */
interface ReaderInterface
{
    /**
     * Get string contents from a reader source.
     *
     * @return string
     */
    public function getContents():  string;
}
