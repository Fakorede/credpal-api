# CredPal Assessment

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

## Pre-requisites

What things you need to install the software.

-   Git
-   PHP
-   Composer
-   Web Server like Nginx or Apache
-   Npm or Yarn

## Installation

Clone the git repository on your computer

```
$ git clone https://github.com/Fakorede/credpal-api.git
```

You can also download the entire repository as a zip file and unpack in on your computer if you do not have git

After cloning the application, you need to install it's dependencies.

```
$ cd credpal-api
$ composer install
$ npm install && npm run dev
```

## Setup

When you are done with installation, copy the .env.example file to .env

```
$ cp .env.example .env
```

Generate the application key

```
$ php artisan key:generate
```

Create database and add its configuration

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

Passport setup

Create keys:

```
php artisan passport:install
```

Add keys to .env

```
PASSPORT_GRANT_TYPE=password
PASSPORT_CLIENT_ID=2
PASSPORT_CLIENT_SECRET=
```

Run database migrations

```
$ php artisan migrate
```

Run tests

```
$ ./vendor/bin/phpunit
```

Run the app

```
$ php artisan serve
```

## Built With

-   Laravel - The PHP framework for building the API endpoints needed for the application
-   Vue - The Progressive JavaScript Framework for building interactive interfaces
