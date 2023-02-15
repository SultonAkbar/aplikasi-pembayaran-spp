<?php

class App
{
    protected $controller = 'Auth';
    protected $method = 'login';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // ====== CONTROLLER ====== //
        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;


        // ====== METHOD ====== //
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // ====== PARAMS ====== //
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // ====== JALANKAN CONTROLLER $ METHOD, SERTA KIRIMKAN PARAMS JIKA ADA ====== //
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}