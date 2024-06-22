<?php
include_once('Controller.php');

class Session extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function insert($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function delete($key)
    {
        unset($_SESSION[$key]);
    }

    public function logout()
    {
        session_destroy();
    }
}