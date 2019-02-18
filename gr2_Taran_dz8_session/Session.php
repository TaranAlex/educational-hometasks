<?php 

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function unset_($key)
    {
        unset($_SESSION[$key]);
    }

    public function destroy()
    {
        session_destroy();
    }
}

 ?>