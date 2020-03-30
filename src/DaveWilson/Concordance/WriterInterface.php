<?php

namespace DaveWilson\Concordance;

/**
 * Interface WriterInterface
 *
 * Implement the writer interface to write the output from the concordance service.
 */
interface WriterInterface
{
    /**
     * Write the concordance output.
     *
     * @param array $concordance
     */
    public function writeOutput(array $concordance): void;
}
