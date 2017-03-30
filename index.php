<?php
require 'system/App.php';

$app = new App();

$app->path(__DIR__ . '/app');
$app->register('url', 'Url');
$app->register('form', 'Form');
$app->register('auth', 'Auth');
$app->register('flash', 'Flash');
$app->register('session', 'Session');
$app->register('router', 'Router');
$app->register('auth', 'Auth');
$app->register('flash', 'Flash');
$app->register('view', 'View', array(__DIR__ . DIRECTORY_SEPARATOR . 'app/views'), function ($view) use ($app) {
    $view->set('app', $app);
});
$app->register('db', 'Db', array(
    array(
        'db_driver' => 'mysql',
        'db_host' => 'localhost',
        'db_user' => 'root',
        'db_pass' => '',
        'db_name' => 'sagarpa',
        'db_charset' => 'utf8',
        'db_collation' => 'utf8_general_ci',
        'db_prefix' => ''
    )
));

//Routes
$app->get('/', array('Controller\Welcome', "index"));
$app->get('/login', array('Controller\Auth', "login"));
$app->post('/login', array('Controller\Auth', "loginPost"));
$app->get('/logout', array('Controller\Profile', "logout"));
$app->get('/forgot', array('Controller\Auth', "forgot"));
$app->post('/forgot', array('Controller\Auth', "forgotPost"));
$app->get('/change/@key', array('Controller\Auth', "change"));
$app->post('/change', array('Controller\Auth', "changePost"));
//Admin routes
$app->get('/admin', array('Controller\Dashboard', "index"));
//Profile
$app->get('/admin/change', array('Controller\Profile', "change"));
$app->post('/admin/change', array('Controller\Profile', "changePost"));
$app->get('/admin/profile', array('Controller\Profile', "profile"));
$app->post('/admin/profile', array('Controller\Profile', "profilePost"));
//users
$app->get('/admin/users', array('Controller\User', "index"));
$app->get('/admin/users/add', array('Controller\User', "add"));
$app->get('/admin/users/edit/@id', array('Controller\User', "edit"));
$app->post('/admin/users/save', array('Controller\User', "save"));
$app->any('/admin/users/delete(/@id)', array('Controller\User', "delete"));
//personal
$app->get('/admin/personal', array('Controller\Personal', "index"));
$app->get('/admin/personal/add', array('Controller\Personal', "add"));
$app->get('/admin/personal/edit(/@id)', array('Controller\Personal', "edit"));
$app->post('/admin/personal/save', array('Controller\Personal', "save"));
$app->any('/admin/personal/delete(/@id)', array('Controller\Personal', "delete"));

$app->run();
?>
