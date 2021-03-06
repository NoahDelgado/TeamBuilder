<?php

namespace Teambuilder\model;
//TODO: placer le render dans la view passer en abstract controller
class Render
{
    /**
     * Permet de générer le rendu des pages
     *
     * @param string $path
     * @param array $variables
     * @return void
     */
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
    public static function redirect($path)
    {

        header('Location: /?controller=' . $path);

        exit();
    }
}
