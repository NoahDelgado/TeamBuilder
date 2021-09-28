<?php

class DB
{
    private static $instancePDO;

    public static function getPDO()
    {
        $db = new PDO('mysql:host=localhost;dbname=teambuilder', 'root', 'root');
        self::$instancePDO = $db;
        return $db;
    }

    public static function selectMany($var, $key)
    {
        $statement = self::$instancePDO->prepare($var);

        $statement->execute($key);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function selectOne($var, $key)
    {
        $statement = self::$instancePDO->prepare($var);
        $statement->execute($key);

        $result = $statement->fetchAll();
        return $result;
        // $statement = self::$instancePDO->prepare($var);

        // $statement->execute($key);

        // return $statement->fetchColumn(PDO::FETCH_ASSOC);
    }
    public static function insert($var, $key)
    {
        $db = self::getPDO();
        $statement = $db->prepare($var);
        $statement->execute($key);
        return $db->lastInsertId();
    }
    public static function execute($var, $key)
    {
        $statement = self::$instancePDO->prepare($var);
        return $statement->execute($key);
    }
}
