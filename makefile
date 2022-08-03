ps:
	docker-compose ps

cache:
	docker-compose exec app composer dump-autoload -o
	docker-compose exec app php artisan config:cache

clear:
	docker-compose exec app php artisan cache:clear
	docker-compose exec app composer dump-autoload -o

#新規作成環境構築
standup:
	docker-compose up -d --build
	docker-compose exec app php artisan storage:link
	docker-compose exec app php artisan key:generate
	docker-compose exec app php artisan key:generate --env=testing
	docker-compose exec app composer require guzzlehttp/guzzle
	docker-compose exec app composer require doctrine/dbal
	docker-compose exec app composer require nesbot/carbon
	docker-compose exec app composer require --dev beyondcode/laravel-dump-server:1.8.0
	docker-compose exec app composer update
	docker-compose exec app composer require aws/aws-sdk-php
	docker-compose exec app composer require league/flysystem-aws-s3-v3
	docker-compose exec app composer update
	docker-compose exec app php artisan config:cache
	docker-compose exec app composer dump-autoload
	docker-compose exec app php artisan migrate
	docker-compose exec app php artisan migrate --env=testing

db-refresh:
	docker-compose exec app php artisan migrate:refresh
	docker-compose exec app php artisan migrate:refresh --env=testing

init:
	docker-compose up -d --build
	docker-compose exec app php artisan storage:link
	docker-compose exec app php artisan migrate:fresh --seed
	docker-compose exec app php artisan key:generate
	docker-compose exec app php artisan config:cache
	docker-compose exec app composer dump-autoload

start:
	docker-compose start
stop:
	docker-compose stop
down:
	docker-compose down
down-all:
	docker-compose down --rmi all --volumes --remove-orphans

restart:
	@make down
	@make up

up:
	docker-compose up -d
