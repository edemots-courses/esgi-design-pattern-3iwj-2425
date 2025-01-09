<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Organization implements OrganizationUnit
{
    private string $name;
    private array $organizationUnits = [];

    public function __construct(string $name)
    {
        $this->name = $name;
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
        $key = array_search($unit, $this->organizationUnits);
        if ($key !== false) {
            unset($this->organizationUnits[$key]);
        }
    }

    public function displayDetails(int $indentation = 0): string
    {
        $details = "Organization name : " . $this->name . "\n" . "Organization details :\n";
        $organizationUnits = $this->organizationUnits ?? [];

        $lastUnitIndex = count($organizationUnits) - 1;

        foreach ($organizationUnits as $index => $unit) {
            $details .= $unit->displayDetails($indentation + 1);
            if ($index !== $lastUnitIndex) {
                $details .= "\n";
            }
        }

        return $details;
    }
}
