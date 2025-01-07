<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Employee implements OrganizationUnit
{
<<<<<<< HEAD
    private int $id;
    private string $name;
    private string $jobTitle;

    public function __construct(int $id, string $name, string $jobTitle)
    {
        $this->id = $id;
        $this->name = $name;
        $this->jobTitle = $jobTitle;
    }  

=======
>>>>>>> upstream/main
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
<<<<<<< HEAD
    }  

    public function getJobTitle(): string    
    {
        return $this->jobTitle;
    }

    public function displayDetails(int $indentation = 0): string
    {
        $indent = str_repeat(' ', $indentation);
        return sprintf('%sEmployee %s (%s) - %s', $indent, $this->name, $this->id, $this->jobTitle);
    }
}
=======
    }

    public function getJobTitle(): string
    {
        return $this->jobTitle;
    }
}
>>>>>>> upstream/main
