<?php

namespace DaveWilson\Concordance;

/**
 * Class Factory
 *
 * Factory to build a concordance service with a specific reader, writer, and parser.
 */
class Factory
{
    /**
     * Return a concordance service with an english parser, file reader, and screen writer.
     *
     * @param string $filepath
     *
     * @return ServiceInterface
     */
    public static function createEnglishFileScreenInstance(string $filepath): ServiceInterface
    {
        return new Service(
            new EnglishParser(),
            new FileReader($filepath),
            new ScreenWriter()
        );
    }
}
