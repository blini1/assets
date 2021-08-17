# News App
This is a news media app where you can receive, update, create information through the REST API. It has been built by using the Laravel framework. 
Tasks that have been completed:
I created news media type with the create, read, updated, delete functionalities. For each endpoints you can find swagger documentation and also as a Postman collection which you can find at the root of the project. 
There is also a possibility to upload a mass/bulk upload of the news. 
The news-app can be easily run with the docker (please see the instructions below)
The input validations have been carried out with the correct HTTP codes. 
I have also used loggers to be printed for a different type of events occurred in the platform.
The assets listing has also a search functionality for the title.
I have also included one feature test. Moreover, please read the instructions below.
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

For the bulk upload you can find the file under /public/import or [click here][importFile]


[//]: #

   [importFile]: <https://we.tl/t-OXFyS57XdM>


