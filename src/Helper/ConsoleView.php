<?php

namespace Ottivo\Helper;

final class ConsoleView
{
    /**
     * Employee list view
     *
     * @param array $employees
     * @return void
     */
    public static function employeesOutput($employees)
    {
        $output = "List of employees\n";

        $index = 1;
        foreach ($employees as $employee) {
            $output .= sprintf("%d. %s - %s vacation days\n", $index++, $employee->getName(), $employee->getVacationDays());
        }
        
        echo $output;
    }

    /**
     * Print required parameters
     *
     * @return void
     */
    public static function missingParametersOutput()
    {
        $output = "Required parameters\n";

        foreach (OTTIVO_REQUIRED_PARAMETERS as $parameter) {
            $output .= sprintf("-%s\n", $parameter);
        }
        
        echo $output;
    }
}