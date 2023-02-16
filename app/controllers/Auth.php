<?php

class Auth extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user'])) {
            redirect('dashboard');
        }
        $data['title'] = 'Login Page';
        $this->view('templates/auth/header/index', $data);
        $this->view('login/index');
        $this->view('templates/auth/footer/index');
    }

    public function createSession($user)
    {
        $_SESSION['user'] = $user;
    }

    public function verifiedPassword($data)

    {
        if ($data['password'] === $_POST['password']) {
            $this->createSession($data);
            redirect('dashboard');
        }
        redirect('Auth');
    }

    public function login()
    {

        $user = $this->model('userModel')->findUserByUsername($_POST['username']);
        if ($user) {
            $this->verifiedPassword($user);
        }
    }
}
