<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Organization implements OrganizationUnit
{
    private string $name;
    /** @var OrganizationUnit[] */
    private array $organizationUnits = [];

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
        foreach ($this->organizationUnits as $index => $child) {
            if ($child === $unit) {
                unset($this->organizationUnits[$index]);
                break;
            }
        }
    }

    public function displayDetails(int $indentation = 0): string
    {
        $details = sprintf(
            "Organization name : %s\r\nOrganization details :\r\n\r\n",
            $this->name
        );

        foreach ($this->organizationUnits as $child) {
            $childOutput = rtrim($child->displayDetails($indentation + 1), "\r\n");
            $details .= $childOutput . "\r\n\r\n";
        }

        $details = rtrim($details, "\r\n");

        return $details;
    }
}