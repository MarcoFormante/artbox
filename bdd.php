<?php
require_once 'config.php';

function connection()
{
    try {
        return new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8',DB_USER, DB_PASS,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
    );
    } catch (PDOException $e) {
        die('Une erreur est survenue :') . $e->getMessage();
    }
}
