<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Department implements OrganizationUnit
{
    private int $id;
    private string $name;
    private array $organizationUnits;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->organizationUnits = [];
    }

    public function addOrganizationUnit(OrganizationUnit $unit): void
    {
        $this->organizationUnits[] = $unit;
    }

    public function removeOrganizationUnit(OrganizationUnit $unit): void
    {
        foreach ($this->organizationUnits as $key => $value) {
            if ($value === $unit) {
                unset($this->organizationUnits[$key]);
            }
        }
        $this->organizationUnits = array_values($this->organizationUnits);
    }

    public function displayDetails(int $indentation = 0): string
    {
        $indent = str_repeat('    ', $indentation);
        $result = $indent . "Department ID : {$this->id}\n";
        $result .= $indent . "Department name : {$this->name}\n";
        $result .= $indent . "Department details :\n\n";
        foreach ($this->organizationUnits as $unit) {
            $result .= $unit->displayDetails($indentation + 1) . "\n\n";
        }
        return rtrim($result);
    }
}
