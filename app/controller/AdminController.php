<?php
namespace Controller;

/**
 * Created by PhpStorm.
 * User: Ariel
 * Date: 3/16/2017
 * Time: 12:00 AM
 */
class AdminController extends Controller
{

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        if (!$this->auth->isLogged()) {
            $this->url->redirect('/login');
        }
    }
}