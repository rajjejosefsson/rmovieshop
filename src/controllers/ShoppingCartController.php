<?php

namespace Rsubscribe\Controllers;


use Rsubscribe\Models\Cart_item;
use Rsubscribe\models\Item;
use Rsubscribe\Models\Shopping_cart;
use Rsubscribe\auth\LoggedIn;


class ShoppingCartController extends BaseController
{

    public function getShowShoppingCartPage()
    {

        // Not LoggedIn
        if (!LoggedIn::user()) {

            if ((isset($_SESSION['cart'])) || (isset($_SESSION['store_items']))) {

                $item_store_array = [];
                $totalPriceStartStore = 0;


                // If Movie And Store
                if (!empty($_SESSION['cart']) && !empty($_SESSION['store_items'])) {


                    $cart_items = $_SESSION['cart'];
                    $item_store_ids = $_SESSION['store_items'];


                    // look in db what item is what and push it to array
                    foreach ($item_store_ids as $id) {
                        $item = Item::find($id)->first();  // TODO MAY FAIL DONT KNOW WHY FIRST IS FUCKED
                        array_push($item_store_array, $item);

                        $totalPriceStartStore += $item->price;

                    }

                    // return
                    echo $this->blade->render("shopping-cart", ['cartItems' => $cart_items, 'items' => $item_store_array, 'startPriceFromStore' => $totalPriceStartStore]);
                    exit();
                }


                // Movie in cart Only
                if (!empty($_SESSION['cart'])) {
                    // Get items from the session cart and render page with those
                    $cart_items = $_SESSION['cart'];
                    echo $this->blade->render("shopping-cart", ['cartItems' => $cart_items]);
                    exit();
                }


                // Store only
                if (!empty($_SESSION['store_items'])) {

                    $item_store_ids = $_SESSION['store_items'];
                    $item_store_array = [];

                    // look in db what item is what and push it to array
                    foreach ($item_store_ids as $id) {
                        $item = Item::find($id)->first();  // TODO MAY FAIL DONT KNOW WHY FIRST IS FUCKED
                        array_push($item_store_array, $item);
                        $totalPriceStartStore += $item->price;

                    }

                    echo $this->blade->render("shopping-cart", ['items' => $item_store_array, 'startPriceFromStore' => $totalPriceStartStore]);
                    exit();
                }

                echo $this->blade->render("shopping-cart", ['emptySession' => true]);

            } else {
                // No movies and store items in yet show without items
                echo $this->blade->render("shopping-cart", ['emptySession' => true]);
            }

        } else {
            /* LOGGED IN */

            // User Cart
            $cart_id = $_SESSION['user_cart_id'];

            // Items in Cart
            $items_in_cart = Cart_item::where('cart_id', '=', $cart_id)->get();
            $totalPriceStartStore = 0;
            $items = [];

            if (count($items_in_cart) !== 0) {
                foreach ($items_in_cart as $item) {

                    $id = $item['movie_id'];

                    // Get items thats are from the Item Table (no movies here, uses json instead getCartJson)
                    if (Item::where('id', '=', $id)->get()->first()) {
                        $item = Item::where('id', '=', $id)->get()->first();
                        $items[] = $item;

                        $totalPriceStartStore += $item->price;
                    }
                }
            } else {
                echo $this->blade->render("shopping-cart", ['emptySession' => true]);
                exit();
            }
            // Pass store items
            echo $this->blade->render("shopping-cart", ['items' => $items, 'startPriceFromStore' => $totalPriceStartStore]);
        }
    }


    // Convert our DB/Session content to encoded json string
    // This code is used by the ajax later for getting the movies
    // from themoviedb for the cart movies
    function getCartJson()
    {
        // User is not logged in / Use session.
        if (!LoggedIn::user()) {
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $cart_items = $_SESSION['cart'];

                //TODO:: SHOULD ONLY CONTAIN MOVIES
                echo json_encode($cart_items);
            }
        } else {

            // If the user is logged in / Use Db
            $cart_id = $_SESSION['user_cart_id'];
            $cart_items = Cart_item::where('cart_id', '=', $cart_id)->get();

            //TODO:: GET CATEGORY OF MOVIES EXAMPLE = 1

            $cart_items->sortBy('created_at');
            echo json_encode($cart_items);
        }
    }


    public function postAddToCart()
    {

        // LoggedIn User
        if (LoggedIn::user()) {

            // **** Get the user id  ****
            $user_id = LoggedIn::user()->id;

            // See if user have a cart ready
            $user_cart = Shopping_cart::where('user_id', '=', $user_id)->first();


            if ($user_cart) {
                // Has a Cart already

            } else {
                // Doesn't EXIST any cart, Create new CART for user
                $cart = new Shopping_cart;
                $cart->user_id = $user_id;
                $cart->save();
            }


            // (TODO: SHOULDN'T BE POSSIBLE TO HAVE MORE THEN ONE MOVIE)


            // Get the cart we created or have
            $cartId = Shopping_cart::where('user_id', '=', $user_id)->orderBy('id', 'desc')->first()->id;

            // CREATE ITEM AND SAVE DATA TO CART_ITEM TABLE
            $cart_items = new Cart_item;
            $cart_items->cart_id = $cartId;
            $cart_items->movie_id = $_POST['movie_id'];
            $cart_items->category_id = 0;

            $cart_items->save();
            echo "OK";

        } else {

            // *** IF USER IS NOT LOGGED IN *****
            $get_movie_id = $_POST['movie_id'];

            // ONLY INITIALIZE THIS TO AN EMPTY ARRAY IF IT DOESN'T EXIST AT ALL:
            if (!isset($_SESSION['cart'])) {
                // ARRAY OF SESSION VARIABLE
                $_SESSION['cart'] = array();
            }

            // PUSH ITEMS TO ARRAY AND THEN TO THE SESSION
            $movie = array('movie_id' => $get_movie_id);
            array_push($_SESSION['cart'], $movie);

        }
    }


    function deleteCartItem()
    {
        // Movie Id to delete
        $item_id = $_POST['movie_id'];

        // User is not logged in
        if (!LoggedIn::user()) {

            $storeItem = 1;
            $movieItem = 0;
            $sessionType = "";

            $category_id = $_POST['category_id'];

            // if cart or store

            if ($category_id == $movieItem) {

                $sessionType = 'cart';

            } else if ($category_id == $storeItem) {

                $sessionType = 'store_items';
            }


            // CART
            foreach ($_SESSION[$sessionType] as $key => $value) {
                foreach ($value as $movie => $id) {
                    if ($id == $item_id) {
                        // Is match then remove element at position $key  eg 0, 1, 2 ,3 in the array
                        unset($_SESSION[$sessionType][$key]);
                    }
                }
            }


            // STORE


        } else {

            // IF USER IS LOGGED IN USE THIS  (TODO::LATER)
            Cart_item::where('movie_id', '=', $item_id)->delete();
        }
    }

}

