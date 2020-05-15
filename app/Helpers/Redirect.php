<?php

namespace App\Helpers;

class Redirect {

    /**
     * To: Redirects to a specific path.
     * @access public
     * @param string $location [optional]
     * @return void
     * @since 1.0.1
     */
    public static function to($location = "") {
        if ($location) {
            if ($location === 404) {
                header('HTTP/1.0 404 Not Found');
            } else {
                header("Location: " . getenv('APP_URL') .  $location);
            }
            exit();
        }
    }

    public static function with(array $params, $location = "") {

        foreach ($params as $key => $value) {
            setcookie($key, $value);
        }

        return self::to($location);
    }

}
