imagename := vsvietkov-dynamic-programming
workdir := /dynamic-programming
tty-options := -it # Enable color output locally, disable for github

docker-run := docker run $(tty-options) --rm -v ${PWD}:/$(workdir) $(imagename)

docker-build:
	@docker build --build-arg workdir=$(workdir) . -t $(imagename)

install:
	@$(docker-run) bash -c "composer install && composer dump-autoload"

update:
	@$(docker-run) bash -c "composer update && composer dump-autoload"

test:
	@$(docker-run) vendor/bin/phpunit tests --colors --testdox --coverage-html results/phpunit/ --coverage-clover results/phpunit/coverage.xml --log-junit results/phpunit/phpunit.xml --log-events-verbose-text results/phpunit/verbose-log.txt

autoload:
	@$(docker-run) composer dump-autoload

phpcs-settings := --standard=vendor/vsvietkov/phpcs-rules/src/ruleset.xml -p --colors src/ tests/

run-cs:
	@$(docker-run) vendor/bin/phpcs ${phpcs-settings}

fix-cs:
	@$(docker-run) vendor/bin/phpcbf ${phpcs-settings}
