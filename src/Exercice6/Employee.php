<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Employee implements OrganizationUnit
{
    private int $id;
    private string $name;
    private string $jobTitle;

    public function __construct(int $id, string $name, string $jobTitle)
    {
        $this->id = $id; // Initialisation de $id
        $this->name = $name;
        $this->jobTitle = $jobTitle;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getJobTitle(): string
    {
        return $this->jobTitle;
    }

    public function displayDetails(int $indentation = 0): string
    {
        return str_repeat("    ", $indentation) . "Employee ID : " . $this->id . "\n" .
               str_repeat("    ", $indentation) . "Employee name : " . $this->name . "\n" . 
               str_repeat("    ", $indentation) . "Employee job title : " . $this->jobTitle;
    }    

}
