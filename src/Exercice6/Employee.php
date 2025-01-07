<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Employee implements OrganizationUnit
{
    private $id;
    private $name;
    private $jobTitle;

    public function __construct(int $id, string $name, string $jobTitle)
    {
        $this->id = $id;
        $this->name = $name;
        $this->jobTitle = $jobTitle;
    }

    public function displayDetails(int $indentation = 0): string
    {
        return str_repeat('    ', $indentation) . "Employee ID : " . $this->id . PHP_EOL
             . str_repeat('    ', $indentation) . "Employee name : " . $this->name . PHP_EOL
             . str_repeat('    ', $indentation) . "Employee job title : " . $this->jobTitle . PHP_EOL;
    }
}

