<?php

namespace App\Controllers;

use App\Models\Members;
use App\Models\Teams;

class HomeController
{
    public function index()
    {
        $members = Members::all();

        ob_start();
        require "../model/home.php";
        $content = ob_get_clean();
        require "../model/layout.php";
    }
}
