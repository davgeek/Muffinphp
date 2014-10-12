<?php

/******************************************************/
/*                                                    */
/*                 Muffin PHP v0.1                    */
/*               PHP Micro Framework                  */
/*                    by @DavGeek                     */
/*                                                    */
/******************************************************/

/**
 * App Config
 */
const URL = 'http://localhost/muffinphp/public/';
const DEBUG = true;
const DEF_CONTROLLER = 'home';
const DEF_METHOD = 'index';


/**
 * Database Config
 */
const DB = true; // Set true or false 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'database');
define('DB_CHAR', 'utf8');

/**
 * Directories config
 */
const DIR_CONTROLLERS = '../app/controllers/';
const DIR_MODELS = '../app/models/';
const DIR_VIEWS = '../app/views/';