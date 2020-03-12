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
            $id = (int) $id;
            $this->doTheReport($id);
        }
    }

    private function doTheReport($id)
    {
        $student    = new Student($id);
        $board      = $student->getBoard();

        switch($board)
        {
            case 'csm':
                $board_obj = new CSMBoard();
                break;
            case 'csmb':
                $board_obj = new CSMBBoard();
                break;
            default:
                echo 'No such student or bad db entry';
                return false;
        }

        $board_obj->doReportForStudent($student);
    }
}