<?php

class Session
{
    /**
     * Starts the session.
     *
     *  <code>
     *      Session::start();
     *  </code>
     *
     */
    public function start()
    {
        // Is session already started?
        if (! session_id()) {

            // Start the session
            return @session_start();
        }

        // If already started
        return true;
    }

    /**
     * Deletes one or more session variables.
     *
     *  <code>
     *      Session::delete('user');
     *  </code>
     *
     */
    public function delete()
    {
        // Loop all arguments
        foreach (func_get_args() as $argument) {

            // Array element
            if (is_array($argument)) {

                // Loop the keys
                foreach ($argument as $key) {

                    // Unset session key
                    unset($_SESSION[(string) $key]);
                }
            } else {

                // Remove from array
                unset($_SESSION[(string) $argument]);
            }
        }
    }

    /**
     * Destroys the session.
     *
     *  <code>
     *      Session::destroy();
     *  </code>
     *
     */
    public function destroy()
    {
        // Destroy
        if (session_id()) {
            session_unset();
            session_destroy();
            $_SESSION = array();
        }
    }

    /**
     * Checks if a session variable exists.
     *
     *  <code>
     *      if (Session::exists('user')) {
     * 			// Do something...
     *  	}
     *  </code>
     *
     * @return boolean
     */
    public function exists($t)
    {
        // Start session if needed
        if (! session_id()) {
            $this->start();
        }

        // Loop all arguments
        foreach (func_get_args() as $argument) {

            // Array element
            if (is_array($argument)) {

                // Loop the keys
                foreach ($argument as $key) {

                    // Does NOT exist
                    if (! isset($_SESSION[(string) $key])) {
                        return false;
                    }
                }
            } else {

                // Does NOT exist
                if (! isset($_SESSION[(string) $argument])) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Gets a variable that was stored in the session.
     *
     *  <code>
     *      echo Session::get('user');
     *  </code>
     *
     * @param  string $key The key of the variable to get.
     * @return mixed
     */
    public function get($key)
    {
        // Start session if needed
        if (! session_id()) {
            $this->start();
        }

        // Redefine key
        $key = (string) $key;

        // Fetch key
        if ($this->exists((string) $key)) {
            return $_SESSION[(string) $key];
        }

        // Key doesn't exist
        return null;
    }


    /**
     * Returns the sessionID.
     *
     *  <code>
     *      echo Session::getSessionId();
     *  </code>
     *
     * @return string
     */
    public function getSessionId()
    {
        if (! session_id()) {
            $this->start();
        }
        return session_id();
    }


    /**
     * Stores a variable in the session.
     *
     *  <code>
     *      Session::set('user', 'Awilum');
     *  </code>
     *
     * @param string $key   The key for the variable.
     * @param mixed  $value The value to store.
     */
    public function set($key, $value)
    {
        // Start session if needed
        if (! session_id()) {
            $this->start();
        }

        // Set key
        $_SESSION[(string) $key] = $value;
    }
}
