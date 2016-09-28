<?php
namespace Rsubscribe\Controllers;

use Rsubscribe\Models\User;
use Rsubscribe\validation\validator;


class PageController extends BaseController
{
    public function getShowHomePage()
    {
        //  \ChromePhp::log($_SESSION['user_cart_id']);
        /* Blade */
        echo $this->blade->render("home");
    }


    public function getMoviePage()
    {
        echo $this->blade->render('movies');
    }


    public function getSearchMoviePage()
    {
        echo $this->blade->render('search-movies');
    }


    public function pageNotFound()
    {
        echo $this->blade->render('page-not-found');
    }


}
