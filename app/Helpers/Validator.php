<?php

namespace App\Helpers;

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
                            $result['errors'][$key] =
                                'Это обязательное поле!'
                            ;
                        }
                            break;
                    case 'email' :
                        if (!filter_var($request->$key, FILTER_VALIDATE_EMAIL)) {
                            $result['status'] = 'error';
                            $result['errors'][$key] =
                                'Не верный формат поля email'
                            ;
                        }
                        break;
                }

            }
        }

        return $result;

    }

}
