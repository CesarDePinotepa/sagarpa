<?php
namespace Controller;

/**
 * Created by PhpStorm.
 * User: Ariel
 * Date: 3/16/2017
 * Time: 12:00 AM
 */
class Controller
{
    public function __get($name)
    {
        return app()->$name;
    }
}