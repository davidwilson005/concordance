<?php

/**
 * Interface ConcordanceParserInterface
 *
 * Implement the writer interface to write the output from the concordance service.
 */
interface ConcordanceWriterInterface
{
    /**
     * Write the concordance output.
     *
     * @param array $concordance
     */
    public function writeOutput(array $concordance): void;
}
