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
    public function moderator()
    {
        $member = Member::find($_POST['id']);
        $moderateTeam = $member->modaretedTeam();
        $memberTeam = $member->onlyMemberTeam();
        Render::render('Profil', ['member' => $member, 'moderateTeam' => $moderateTeam, 'memberTeam' => $memberTeam]);
    }
    //TODO: test edit methode
    public function edit()
    {
        $member = Member::find($_POST['id']);
        $moderateTeam = $member->modaretedTeam();
        $memberTeam = $member->onlyMemberTeam();
        Render::render('ProfilEdit', ['member' => $member, 'moderateTeam' => $moderateTeam, 'memberTeam' => $memberTeam]);
    }
}
