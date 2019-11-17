<?php

include_once __DIR__ . "/../app/bootstrap.php";

use Ottivo\Helper\Storage;
use PHPUnit\Framework\TestCase;
use Ottivo\Entity\Employee\Employee;
use Ottivo\Entity\Employee\EmployeeDao;

final class EmployeeTest extends TestCase
{
    public function testStorageDataIsArray()
    {
        $employees = Storage::getEmployees();

        $this->assertIsArray(
            $employees
        );
    }

    public function testStorageDataContainObjects()
    {
        $employees = Storage::getEmployees();

        $this->assertContainsOnlyInstancesOf(
            stdClass::class,
            $employees
        );
    }

    public function testEmployeeFilterWithNullParameter()
    {
        $employees = (new EmployeeDao)->fetchEmployees()->filterByContractYear(null);

        $this->assertEmpty(
            $employees
        );
    }

    public function testEmployeeFilterWithBadFormatParameter()
    {
        $employees = (new EmployeeDao)->fetchEmployees()->filterByContractYear(20136);

        $this->assertEmpty(
            $employees
        );
    }

    public function testEmployeeFilterDataIsArray()
    {
        $employees = Storage::getEmployees();
        $employee = reset($employees);
        $year = substr($employee->contractStartDate, -4);

        $employees = (new EmployeeDao)->fetchEmployees()->filterByContractYear($year);

        $this->assertIsArray(
            $employees
        );
    }

    public function testEmployeeFilterDataContainProperObjects()
    {
        $employees = Storage::getEmployees();
        $employee = reset($employees);
        $year = substr($employee->contractStartDate, -4);

        $employees = (new EmployeeDao)->fetchEmployees()->filterByContractYear($year);

        $this->assertContainsOnlyInstancesOf(
            Employee::class,
            $employees
        );
    }
}
