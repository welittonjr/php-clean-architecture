# Definição de variáveis
DOCKER_COMPOSE = docker-compose -f ./docker/docker-compose.yml

# Definição de cores
GREEN = \033[0;32m
NC = \033[0m

.PHONY: vendor

# Execução principal e em ordem
up: start

# Construir e iniciar os containers
build:
	@echo "$(GREEN)Construindo e iniciando os containers...$(NC)"
	$(DOCKER_COMPOSE) build

# Iniciar os containers
start:
	@echo "$(GREEN)Iniciando os containers...$(NC)"
	$(DOCKER_COMPOSE) up

# Parar os containers
stop:
	@echo "$(GREEN)Parando os containers...$(NC)"
	$(DOCKER_COMPOSE) down
