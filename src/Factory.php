<?php

namespace Ottivo;

use Ottivo\Entity\Employee\EmployeeDao;

class Factory
{
    private static $_instance;

    /**
     * Get a factory instance. 
     * 
     * @return Factory
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    /**
     * Get a Employee DAO
     * 
     * @return Ottivo\Entity\Employee\EmployeeDao
     */
    public function getEmployeeDao()
    {
        return new EmployeeDao();
    }
}