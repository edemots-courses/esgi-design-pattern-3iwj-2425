<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Department implements OrganizationUnit
{
    private int $id;
    private string $name;
    private array $organizationUnits = [];

    public function __construct(int $id, string $name)
    {
        $this->id = $id; // Initialisation de $id
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addOrganizationUnit(OrganizationUnit $unit)
    {
        $this->organizationUnits[] = $unit;
    }

    public function removeOrganizationUnit(OrganizationUnit $unit)
    {
        $key = array_search($unit, $this->organizationUnits, true);
        if ($key !== false) {
            unset($this->organizationUnits[$key]);
        }
    }

    public function displayDetails(int $indentation = 0): string
    {
        $details = str_repeat("    ", $indentation) . "Department ID : " . $this->id . "\n" .
                   str_repeat("    ", $indentation) . "Department name : " . $this->name . "\n" .
                   str_repeat("    ", $indentation) . "Department details :\n";

        foreach ($this->employees as $employee) {
            $details .= $employee->displayDetails($indentation + 1) . "\n";
        }

        $subDepartments = $this->organizationUnits ?? [];

        $lastSubDepartmentIndex = count($subDepartments) - 1;
        foreach ($subDepartments as $index => $subDepartment) {
            $details .= $subDepartment->displayDetails($indentation + 1);
            if ($index !== $lastSubDepartmentIndex) {
                $details .= "\n"; 
            }
        }

        return $details;
    }
    
}
