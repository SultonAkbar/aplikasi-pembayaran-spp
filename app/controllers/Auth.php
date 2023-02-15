<?php

class Auth extends Controller
{
    public function login()
    {
        $data['title'] = 'Login Page';
        $this->view('templates/header/index', $data);
        $this->view('login/index');
        $this->view('templates/footer/index');
    }
}
