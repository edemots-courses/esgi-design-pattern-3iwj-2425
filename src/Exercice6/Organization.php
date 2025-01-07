<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Organization
{
    private string $name;
    private array $organizationUnits = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addOrganizationUnit(OrganizationUnit $unit): void
    {
        $this->organizationUnits[] = $unit;
    }

    public function removeOrganizationUnit(OrganizationUnit $unit): void
    {
        $key = array_search($unit, $this->organizationUnits);
        if ($key !== false) {
            unset($this->organizationUnits[$key]);
        }
    }

    public function displayDetails(int $indentation = 0): string
    {
        $indent = str_repeat("    ", $indentation); // Utilisation de l'indentation
        $details = $indent . "Organization name : {$this->name}\n" . 
                  $indent . "Organization details :\n";

        foreach ($this->organizationUnits as $unit) {
            $details .= $unit->displayDetails($indentation + 1); // Indentation accrue pour les sous-unités
        }

        return $details;
    }
}
