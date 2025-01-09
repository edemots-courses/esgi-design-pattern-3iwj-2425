<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Department implements OrganizationUnit
{
    private int $id;
    private string $name;
    private array $units;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->units = [];
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
        $indent = str_repeat("    ", $indentation);
        $output = sprintf(
            "%sDepartment ID : %d\n%sDepartment name : %s\n%sDepartment details :",
            $indent,
            $this->id,
            $indent,
            $this->name,
            $indent
        );

        foreach ($this->units as $unit) {
            $output .= "\n\n" . $unit->displayDetails($indentation + 1);
        }

        return $output;
    }
}
