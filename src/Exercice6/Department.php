<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Department implements OrganizationUnit
{
    private $id;
    private $name;
    private $organizationUnits = [];

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function addOrganizationUnit(OrganizationUnit $unit): void
    {
        $this->organizationUnits[] = $unit;
    }

    public function removeOrganizationUnit(OrganizationUnit $unit): void
    {
        $key = array_search($unit, $this->organizationUnits, true);
        if ($key !== false) {
            unset($this->organizationUnits[$key]);
        }
    }

    public function displayDetails(int $indentation = 0): string
    {
        $details = str_repeat('    ', $indentation) . "Department ID : " . $this->id . PHP_EOL;
        $details .= str_repeat('    ', $indentation) . "Department name : " . $this->name . PHP_EOL;
        $details .= str_repeat('    ', $indentation) . "Department details :" . PHP_EOL;
        
        foreach ($this->organizationUnits as $unit) {
            $details .= $unit->displayDetails($indentation + 1); 
        }

        return rtrim($details, PHP_EOL) . PHP_EOL; 
    }
}

