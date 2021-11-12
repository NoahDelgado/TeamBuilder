<?php

namespace Teambuilder\controller;

use Teambuilder\model\Member;
use Teambuilder\model\Team;
use Teambuilder\model\Render;

class AbstractController
{
    public static function render(string $path, array $variables = [])
    {
        // Extrait les variables du tableau
        extract($variables);

        // Toues les données suivantes seront sotckées dans un tampon temporaire 
        ob_start();
        require('view/' . $path . 'Page.php');

        // récupère le contenu du tampon puis l'efface
        $pageContent = ob_get_clean();

        require('view/LayoutPage.php');
    }
}
