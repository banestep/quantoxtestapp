<?php

class CSMBoard implements Board
{
    public function doReportForStudent(Student $student)
    {
        $result = $this->calculateFinalResult($student->getGrades());
        $this->displayReport($student,$result);
    }

    private function calculateFinalResult(array $grades)
    {
        $average = array_sum($grades) / count($grades);
        if($average >= 7)
        {
            return 'Pass';
        }
        else
        {
            return 'Fail';
        }
    }

    private function displayReport(Student $student, $result)
    {
        $grades = $student->getGrades();
        $report = array(
            'id'        => $student->getId(),
            'name'      => $student->getName(),
            'grades'    => $grades,
            'average'   => (array_sum($grades) / count($grades)),
            'result'    => $result
        );

        header('Content-Type: application/json');
        echo json_encode($report);
    }
}