# Install and Set Up Application with Docker Compose

Setting up environment with Docker using the stack that includes: PHP.

## How to Install and Run the Project

1. ``` git clone git@github.com:vikikhan88/Playbill-Test.git ```
2. Goto to terminal and go in to the folder where you download the Git Repository
3. ``` docker-compose exec app composer install ```
4. ``` docker-compose build ```
5. ``` docker compose up -d ```
6. You can see the project on ```localhost/api```
7. Run ```http://localhost/api/``` in your browser
8. Run the migration in your terminal ``` php artisan migrate ``` for creating the tables

`Note: if you having the issue with running the migration then goto '.env' file search for DB_HOST="localhost" and then run the migration cmd again, when you are done with the migration change it back to you docker mysql image name.`

## Run the API's with Postman attached into the email



