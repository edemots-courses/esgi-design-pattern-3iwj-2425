<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Organization implements OrganizationUnit
{
    private $name;
    private $organizationUnits = [];

    public function __construct(string $name)
    {
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
        $details = "Organization name : " . $this->name . PHP_EOL;
        $details .= "Organization details :" . PHP_EOL;

        foreach ($this->organizationUnits as $unit) {
            $details .= $unit->displayDetails($indentation + 1); 
        }

        return rtrim($details, PHP_EOL) . PHP_EOL; 
    }
}

