phpstan:
	vendor/bin/phpstan analyse -c phpstan.neon

test: phpstan
	vendor/bin/phpunit --verbose
