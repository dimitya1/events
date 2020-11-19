# My PHP Test Task

## Table of contents
* [Technologies](#technologies)
* [Setup](#setup)
	
## Technologies
Project is created with:
* PHP: 7
* Laravel: 5.8
* Docker
* MySQL
	
## Setup
To run this project, you need an empty Laravel project.
Use docker command
```
docker run --rm --interactive --tty --volume path_to_your_PhpstormProjects_folder:/app composer create-project --prefer-dist laravel/laravel project_name
```
or
check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x).

Clone the repository
```
git clone https://github.com/dimitya1/events
```
Copy the example env file and make the required configuration changes in the .env file

Access the server

Install all the dependencies using composer
```
composer install
```
Run migrations
```
php artisan migrate
```
#### PhpStorm Restful Client Requests are placed in project's directory
