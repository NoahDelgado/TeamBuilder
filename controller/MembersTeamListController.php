<?php

namespace Teambuilder\controller;

use Teambuilder\model\Member;
use Teambuilder\model\Team;
use Teambuilder\model\Render;

class HomeController
{
    public function index()
    {
        $members = Member::all();

        Render::render('MembersTeamList', ['members' => $members]);
    }
    public function moderator()
    {
        $members = Member::all();

        Render::render('ModeratorMembersTeamList', ['members' => $members]);
    }
}
