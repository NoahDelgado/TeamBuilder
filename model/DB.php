<?php

class DB
{
    private static $instancePDO;

    public static function getPDO()
    {
        self::$instancePDO = new PDO('mysql:host=localhost;dbname=teamBuilder', 'root', 'root');
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

        return $statement->fetchColumn(PDO::FETCH_ASSOC);;
    }
    public static function insert($var, $key)
    {
        $statement = self::$instancePDO->prepare($var);
        return $statement->execute($key);
    }
    public static function execute($var, $key)
    {
        $statement = self::$instancePDO->prepare($var);
        return $statement->execute($key);
    }
}
