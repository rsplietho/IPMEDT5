# IPMEDT5 Lichtkrant
Arduino-software and laravel backend for an LED message board.

## Setup
### General
Run `composer install` before you begin

### Database
You need to have a MySQL database setup with the following settings:
- Database called `lichtkrant_controller` 
- User with permissions for the database and a chosen password
    - The username and password needs to be set in the .env

- Run `php artisan migrate --seed`

### .env
The envfile needs to be configured, make a copy of 1.env.example called .env and set your MySQL settings.