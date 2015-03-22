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
- Notifications
- Image Galleries
- Custom Attributes (Age, School, etc...)
- Messaging
- Events
- Groups

### Setup

(You will need [Composer](https://getcomposer.org))

*To set up for the first time:*

1. Clone the repository
2. Run "composer update" from the command line
3. Create a facer database
4. Set up app/config/database.php
5. Run "php artisan migrate" this will set up the tables
6. If you want to create dummy users use "php artisan db:seed"
7. Run "php artisan serve" will start up the web server.

*If you are updating:*

1. Run "composer update" to update any dependencies
2. Run "php artisan migrate" to update any database changes


### Links

- [Laravel](http://laravel.com)
- [Composer](https://getcomposer.org)
- [Flatly Bootstrap Theme](https://bootswatch.com/flatly/)