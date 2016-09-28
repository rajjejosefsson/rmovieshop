<?php

namespace Rsubscribe\Controllers;


use Respect\Validation\Rules\Url;
use Rsubscribe\Models\Cart_items;
use Rsubscribe\models\Category;
use Rsubscribe\models\Item;
use Rsubscribe\Models\Shopping_cart;
use Rsubscribe\auth\LoggedIn;


class AdminController extends BaseController
{


    function getAddItemIndex()
    {

        // Get category table

        $categories = Category::all();

        $DBitems = Item::all();
        echo $this->blade->render("admin/add-store-item", ['signer' => $this->CSRFP_signer, 'DBitems' => $DBitems, 'categories' => $categories]);
    }


    function postAddStoreItem()
    {

        if (!$this->CSRFP_signer->validateSignature($_POST['_token'])) {
            header('HTTP/1.0 400 Bad Request');
            exit;
        }
        // CREATE ITEM AND SAVE DATA TO CART_ITEM TABLE
        $item = new Item;
        $item->name = $_POST['name'];
        $item->price = $_POST['price'];
        $item->category_id = $_POST['category'];
        $item->image = $_POST['imageURL'];
        $item->description = $_POST['description'];
        $item->save();

    }


    function postUpdateItem()
    {
        // Get item ID
        // updated item with corresponding id
        $item_id = $_POST['item_id'];
        $item_to_change = Item::find($item_id);

        $item_to_change->name = $_POST['name'];
        $item_to_change->price = $_POST['price'];
        $item_to_change->category_id = $_POST['category_id'];
        $item_to_change->image = $_POST['image'];
        $item_to_change->description = $_POST['description'];
        $item_to_change->save();
    }


    function postDeleteItem(){
        $item_id = $_POST['item_id'];
        Item::find($item_id)->delete();
    }

    function storeImage()
    {


        $imgFile = $_FILES['image']['name'];
        $tmp_dir = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];


        // public/uploaded_files
        $upload_dir = 'uploaded_files/';

        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

        // rename uploading image
        $userpic = rand(1000, 1000000) . "." . $imgExt;

        // allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
            // Check file size '5MB'
            if ($imgSize < 5000000) {
                move_uploaded_file($tmp_dir, $upload_dir . $userpic);


                $item = new Item;
                $item->name = $_POST['name'];
                $item->price = $_POST['price'];
                $item->category_id = $_POST['category'];
                $item->image = $userpic;
                $item->description = $_POST['description'];
                $item->save();


            } else {
                $errMSG = "Sorry, your file is too large.";
            }
        } else {
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

    }


}