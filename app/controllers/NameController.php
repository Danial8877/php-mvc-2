<?php

namespace app\controllers;

use app\models\Model;
use Controller;

class NameController extends Controller
{
    private $Model;

    public function __construct()
    {
        $this->Model = new Model;
    }
    public function index()
    {
        $categories = $this->Model->getModels();
    }
}
