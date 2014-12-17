P4
==

P4 for CSCI E-15 by Tatiana Khair

## Live URL
<http://cscie15p4.khair.co/>

## Description
Project 4 for CSCI E-15 class: a Laravel-based task-manager application

## Github
<https://github.com/tkhair/P4>

## Demo
Demo is recorded and hosted here <http://khair.co/demop4.swf> 
I also added this link to my P1 portfolio

## Outside code
* Bootstrap
* Laravel
* jQuery

## Background Information

https://github.com/tkhair/P4/blob/master/app/filters.php
Filter is changed (see strings 84-91) to receive csrf token from AJAX headers, which is added to  blob/master/public/js/main.js, which goes there from m,aster template
This token is required to send POST requests to the server


https://github.com/tkhair/P4/blob/master/app/routes.php
ajax filer added to be used in controllers

https://github.com/tkhair/P4/blob/master/app/controllers/BaseController.php
CSRF filter is set by default for all POST requests

https://github.com/tkhair/P4/blob/master/app/controllers/ProjectsController.php

Tasks are grouped into projects.
Projects filter logic:
* Check if user is authorized, if not redirect him to login page
* If authorized then save him is class variable
* Check if user has access to viw and edit the project

Methods:
* index - ist of all projects
* create - a form to create projects
* store - method for POST requests to create projecs
* show - display project and its tasks
* edit - edit project
* update - method for POST requests to edit and save projecs
* destroy - method to delete the project
* checkAccess - checks if project is created by user who is logged in, if not then we redirect him to his projects

https://github.com/tkhair/P4/blob/master/app/controllers/TasksController.php

Almost the same logic as projects, with some additions:
* toggle - method to accept only AJAX POST requests and if taks wan't marked as completed it records current time into completed_at, if task was completed - nulles completed_at field and returns JSON responce for https://github.com/tkhair/P4/blob/master/public/js/main.js
* incomplete - filters all incomplete tasks (with empty completed_at)
* completed - opposite to incomplete


https://github.com/tkhair/P4/blob/master/app/controllers/UsersController.php 

* login - displays login form
* handleLogin - processing POST request from login form
* logout - logout script
* create - displays registration form
* store - processing POST request from registration, validates and saves it


https://github.com/tkhair/P4/blob/master/app/models/

* Each model has $fillable added to set which fields can be changes with form data
* Array $rules contains validation criterias


https://github.com/tkhair/P4/blob/master/public/js/main.js
AJAX for task status chage

MySQL tables structure http://khair.co/images/tables.png
