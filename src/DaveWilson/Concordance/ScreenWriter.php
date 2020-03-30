<?php

namespace DaveWilson\Concordance;

/**
 * Class ScreenWriter
 *
 * Concrete concordance writer to write output of the concordance to the screen.
 */
class ScreenWriter implements WriterInterface
{
    /**
     * @inheritDoc
     */
    public function writeOutput(array $concordance): void
    {
        // loop through each word, print the word and the frequency in columns
        foreach ($concordance as $word => $frequency) {
            printf("%-20s {%d:%s}\n", $word, $frequency['count'], implode(',', $frequency['lines']));
        }
    }
}
