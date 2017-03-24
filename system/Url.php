<?php

/**
 * Created by PhpStorm.
 * User: Ariel
 * Date: 3/16/2017
 * Time: 5:07 AM
 */
class Url
{

    private $baseUrl;

    /**
     * Url constructor.
     */
    public function __construct()
    {
        if (empty($this->baseUrl)) {
            if (isset($_SERVER['SERVER_ADDR'])) {
                if (strpos($_SERVER['SERVER_ADDR'], ':') !== FALSE) {
                    $server_addr = '[' . $_SERVER['SERVER_ADDR'] . ']';
                } else {
                    $server_addr = $_SERVER['SERVER_ADDR'];
                }
                if ($server_addr == "[::1]") {
                    $server_addr = "localhost";
                }
                $base_url = ($this->isHttps() ? 'https' : 'http') . '://' . $server_addr
                    . substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
            } else {
                $base_url = 'http://localhost/';
            }
            $this->baseUrl = $base_url;
        }
    }

    function isHttps()
    {
        if (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {
            return TRUE;
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https') {
            return TRUE;
        } elseif (!empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
            return TRUE;
        }
        return FALSE;
    }


    public function asset($url)
    {
        $url = ltrim($url, '/');
        return $this->baseUrl . 'public/' . $url;
    }

    public function route($url, $queryString = null)
    {
        $url = ltrim($url, '/');
        if (is_array($queryString)) {
            $queryString = http_build_query($queryString);
        }
        return $this->baseUrl . $url . $queryString;
    }

    function redirect($uri = '', $method = 'auto', $code = NULL)
    {
        if (!preg_match('#^(\w+:)?//#i', $uri)) {
            $uri = $this->route($uri);
        }

        // IIS environment likely? Use 'refresh' for better compatibility
        if ($method === 'auto' && isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS') !== FALSE) {
            $method = 'refresh';
        } elseif ($method !== 'refresh' && (empty($code) OR !is_numeric($code))) {
            if (isset($_SERVER['SERVER_PROTOCOL'], $_SERVER['REQUEST_METHOD']) && $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1') {
                $code = ($_SERVER['REQUEST_METHOD'] !== 'GET')
                    ? 303    // reference: http://en.wikipedia.org/wiki/Post/Redirect/Get
                    : 307;
            } else {
                $code = 302;
            }
        }

        switch ($method) {
            case 'refresh':
                header('Refresh:0;url=' . $uri);
                break;
            default:
                header('Location: ' . $uri, TRUE, $code);
                break;
        }
        exit;
    }
}