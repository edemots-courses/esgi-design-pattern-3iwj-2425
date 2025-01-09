<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Department implements OrganizationUnit
{
    private $id, $name, $organizationUnits = [];

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
        $this->organizationUnits = array_values(array_filter(
            $this->organizationUnits,
            fn($value) => $value !== $unit
        ));
    }

    public function displayDetails(int $indentation = 0): string
    {
        $indent = str_repeat('    ', $indentation);
        $result = "{$indent}Department ID : {$this->id}\n" .
                  "{$indent}Department name : {$this->name}\n" .
                  "{$indent}Department details :\n\n";
        
        foreach ($this->organizationUnits as $unit) {
            $result .= $unit->displayDetails($indentation + 1) . "\n\n";
        }
        
        return rtrim($result);
    }
}
