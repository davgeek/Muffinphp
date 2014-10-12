<?php

/******************************************************/
/*                                                    */
/*                 Muffin PHP v0.1                    */
/*               PHP Micro Framework                  */
/*                    by @DavGeek                     */
/*                                                    */
/******************************************************/

// Config File
require '../app/config/app.php';

// Error Diplay: Confitg at app/config/app.php
ini_set('display_errors', DEBUG);
error_reporting(E_ALL);

// Starter file
require_once '../loader/init.php';

// Get the url content
(empty($_GET['url'])) ? $url = null : $url = $_GET['url'];

// The request Object
$request = new Request($url);
$request->execute();