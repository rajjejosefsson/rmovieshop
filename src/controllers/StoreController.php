<?php

namespace Rsubscribe\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Rsubscribe\Models\Cart_item;
use Rsubscribe\models\Item;
use Rsubscribe\Models\Shopping_cart;
use Rsubscribe\auth\LoggedIn;


class StoreController extends BaseController
{


    function getStoreIndex()
    {

        \ChromePhp::log('******find*********');
        $test = Item::find(1)->toArray();
        \ChromePhp::log($test);

        $items = Item::all();
        echo $this->blade->render("store", ['items' => $items]);
    }


    function postItemToCart()
    {


        // Not LoggedIn
        if (!LoggedIn::user()) {

            // *** IF USER IS NOT LOGGED IN *****
            $item_id = $_POST['item_id'];


            \ChromePhp::log('***************');
            \ChromePhp::log($item_id);
            \ChromePhp::log('***************');


            // ONLY INITIALIZE THIS TO AN EMPTY ARRAY IF IT DOESN'T EXIST AT ALL:
            if (!isset($_SESSION['store_items'])) {
                // ARRAY OF SESSION VARIABLE
                $_SESSION['store_items'] = array();
            }


            // PUSH ITEMS TO ARRAY AND THEN TO THE SESSION
            $item = array('item_id' => $item_id);
            array_push($_SESSION['store_items'], $item);


            \ChromePhp::log('***************');
            \ChromePhp::log($_SESSION['store_items']);
            \ChromePhp::log('***************');


        } else {
            // USER IS LOGGED IN
            // get the users cart

            $cart_id = $_SESSION['user_cart_id'];
            $get_movie_id = $_POST['item_id'];


            // CREATE ITEM AND SAVE DATA TO CART_ITEM TABLE
            $cart_items = new Cart_item;
            $cart_items->cart_id = $cart_id;
            $cart_items->movie_id = $get_movie_id;
            $cart_items->category_id = 1;
            $cart_items->save();
        }
    }


    // Convert our DB/Session content to encoded json string
    function getStoreJson()
    {

        // User is not logged in / Use session.
        if (!LoggedIn::user()) {
            if (isset($_SESSION['store_items']) && !empty($_SESSION['store_items'])) {
                $cart_items = $_SESSION['store_items'];
                // encode store items to json
                echo json_encode($cart_items);
            }
        } else {


        }
    }




    function orderByItemType()
    {

        $category_id = $_REQUEST['category_id'];

        if ($category_id == 'all'){
            $sortedItems = Item::all();

        } else {
            $sortedItems = Item::where('category_id', '=', $category_id)->get()->toJson();
        }

        echo $sortedItems;
        exit();


        //return Response::json(['category_id' => $sortedItems]);


         //echo $this->blade->render("store", ['items' => $sortedItems]);


        //    $sortedItems = Item::where('category_id', '=', $category_id);
        //    echo json_encode($sortedItems);
        //   \ChromePhp::log($sortedItems);


    }


}