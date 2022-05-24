Includes all the CRUD operations with PHP and SQL database. I have implemented PHP Mail Server which sends an email when user is registered, forgets a password etc. On the user registration it sends an SMS with an approval that the user is registered. // If you wish to try this application, but don't want to enter your email, you can use https://temp-mail.org/en/ for a temporary email to receive the emails from this project. SMS sending functionality is provided only for danish mobile numbers, but if you don't have one or don't wish to enter yours, just type random 8 numbers in that field. To see the project - https://aivars-dev.com/not-amazon/

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


FOR DEVELOPERS
I haven't provided a folder called "private" to not expose my private information, but you can find an example file for filling out your own email here https://github.com/PHPMailer/PHPMailer#a-simple-example , and in the same folder you need to create a file called "globals.php" to connect to your own database. You can import "amazon.sql" from "DATABASE" folder in your phpMyAdmin or whatever you are using.


FOR MYSELF
// watch scss //
sass --watch css/style.scss css/style.css
// show php errors
ini_set('display_errors', 1);
