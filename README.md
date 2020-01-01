### Installation
1. Run inside 'docker' folder

    `docker-compose up -d`

2. Set DB HOST parameter to config file.
   
   get `CONTAINER ID` for `postgresql` container by this command:

   `docker ps`

    replace `%CONTAINER_ID%` and run following command:

    `docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' %CONTAINER_ID%`

    set `DB_HOST` parameter in `/app/config.php`

3. Run `composer install`
4. Run migrations in DB from folder: `/app/migrations/`
    
    to enter to DB environment use
    
    `docker-compose exec postgres`
    
    inside environment use
    
    `psql db_name db_user`

### Endpoint for "Part 2":

`GET /hangars/{id}`

### Run tests
Enter to php-fpm environment:

`docker-compose exec php-fpm`

go to `'/app/tests'` folder and run

`phpunit --bootstrap ../vendor/autoload.php .`
