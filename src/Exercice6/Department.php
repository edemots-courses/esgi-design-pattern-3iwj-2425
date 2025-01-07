<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Department implements OrganizationUnit
{
<<<<<<< HEAD
    private int  $id;
    private string $name;
    private array $units;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->units = [];
    }

    public function getId(): int    
=======
    public function getId(): int
>>>>>>> upstream/main
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
<<<<<<< HEAD

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
        $indent = str_repeat(' ', $indentation);
        $output = sprintf('%sDepartment %s (%s)', $indent, $this->name, $this->id);
        foreach ($this->units as $unit) {
            $output .= $unit->displayDetails($indentation + 1) . "\n";
        }

        return $output;
    }
}


=======
}
>>>>>>> upstream/main
