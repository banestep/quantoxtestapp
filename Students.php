<?php

class Students 
{
    function __construct($id = false)
    {
        if($id === false || $id === NULL || !is_numeric($id))
        {
            echo 'No ID or bad ID';
        }
        else
        {
            $id         = (int) $id;
            $student    = new Student($id);
            echo '<pre>'; var_dump($student); echo '</pre>';
        }
    }
}