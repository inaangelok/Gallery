<?php

class Controller
{
    public function view($view)
    {
        include_once('../views/' . $view['link'] . '.php');
    }
}