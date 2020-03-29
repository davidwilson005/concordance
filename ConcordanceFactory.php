<?php

require_once('ConcordanceService.php');
require_once('ConcordanceEnglishParser.php');
require_once('ConcordanceFileReader.php');
require_once('ConcordanceScreenWriter.php');

/**
 * Class ConcordanceFactory
 *
 * Concordance factory to build a concordance service with a specific reader, writer, and parser.
 */
class ConcordanceFactory
{
    /**
     * Return a concordance service with an english parser, file reader, and screen writer.
     *
     * @param string $filepath
     *
     * @return ConcordanceServiceInterface
     */
    public static function createEnglishFileScreenInstance(string $filepath): ConcordanceServiceInterface
    {
        return new ConcordanceService(
            new ConcordanceEnglishParser(),
            new ConcordanceFileReader($filepath),
            new ConcordanceScreenWriter()
        );
    }
}
