<?php

class Student
{
    private $id;
    private $name;
    private $board;
    private $grades;
    function __construct($id)
    {
        if(is_numeric($id))
        {
            $this->id = (int) $id;
        }
    }
}