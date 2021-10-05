<?php
require_once('DB.php');

class Team
{
    protected int $id;
    protected string $name;
    protected string $password;
    protected int $role_id;

    public static function find(int $id): ?Team
    {
        $res = DB::selectOne("SELECT * FROM members  where id = :id", ['id' => $id]);

        // Si il n'y a rien, return null
        if (!isset($res[0])) {
            return null;
        }

        $res = $res[0];
        return self::make(['id' => $res['id'], 'name' => $res['name'], 'password' => $res['password'], 'state_id' => $res['state_id']]);
    }

    public static function all(): array
    {
        return DB::selectMany("SELECT * FROM teams", []);
    }
}
