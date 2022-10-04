docker-up:
	docker-compose up -d

docker-build:
	docker-compose build

docker-ps:
	docker ps -a

docker-down:
	docker stop $$(docker ps -aq)
	docker rm $$(docker ps -aq)

docker-migrate:
	docker-compose exec cli php yii migrate

docker-test:
	docker-compose exec cli ./vendor/bin/codecept run