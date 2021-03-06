<?php

namespace Teambuilder\model;

use Teambuilder\model\DB;
use Teambuilder\model\Team;

class Member
{
    public  $id = null;
    public  $name;
    public  $password;
    public  $role_id;
    public  $status_id;
    const DEFAULT = USER_ID;


    public function create(): bool
    {
        $check = DB::selectOne("SELECT * FROM members WHERE name = :name", ['name' => $this->name]);

        if (!empty($check)) {
            return false;
        }

        $this->id = DB::insert("INSERT INTO members(id, name,password,role_id) VALUES (:id, :name, :password, :role_id)", ['id' => $this->id, 'name' => $this->name, 'password' => $this->name . "'s_Pa$\$w0rd", 'role_id' => $this->role_id, 'status_id' => $this->status_id]);

        return true;
    }

    static function make(array $params)
    {
        $member = new Member();

        if (isset($params['id'])) {
            $member->id = $params['id'];
        }

        $member->name = $params['name'];
        $member->role_id = $params['role_id'];
        $member->status_id = $params['status_id'];
        return $member;
    }

    static function all(): array
    {
        $res = [];

        foreach (DB::selectMany("SELECT * FROM members ORDER BY members.name ASC", []) as $index) {
            $res[] = self::make(['id' => $index['id'], 'name' => $index['name'], 'role_id' => $index['role_id'], 'status_id' => $index['status_id']]);
        }

        return $res;
    }
    static function SelectByRole(int $roleid): array
    {
        $res = [];

        foreach (DB::selectMany("SELECT * FROM members where role_id = " . $roleid . " ORDER BY members.name ASC", []) as $index) {
            $res[] = self::make(['id' => $index['id'], 'name' => $index['name'], 'role_id' => $index['role_id'], 'status_id' => $index['status_id']]);
        }

        return $res;
    }

    static function find(int $id): ?Member
    {
        $res = DB::selectOne("SELECT * FROM members where id = :id", ['id' => $id]);
        // Si il n'y a rien, return null
        if (!isset($res[0])) {
            return null;
        }

        $res = $res[0];
        return self::make(['id' => $res['id'], 'name' => $res['name'], 'role_id' => $res['role_id'], 'status_id' => $res['status_id']]);
    }

    public function save(): bool
    {
        $check = DB::selectOne("SELECT * FROM members WHERE name = :name", ['name' => $this->name]);
        // si il n'est pas vide, alors return false, car le nom sera dupliqu??
        if (!empty($check)) {
            return false;
        }

        return DB::execute("UPDATE members set name = :name, role_id = :role_id WHERE id = :id", ['id' => $this->id, 'name' => $this->name, 'role_id' => $this->role_id, 'status_id' => $this->status_id]);
    }

    public function delete(): bool
    {
        return self::destroy($this->id);
    }

    static function destroy(int $id): bool
    {
        try {
            DB::execute("DELETE FROM members WHERE id = :id", ['id' => $id]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function role()
    {
        $res = [];
        $res = DB::selectOne("SELECT roles.id, roles.name, roles.slug FROM roles INNER JOIN members ON members.role_id = roles.id WHERE members.id = :id ", ['id' => $this->id]);
        $res = $res[0];
        return Role::make(['id' => $res['id'], 'name' => $res['name'], 'slug' => $res['slug']]);
    }
    public function statu()
    {
        $res = [];
        $res = DB::selectOne("SELECT status.id, status.name FROM status INNER JOIN members ON members.status_id = status.id WHERE members.id = :id ", ['id' => $this->id]);
        $res = $res[0];
        return Status::make(['id' => $res['id'], 'name' => $res['name']]);
    }
    public function team()
    {
        $res = [];
        $res = DB::selectMany("SELECT teams.id, teams.name, teams.state_id FROM teams INNER JOIN team_member ON team_member.team_id = teams.id WHERE team_member.member_id = :id", ['id' => $this->id]);
        $teams = [];
        foreach ($res as $team) {
            $teams[] = Team::make(['id' => $team['id'], 'name' => $team['name'], 'state_id' => $team['state_id']]);
        }

        return $teams;
    }
    public function modaretedTeam()
    {
        $res = [];
        $res = DB::selectMany("SELECT teams.id, teams.name, teams.state_id FROM teams INNER JOIN team_member ON team_member.team_id = teams.id WHERE team_member.member_id = :id AND team_member.is_captain = 1; ", ['id' => $this->id]);
        $teams = [];
        foreach ($res as $team) {
            $teams[] = Team::make(['id' => $team['id'], 'name' => $team['name'], 'state_id' => $team['state_id']]);
        }

        return $teams;
    }
    public function onlyMemberTeam()
    {
        $res = [];
        $res = DB::selectMany("SELECT teams.id, teams.name, teams.state_id FROM teams INNER JOIN team_member ON team_member.team_id = teams.id WHERE team_member.member_id = :id AND team_member.is_captain = 0; ", ['id' => $this->id]);
        $teams = [];
        foreach ($res as $team) {
            $teams[] = Team::make(['id' => $team['id'], 'name' => $team['name'], 'state_id' => $team['state_id']]);
        }

        return $teams;
    }
}
