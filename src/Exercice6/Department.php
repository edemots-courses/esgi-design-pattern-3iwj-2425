<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Department implements OrganizationUnit
{
    private int $id;
    private string $name;

    /** @var OrganizationUnit[] */
    private array $organizationUnits = [];

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
        foreach ($this->organizationUnits as $index => $child) {
            if ($child === $unit) {
                unset($this->organizationUnits[$index]);
                break;
            }
        }
    }

    public function displayDetails(int $indentation = 0): string
    {
        $prefix = str_repeat('    ', $indentation);
        $details = sprintf(
            "%sDepartment ID : %d\r\n%sDepartment name : %s\r\n%sDepartment details :\r\n\r\n",
            $prefix,
            $this->id,
            $prefix,
            $this->name,
            $prefix
        );
        foreach ($this->organizationUnits as $child) {
            $childOutput = rtrim($child->displayDetails($indentation + 1), "\r\n");
            $details .= $childOutput . "\r\n\r\n";
        }

        return rtrim($details, "\r\n");
    }
}