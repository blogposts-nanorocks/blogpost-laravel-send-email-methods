# laravel-send-email-methods
Laravel repository for testing deferent methods for sending emails


### Auth implementation
To cover the sending email part with autentication we will use laravel breeze
- https://laravel.com/docs/9.x/starter-kits#laravel-breeze

commands executed
- composer require laravel/breeze --dev
- php artisan breeze:install
- npm install
- npm run build
- php artisan migrate:fresh --seed


### Implementations

User can register and they need admin approve to verify their profile by email.

After user registration admins will recive an email with (first method - send like notification).

After admin approve the user, that user will recive an email to verif the profile (third method - event/lisener)

User can create project and will recive an email as notification (second method - observers)

Whenever user delete project, we will send an email to 3 admins. (forth method - laravel queues)

### Docker devbox
The project is build on top of docker devbox so, all you need is to have docker desktop installed on you pc and then you can navigate to root to run: 

docker-compose up -d | For starting the devbox

docker-compose down | To clean up all containers

### Project access

- Project is running on http://localhost:80
- Db client is running on http://localhost:54320
- Fake mailer running on http://localhost:8025

Db creating for project
- go to http://localhost:54320
- set provider Mysql
- set username root
- set password secret
- set server database
- after login create database with name demo and demo_test for testing

### Env setup

- All you need it to copy the .env.example to .env and run the todo manager container to execute
	- php artisan key:generate
	- php artisan migrate:fresh --seed
	- (for running tests) php artisan test

- Default demo user password is: password
