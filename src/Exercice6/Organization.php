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

    public function addUnit(OrganizationUnit $unit): void
    {
        $this->units[] = $unit;
    }

    public function removeUnit(OrganizationUnit $unit): void
    {
        $index = array_search($unit, $this->units);
        if ($index !== false) {
            unset($this->units[$index]);
            }
        }

    public function displayDetails(int $indentation = 0): string
    {
        $output = sprintf("Organization name : %s\nOrganization details :\n\n", $this->name);
        foreach ($this->units as $unit) {
            $output .= $unit->displayDetails($indentation + 1) . "\n";
        }

        return $output;
    }
}
