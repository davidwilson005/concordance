<?php

/**
 * Interface ConcordanceReaderInterface
 *
 * Implement the reader interface to send text to the concordance service.
 */
interface ConcordanceReaderInterface
{
    /**
     * Get string contents from a reader source.
     *
     * @return string
     */
    public function getContents():  string;
}
