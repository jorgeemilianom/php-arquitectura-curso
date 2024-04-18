<?php
declare(strict_types=1);

namespace Core\Services;

final class Request
{
    public $header;
    public $uri;
    public $body;
    public $method;

    public function __construct() {
        $this->header = apache_request_headers();
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->body = json_decode(file_get_contents("php://input"), true);
        $this->method = $_SERVER['REQUEST_METHOD'];
    }
    public static function Route(string $path, $callback): void
    {
        if($_SERVER['REQUEST_URI'] == $path) {
            $_SESSION['PageNotFound'] = false;
            $callback();
        }
    }

    public static function Post(string $key, $default = false)
    {
        if(isset($_POST[$key])) return $_POST[$key];

        return $default;
    }

    public static function On(string $key, $callback): void
    {
        if(array_key_exists($key, $_REQUEST)){
            $callback();
        }
    }


    public static function RouteNotFound(): void
    {
        if($_SESSION['PageNotFound']) include './template/Layout/NotFound.php';
    }

    public static function RouteHook(string $path): void
    {
        header('Location: '.$path);
    }
}
