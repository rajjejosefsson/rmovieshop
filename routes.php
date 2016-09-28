<?php

// Start page and Register
$router->map("GET", "/", "Rsubscribe\controllers\PageController@getShowHomePage", "home");
$router->map("GET", "/home", "Rsubscribe\controllers\PageController@getShowHomePage", "home_2");
$router->map("POST", "/register", "Rsubscribe\controllers\RegisterController@postRegisterForm", "post_register_form");


// Login & Logout
$router->map("GET", "/login", "Rsubscribe\controllers\Logincontroller@getShowLoginPage", "login");
$router->map("POST", "/login", "Rsubscribe\controllers\Logincontroller@postShowLoginPage", "login_post");
$router->map("GET", "/logout", "Rsubscribe\controllers\Logincontroller@getLogout", "logout");


// Movies & Search Movies
$router->map("GET", "/movies", "Rsubscribe\controllers\PageController@getMoviePage", "movies");
$router->map("GET", "/search-movies", "Rsubscribe\controllers\PageController@getSearchMoviePage", "search_movies");


// Shopping Cart
$router->map("GET", "/shopping-cart", "Rsubscribe\controllers\ShoppingCartController@getShowShoppingCartPage", "shopping_cart");
$router->map("GET", "/get-cart-json", "Rsubscribe\controllers\ShoppingCartController@getCartJson", "get_cart_json");
$router->map("POST", "/add-to-cart", "Rsubscribe\controllers\ShoppingCartController@postAddToCart", "add_movie");
$router->map("POST", "/delete-cart-item", "Rsubscribe\controllers\ShoppingCartController@deleteCartItem", "delete_cart");


$router->map("GET", "/get-store-json", "Rsubscribe\controllers\StoreController@getStoreJson", "get_store_json");


$router->map("GET", "/sort-category", "Rsubscribe\controllers\StoreController@orderByItemType", "sort_by_category");
$router->map("POST", "/sort-category", "Rsubscribe\controllers\StoreController@orderByItemType", "post_sort_by_category");




$router->map("GET", "/store", "Rsubscribe\controllers\StoreController@getStoreIndex", "store");
$router->map("POST", "/add-store-item", "Rsubscribe\controllers\StoreController@postItemToCart", "add_store_item");




$router->map("GET", "/admin/add-item", "Rsubscribe\controllers\AdminController@getAddItemIndex", "add_item_store");
$router->map("POST", "/admin/add-item", "Rsubscribe\controllers\AdminController@postAddStoreItem", "post_new_store_item");

$router->map("POST", "/update-item", "Rsubscribe\controllers\AdminController@postUpdateItem", "update-item");
$router->map("POST", "/delete-item", "Rsubscribe\controllers\AdminController@postDeleteItem", "delete-item");


$router->map("POST", "/upload", "Rsubscribe\controllers\AdminController@storeImage", "upload-image");






// May not be used
// $router->map("GET", "/add-to-cart", "Rsubscribe\Controllers\ShoppingController@postAddToCart", "get_movie");



$router->map("GET", "/test-db", "Rsubscribe\Controllers\PageController@getTestDB", "test_db");






$router->map("GET", "/test", function () {




    $movieids = Rsubscribe\Models\Cart_item::all('movie_id');


    // Same as bellow
   /*
    $user = Rsubscribe\Models\User::find(1)->shoppingcart()->get();
    dd($user);
    */

/*
    $user = Rsubscribe\Models\User::find(1);
    $shoppingCart = $user->shoppingcart()->get();
    //dd($shoppingCart);
    echo $user->first_name;
    echo "<br>";
    echo $user->shoppingcart()->get();
*/




});

$router->map("GET", "[*]", "Rsubscribe\Controllers\PageController@pageNotFound", "not_found_page");

