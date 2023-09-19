<?php 

namespace Core\Middleware;


use Core\Middleware\Auth;
use Core\Middleware\Guest;

class Middleware {


    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];


    public static function resolve($key)
    {

        if(! $key) {
            return;
        }

        $middleware = static::MAP[$key];

        if(! $middleware)
        {
            throw new \Exception("No mathing middleware found for key: '{$key}' .");
        }

        return (new $middleware)->handel();
    }
}