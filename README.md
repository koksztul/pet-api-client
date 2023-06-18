## PHP and laravel version
- PHP 8.1.18
- Laravel 10.13.5

## build and run website

1. docker-compose up -d
2. docker exec -ti consume-api-app bash
3. composer install
4. cp .env.example .env
5. php artisan key:generate

Boom! access localhost:80 on your favorite browser