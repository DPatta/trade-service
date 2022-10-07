
# Project Trader

this project create by laravel framework


## Required
 - php: ^8.1
 - composer: ^2.4.2
 - mysql


## Run Locally

Clone the project check your DB configuration into .env file.
then you can run locally follow this step.
 


Update or install composer.json

```bash
  composer update
  
  or

  composer install
```

Migration

```bash
  php artisan migrate
```

Seeder

```bash
  php artisan db:seed --class=CreateUsersSeeder  
  php artisan db:seed --class=CreateCurrenciesSeeder  
  php artisan db:seed --class=CreateTransactionsSeeder  
```

Start the server

```bash
  php artisan serve
```


## Acknowledgements

 - [Composer](https://getcomposer.org/)
 - [PHP](https://www.php.net/)


## Features

- Register
- Sign in/out
- Trade
- Submit trade


## Environment Variables

To run this project, you will need to check the following environment variables to your .env file

`DB_HOST`
`DB_PORT`
`DB_USERNAME`
`DB_PASSWORD`

