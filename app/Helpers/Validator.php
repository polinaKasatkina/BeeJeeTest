<?php

namespace App\Helpers;

use App\Models\User;

class Validator {

    static function validate($request, $args)
    {

        $result = [
            'status' => 'success',
            'errors' => []
        ];

        foreach ($args as $key => $arg) {

            $rules = explode('|', $arg);

            foreach ($rules as $rule) {

                switch ($rule) {
                    case 'required' :

                        if (!isset($request->$key) || empty($request->$key)) {
                            $result['status'] = 'error';
                            $result['errors'][$key][] =
                                'Field is required!'
                            ;
                        }
                            break;
                    case 'email' :
                        if (!filter_var($request->$key, FILTER_VALIDATE_EMAIL)) {
                            $result['status'] = 'error';
                            $result['errors'][$key][] =
                                'Wrong email field format'
                            ;
                        }
                        break;
                    case 'exists' :

                        $user = User::where('name', $request->$key)->exists();

                        if (!$user) {

                            $result['status'] = 'error';
                            $result['errors'][$key][] =
                                'User with this username doesn\'t exists'
                            ;

                        }

                        break;
                    case 'password' :

                        if (isset($request->name)) {

                            $user = User::where('name', $request->name)->get();

                            if (!isset($user[0])) {
                                $result['status'] = 'error';
                                $result['errors'][$key][] =
                                    'User with this password doesn\'t exists'
                                ;
                            } elseif (isset($user[0]) && sha1($request->$key) !== $user[0]->password) {

                                $result['status'] = 'error';
                                $result['errors'][$key][] =
                                    'Wrong password'
                                ;


                            }
                        }

                        break;
                }

            }
        }

        return $result;

    }

}
