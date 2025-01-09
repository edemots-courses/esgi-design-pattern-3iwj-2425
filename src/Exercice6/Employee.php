<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Employee implements OrganizationUnit
{
    private $id, $name, $jobTitle;

    public function __construct(int $id, string $name, string $jobTitle)
    {
        $this->id = $id;
        $this->name = $name;
        $this->jobTitle = $jobTitle;
    }

    public function displayDetails(int $indentation = 0): string
    {
        $indent = str_repeat('    ', $indentation);
        return "{$indent}Employee ID : {$this->id}\n" .
               "{$indent}Employee name : {$this->name}\n" .
               "{$indent}Employee job title : {$this->jobTitle}";
    }
}
