<?php

namespace Rsubscribe\Controllers;

use duncan3dc\Laravel\BladeInstance;
use Kunststube\CSRFP\SignatureGenerator;

class BaseController{

    protected $blade;
    protected $CSRFP_signer;

    public function __construct()
    {

        // Set up Cross Site Request Forgery Protection to a protected variable for use in other files
        $this->CSRFP_signer = new SignatureGenerator(getenv('CSRFP_SECRET'));

        //$this->blade = new BladeInstance("/vagrant/views", "/vagrant/cache/views");
        // use this because we can now change it inside the getenv file when/if we deploy
        // to another server and not using the virtual server
        $this->blade = new BladeInstance(getenv('VIEWS_DIRECTORY'), getenv('CACHE_DIRECTORY'));


    }


}