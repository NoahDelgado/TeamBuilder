<?php

namespace Teambuilder\controller;

use Teambuilder\model\Member;
use Teambuilder\model\Team;
use Teambuilder\model\Render;

class UserProfilController
{
    public function index()
    {
        $member = Member::find($_SESSION['userLog']->id);
        $moderateTeam = $member->modaretedTeam();
        $memberTeam = $member->onlyMemberTeam();
        Render::render('Profil', ['member' => $member, 'moderateTeam' => $moderateTeam, 'memberTeam' => $memberTeam]);
    }
}
