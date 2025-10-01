<?php
namespace App\Guard;

class AdminGuard 
{
    public static function check()
    {
        if(empty($_SESSION['admin']))
        {
            http_response_code(401);
            header("Location: /login");
            exit;
        }
    }
}