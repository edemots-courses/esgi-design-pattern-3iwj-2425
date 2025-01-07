<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Employee implements OrganizationUnit
{
    private int $id;
    private string $name;
    private string $jobTitle;

    public function __construct(int $id, string $name, string $jobTitle)
    {
        $this->id = $id;
        $this->name = $name;
        $this->jobTitle = $jobTitle;
    }

    public function displayDetails(int $indentation = 0): string
    {
        $indent = str_repeat('    ', $indentation);
        $details = "{$indent}Employee ID : {$this->id}\n";
        $details .= "{$indent}Employee name : {$this->name}\n";
        $details .= "{$indent}Employee job title : {$this->jobTitle}";
        return $details;
    }
}