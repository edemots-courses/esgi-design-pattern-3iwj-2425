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
        $prefix = str_repeat('    ', $indentation);

        
        return sprintf(
            "%sEmployee ID : %d\r\n%sEmployee name : %s\r\n%sEmployee job title : %s\r\n",
            $prefix,
            $this->id,
            $prefix,
            $this->name,
            $prefix,
            $this->jobTitle
        );
    }
}