<?php
namespace Rsubscribe\Controllers;

use Rsubscribe\auth\LoggedIn;
use Rsubscribe\Models\Shopping_cart;
use Rsubscribe\Models\User;
use Rsubscribe\validation\Validator;


class RegisterController extends BaseController
{

    public function postRegisterForm()
    {

        $validation_data = [
            'first_name' => 'min:2',
            'email' => 'email',
            'password' => 'min:5|equalTo:verify_password',
        ];


        $validator = new Validator;
        $errors = $validator->isValid($validation_data);

        if (sizeof($errors) > 0) {
            $_SESSION['msg'] = $errors;
            header("Location: /register");

            exit();
        }

        // save into database
        $user = new User;
        $user->first_name = $_REQUEST['first_name'];
        $user->last_name = "MAYBEREMOVEDAUTO";
        $user->email = $_REQUEST['email'];
        $user->password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
        $user->save();



        // Set up user first time use with a new cart and ready to go
        $_SESSION['user'] = $user;

        $user_id = LoggedIn::user()->id;

        $cart = new Shopping_cart();
        $cart->user_id = $user_id;
        $cart->save();
        $_SESSION['user_cart_id'] = $cart->id;

        echo $this->blade->render("movies");

    }


}
