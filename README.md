# concordance
Given an arbitrary text document written in English, generate an alphabetical list of all word occurrences, labeled with word frequencies.

usage: ./concordance /path/to/file

To run tests:

1.  Install PHPUnit from composer:
```
composer install
```
2. Run tests with the project autoloader:
```
vendor/bin/phpunit --bootstrap autoload_ps4.php tests/
```
