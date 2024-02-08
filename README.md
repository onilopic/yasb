Yet another Symfony Blog Application
========================

Yet another Symfony Blog extend Symfony Demo Application  
This blog is a pet project for educational purposes!

Requirements
------------

  * PHP 8.1.0 or higher;
  * PDO PHP extension enabled;
  * and the [usual Symfony application requirements][2].

Installation
------------

Clone this repository. 
```bash
# ...or you can clone the code repository and install its dependencies
$ git clone https://github.com/onilopic/yasb.git my_project
$ cd my_project/
$ composer install
```

Usage
-----

There's no need to configure anything before running the application. There are
2 different ways of running this application depending on your needs:

**Option 1.** [Download Symfony CLI][4] and run this command:

```bash
$ cd my_project/
$ symfony serve
```

Then access the application in your browser at the given URL (<https://localhost:8000> by default).

**Option 2.** Use a web server like Nginx or Apache to run the application
(read the documentation about [configuring a web server for Symfony][3]).

On your local machine, you can run this command to use the built-in PHP web server:

```bash
$ cd my_project/
$ php -S localhost:8000 -t public/
```

Tests
-----

Execute this command to run tests:

```bash
$ cd my_project/
$ ./bin/phpunit
```