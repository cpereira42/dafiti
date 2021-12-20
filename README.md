<div align="center" id="top"> 
  <img src="./.github/app.gif" alt="Dafiti" />

  &#xa0;

  <!-- <a href="https://dafiti.netlify.app">Demo</a> -->
</div>

<h1 align="center">Dafiti</h1>

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

## :dart: About ##

Describe your project
This project is an APIRestfull

## :rocket: Technologies ##

The following tools were used in this project:

- [PHP]
- [Symfony]
- [MySQL]

## :white_check_mark: Requirements ##

Before starting :<br>
you need to have :<br>
[Git]<br>
[PHP7.4] installed.<br>
[MYSQL] installed.<br>
[COMPOSER] installed.<br>



## :checkered_flag: Starting ##

```bash
# Clone this project
$ git clone https://github.com/cpereira42/dafiti

# Access
$ cd dafiti/api

# Install dependencies
$ composer install

# Database
open php.ini and uncomment "extension=pdo_mysql"
open .env and change database connect
DATABASE_URL="mysql://root:password@127.0.0.1:3306/dafiti"

# Create DB
$ php bin/console doctrine:database:dafiti

# Migrate DB
$ php bin/console doctrine:migrations:migrate

# Start API # The server will initialize in the <http://localhost:8080>
$ php -S localhost:8080 -t public

# Start Frontend # The server will initialize in the <http://localhost:8081>
$ cd ../frontend
$ php -S localhost:8081

# Acess
Acess link http://localhost:8081/index.html


```

## :memo: License ##


Made with :heart: by <a href="https://github.com/cpereira42" target="_blank">{{YOUR_NAME}}</a>

&#xa0;

<a href="#top">Back to top</a>
