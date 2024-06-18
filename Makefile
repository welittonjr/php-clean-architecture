
PHPUNIT = ./vendor/bin/phpunit
COMPOSER = composer
	
test:
	$(PHPUNIT)

help:
	@echo "make test      - Executa os testes com PHPUnit"
	@echo "make help      - Exibe esta mensagem de ajuda"