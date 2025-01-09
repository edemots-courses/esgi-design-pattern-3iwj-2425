<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Organization implements OrganizationUnit
{
    private string $name;
    private array $organizationUnits;

    public function __construct(string $name)
    {
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
        $result = "Organization name : {$this->name}\n";
        $result .= "Organization details :\n\n";
        foreach ($this->organizationUnits as $unit) {
            $result .= $unit->displayDetails(1) . "\n\n";
        }
        return rtrim($result);
    }
}
