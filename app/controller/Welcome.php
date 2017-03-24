<?php
namespace Controller;

/**
 * Created by PhpStorm.
 * User: Ariel
 * Date: 3/16/2017
 * Time: 12:01 AM
 */
class Welcome extends Controller
{
    public function index()
    {
        render('welcome/index');
    }
}