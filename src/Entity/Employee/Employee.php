<?php

namespace Ottivo\Entity\Employee;

class Employee 
{
    public const BASE_VACATION_DAYS = 26;
    public const MIN_AGE = 30;
    public const STEP_CALCULATING_ADDITIONAL_DAYS = 5;

    private $name;
    private $birthdate;
    private $contractStartDate;
    private $specialContract;
    private $vacationDays;

    /**
     * Set Name - Name
     * 
     * @param string $name
     * @return \Ottivo\Entity\Employee\Employee
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get Name - Name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Birthdate - Birthdate
     * 
     * @param string $birthdate
     * @return \Ottivo\Entity\Employee\Employee
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    /**
     * Get Birthdate - Birthdate
     * 
     * @return string
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set ContractStartDate - ContractStartDate
     * 
     * @param string $contractStartDate
     * @return \Ottivo\Entity\Employee\Employee
     */
    public function setContractStartDate($contractStartDate)
    {
        $this->contractStartDate = $contractStartDate;
        return $this;
    }

    /**
     * Get ContractStartDate - ContractStartDate
     * 
     * @return string
     */
    public function getContractStartDate()
    {
        return $this->contractStartDate;
    }

    /**
     * Set SpecialContract - SpecialContract
     * 
     * @param string $specialContract
     * @return \Ottivo\Entity\Employee\Employee
     */
    public function setSpecialContract($specialContract)
    {
        $this->specialContract = $specialContract;
        return $this;
    }

    /**
     * Get SpecialContract - SpecialContract
     * 
     * @return int
     */
    public function getSpecialContract()
    {
        return $this->specialContract;
    }

    /**
     * Set VacationDays - VacationDays
     * 
     * @param string $vacationDays
     * @return \Ottivo\Entity\Employee\Employee
     */
    public function setVacationDays($vacationDays)
    {
        $this->vacationDays = $vacationDays;
        return $this;
    }

    /**
     * Get VacationDays - VacationDays
     * 
     * @return int
     */
    public function getVacationDays()
    {
        return $this->vacationDays;
    }

}