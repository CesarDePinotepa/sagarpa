<?php


class App implements ArrayAccess
{


    protected $config = array(
        'system.loader' => 'Loader',
        'system.request' => 'Request',
        'system.response' => 'Response',
        'system.router' => 'Router',
        'system.handle_errors' => true,
        'system.log_errors' => false,
    );

    /**
     * @var Loader loader
     */
    protected $loader = null;

    /**
     * Autoload directories.
     *
     * @var array
     */
    protected static $dirs = array();

    /**
     * App constructor.
     * @param array $config
     */
    public function __construct($config = array())
    {
        if ($config != null) {
            $this->config = array_merge($this->config, $config);
        }
        $this::autoload(true, dirname(__DIR__) . DIRECTORY_SEPARATOR . 'system');
        require_once 'helpers.php';
        $this->loader = new $this['system.loader'];
        $this->register('request', $this['system.request']);
        $this->register('response', $this['system.response']);
        $this->register('router', $this['system.router']);
    }

    /**
     * Whether a offset exists
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return isset($this->config[$offset]);
    }

    /**
     * Offset to retrieve
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return isset($this->config[$offset]) ? $this->config[$offset] : null;
    }

    /**
     * Offset to set
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->config[] = $value;
        } else {
            $this->config[$offset] = $value;
        }
    }

    /**
     * Offset to unset
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        unset($this->config[$offset]);
    }

    /*** Autoloading Functions ***/

    /**
     * Starts/stops autoloader.
     *
     * @param bool $enabled Enable/disable autoloading
     * @param mixed $dirs Autoload directories
     */
    public static function autoload($enabled = true, $dirs = array())
    {
        if ($enabled) {
            spl_autoload_register(array(__CLASS__, 'loadClass'));
        } else {
            spl_autoload_unregister(array(__CLASS__, 'loadClass'));
        }

        if (!empty($dirs)) {
            self::path($dirs);
        }
    }

    /**
     * Autoload classes.
     *
     * @param string $class Class name
     */
    public static function loadClass($class)
    {
        $class_file = str_replace(array('\\', '_'), '/', $class) . '.php';

        foreach (self::$dirs as $dir) {
            $file = $dir . '/' . $class_file;
            if (file_exists($file)) {
                require $file;
                return;
            }
        }
    }

    /**
     * Adds a directory for autoloading classes.
     *
     * @param mixed $dir Directory path
     */
    public static function path($dir)
    {
        if (is_array($dir) || is_object($dir)) {
            foreach ($dir as $value) {
                self::path($value);
            }
        } else if (is_string($dir)) {
            if (!in_array($dir, self::$dirs)) self::$dirs[] = $dir;
        }
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     * @throws Exception
     */
    function __call($name, $arguments)
    {
        if (!$this->loader->get($name)) {
            throw new \Exception("{$name} must be a mapped class.");
        }
        $shared = (!empty($arguments)) ? (bool)$arguments[0] : true;
        return $this->loader->load($name, $shared);
    }

    /**
     * @param $name
     * @return mixed
     */
    function __get($name)
    {
        return $this->__call($name, array());
    }

    /**
     * Register a new class in the Loader
     *
     * @param $name
     * @param $class
     * @param array $params
     * @param null $callback
     */
    public function register($name, $class, array $params = array(), $callback = null)
    {
        $this->loader->register($name, $class, $params, $callback);
    }

    /**
     * Enables/disables custom error handling.
     *
     * @param bool $enabled True or false
     */
    public function handleErrors($enabled)
    {
        if ($enabled) {
            set_error_handler(array($this, 'handleError'));
            set_exception_handler(array($this, 'handleException'));
        } else {
            restore_error_handler();
            restore_exception_handler();
        }
    }

    /**
     * Custom error handler. Converts errors into exceptions.
     *
     * @param int $errno Error number
     * @param int $errstr Error string
     * @param int $errfile Error file name
     * @param int $errline Error file line number
     * @throws \ErrorException
     */
    public function handleError($errno, $errstr, $errfile, $errline)
    {
        if ($errno & error_reporting()) {
            throw new \ErrorException($errstr, $errno, 0, $errfile, $errline);
        }
    }

    /**
     * Custom exception handler. Logs exceptions.
     *
     * @param object $e Thrown exception
     */
    public function handleException($e)
    {
        if ($this['system.log_errors']) {
            error_log($e->getMessage());
        }

        $this->error($e);
    }

    /**
     * Sends an HTTP 500 response for any errors.
     *
     * @param object $e Thrown exception
     */
    public function error($e)
    {
        $msg = sprintf('<h1>500 Internal Server Error</h1>' .
            '<h3>%s (%s)</h3>' .
            '<pre>%s</pre>',
            $e->getMessage(),
            $e->getCode(),
            $e->getTraceAsString()
        );

        try {
            $this->response(false)
                ->status(500)
                ->write($msg)
                ->send();
        } catch (\Throwable $t) {
            exit($msg);
        } catch (\Exception $ex) {
            exit($msg);
        }
    }

    /**
     * Sends an HTTP 404 response when a URL is not found.
     */
    public function notFound()
    {
        $this->response(false)
            ->status(404)
            ->write(
                '<h1>404 Not Found</h1>' .
                '<h3>The page you have requested could not be found.</h3>' .
                str_repeat(' ', 512)
            )
            ->send();
    }

    public function map($method, $pattern, $callback)
    {
        $this->router->map(trim($method) . ' ' . trim($pattern), $callback);
    }

    public function any($pattern, $callback)
    {
        $this->map('*', $pattern, $callback);
    }

    public function get($pattern, $callback)
    {
        $this->map('GET', $pattern, $callback);
    }

    public function post($pattern, $callback)
    {
        $this->map('POST', $pattern, $callback);
    }

    public function put($pattern, $callback)
    {
        $this->map('PUT', $pattern, $callback);
    }

    public function delete($pattern, $callback)
    {
        $this->map('DELETE', $pattern, $callback);
    }

    public function run()
    {
        $dispatched = false;
        $request = $this->request;
        $response = $this->response;
        $router = $this->router;

        // Flush any existing output
        if (ob_get_length() > 0) {
            $response->write(ob_get_clean());
        }

        // Enable output buffering
        ob_start();

        // Enable error handling
        $this->handleErrors($this['system.handle_errors']);

        // Route the request
        if ($route = $router->route($request)) {
            $params = array_values($route->params);

            // Call route handler
            if (is_callable($route->callback)) {
                list($class, $method) = $route->callback;

                $class = is_object($class) ? $class : new $class;

                switch (count($params)) {
                    case 0:
                        return $class->$method();
                    case 1:
                        return $class->$method($params[0]);
                    case 2:
                        return $class->$method($params[0], $params[1]);
                    case 3:
                        return $class->$method($params[0], $params[1], $params[2]);
                    case 4:
                        return $class->$method($params[0], $params[1], $params[2], $params[3]);
                    case 5:
                        return $class->$method($params[0], $params[1], $params[2], $params[3], $params[4]);
                    default:
                        return call_user_func_array($route->callback, $params);
                }
            } else {
                throw new \Exception('Invalid callback specified.');
            }
        } else {
            $this->notFound();
        }
    }
}