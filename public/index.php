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

// Error Diplay: Confit at app/config/app.php
ini_set('display_errors', DEBUG);
error_reporting(E_ALL);

// Starter file
require_once '../loader/init.php';

// Get the url context
if (empty($_GET['url'])) {
    $url = "";
}else {
    $url = $_GET['url'];
}

// The request Object
$request = new Request($url);
$request->execute();