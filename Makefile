
build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker stop $$(docker ps -aq)
	docker rm $$(docker ps -aq)

prepare:
	docker-compose exec cli php init

migrate:
	docker-compose exec cli php yii migrate


test:
	docker-compose exec cli ./vendor/bin/codecept run

ps:
	docker ps -a