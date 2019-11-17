<?php

namespace Ottivo\Entity\Employee;

use Carbon\Carbon;
use Ottivo\Helper\Storage;
use Ottivo\Entity\Employee\Employee;

class EmployeeDao
{
    private $employees;

    /**
     * Fetch from storage
     *
     * @return \Ottivo\Entity\Employee\Employee
     */
    public function fetchEmployees()
    {
        $this->employees = Storage::getEmployees();
        return $this;
    }

    /**
     * Filter employees
     *
     * @param string $year
     * @return array
     */
    public function filterByContractYear($year) 
    {
        $filteredEmployees = [];

        foreach ($this->employees as $storageEmployee) {
            if (substr($storageEmployee->contractStartDate, -4) !== $year) {
                continue;
            }

            $newEmployee = new Employee;
            $newEmployee->setName($storageEmployee->name)
                        ->setBirthdate($storageEmployee->birthdate)
                        ->setContractStartDate($storageEmployee->contractStartDate)
                        ->setSpecialContract($storageEmployee->specialContract);

            $this->generateVacationDays($newEmployee);
            $filteredEmployees[] = $newEmployee;
        }

        return $filteredEmployees;
    }

    /**
     * Append vacation days
     *
     * @param \Ottivo\Entity\Employee\Employee $employee
     * @return void
     */
    private function generateVacationDays($employee)
    {
        $vacationDays = Employee::BASE_VACATION_DAYS;

        if (!is_null($employee->getSpecialContract())) {
            $vacationDays = $employee->getSpecialContract();
        }

        $birthdate = Carbon::createFromFormat('d.m.Y', $employee->getBirthdate());
        $startDate = Carbon::createFromFormat('d.m.Y', '01.01.' . substr($employee->getContractStartDate(), -4))->addYear();
        $endDate   = Carbon::createFromFormat('d.m.Y', $employee->getContractStartDate());

        $additionalVacationDays = floor(($birthdate->diffInYears(Carbon::now()) - Employee::MIN_AGE) / Employee::STEP_CALCULATING_ADDITIONAL_DAYS);
        $vacationDays += max($additionalVacationDays, 0);
  
        $employee->setVacationDays(
            floor($vacationDays / 12 * $startDate->diffInMonths($endDate))
        );
    }

}