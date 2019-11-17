<?php

namespace Ottivo\Helper;

final class Storage
{
    /**
     * Fetching employees
     *
     * @return array
     */
    public static function getEmployees()
    {
        $employees = file_get_contents(OTTIVO_BASE_PATH . '/storage/employees.json');

        return json_decode($employees);
    }
}