<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Organization implements OrganizationUnit
{
    private string $name;
    private array $units;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->units = [];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addOrganizationUnit(OrganizationUnit $unit): void
    {
        $this->units[] = $unit;
    }

    public function removeOrganizationUnit(OrganizationUnit $unit): void
    {
        $key = array_search($unit, $this->units, true);
        if ($key !== false) {
            unset($this->units[$key]);
            $this->units = array_values($this->units);
        }
    }

    public function displayDetails(int $indentation = 0): string
    {
        $output = sprintf(
            "Organization name : %s\nOrganization details :",
            $this->name
        );

        foreach ($this->units as $unit) {
            $output .= "\n\n" . $unit->displayDetails($indentation + 1);
        }

        return $output;
    }
}