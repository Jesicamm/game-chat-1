This project was bootstrapped with [Laravel](https://github.com/laravel/laravel).

# Project - Game Chat

## Table of Contents

- [About](#about)
- [Built With](#built)
- [Getting Started](#started)
- [Features](#features)
- [Dependencies](#dependencies)
- [Environment Variables](#env)
- [Authors](#authors)


## About <a name = "about"></a>

API REST for a gaming app of a technology company in wich employees may register to create a party for a specific game and invite workmates. In the parties, the users can send messages among them and play games.

This is an educational project at [GeeksHubsAcademy](https://geekshubsacademy.com/), created by [Federico Báez](https://github.com/fbgoode) & [Jessica Morocho](https://github.com/Jesicamm) in Valencia, between 13/04/2021 - 19/04/2021.


## Built With <a name = "built"></a>

<div style="display: flex; height: 50px">
    <img src="public/icons/docker.png"
     height= "50px" />
     <img src="public/icons/laravel.png"
      height= "50px" />
     <img src="public/icons/phpimg.png"
      height= "50px" />
</div>
<br/>

## Getting Started <a name = "started"></a>

### No installation required:
The api is deployed in Heroku at [game-chat-b.herokuapp.com](https://game-chat-b.herokuapp.com/).

[Click here to view the API documentation](https://documenter.getpostman.com/view/14551874/TzJuAHeE) and try it with your favorite HTTP REST client. We suggest Postman:

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/14551874-ad60d7e3-a5f2-4de7-81cc-e655d4c0cfe5?action=collection%2Ffork&collection-url=entityId%3D14551874-ad60d7e3-a5f2-4de7-81cc-e655d4c0cfe5%26entityType%3Dcollection%26workspaceId%3D7feef63f-71e9-4341-8040-4714fa562714)

### Or clone the repository:
To run the project locally you need to have installed:
- Php ^8.0
- Php mysql extension
- Laravel
- Composer

Deploy a mysql server (for example [with docker](https://hub.docker.com/_/mysql)).

Write .env file in repo root with the necessary [environment variables](#env) for database connection.

Run the following commands:
- Composer install
- php artisan serve

The API is available at localhost:8000.

## Features <a name = "features"></a>

* Player, Party, Message, Membership & Game resources.
* Resources on relational database with MySql.
* Register and Login with Laravel/Passport.
* Auth with token required to access the different endpoints.
* Seeder with 5 games.
* A player can create a party vinculated with a game and other players.
* A player can search parties for the available games.
* A player can enter or leave a party.
* A player can browse their parties.
* A player can send and view messages in a party.

## Dependencies <a name = "dependencies"></a>

* PHP ^8.0
* laravel/framework ^8.12
* laravel/passport ^10.1
* fruitcake/laravel-cors ^2.0

## Environment variables summary <a name = "env"></a>

* APP_KEY: Laravel app key used for data encription. Generate with command php artisan key:generate
* DB_CONNECTION: use 'mysql'
* DB_HOST: database host (for example, localhost)
* DB_PORT: database port (generally 3306)
* DB_USERNAME: database username (for example, root)
* DB_PASSWORD: database password for user (set to empty string for no password)
* DB_DATABASE: database name

## Authors <a name = "authors"></a>

* [Federico Báez](https://github.com/fbgoode)
* [Jessica Morocho](https://github.com/Jesicamm)