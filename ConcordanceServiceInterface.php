<?php

/**
 * Class ConcordanceService
 *
 * The service takes reads input as a string, parses the concordance, and writes the results.
 */
interface ConcordanceServiceInterface
{
    /**
     * Generate concordance.
     *
     * @return void
     */
    public function generate(): void;
}
