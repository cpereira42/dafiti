<div align="center" id="top"> 
  <img src="https://upload.wikimedia.org/wikipedia/commons/5/5d/Nova_logo_dafiti.jpg" alt="Dafiti" />

  &#xa0;

  <!-- <a href="https://dafiti.netlify.app">Demo</a> -->
</div>

<p align="center">
  <img alt="Github top language" src="https://img.shields.io/github/languages/top/cpereira42/dafiti?color=56BEB8">

  <img alt="Github language count" src="https://img.shields.io/github/languages/count/cpereira42/dafiti?color=56BEB8">

  <img alt="Repository size" src="https://img.shields.io/github/repo-size/cpereira42/dafiti?color=56BEB8">

  <img alt="License" src="https://img.shields.io/github/license/cpereira42/dafiti?color=56BEB8">

  <!-- <img alt="Github issues" src="https://img.shields.io/github/issues/cpereira42/dafiti?color=56BEB8" /> -->

  <!-- <img alt="Github forks" src="https://img.shields.io/github/forks/cpereira42/dafiti?color=56BEB8" /> -->

  <!-- <img alt="Github stars" src="https://img.shields.io/github/stars/cpereira42/dafiti?color=56BEB8" /> -->
</p>

<!-- Status -->

<!-- <h4 align="center"> 
	🚧  Dafiti 🚀 Under construction...  🚧
</h4> 

<hr> -->

<p align="center">
  <a href="#dart-about">About</a> &#xa0; | &#xa0; 
  <a href="#rocket-technologies">Technologies</a> &#xa0; | &#xa0;
  <a href="#white_check_mark-requirements">Requirements</a> &#xa0; | &#xa0;
  <a href="#checkered_flag-starting">Starting</a> &#xa0; | &#xa0;
  <a href="#memo-license">License</a> &#xa0; | &#xa0;
  <a href="https://github.com/cpereira42" target="_blank">Author</a>
</p>

<br>

## About ##

This project is an APIRestfull with Frontend, made with Symfony, JavaScript, MySQL and HTML.
In this project the user can add a category and  an item using the method POST, the information of an item can be changed with method PUT, an item can be searched with method GET and is possible to delete an item with method DELETE.

## Technologies ##

The following tools were used in this project:

- PHP
- Symfony
- MySQL

## Requirements ##

Before starting :<br>
you need to have installed :
- GIT
- PHP7.4<br>
- MYSQL<br>
- COMPOSER<br>



## Starting ##

```bash
# Clone this project
git clone https://github.com/cpereira42/dafiti

# Access
cd dafiti/api

# Install dependencies
composer install

# Database
open php.ini and uncomment "extension=pdo_mysql"
open .env and change database connect
DATABASE_URL="mysql://root:password@127.0.0.1:3306/dafiti"

# Create DB
php bin/console doctrine:database:create

# Migrate DB
php bin/console doctrine:migrations:migrate

# Start API # The server will initialize in the <http://localhost:8080>
php -S localhost:8080 -t public

# Start Frontend # The server will initialize in the <http://localhost:8081>
cd ../frontend
php -S localhost:8081

# Acess
Acess link http://localhost:8081/index.html

```

<a href="#top">Back to top</a>
