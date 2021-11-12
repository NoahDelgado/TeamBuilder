<?php

namespace Teambuilder\model;

use Teambuilder\model\DB;


class Status
{
    public $id;
    public $name;

    static function make(array $fields): Status // create object, but no db record
    {
        $Status = new Status();
        $Status->id = $fields["id"];
        $Status->name = $fields["name"];
        return $Status;
    }

    public function create(): bool // create db record from object
    {
        try {
            return DB::insert("INSERT INTO status(name) VALUES (:name)", ["name" => $this->name]);
        } catch (\PDOException $Exception) {
            return false;
        }
    }

    static function find($id): ?Status
    {
        $db = DB::selectOne("SELECT * FROM status where id = :id", ["id" => "$id"]);
        return ($db) ? self::make($db) : null;
    }

    static function all(): array
    {

        return DB::selectMany("SELECT * FROM status", []);;
    }

    public function save(): bool
    {
        try {
            return DB::execute("UPDATE status set name = :name WHERE id = :id", ["name" => $this->name, "id" => $this->id]);
        } catch (\PDOException $Exception) {
            return false;
        }
    }

    public function delete(): bool
    {
        try {
            return DB::execute("DELETE FROM status WHERE id = :id", ["id" => $this->id]);
        } catch (\PDOException $Exception) {
            return false;
        }
    }

    static function destroy($id): bool
    {
        try {
            return DB::execute("DELETE FROM status WHERE id = :id", ["id" => $id]);
        } catch (\PDOException $Exception) {
            return false;
        }
    }
}
