<?php

namespace Teambuilder\controller;

use Teambuilder\model\Member;
use Teambuilder\model\Team;
use Teambuilder\model\Render;

class HomeController
{
    public function index()
    {
        $members = Member::SelectByRole(2);

        Render::render('ModeratorsList', ['members' => $members]);
    }
}
