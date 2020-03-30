<?php

namespace DaveWilson\Concordance;

/**
 * Class ServiceInterface
 *
 * The service takes reads input as a string, parses the concordance, and writes the results.
 */
interface ServiceInterface
{
    /**
     * Generate concordance.
     *
     * @return void
     */
    public function generate(): void;
}
