<?php

/**
 * Class DSUser
 * This object is using for authentication
 */

class DSUser
{
    public $Username;
    public $Password;

    function __construct($name, $pass)
    {
        $this->Username = $name;
        $this->Password = $pass;
    }
}