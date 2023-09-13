imagename := vsvietkov-dynamic-programming
workdir := /dynamic-programming
tty-options := -it # Enable color output locally, disable for github
coverage-options := --coverage-html results/phpunit/ --coverage-clover results/phpunit/coverage.xml

docker-run := docker run $(tty-options) --rm -v ${PWD}:/$(workdir) $(imagename)

docker-build:
	@docker build --build-arg workdir=$(workdir) . -t $(imagename)

docker-build-dev:
	@docker build --build-arg workdir=$(workdir) --build-arg XDEBUG_INSTALL=1 . -t $(imagename)

docker-build-profiling:
	@docker build --build-arg workdir=$(workdir) --build-arg XDEBUG_INSTALL=1 --build-arg XDEBUG_MODE=profile . -t $(imagename)
	@$(docker-run) bash -c "mkdir -p results/profiling"

install:
	@$(docker-run) bash -c "composer install && composer dump-autoload"

update:
	@$(docker-run) bash -c "composer update && composer dump-autoload"

test:
	@$(docker-run) vendor/bin/phpunit tests --colors --testdox $(coverage-options) --log-junit results/phpunit/phpunit.xml --log-events-verbose-text results/phpunit/verbose-log.txt

autoload:
	@$(docker-run) composer dump-autoload

phpcs-settings := --standard=vendor/vsvietkov/phpcs-rules/src/ruleset.xml -p --colors src/ tests/

run-cs:
	@$(docker-run) vendor/bin/phpcs ${phpcs-settings}

fix-cs:
	@$(docker-run) vendor/bin/phpcbf ${phpcs-settings}
