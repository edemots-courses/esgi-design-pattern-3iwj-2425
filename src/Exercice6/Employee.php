<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Employee implements OrganizationUnit
{
    private int $id;
    private string $name;
    private string $jobTitle;

    public function __construct(string $name, string $jobTitle)
    {
        $this->id = rand(1000, 9999); // ID aléatoire
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

    public function displayDetails(int $indentation = 0): string
    {
        $indent = str_repeat("    ", $indentation); // Utilisation de l'indentation
        return $indent . "Employee ID : {$this->id}\n" . 
                         $indent . "Employee name : {$this->name}\n" . 
                         $indent . "Employee job title : {$this->jobTitle}\n";
    }
}
