<?php
namespace Rsubscribe\Controllers;

use duncan3dc\Laravel\BladeInstance;
use Rsubscribe\Models\Shopping_cart;
use Rsubscribe\Models\User;
use Rsubscribe\auth\LoggedIn;


class LoginController extends BaseController
{

    public function getShowLoginPage()
    {
        // Assign the CSRFP_signer to the hidden field in the form, will otherwise crach
        echo $this->blade->render("login", ['signer' => $this->CSRFP_signer]);
    }



    public function postShowLoginPage()
    {

        if (!$this->CSRFP_signer->validateSignature($_POST['_token'])) {
            header('HTTP/1.0 400 Bad Request');
            exit;
        }


        // Get data from form
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];


        $isValid = true;

        // Look up the user
        $user = User::where('email', '=', $email)->first();

        if ($user != null) {
            // Validate Creedentials
            // password_verify verify the password_hash from register with the password user types in.
            // 1. password user entered, 2. stored hashpassword
            if (!password_verify($password, $user->password)) {

                // password incorrect
                $isValid = false;
            }

        } else {
            // user not found
            $isValid = false;
        }


        if ($isValid) {

            // Store user in session
            $_SESSION['user'] = $user;


            // Get the id from the user session with user() method
            $user_id = LoggedIn::user()->id;
            $user_cart = Shopping_cart::where('user_id', '=', $user_id)->first();

            // If cart exists
            if ($user_cart) {
                // Has a Cart already
                $_SESSION['user_cart_id'] = $user_cart->id;
            } else {
                // Doesn't EXIST, Create new CART for user
                $cart = new Shopping_cart;
                $cart->user_id = $user_id;
                $cart->save();
                $_SESSION['user_cart_id'] = $cart->id;
            }
            header("Location: /movies");
            exit();

        } else {

            $_SESSION['msg'] = ["Invalid Login"];
            echo $this->blade->render('login', ['signer' => $this->CSRFP_signer]);
            unset($_SESSION['msg']);
            exit();
        }
        // else redirect to login page

    }


    public function getLogout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['user_cart_id']);
        session_destroy();
        header("Location: /login");
        exit();
    }


}
