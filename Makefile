up:
	docker-compose up -d

build:
	docker-compose build

up_prod:
	docker-compose -f docker-compose-prod.yml up -d

build_prod:
	docker-compose -f docker-compose-prod.yml build

ps:
	docker ps -a

down:
	docker stop $$(docker ps -aq)
	docker rm $$(docker ps -aq)

perm:
	sudo chown -R $$USER:2000 ./
	sudo chmod -R ug+rwx ./
