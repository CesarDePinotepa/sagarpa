<?php

function app()
{
    global $app;
    return $app;
}

function render($file, $data = null)
{
    app()->view->render($file, $data);
}

function route($url, $queryString = null)
{
    return app()->url->route($url, $queryString);
}

function asset($url)
{
    return app()->url->asset($url);
}