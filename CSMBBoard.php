<?php

use Spatie\ArrayToXml\ArrayToXml;

class CSMBBoard implements Board
{
    public function doReportForStudent(Student $student)
    {
        $grades = $student->getGrades();
        sort($grades);

        // I guess that discarding the lowest grade should be done here
        // and that the lowest grade should not appear in the final report.
        // If it were only a condition to calculate the final result
        // then the whole condition would not make sense.
        if(count($grades) > 2)
        {
            unset($grades[0]);
        }
        $result = $this->calculateFinalResult($grades);
        $this->displayReport($student,$grades,$result);
    }

    private function calculateFinalResult(array $grades)
    {
        $highest_grade = array_pop($grades);
        if($highest_grade > 8)
        {
            return 'Pass';
        }
        else
        {
            return 'Fail';
        }
    }

    private function displayReport(Student $student, array $grades, $result)
    {
        $report = array(
            'id'        => $student->getId(),
            'name'      => $student->getName(),
            'grades'    => $grades,
            'average'   => (array_sum($grades) / count($grades)),
            'result'    => $result
        );

        $report_xml = ArrayToXml::convert($report);
        header('Content-Type: text/xml');
        echo $report_xml;
    }
}