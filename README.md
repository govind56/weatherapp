
# Weather Application

Weather application is used to find Weather report of the perticular city,example if you want serach kalaburagi city weather then you can enter the city name and you will get kalaburagi city weather 



## Installation Steps

Clone the repo

```bash
  https://github.com/govind56/weatherapp.git
```

Run composer install

```bash
 composer install
      or
 composer update
      or
composer install --ignore-platform-reqs

Create .env

```bash
   cp .env.example .env
```

Generate APP_KEY

```bash
    php artisan key:generate
```

Configure MySQL connection details in .env

```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE={database name}
    DB_USERNAME={database user}
    DB_PASSWORD={database password}
```

Run database migrations and seeders

```bash
    php artisan migrate
    php artisan db:seed
```
Login Credentials

```bash
    Email : admin@gmail.com
    Password: 123456
```
