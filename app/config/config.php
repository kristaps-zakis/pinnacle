<?php

// DB Params
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = 'root';
const DB_NAME = 'subscriptions';

// App Root
define('APPROOT', dirname(dirname(__FILE__)));
// URL Root

$root_url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

define('URL_ROOT', $root_url);
