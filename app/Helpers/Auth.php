<?php

namespace App\Helpers;

class Auth {

    /**
     * Check Authenticated: Checks to see if the user is authenticated,
     * destroying the session and redirecting to a specific location if the user
     * session doesn't exist.
     * @access public
     * @param string $redirect
     * @since 1.0.2
     */
    public static function checkAuthenticated($redirect = "/login") {
        Session::init();
        if (!Session::exists('user')) {
            Session::destroy();
            Redirect::to($redirect);
        }
    }

    /**
     * Check Unauthenticated: Checks to see if the user is unauthenticated,
     * redirecting to a specific location if the user session exist.
     * @access public
     * @param string $redirect
     * @since 1.0.2
     */
    public static function checkUnauthenticated($redirect = "/dashboard") {
        Session::init();
        if (Session::exists('user')) {
            Redirect::to($redirect);
        }
    }

    public static function check() {
        Session::init();
        if (!Session::exists('user')) {
            return false;
        }

        return true;
    }

}
