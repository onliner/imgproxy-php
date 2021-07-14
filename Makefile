phpstan:
	vendor/bin/phpstan analyse --level max src tests

test: phpstan
	vendor/bin/phpunit --verbose
