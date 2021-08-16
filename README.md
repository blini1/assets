# News App
This is a news media app where you can receive, update, create information through the REST API.
## Installation

News-app requires Php v7.4 to run.

To get started using the app please install docker and docker compose.

On docker-compose.yml change the `MYSQL_ROOT_PASSWORD` to your local password
Create a database on mysql e.g 'news-app';
```sh
cd news-app
cp .env.example .env
```
Update your .env file in the root of the project

```sh
docker-compose up -d
docker-compose exec app php artisan migrate --seed
```

For documentation refer to
http://localhost/api/documentation

To run the tests:

```sh
docker-compose exec app php artisan test
```


