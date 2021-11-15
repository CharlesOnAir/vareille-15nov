<?php

class Student
{
    /**
     * @param string $prenom
     * @param int $age
     */

    public $Prenom;
    public $Age;

    public function __construct($prenom, $age)
    {
        $this->Prenom = $prenom;
        $this->Age = $age;
    }
}
