# Simple amazon functionality with CRUD operations, image upload to the server, SMS service and PHP Mailer

## Description

* Includes all the CRUD operations with PHP and SQL database. 
* PHP Mailer which sends an email when user is registered, forgets a password etc. 
* On the user registration it sends an SMS with an approval that the user is registered 

## Usage

* If you wish to try this application, but don't want to enter your email, you can use https://temp-mail.org/en/ for a temporary email to receive the emails from this project
* SMS sending functionality is provided only for danish mobile numbers, but if you don't have one or don't wish to enter yours, just type random 8 numbers in that field
* To see the project - https://aivars-dev.com/not-amazon/

## For Developers

* I haven't provided a folder called "private" to not expose my private information, but you can find an example file for filling out your own email here https://github.com/PHPMailer/PHPMailer#a-simple-example 
* In the "private" folder you need to create a file called "globals.php" to connect to your own database, you can import "amazon.sql" from "DATABASE" folder in your phpMyAdmin or whatever you are using

## Development

### Watch scss

sass --watch css/style.scss css/style.css

### Show php errors

ini_set('display_errors', 1);
