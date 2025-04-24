<?php

namespace app\controllers;

use Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->view("home.index");
    }
}
