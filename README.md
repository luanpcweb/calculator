# Calculator

## How to use?

Follow the commands:
```shell
docker-compose build

docker-compose up -d

docker exec -it --user www-data:www-data calculator_php composer install

cp .env.example .env

docker exec -it --user www-data:www-data calculator_php php artisan key:generate

docker exec -it --user www-data:www-data calculator_php php artisan migrate


```

Url: http://localhost:8080/

## How to execute UnitTests?
```shell
docker exec -it calculator_php php ./vendor/phpunit/phpunit/phpunit --configuration ./phpunit.xml
```
