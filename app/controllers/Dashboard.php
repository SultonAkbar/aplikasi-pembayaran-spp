<?php

class Dashboard extends Controller
{
    public function index()
    {
        if (empty($_SESSION['user'])) {
            redirect('auth');
        }
        $this->view('templates/header/index');
        $this->view('dashboard/index');
        $this->view('templates/footer/index');
    }
}
