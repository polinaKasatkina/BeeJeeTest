<?php

namespace App\Views;

/**
 * View
 *
 * PHP version 7.0
 */
class View
{

    /**
     * Render a view file
     *
     * @param string $view  The view file
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function render($view, $args = [])
    {

        $viewPath = "app/Views/$view.php";
        $args['view_path'] = $viewPath;
//        $args['scriptname'] = $view . '.js';
        extract($args, EXTR_SKIP);

        $file = dirname(__DIR__) . "/Views/layout.php";

        if (is_readable($file)) {
            include $file;
        } else {
            throw new \Exception("$file not found");
        }
    }

}
