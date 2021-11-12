<?php

namespace Teambuilder\controller;

use Teambuilder\model\Member;
use Teambuilder\model\Team;
use Teambuilder\model\Render;
use TeamTest;

class HomeController
{
    public function index()
    {
        $members = Member::all();
        if (isset($_POST['name'])) {
            $this->AddTeam();
        }
        Render::render('AddTeam');
    }
    public function AddTeam()
    {
        $params = $_POST;
        $params['state_id'] = 1;
        $team = Team::make($params);
        $team->create();
        Render::redirect('Home');
    }
}
