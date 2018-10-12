<?php

namespace App\modules\home\controllers;
use App\lib\Controller;


class error404 extends Controller{
    
    public function index() {
        
        phpinfo();
        
    }
        
}
