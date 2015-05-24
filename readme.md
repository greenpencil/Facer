## Facer - Barebones Social Network

Facer is a Barebones Social Network built in PHP with *Laravel 4*.
It is designed as a Facebook themed robust base for developing more complex and sophisticated software.

[Screenshots](http://imgur.com/a/42Ez6)

### Features (or planned features)

([X] denotes that it is completed)

- A Newsfeed [X]
- Posts [X]
- Likes [X]
- Comments [X]
- Friendships [X]
- User Profiles [X]
- Notifications [X]
- Image Galleries
- Custom Attributes (Age, School, etc...) [X]
- Messaging
- Events
- Groups

### Setup

*To set up for the first time:*

1. Clone the repository
2. Install PHP, a DBMS ([XAMPP](https://www.apachefriends.org/index.html) or [WAMP](http://www.wampserver.com/en/) will work for this) and [Composer](https://getcomposer.org)
3. Using MySQL or a DBMS of your choice, create a database for use with facer
4. Edit the values in app/config/database.php with your database information
5. In the command line (Linux or Windows), cd to the facer folder (you should see this readme in the root)
6. Running "composer update" will install all the dependencies you need
7. Running "php artisan migrate" will create all the database tables
8. If you want to create dummy users use "php artisan db:seed"
9. Running "php artisan serve" will start up the web server (alternatively you can use Apache in XAMPP or MAMP)

*If you are updating:*

1. Running "composer update" will update any dependencies
2. Running "php artisan migrate" will update any database changes


### Links

- [XAMPP](https://www.apachefriends.org/index.html)
- [WAMP](http://www.wampserver.com/en/)
- [Laravel](http://laravel.com)
- [Composer](https://getcomposer.org)
- [Flatly Bootstrap Theme](https://bootswatch.com/flatly/)