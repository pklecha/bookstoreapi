<?php
/**
 * Created by PhpStorm.
 * User: pawelklecha
 * Date: 07/06/2017
 * Time: 22:23
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'bookstoreapi');
define('DB_USER', 'root');
define('DB_PASS', 'root');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS,DB_NAME);

if ($conn->connect_errno) {
    die ("Error connecting with database: " . $conn->connect_errno . " " . $conn->connect_error);
}