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
     * Write the concordance output.  The input array is in the format:
     *
     * ['word'] => ['count' => 1, 'lines' => [1, 2]
     *
     * @param array $concordance
     */
    public function writeOutput(array $concordance): void;
}
