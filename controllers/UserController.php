<?php
include_once('../vendor/controller/Controller.php');
include_once('../vendor/controller/Session.php');
include_once('../models/User.php');
$session = new Session();

class UserController extends Controller
{
    public function register()
    {
        $session = new Session();
        $session->delete('error');

        if ($_POST['email'] == '' or $_POST['name'] == '' or $_POST['surname'] == '' or $_POST['password'] == '' or $_POST['password2'] == '') {
            $session->insert('error', 'Fill all the data.');
            header('location:/front/auth');
        } else {
            $user = new User();
            $params = [
                'email' => $_POST['email'],
            ];
            $user->select_user();
            $user->where($params);
            if ($user->query()) {
                $session->insert('error', 'This email is already used.');
                header('location:/front/auth');
            } else {
                if ($_POST['password'] == $_POST['password2']) {
                    $param = [
                        'email' => $_POST['email'],
                        'password' => hash('ripemd160', $_POST['password']),
                        'name' => $_POST['name'],
                        'surname' => $_POST['surname']
                    ];
                    $user->create_user($param);
                    $session->delete('error');
                    $par1 = [
                        'email' => $_POST['email']
                    ];
                    $user->select_user();
                    $user->where($par1);
                    $result = $user->query();
                    $session->insert('user_id', $result['id']);
                    header('location:/front/home');
                } else {
                    $session->insert('error', 'Repeat the password exactly same way.');
                    header('location:/front/auth');
                }
            }
        }
    }

    public function login()
    {
        $session = new Session();
        $session->delete('error');
        if ($_POST['email'] == '') {
            $session->insert('error', 'Fill all the data');
            header('location:/front/auth');
        } elseif ($_POST['password'] == '') {
            $session->insert('error', 'Fill all the data');
            header('location:/front/auth');
        } else {
            $user = new User();
            $par1 = [
                'email' => $_POST['email']
            ];
            $user->select_user();
            $user->where($par1);
            if ($user->query()) {
                $result = $user->query();
                if (hash('ripemd160', $_POST['password']) == $result['password']) {
                    $session->insert('user_id', $result['id']);
                    $session->delete('error');
                    header('location:/front/home');
                } else {
                    $session->insert('error', 'The password is incorrect');
                    header('location:/front/auth');
                }
            } else {
                $session->insert('error', 'User not found');
                header('location:/front/auth');
            }

        }
    }

    public function logout()
    {
        $session = new Session();
        $session->delete('error');
        $session->logout();
        header('location:/front/home');
    }


}