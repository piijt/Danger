<?php
abstract class DbP {
    const DBHOST = 'localhost';
    const DBUSER = 'root';
    const USERPWD = '';
    const DB = 'sportsshop';
    const DSN = "mysql:host=".self::DBHOST.";dbname=".self::DB;
}
