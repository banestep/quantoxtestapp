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
            $this->populateData($this->id);
        }
    }

    private function populateData($id)
    {
        $mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        if ($mysqli->connect_errno) {
            echo "Failed to connect: " . $mysqli->connect_error;
        }
        $result         = $mysqli->query("SELECT `name`, `board`, `grades` FROM `students` WHERE `student_id` = $id");
        $student_row    = $result->fetch_assoc();

        $this->name     = $student_row['name'];
        $this->board    = $student_row['board'];
        $this->grades   = json_decode($student_row['grades']);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBoard()
    {
        return $this->board;
    }

    public function getGrades()
    {
        return $this->grades;
    }
}