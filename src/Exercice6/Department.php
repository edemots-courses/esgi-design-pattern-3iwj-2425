<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Department implements OrganizationUnit
{
    private int $id;
    private string $name;
    private array $organizationUnits = [];

    public function __construct(string $name)
    {
        $this->id = rand(1000, 9999); 
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

    public function addOrganizationUnit(OrganizationUnit $unit): void
    {
        $this->organizationUnits[] = $unit;
    }

    public function removeOrganizationUnit(OrganizationUnit $unit): void
    {
        $key = array_search($unit, $this->organizationUnits);
        if ($key !== false) {
            unset($this->organizationUnits[$key]);
        }
    }

    public function displayDetails(int $indentation = 0): string
    {
        $indent = str_repeat("    ", $indentation); // Utilisation de l'indentation
        $details = $indent . "Department ID : {$this->id}\n" . 
                  $indent . "Department name : {$this->name}\n" . 
                  $indent . "Department details :\n";

        foreach ($this->organizationUnits as $unit) {
            $details .= $unit->displayDetails($indentation + 1); // Indentation accrue pour sous-unités
        }

        return $details;
    }
}
