up:
	docker-compose up -d

build:
	docker-compose build

ps:
	docker ps -a

down:
	docker stop $$(docker ps -aq)
	docker rm $$(docker ps -aq)

migrate:
	docker-compose exec cli php yii migrate

test:
	docker-compose exec cli ./vendor/bin/codecept run