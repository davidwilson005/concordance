<?php

require_once('ConcordanceWriterInterface.php');

/**
 * Class ConcordanceScreenWriter
 *
 * Concrete concordance writer to write output of the concordance to the screen.
 */
class ConcordanceScreenWriter implements ConcordanceWriterInterface
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
