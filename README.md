# webcalc-add

//to run tests

curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

composer require phpunit/phpunit

composer require guzzlehttp/guzzle

composer update

php -S 0.0.0.0:9000

//new terminal

./vendor/bin/phpunit 