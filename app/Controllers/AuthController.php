<?php
namespace App\Controllers;


use App\Views\View;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Helpers\Auth;
use App\Models\User;
use App\Helpers\Session;
use App\Helpers\Validator;
use App\Helpers\Redirect;

class AuthController extends Controller
{

    /**
     * Index: Renders the login view. NOTE: This controller can only be accessed
     * by unauthenticated users!
     * @access public
     * @example login/index
     * @return void
     * @since 1.0.2
     */
    public function index() {

        Auth::checkUnauthenticated();

        return View::render('login');
    }

    public function login(Request $request)
    {


        // Check that the user is unauthenticated.
        Auth::checkUnauthenticated();


        $rules = [
            "name" => "required",
            "password" => "required"
        ];

        $validate = Validator::validate($request, $rules);

        if ($validate['status'] !== 'success') {
            return View::render('login', ['errors' => $validate['errors'], 'request' => $request]);
        }

        $user = User::where('name', $request->name)->exists();

        if (!$user) {
            return View::render('login', ['errors' => ['name' => 'User with this username doesnt exists'], 'request' => $request]);
        }

        $userData = User::where('name', $request->name)->get();

        if (sha1($request->password) !== $userData[0]->password) {

            return View::render('login', ['errors' => ['password' => 'Wrong password'], 'request' => $request]);
        }

        Session::put('user', $userData[0]->id);

        Redirect::to('/dashboard');

    }


    /**
     * Logout: Processes a logout request. NOTE: This controller can only be
     * accessed by authenticated users!
     * @access public
     * @example login/logout
     * @return void
     * @since 1.0.2
     */
    public function logout() {

        if (Auth::check()) {

            if (isset($_COOKIE['user'])) {

                unset($_COOKIE['user']);
                setcookie('user', null, -1, '/');

            }

            // Destroy all data registered to the session.
            Session::destroy();
        }

        Redirect::to('/');
    }

}
