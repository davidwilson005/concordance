<?php

namespace DaveWilson\Concordance;

/**
 * Class ServiceInterface
 *
 * Implement the service interface for an entry point into generating a concordance.
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
