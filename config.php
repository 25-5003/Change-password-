<?php
// ============================================================
//  config.php  —  Daystar University DB Connection
//  Place this file ONE level above your public web folder
//  e.g. /var/www/daystar/config.php  (not inside /public_html)
// ============================================================

define('DB_HOST', 'localhost');       // usually localhost on a VPS
define('DB_NAME', 'daystar_db');      // your MySQL database name
define('DB_USER', 'daystar_user');    // your MySQL username
define('DB_PASS', 'YourStrongPassword123!'); // your MySQL password
define('DB_CHARSET', 'utf8mb4');

function getDB(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    }
    return $pdo;
}
