# NBA Information System

## Team Members

	Postlmayr Billie Rosalie	a01307120	a01307120@unet.univie.ac.at
	Göksen Mehmet	a01636996	a01636996@unet.univie.ac.at

# Shell Commands

## In this order...
```shell script
composer install
# make .env file from example
php artisan key:generate
docker-compose up --build
```
new terminal - connect to db
```
sudo docker exec -it imsews19 /bin/bash
php artisan migrate
php artisan db:seed
```
Open https page
https://localhost:8443/

# In Detail

## Using composer
```shell script
composer install
```

## Laravel key generate
Assumes a .env APP_KEY= line. 
Rename the .env.example file to .env and run this command.

```shell script
php artisan key:generate
```

## Docker commands
```shell script
docker-compose up --build
# to build the container

sudo docker-compose up
# starting with docker
```


## Connect to the docker-container
 
Use this to execute commands inside the running docker container.
This is required for all `php artisan` commands.
 
```shell script
 sudo docker exec -it imsews19 /bin/bash
```

## Create all database tables

```shell script
php artisan migrate
# overwrite existing databases
php artisan migrate:fresh
```

## Seed the Database
 
```shell script
php artisan db:seed
```
## Serving Laravel
for development and testing purposes
```shell script
php artisan serve
## or for a different port than 8000
php artisan serve --port=8080
```
## the https Webserver
After running docker-compose up, the webserver will now run on:
https://localhost:8443/


## the .env file
copy the env.example file and adapt it to your environment.
The env_billie_example file was used by me and serves as another example .env file for this project.

## errors while serving, seeding, migrating and fixes
### the storage folder
```shell script
The stream or file "/var/www/html/imsews19/storage/logs/laravel.log" could not be opened: failed to open stream: Permission denied
```
```shell script
sudo chown -R $USER:www-data storage
chmod -R 775 storage
```
### mapping errors
in case of mapping errors (when you changed some migrations)
```shell script
composer dump-autoload
```
## Laravel License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
