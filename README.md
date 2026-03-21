# Laravel API Demo

This is a simple demo building an API using JWT Auth and optionally Laravel Sanctum

To start this application:

1. Clone the repository from Github
2. `cd laravel-api-demo`
3. Run `composer install` and `npm install`
4. Copy `.env.sample` and rename to `.env`.
5. Run `php artisan key:generate` to generate an `APP_KEY` in your `.env` file.
6. Update your database name and credentials.
7. Run `php artisan jwt:secret`
8. Run `php artisan migrate` and `php artisan db:seed`.
9. Start the server with `composer run dev` or `php artisan serve`.
