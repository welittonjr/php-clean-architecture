PHPUNIT = ./vendor/bin/phpunit
FILES_TEST = ./tests/

test:
	$(PHPUNIT)

test_file:
	@if [ -z "$(file)" ]; then \
		echo "File not specified. Use 'make test_file file=<file>'."; \
	else \
		FILE=$$(find $(FILES_TEST) -type f -name "$(file)"); \
		if [ -z "$$FILE" ]; then \
			echo "File not found: $(file)"; \
		else \
			$(PHPUNIT) $$FILE; \
		fi; \
	fi

help:
	@echo "make test                - Executa os testes com PHPUnit"
	@echo "make test_file file=<file> - Executa um arquivo específico de teste com PHPUnit"
	@echo "make help                - Exibe esta mensagem de ajuda"
