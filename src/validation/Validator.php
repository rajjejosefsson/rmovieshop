<?php

namespace Rsubscribe\validation;

use Respect\Validation\Validator as Valid;

class Validator
{


    public function isValid($validation_data)
    {

        $errors = [];


        foreach ($validation_data as $key => $value) {
            if (isset($_REQUEST[$key])) {

                // exploed the different rules one can have
                $rules = explode('|', $value);

                foreach ($rules as $rule) {

                    // expload the value of the rule
                    $exploded = explode(':', $rule);

                    switch ($exploded[0]) {
                        case 'min':

                            // Get the min number
                            $min = $exploded[1];
                            if (Valid::stringType()->length($min, null)->validate($_REQUEST[$key]) == false) {
                                $errors[] = $key . " must at least be " . $min . " characters long";
                            }
                            break;
                        case 'email':

                            if (Valid::email()->validate($_REQUEST[$key]) == false) {
                                $errors[] = $key . " must be an valid email";
                            }

                            break;
                        case 'password':
                            break;

                        case 'equalTo':

                            if (Valid::equals($_REQUEST[$key])->validate($_REQUEST[$exploded[1]]) == false) {

                                $errors[] = 'values must be equal';
                            }

                            break;


                        default:
                            // Do nada
                    }
                }

            } else {
                $errors[] = "No Values where found";
            }


        }


        return $errors;
    }


}