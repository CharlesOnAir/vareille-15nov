<?php

class Student
{
    public $Prenom;
    public $Age;

    /**
     * @param string $prenom
     * @param int $age
     */

    public function __construct($prenom, $age)
    {
        $this->Prenom = $prenom;
        $this->Age = $age;
    }
}
