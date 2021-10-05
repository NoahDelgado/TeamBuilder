<?php

use \App\Models\Members;
use \App\Controllers\HomeController;

$_SESSION['userLog'] = Members::find(USER_ID);
(new HomeController())->index();
