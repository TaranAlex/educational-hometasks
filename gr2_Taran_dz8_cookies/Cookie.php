<?php 

class Cookie
{
    public function set($key, $value, $limit = 0)
    {
        setcookie($key, $value, time()+$limit);
    }

    public function unset_($key)
    {
        setcookie($key);
    }
}


 ?>