<?php

namespace ClementPatigny\Controller;

class AppController {
    /**
     * renders views
     * @param array array $views      views to require
     * @param array [$variables = []] variables whose views need
     */
    public function render(array $views, $variables = []) {
        ob_start();
        extract($variables);
        foreach($views as $view) {
            require_once 'view/' . $view . '.php';
        }
        $content = ob_get_clean();
        require_once "view/template.php";
    }
}
